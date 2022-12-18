<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Logs_model extends CI_Model {


		public function __construct() {

			parent::__construct();

		}

		public function _get() {

			$this->db->order_by('log_id', 'DESC');
			$r = $this->db->get('logs');

			if ($r) {
				
				return $r;

			}

		}

		public function _log($un, $role, $action) {

			date_default_timezone_set('Asia/Manila');
			$r = $this->db->insert('logs', array('username' => $un, 'role' => $role, 'action' => $action, 'date' => date('Y-m-d H:i:s')));

			if ($r) {

				return TRUE;

			}

		}


	}