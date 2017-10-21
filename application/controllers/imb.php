<?php if (!defined('BASEPATH')) exit('No direct script accsess allowed');

class Imb extends  CI_Controller {
	public function __construct(){
		parent::__construct(); 
			$this->load->model('model_imb');
		
	}
	public function index()
	{
		$this->load->view('form_tambah_imb');
	} 

	public function data_imb($page = 0)
	{
		$config = array (
			'base_url' => 'http://localhost:/arisp/imb/data_imb',
			'total_rows' => count ($this->model_imb->select_imb()),
			'per_page' => 3
		);
		$this->load->library('pagination');
		$per_page = $config['per_page'];
		$this->pagination->initialize($config);			
		$data['imb'] = $this->model_imb->get_all_imb($per_page,$page);
		
		$this->load->view('view_data_imb', $data);	
	
	}

	public function tambah_imb()
	{
		$this->form_validation->set_rules('tanggal','Tanggal Ditetapkan','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('nomor','Nomor Izin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('nama','Nama Pemilik','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('alamat','Alamat Bangunan','required|min_length[10]|max_length[16]');
		$this->form_validation->set_rules('lokasi','Lokasi Bangunan','required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('luas','Luas Bangunan','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('fungsi','Fungsi Bangunan','required|min_length[3]|max_length[16]');
		$this->form_validation->set_rules('status','Stasus','required|min_length[4]|max_length[200]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_tambah_imb');
		}
		else {
			$data_imb = array (
				'tanggal' => set_value('tanggal'),
				'nomor' => set_value('nomor'),
				'nama' => set_value('nama'),
				'alamat' => set_value('alamat'),
				'lokasi' => set_value('lokasi'),
				'luas' => set_value('luas'),
				'fungsi' => set_value('fungsi'),
				'status' => set_value('status')
			);
			$this->model_imb->tambah_imb($data_imb);

			$this->session->set_flashdata('pesan', 'imb berhasil ditambah');
			redirect('imb/data_imb');
		}
	}
	public function delete_imb($nomor) {
		$this->model_imb->delete_imb($nomor);
		$this->session->set_flashdata('pesan','imb berhasil dihapus');
		redirect('imb/data_imb');
	}
	public function edit_imb($nomor){
		$this->form_validation->set_rules('tanggal','Tanggal Ditetapkan','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('nomor','Nomor Izin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('nama','Nama Pemilik','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('alamat','Alamat Bangunan','required|min_length[10]|max_length[16]');
		$this->form_validation->set_rules('lokasi','Lokasi Bangunan','required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('luas','Luas Bangunan','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('fungsi','Fungsi Bangunan','required|min_length[3]|max_length[16]');
		$this->form_validation->set_rules('status','Stasus','required|min_length[3]|max_length[200]');
		
		if($this->form_validation->run() == FALSE)
		{
			$ini['imb']=$this->model_imb->get_imb_by_nomor($nomor);
			$this->load->view('form_edit_imb', $ini);
		}
		else {
				$data_imb = array(
					'tanggal' => set_value('tanggal'),
					'nomor' => set_value('nomor'),
					'nama' => set_value('nama'),
					'alamat' => set_value('alamat'),
					'lokasi' => set_value('lokasi'),
					'luas' => set_value('luas'),
					'fungsi' => set_value('fungsi'),
					'status' => set_value('status')
				);
				$this->model_imb->update_imb($nomor,$data_imb);
				$this->session->set_flashdata('pesan','user berhasil dirubah');
				redirect('imb/data_imb');
		}
	}
	
}