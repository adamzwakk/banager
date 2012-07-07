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
}