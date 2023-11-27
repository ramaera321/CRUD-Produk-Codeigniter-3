<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Status_model extends CI_Model{
    private $table = 'status';

    public function rules()
    {
        return [
            [
                'field' => 'nama_status',
                'label' => 'Nama Status',
                'rules' => 'required'
            ],
        ];
    }

    public function getById($id){
        return $this->db->get_where($this->table, ['id_status' => $id])->row();
    }

    public function getAll(){
        $this->db->from($this->table);
        $this->db->order_by("id_status", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllByColumns($column){
        $this->db->select($column);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data_status = null)
    {
        if($data_status != null){
            $data = array(
                "nama_status" => $data_status,
            );
        } else {
            $data = array(
                "nama_status" => $this->input->post('nama_status'),
            );
        }
        return $this->db->insert($this->table, $data);
    }

    public function saveBatch($data)
    {
        if($this->db->insert_batch($this->table, $data)){
            if($this->session->userdata('status')){
                $this->session->unset_userdata('status');
            }
            $status = $this->toArray($this->getAll(), 'nama_status', 'id_status');
            $this->session->set_userdata(['status' => $status]);
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $data = array(
            "nama_status" => $this->input->post('nama_status'),
        );
        return $this->db->update($this->table, $data, array('id_status' => $this->input->post('id_status')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_status" => $id));
    }
}

?>