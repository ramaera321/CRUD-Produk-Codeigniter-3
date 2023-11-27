<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Kategori_model");		
		$this->load->model('Status_model');		
		$this->load->model('Produk_model');		
	}

	public function index()
	{
		$Produk_model = $this->Produk_model;
		$this->load->library('pagination');

		$config['base_url'] = site_url('welcome/');
		$config['total_rows'] = count($Produk_model->getWithJoinTable(
			'*',
			[
				['id' => 'id_kategori', 'name' => 'kategori'], 
				['id' => 'id_status', 'name' => 'status']
			],
			null,
			null,
			[
				['table' => 'status', 'column' => 'nama_status', 'value' => 'bisa dijual']
			], 
		));
		$config['per_page'] = 10;
		$config['uri_segment'] = 2;
		$choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  	= '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  	= '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] 	= '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  	= '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
		$data['data_produk'] = $Produk_model->getWithJoinTable(
			'*',
			[
				['id' => 'id_kategori', 'name' => 'kategori'], 
				['id' => 'id_status', 'name' => 'status']
			],
			$config["per_page"], 
			$data['page'],	
			[
				['table' => 'status', 'column' => 'nama_status', 'value' => 'bisa dijual']
			], 
		);
		$data['pagination'] = $this->pagination->create_links();
		$data['kategori'] = $this->Kategori_model->getAll();
		$data['status'] = $this->Status_model->getAll();

		$this->load->view('welcome_message', $data);
	}

	public function insert(){
		$Produk = $this->Produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($Produk->rules());
        
        if ($validation->run()) {
            $Produk->save();
            
			$data['status'] = 200;
			$data['message'] = 'Berhasil insert data produk';
			echo json_encode($data);
        } else {
			$data['status'] = 400;
			foreach($_POST as $key => $value){
				$data['message'][$key] = form_error($key);
			}
				$data['message']['kategori_id'] = form_error('kategori_id');
				$data['message']['status_id'] = form_error('status_id');
	
			echo json_encode($data);
		}
	}

	public function update(){
		$Produk = $this->Produk_model;
        $validation = $this->form_validation;
        $validation->set_rules($Produk->rules());
        
        if ($validation->run()) {
            $Produk->update();
            
			$data['status'] = 200;
			$data['message'] = 'Berhasil update data produk';
			echo json_encode($data);
        } else {
			$data['status'] = 400;
			foreach($_POST as $key => $value){
				$data['message'][$key] = form_error($key);
			}
				$data['message']['kategori_id'] = form_error('kategori_id');
				$data['message']['status_id'] = form_error('status_id');
	
			echo json_encode($data);
		}
	}

	public function singkronisasi(){
		date_default_timezone_set("Asia/Jakarta");
		$hours = date('H');
		$minutes = date('i');
		$hours = ($minutes > 1 ? $hours + 1 : $hours);
		$username = 'tesprogrammer' . date('dmy') . 'C' . ($hours < 10 ? '0' . $hours : $hours) ;
		$password = 'bisacoding-' . date('d-m-y');

		$this->db->trans_begin();

		$api = $this->getData($username, md5($password));
		$data_status = $this->getUniqueData('status', $api->data, 'db', 'nama_status');
		$data_kategori = $this->getUniqueData('kategori', $api->data, 'db', 'nama_kategori');
		$data_id = $this->getUniqueData('id_produk', $api->data, 'db', 'id_produk', true);
		$Produk = $this->Produk_model;
		$Kategori = $this->Kategori_model;
		$Status = $this->Status_model;

		if(count($data_kategori) != 0){
			$Kategori->saveBatch($data_kategori);
		}
		if(count($data_status) != 0){
			$Status->saveBatch($data_status);
		}

		$status_produk = $Produk->apiSave($api->data, $data_id);

		if ($this->db->trans_status() === FALSE && $status_produk)
		{
			$this->db->trans_rollback();
			$data['status'] = 400;
			$data['message'] = 'gagal insert data';

			echo json_encode($data);
		}
		else
		{
			$this->db->trans_commit();
			$data['status'] = 200;
			$data['message'] = 'berhasil insert data';

			echo json_encode($data);
		}

	}

	public function findProduck(){
		$Produk_model = $this->Produk_model;
		$id = $this->input->get('id');
		$data['produk'] = $Produk_model->getById($id);

		$this->output->set_output(json_encode($data));
	}

	public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();

		$this->db->trans_begin();
        $this->Produk_model->delete($id);
    
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$data['status'] = 400;
			$data['message'] = 'gagal insert data';

			echo json_encode($data);
		}
		else
		{
			$this->db->trans_commit();
			$data['status'] = 200;
			$data['message'] = 'berhasil insert data';

			echo json_encode($data);
		}
    }
}
