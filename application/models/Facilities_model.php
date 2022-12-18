<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Facilities_model extends CI_Model {


		public function __construct() {

			parent::__construct();

		}


		public function _get() {

			$this->db->order_by('name', 'DESC');
			$r = $this->db->get('facilities');

			if ($r) {

				return $r;

			}

		}


		public function _get_by_id($id) {

			$r = $this->db->get_where('facilities', array('facility_id' => $id));

			if ($r) {

				return $r->row();

			}

		}


		public function _get_by_name($name) {

			$r = $this->db->get_where('facilities', array('name' => $name));

			if ($r) {

				return $r->row();

			}

		}


		public function _add($name, $location, $min_cap, $max_cap, $rate, $image) {

			$data = array('name' => $name, 'location' => $location, 'min_cap' => $min_cap, 'max_cap' => $max_cap, 'rate' => $rate, 'image' => $image);

			$r = $this->db->insert('facilities', $data);

			if ($r) {

				if ($this->logs->_log($this->admin->_get()->username, $this->admin->_get()->role, 'has added '.$name.' new facility') === TRUE) {

					return TRUE;

				}

			}

		}


		public function _edit($id, $name, $location, $min_cap, $max_cap, $rate, $image) {

			$data = array('name' => $name, 'location' => $location, 'min_cap' => $min_cap, 'max_cap' => $max_cap, 'rate' => $rate, 'image' => $image);

			$this->db->set($data);
			$this->db->where('facility_id', $id);
			$r = $this->db->update('facilities');

			if ($r) {

				if ($this->logs->_log($this->admin->_get()->username, $this->admin->_get()->role, 'has updated '.$name.' facility details') === TRUE) {

					return TRUE;

				}

			}

		}


		public function _delete($id) {

			$name = $this->_get_by_id($id)->name;
			$r = $this->db->delete('facilities', array('facility_id' => $id));

			if ($r) {
				
				if ($this->logs->_log($this->admin->_get()->username, $this->admin->_get()->role, 'has deleted '.$name.' facility') === TRUE) {

					return TRUE;

				}

			}

		}

	}