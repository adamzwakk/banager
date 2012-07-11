<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bands extends CI_Controller {

	public function __construct(){
	   parent::__construct();
	}

	public function index(){
		$this->data['bands'] = $this->band_model->getBands();
		$this->data['genres'] = $this->band_model->getGenres();
		$this->data['shows'] = $this->show_model->getAllShows();
		$this->data['mostpopular'] = $this->show_model->getMostPopularBand();
		$this->load->view('slim',$this->data);
	}

	public function getShows($bID){
		$this->data['shows'] = $this->show_model->getShowsByBand($bID);
		$this->data['bID'] = $bID;
		$this->load->view('shows',$this->data);
	}

	public function getBandInfo($bID){
		$this->data['band'] = $this->band_model->getBandByID($bID);
		$this->data['bID'] = $bID;
		$this->load->view('banddeets',$this->data);
	}

	public function addBand(){
		$this->load->view('add_band');
	}

	public function addBand2(){
		$config['upload_path'] = './img/bands/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('bandImg')){
			$udata = $this->upload->data();
			$data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'genre' => $this->input->post('genre'),
				'tags' => $this->input->post('tags'),
				'soundslike' => $this->input->post('soundslike'),
				'homies' => $this->input->post('homies'),
				'notes' => $this->input->post('notes'),
				'image' => $udata['file_name']
			);
			$data['localtouring'] = ($this->input->post('localtouring') == 'touring') ? 1 : 0;
			$this->band_model->insert($data);
			header("Location: ".site_url('bands'));
		} else {
			echo 'Whoops: '.$this->upload->display_errors();
		}
	}

	public function addShow(){
		$this->data['bands'] = $this->band_model->getBands();
		$this->data['venues'] = $this->show_model->getVenues();
		$this->load->view('add_show',$this->data);
	}

	public function addShow2(){
		$this->show_model->insert();
		header("Location: ".site_url('bands'));
	}

	public function updateBand(){
		$this->band_model->update();
		header("Location: ".site_url('bands'));
	}

	public function delete($id){
		$this->band_model->delete($id);
	}
}