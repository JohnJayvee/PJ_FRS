<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model {


		public function __construct() {

			parent::__construct();

		}


		public function _get_all() {

			$r = $this->db->get('users');

			if ($r) {

				return $r;

			}

		}


		public function _get($field = NULL) {

			if ($this->_is_logged_in() === TRUE) {

				if ($field !== NULL) {

					$this->db->select($field);
					$r = $this->db->get_where('users', array('username' => $this->session->userdata('user')));

					if ($r) {

						return $r->row();

					}

				} else {

					$r = $this->db->get_where('users', array('username' => $this->session->userdata('user')));

					if ($r) {

						return $r->row();

					}

				}

			}

		}


		public function _name() {

			$user = $this->_get();
			$en = $user->ext_name !== NULL ? ' '.$user->ext_name.'.' : '';
			$name = $user->last_name.$en.', '.$user->first_name.' '.$user->middle_initial.'.';

			return $name;

		}


		// LOGIN METHOD
		public function _login($un, $pw) {

			$r = $this->db->get('users');

			foreach ($r->result() as $row) {

				if (md5($row->username) === md5($un)) {

					if (password_verify($pw, $row->hashed_password)) {

						$this->session->set_userdata('user', $un);
						$this->session->set_userdata('user_auth', md5($un));
						return TRUE;

					} else { $this->session->set_flashdata('error', 'Incorrect username or password.'); }

				} else { $this->session->set_flashdata('error', 'Incorrect username or password.'); }

			}

		}


		// SIGN UP METHOD
		public function _sign_up($un, $pw, $cpw) {

			$r = $this->db->get('users');

			if ($r) {

				foreach ($r->result() as $row) {

					if (md5($row->username) !== md5($un)) {

						if (md5($pw) === md5($cpw)) {

							$r1 = $this->db->insert('users', array('username' => $un, 'password' => $pw, 'hashed_password' => password_hash($pw, PASSWORD_DEFAULT), 'image' => 'assets/img/default-avatar.png'));

							if ($r1) {
								
								$this->session->set_userdata('user', $un);
								$this->session->set_userdata('user_auth', md5($un));
								return TRUE;

							}

						} else { $this->session->set_flashdata('error', 'Password did not match.'); }

					} else { $this->session->set_flashdata('error', 'Username is already taken.'); }

				}

			}

		}


		// LOGOUT METHOD
		public function _logout() {

			if ($this->_is_logged_in() === TRUE) {

				$this->session->sess_destroy();
				return TRUE;

			}

		}


		public function _is_logged_in() {

			if ($this->session->userdata('user') !== NULL || !empty($this->session->userdata('user'))) {

				if (md5($this->session->userdata('user')) == $this->session->userdata('user_auth')) {
  
					return TRUE;

				}

			}

		}


		public function _update_profile($id, $ln, $fn, $mi, $org_dept) {


			$this->db->set(array('last_name' => $ln, 'first_name' => $fn, 'middle_initial' => $mi, 'org_dept' => $org_dept));
			$this->db->where('user_id', $id);
			$r = $this->db->update('users');

			if ($r) {

				return TRUE;

			}

		}


	}