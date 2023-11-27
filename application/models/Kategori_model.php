<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model{
    private $table = 'kategori';

    public function rules()
    {
        return [
            [
                'field' => 'nama_kategori',
                'label' => 'Nama Kategori',
                'rules' => 'required'
            ],
        ];
    }

    public function getById($id){
        return $this->db->get_where($this->table, ['id_kategori' => $id])->row();
    }

    public function getAll(){
        $this->db->from($this->table);
        $this->db->order_by("id_kategori", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllByColumns($column){
        $this->db->select($column);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data_kategori = null)
    {
        if($data_kategori == null){
            $data = array(
                "nama_kategori" => $this->input->post('nama_kategori'),
            );
        } else {
            $data = array(
                "nama_kategori" => $data_kategori,
            );
        }
        return $this->db->insert($this->table, $data);
    }

    public function saveBatch($data)
    {
        if($this->db->insert_batch($this->table, $data)){
            if($this->session->userdata('kategori')){
                $this->session->unset_userdata('kategori');
            }
            $kategori = $this->toArray($this->getAll(), 'nama_kategori', 'id_kategori');
            $this->session->set_userdata(['kategori' => $kategori]);
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $data = array(
            "nama_kategori" => $this->input->post('nama_kategori'),
        );
        return $this->db->update($this->table, $data, array('id_kategori' => $this->input->post('id_kategori')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_kategori" => $id));
    }
}

?>