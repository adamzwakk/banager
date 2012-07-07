<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bands extends CI_Controller {

	public function __construct(){
	   parent::__construct();

	}

	public function index(){
		$this->data['bands'] = $this->band_model->getBands();
		$this->load->view('main',$this->data);
	}

	public function getShows($bID){
		$this->data['shows'] = $this->show_model->getShowsByBand($bID);
		$this->data['bID'] = $bID;
		$this->load->view('shows',$this->data);
	}

	public function slim(){
		$this->data['bands'] = $this->band_model->getBands();
		$this->load->view('slim/slim.php',$this->data);
	}

}