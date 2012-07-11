<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Band_model extends CI_Model {
	function getBands(){
		$this->db->select('bands.*, shows.date as lastdate, venues.name as venue');
		$this->db->join('shows_bands','shows_bands.band_id = bands.id','left');
		$this->db->join('shows','shows.id = shows_bands.show_id','left');
		$this->db->join('venues','venues.id = shows.venue','left');
		$this->db->order_by('name','asc');
		$q = $this->db->get('bands');
		return $q->result();
	}

	function getBandByID($bID){
		$this->db->where('id',$bID);
		$q = $this->db->get('bands');
		return $q->row();
	}

	function getGenres(){
		$q = $this->db->query('SELECT DISTINCT genre FROM bands');
		return $q->result();
	}

	function update(){
		$data = array(
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'genre' => $this->input->post('genre'),
			'tags' => $this->input->post('tags'),
			'soundslike' => $this->input->post('soundslike'),
			'homies' => $this->input->post('homies'),
			'notes' => $this->input->post('notes')
		);
		$data['localtouring'] = ($this->input->post('localtouring') == 'touring') ? 1 : 0;

		$this->db->where('id', $this->input->post('bID'));
		$this->db->update('bands', $data);
	}

	function insert($data){
		
		$this->db->insert('bands', $data);
	}

	function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('bands');

		$this->db->where('band_id', $id);
		$this->db->delete('shows_bands');
	}
}