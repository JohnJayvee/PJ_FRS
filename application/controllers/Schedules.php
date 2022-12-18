<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Schedules extends CI_Controller {

		public function __construct() {

			parent::__construct();

		}

		public function calendar($year = NULL, $month = NULL) {

			$y = '';
			$m = '';

			if ($year === NULL && $month === NULL) {
				
				$y = date('Y');
				$m = date('m');

			} else {

				$y = $year;
				$m = $month;

			}

			$data['title'] = 'Event Calendar | Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();
			$data['calendar'] = $this->calendar->_generate2($y, $m, 'Asia/Manila', 'schedules/calendar', FALSE);

			$this->load->view('calendar', $data);

		}

		public function events($year, $month, $day) {

			$data['title'] = 'Events | Facility Reservation System - St. Paul University of the Philippines';
			$data['user_logged_in'] = $this->user->_is_logged_in();
			$data['user'] = $this->user->_get();
			$data['events'] = $this->reservations->_get_on_date($year, $month, $day);
			$data['date'] = date('F j, Y', strtotime($year.'-'.$month.'-'.$day));

			$this->load->view('events', $data);

		}

	}