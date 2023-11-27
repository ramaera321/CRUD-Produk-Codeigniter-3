<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_model extends CI_Model{
    private $table = 'produk';

    public function rules()
    {
        return [
            [
                'field' => 'nama_produk',
                'label' => 'Nama Produk',
                'rules' => 'required'
            ],
            [
                'field' => 'harga',
                'label' => 'Harga',
                'rules' => 'required|numeric'
            ],
            [
                'field' => 'kategori_id',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'status_id',
                'label' => 'Status',
                'rules' => 'required'
            ],
        ];
    }

    public function getById($id){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('status', 'status.id_status = ' . $this->table . '.status_id', 'left');
        $this->db->join('kategori', 'kategori.id_kategori = ' . $this->table . '.kategori_id', 'left');
        $this->db->where('id_produk', $id);

        return $this->db->get()->row();
    }

    public function apiSave($data, $data_id){
        $array_data = array();
        $kategori = $this->session->userdata('kategori');
        $status = $this->session->userdata('status');
        foreach($data as $d) {
            if(in_array($d->id_produk, $data_id)){
                $dt = array(
                    'id_produk' => $d->id_produk,
                    'nama_produk' => $d->nama_produk,
                    'harga' => $d->harga,
                    'kategori_id' => array_search($d->kategori, $kategori),
                    'status_id' => array_search($d->status, $status),
                );
                
                array_push($array_data, $dt);
            }
        }

        if(count($array_data) != 0) {
            if($this->saveBatch($array_data)){
                return true;
            }
        }
        
        return false;      
    }

    public function getAllByColumns($column){
        $this->db->select($column);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function saveBatch($data)
    {
        if($this->db->insert_batch($this->table, $data)){
            if($this->session->userdata('produk')){
                $this->session->unset_userdata('produk');
            }
            $produk = $this->toArray($this->getAll(), 'id_produk', 'id_produk');
            $this->session->set_userdata(['id_produk' => $produk]);
            return true;
        } else {
            return false;
        }
    }

    public function getWithJoinTable($select, array $table_join, $limit = null, $start = null, array $where = array()){
        $this->db->select($select);
        $this->db->from($this->table);
        foreach($table_join as $table){
            $this->db->join($table['name'], $table['name'] . '.' . $table['id'] . ' = ' . $this->table . '.' . $table['name'] . '_id', 'left');
        }
        if($where != null){
            foreach($where as $w){
                $this->db->where($w['table'] . '.' . $w['column'], $w['value']);
            }
        }
        if($limit != null){
            $this->db->limit($limit, $start);
        }
            $this->db->order_by('id_produk', 'DESC');
        return $this->db->get()->result();
    }

    public function getAll(){
        $this->db->from($this->table);
        $this->db->order_by("id_produk", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    public function save()
    {
        $this->db->select('id_produk');
        $this->db->from($this->table);
        $this->db->like("id_produk", "%-M");
        $this->db->order_by("id_produk", "DESC");
        $this->db->limit(1);
        $query = $this->db->get()->row();
        if($query == null) {
            $id_produk = 1;
        } else {
            $dt_array = explode("-", $query->id_produk);
            $id_produk = $dt_array[0] + 1;
        }
        $data = array(
            "id_produk" => $id_produk . '-M',
            "nama_produk" => $this->input->post('nama_produk'),
            "harga" => $this->input->post('harga'),
            "kategori_id" => $this->input->post('kategori_id'),
            "status_id" => $this->input->post('status_id'),
        );
        if($this->db->insert($this->table, $data)){
            if($this->session->userdata('produk')){
                $this->session->unset_userdata('produk');
            }
            $produk = $this->toArray($this->getAll(), 'id_produk', 'id_produk');
            $this->session->set_userdata(['id_produk' => $produk]);
            return true;
        } else {
            return false;
        }
    }

    public function update()
    {
        $data = array(
            "nama_produk" => $this->input->post('nama_produk'),
            "harga" => $this->input->post('harga'),
            "kategori_id" => $this->input->post('kategori_id'),
            "status_id" => $this->input->post('status_id'),
        );
        return $this->db->update($this->table, $data, array('id_produk' => $this->input->post('id_produk')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_produk" => $id));
    }
}

?>