<?php if (!defined('BASEPATH')) exit('No direct script accsess allowed');

class Lahir extends  CI_Controller {
	public function __construct(){
		parent::__construct(); 
			$this->load->model('model_lahir');
		
	}
	public function index()
	{
		$this->load->view('form_tambah_lahir');
	} 

	public function data_lahir($page = 0)
	{
		$config = array (
			'base_url' => 'http://localhost:/arisp/lahir/data_lahir',
			'total_rows' => count ($this->model_lahir->select_lahir()),
			'per_page' => 3
		);
		$this->load->library('pagination');
		$per_page = $config['per_page'];
		$this->pagination->initialize($config);			
		$data['lahir'] = $this->model_lahir->get_all_lahir($per_page,$page);
		
		$this->load->view('view_data_lahir', $data);	
	
	}

	public function tambah_lahir()
	{
		$this->form_validation->set_rules('nomor','Nomor','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('tempat','Tempat','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('jam','Jam','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('tanggal','Tanggal Lahir','required|min_length[10]|max_length[16]');$this->form_validation->set_rules('tempat','Jenis Kelamin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('ayah','Nama Ayah','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('ibu','Nama Ibu','required|min_length[3]|max_length[16]');$this->form_validation->set_rules('tempat','Jenis Kelamin','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('diterbitkan','Diterbitkan','required|min_length[10]|max_length[200]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('form_tambah_lahir');
		}
		else {
			$data_lahir = array (
				'nomor' => set_value('nomor'),
				'tempat' => set_value('tempat'),
				'jam' => set_value('jam'),
				'tanggal' => set_value('tanggal'),
				'nama' => set_value('nama'),
				'ayah' => set_value('ayah'),
				'ibu' => set_value('ibu'),
				'diterbitkan' => set_value('diterbitkan')
			);
			$this->model_lahir->tambah_lahir($data_lahir);

			$this->session->set_flashdata('pesan', 'lahir berhasil ditambah');
			redirect('lahir/data_lahir');
		}
	}
	public function delete_lahir($nomor) {
		$this->model_lahir->delete_lahir($nomor);
		$this->session->set_flashdata('pesan','lahir berhasil dihapus');
		redirect('lahir/data_lahir');
	}
	public function edit_lahir($nomor){
		$this->form_validation->set_rules('nomor','Nomor','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('tempat','Tempat Lahir','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('jam','Jam','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('tanggal','Tanggal Lahir','required|min_length[10]|max_length[16]');
		$this->form_validation->set_rules('tempat','Tempat','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('nama','Nama','required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('tempat','Tempat','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('ayah','Nama Ayah','required|min_length[3]|max_length[200]');
		$this->form_validation->set_rules('ibu','Nama Ibu','required|min_length[4]|max_length[16]');
		$this->form_validation->set_rules('diterbitkan','Diterbitkan','required|min_length[10]|max_length[200]');
	
		if($this->form_validation->run() == FALSE)
		{
			$ini['lahir']=$this->model_lahir->get_lahir_by_nomor($nomor);
			$this->load->view('form_edit_lahir', $ini);
		}
		else {
				$data_lahir = array(
					'nomor' => set_value('nomor'),
					'tempat' => set_value('tempat'),
					'jam' => set_value('jam'),
					'tanggal' => set_value('tanggal'),
					'nama' => set_value('nama'),
					'ayah' => set_value('ayah'),
					'ibu' => set_value('ibu'),
					'diterbitkan' => set_value('diterbitkan')
				);
				$this->model_lahir->update_lahir($nomor,$data_lahir);
				$this->session->set_flashdata('pesan','user berhasil dirubah');
				redirect('lahir/data_lahir');
		}
	}
	
}