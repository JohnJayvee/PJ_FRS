<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Admin_model extends CI_Model {

		public function __construct() {

			parent::__construct();

		}

		public function _get_admin() {

			$this->db->where('role != "Administrator"');
			$r = $this->db->get('admin');

			if ($r) {
					
				return $r;

			}

		}

		public function _get() {

			if ($this->_is_logged_in() === TRUE) {
				
				$r = $this->db->get_where('admin', array('username' => $this->session->userdata('admin')));

				if ($r) {
					
					return $r->row();

				}

			}

		}

		public function _login($un, $pw) {

			$r = $this->db->get('admin');

			foreach ($r->result() as $row) {

				if (md5($row->username) === md5($un)) {

					if (password_verify($pw, $row->hashed_password)) {

						$this->session->set_userdata('admin', $un);
						$this->session->set_userdata('admin_auth', md5($un));

						if ($this->logs->_log($un, $row->role, 'has successfully logged in') === TRUE) {
							
							return TRUE;

						}


					} else { $this->session->set_flashdata('error', 'Incorrect username or password.'); }

				} else { $this->session->set_flashdata('error', 'Incorrect username or password.'); }

			}

		}

		public function _logout() {

			if ($this->_is_logged_in() === TRUE) {

				if ($this->logs->_log($this->_get()->username, $this->_get()->role, 'successfully logged out') === TRUE) {

					$this->session->sess_destroy();
					return TRUE;

				} 

			}

		}

		public function _is_logged_in() {

			if ($this->session->userdata('admin') !== NULL || !empty($this->session->userdata('admin'))) {

				if (md5($this->session->userdata('admin')) == $this->session->userdata('admin_auth')) {
  
					return TRUE;

				}

			}

		}

		public function _add($un, $pw, $cpw) {

			$r = $this->db->get('admin');

			if ($r) {

				foreach ($r->result() as $row) {

					if (md5($row->username) !== md5($un)) {

						if (md5($pw) === md5($cpw)) {

							$r1 = $this->db->insert('admin', array('username' => $un, 'password' => $pw, 'hashed_password' => password_hash($pw, PASSWORD_DEFAULT), 'role' => 'Moderator'));

							if ($r1) {
								
								return TRUE;

							}

						} else { $this->session->set_flashdata('error', 'Password did not match.'); }

					} else { $this->session->set_flashdata('error', 'Username is already taken.'); }

				}

			}

		}

	}