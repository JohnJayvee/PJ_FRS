<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Index extends CI_Controller {

		public function __construct() {

			parent::__construct();

		}

		public function index() {

			// Data variables
			$data['title'] = 'Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();

			// Include files
			$this->load->view('index', $data);

		}

		public function my_reservations() {

			// Checks wether user is logged in or not
			if ($this->user->_is_logged_in() !== TRUE) {

				redirect('');

			}
			
			if ($user !== $this->user->_get()->username) {

				show_404();

			}

			// Data variables
			$data['title'] = 'My Reservations | Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();
			$data['reservations'] = $this->reservations->_get_user_reservations($data['user']->user_id);

			// Include files
			$this->load->view('my_reservations', $data);

		}

		public function request($user) {

			// Checks wether user is logged in or not
			if ($this->user->_is_logged_in() !== TRUE) {

				redirect('');

			}


			if ($user !== $this->user->_get()->username) {

				show_404();

			}

			if (isset($_POST['request'])) {

				$facility = $this->input->post('facility');
				$purpose = $this->input->post('purpose');
				$date = $this->input->post('date');
				$time = $this->input->post('time');
				$duration = $this->input->post('duration');
				$no_users = $this->input->post('no_users');


			}

			// Data variables
			$data['title'] = 'Reservation Request | Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();
			$data['facilities'] = $this->facilities->_get();

			// Include files
			$this->load->view('request', $data);

		}

		public function login() {

			// Checks wether user is logged in or not
			if ($this->user->_is_logged_in() === TRUE) {

				redirect('');

			}

			// Login form submitted...
			if (isset($_POST['login'])) {

				$un = $this->input->post('username');
				$pw = $this->input->post('password');

				if ($this->user->_login($un, $pw) === TRUE) {

					redirect('');

				}

			}

			// Data variables
			$data['title'] = 'Login | Facility Reservation System - St. Paul University of the Philippines';
			$data['error'] = $this->session->flashdata('error');

			// Include files
			$this->load->view('login', $data);

		}


		public function logout() {

			// Checks wether user is logged in or not
			if ($this->user->_is_logged_in() === TRUE) {

				if ($this->user->_logout() === TRUE) {

					redirect('');

				}

			}

		}
	

	}
