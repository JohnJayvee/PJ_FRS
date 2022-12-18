<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Reservations_model extends CI_Model {


		public function __construct() {

			parent::__construct();

		}


		public function _get() {

			$this->db->order_by('res_id', 'DESC');
			$r = $this->db->get('reservations');

			if ($r) {

				return $r;

			}

		}


		public function _get_by_id($res_id) {

			$r = $this->db->get_where('reservations', array('res_id' => $res_id));

			if ($r) {

				return $r->row();

			}

		}


		public function _get_user_reservations($user_id) {

			$this->db->order_by('res_no', 'DESC');
			$r = $this->db->get_where('reservations', array('user_id' => $user_id));

			if ($r) {

				return $r;

			}

		}


		public function _get_on_date($year, $month, $day) {

			$this->db->order_by('facility', 'ASC');
			$this->db->order_by('time_start', 'ASC');
			$r = $this->db->get_where('reservations', array('date' => $year.'-'.$month.'-'.$day));

			if ($r) {

				return $r;

			}

		}


		public function _request($user_id, $name, $facility, $org_dept, $purpose, $no_users, $date, $ts, $te) {

			$f = $this->facilities->_get_by_name($facility);

			if ($no_users >= $f->min_cap && $no_users <= $f->max_cap) {
				
				$r = $this->db->insert('reservations', array('user_id' => $user_id, 'res_by' => $name, 'facility' => $facility, 'org_dept' => $org_dept, 'purpose' => $purpose, 'no_users' => $no_users, 'date' => $date, 'time_start' => $ts, 'time_end' => $te, 'status' => 0));

				if ($r) {

					return TRUE;

				}

			}

		}


		public function _cancel($res_id) {

			$this->db->where('res_id', $res_id);
			$r = $this->db->update('reservations', array('status' => 3));

			if ($r) {

				return TRUE;

			}

		}


		public function _approve($res_id) {

			$this->db->where('res_id', $res_id);
			$r = $this->db->update('reservations', array('status' => 2));

			if ($r) {

				if ($this->logs->_log($this->admin->_get()->username, $this->admin->_get()->role, 'has approved a reservation RES. No.: '.$res_id) === TRUE) {

					return TRUE;

				}

			}

		}


		public function _reject($res_id) {

			$this->db->where('res_id', $res_id);
			$r = $this->db->update('reservations', array('status' => 1));

			if ($r) {

				if ($this->logs->_log($this->admin->_get()->username, $this->admin->_get()->role, 'has rejected a reservation RES. No.: '.$res_id) === TRUE) {

					return TRUE;

				}
				
			}

		}


	}