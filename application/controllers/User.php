<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class User extends CI_Controller {

		public function __construct() {

			parent::__construct();
			$this->load->view('includes/functions');

		}

		public function my_reservations() {

			if ($this->user->_is_logged_in() !== TRUE) {
				
				redirect('');

			}

			// Data variables
			$data['title'] = 'My Reservations | Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();
			$data['reservations'] = $this->reservations->_get_user_reservations($data['user']->user_id);

			// Include files
			$this->load->view('my_reservations', $data);

		}

		public function request() {

			// Checks wether user is logged in or not
			if ($this->user->_is_logged_in() !== TRUE) {

				redirect('');

			}

			if (isset($_POST['request'])) {

				$name = $this->input->post('name');
				$org_dept = $this->input->post('org_dept');
				$facility = $this->input->post('facility');
				$purpose = $this->input->post('purpose');
				$no_users = $this->input->post('no_users');
				$date = $this->input->post('date');
				$ts = $this->input->post('time_start');
				$te = $this->input->post('time_end');

				if ($this->reservations->_request($this->user->_get()->user_id, $name, $facility, $org_dept, $purpose, $no_users, $date, $ts, $te) === TRUE) {

					redirect('my-reservations');

				}

			}

			// Data variables
			$data['title'] = 'Reservation Request | Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();
			$data['facilities'] = $this->facilities->_get();

			// Include files
			$this->load->view('request', $data);

		}

		public function cancel_request($res_id) {

			if ($this->reservations->_cancel($res_id) === TRUE) {
				
				redirect('my-reservations');

			}

		}

		public function sign_up() {

			if (isset($_POST['sign_up'])) {
				
				$un = $this->input->post('username');
				$pw = $this->input->post('password');
				$cpw = $this->input->post('cpassword');

				if ($this->user->_sign_up($un, $pw, $cpw) === TRUE) {
					
					redirect('');

				}

			}

			// Data variables
			$data['title'] = 'Sign Up | Facility Reservation System - St. Paul University of the Philippines';
			$data['error'] = $this->session->flashdata('error');

			// Include files
			$this->load->view('sign_up', $data);

		}

		public function profile() {

			if ($this->user->_is_logged_in() !== TRUE) {
				
				redirect('');

			}

			if (isset($_POST['update'])) {

				$ln = $this->input->post('ln');
				$fn = $this->input->post('fn');
				$mi = $this->input->post('mi');
				$org_dept = $this->input->post('org_dept');

				if ($this->user->_update_profile($this->user->_get()->user_id, $ln, $fn, $mi, $org_dept) === TRUE) {
					
					redirect('my-reservations');

				}

			}

			// Data variables
			$data['title'] = 'Profile | Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();

			// Include files
			$this->load->view('profile', $data);

		}

	}