<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show_model extends CI_Model {
	function getShowsByBand($bID){
		$this->db->select('GROUP_CONCAT(bands.id) as band_ids, GROUP_CONCAT(bands.name) as bands, venues.name, shows.date');
		$this->db->join('shows_bands','shows_bands.show_id = shows.id','left');
		$this->db->join('venues','venues.id = shows.venue','left');
		$this->db->join('bands','shows_bands.band_id = bands.id','left');
		$this->db->order_by('shows.date','desc');
		$this->db->limit(10);
		$q = $this->db->get('shows');
		return $q->result();
	}
}