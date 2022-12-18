<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->view('includes/functions');

	}

	public function index() {

			// Checks if an admin is currently logged in
		if ($this->admin->_is_logged_in() !== TRUE) {

			redirect('admin/login');

		}

			// Data variables
		$data['title'] = 'Dashboard - Admin Panel | Facility Reservation System SPUP';
		$data['admin'] = $this->admin->_get();

			// File includes
		$this->load->view('templates/Header', $data);
		$this->load->view('admin/dashboard');
		$this->load->view('templates/Footer');

	}

	public function facilities() {

			// Checks if an admin is currently logged in
		if ($this->admin->_is_logged_in() !== TRUE) {

			redirect('admin/login');

		}

			// Data variables
		$data['title'] = 'Facilities - Admin Panel | Facility Reservation System SPUP';
		$data['admin'] = $this->admin->_get();
		$data['facilities'] = $this->facilities->_get();

			// File includes
		$this->load->view('templates/Header', $data);
		$this->load->view('admin/facilities');
		$this->load->view('templates/Footer');

	}

	public function add_facility() {

			// Checks if an admin is currently logged in
		if ($this->admin->_is_logged_in() !== TRUE) {

			redirect('admin/login');

		}

			// Form
		if (isset($_POST['add'])) {
			
			$name = $this->input->post('name');
			$location = $this->input->post('location');
			$min_cap = $this->input->post('min_cap');
			$max_cap = $this->input->post('max_cap');
			$rate = $this->input->post('rate');

			$target_dir = "images/facilities/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		        // Check if image file is a actual image or fake image

			if(getimagesize($_FILES["image"]["tmp_name"]) !== false) {
				$uploadOk = 1;
			} else {
				$error = 'File is not an image.';
				$uploadOk = 0;
			}

		        // Check if file already exists
			if (file_exists($target_file)) {
				$error = 'Sorry, file already exists.';
				$uploadOk = 0;
			}

		        // Check file size
			if ($_FILES["image"]["size"] > 5000000) {
				$error = 'Sorry, your file is too large.';
				$uploadOk = 0;
			}

		        // Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				$error = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
			$uploadOk = 0;
		}

		        // Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$this->session->set_flashdata('error', $error.' Your file was not uploaded.');
		        // if everything is ok, try to upload file

		} else {

			$ext = pathinfo($target_file, PATHINFO_EXTENSION);
			$new_target_file = $target_dir.$name.'.'.$ext;

			if (move_uploaded_file($_FILES["image"]["tmp_name"], $new_target_file)) {
				
				if ($this->facilities->_add($name, $location, $min_cap, $max_cap, $rate, $new_target_file) === TRUE) {

					redirect('admin/facilities');

				} else {

					$this->session->set_flashdata('error', 'Uploaded file didnt save in the database.');

				}

			} else {
				$this->session->set_flashdata('error', 'Sorry, there was an error uploading your file.');
			}
			
		}
		
	}

				// if ($this->facilities->_add($name, $location, $min_cap, $max_cap, $rate) === TRUE) {

				// 	redirect('admin/facilities');

				// }

			// }

			// Data variables
	$data['title'] = 'Add Facility - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['facilities'] = $this->facilities->_get();

			// File includes
	$this->load->view('templates/Header', $data);
	$this->load->view('admin/add_facility');
	$this->load->view('templates/Footer');

}

public function edit_facility($id) {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	if (isset($_POST['update'])) {
		
		$name = $this->input->post('name');
		$location = $this->input->post('location');
		$min_cap = $this->input->post('min_cap');
		$max_cap = $this->input->post('max_cap');
		$rate = $this->input->post('rate');

		$target_dir = "images/facilities/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		        // Check if image file is a actual image or fake image

		if(getimagesize($_FILES["image"]["tmp_name"]) !== false) {
			$uploadOk = 1;
		} else {
			$error = 'File is not an image.';
			$uploadOk = 0;
		}

		        // Check if file already exists
		if (file_exists($target_file)) {
			$error = 'Sorry, file already exists.';
			$uploadOk = 0;
		}

		        // Check file size
		if ($_FILES["image"]["size"] > 5000000) {
			$error = 'Sorry, your file is too large.';
			$uploadOk = 0;
		}

		        // Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			$error = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
		$uploadOk = 0;
	}

		        // Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$this->session->set_flashdata('error', $error.' Your file was not uploaded.');
		        // if everything is ok, try to upload file

	} else {

		$ext = pathinfo($target_file, PATHINFO_EXTENSION);
		$new_target_file = $target_dir.$name.'.'.$ext;

		if (move_uploaded_file($_FILES["image"]["tmp_name"], $new_target_file)) {
			
			if ($this->facilities->_edit($id, $name, $location, $min_cap, $max_cap, $rate, $new_target_file) === TRUE) {

				redirect('admin/facilities');

			} else {

				$this->session->set_flashdata('error', 'Uploaded file didnt save in the database.');

			}

		} else {
			$this->session->set_flashdata('error', 'Sorry, there was an error uploading your file.');
		}
		
	}

}

			// Data variables
$data['title'] = 'Edit Facility - Admin Panel | Facility Reservation System SPUP';
$data['admin'] = $this->admin->_get();
$data['facility'] = $this->facilities->_get_by_id($id);

			// File includes
$this->load->view('templates/Header', $data);
$this->load->view('admin/edit_facility');
$this->load->view('templates/Footer');

}

public function delete_facility($id) {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	if ($this->facilities->_delete($id) === TRUE) {

		redirect('admin/facilities');

	}

}














public function reservations() {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

			// Data variables
	$data['title'] = 'Reservations - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['reservations'] = $this->reservations->_get();

			// File includes
	$this->load->view('templates/Header', $data);
	$this->load->view('admin/reservations', $data);
	$this->load->view('templates/Footer');

}

public function view_reservation($res_id) {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

			// Data variables
	$data['title'] = 'View Reservation - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['reservation'] = $this->reservations->_get_by_id($res_id);

			// File includes
	$this->load->view('templates/Header', $data);
	$this->load->view('admin/view_reservation', $data);
	$this->load->view('templates/Footer');

}

public function approve_reservation($res_id) {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	if ($this->reservations->_approve($res_id) === TRUE) {
		
		redirect('admin/reservations');

	}

}

public function reject_reservation($res_id) {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	if ($this->reservations->_reject($res_id) === TRUE) {
		
		redirect('admin/reservations');

	}

}














public function schedules() {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

			// Data variables
	$data['title'] = 'Schedules - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['days'] = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

			// File includesd
	$this->load->view('templates/Header', $data);
	$this->load->view('admin/schedules', $data);
	$this->load->view('templates/Footer');

}

public function login() {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() === TRUE) {

		redirect('admin/dashboard');

	}

			// Form
	if (isset($_POST['login'])) {

		$un = $this->input->post('username');
		$pw = $this->input->post('password');

		if ($this->admin->_login($un, $pw) === TRUE) {

			redirect('admin/dashboard');

		}

	}

			// Data variables
	$data['title'] = 'Login - Admin Panel | Facility Reservation System SPUP';
	$data['error'] = $this->session->flashdata('error');

			// File includes
	$this->load->view('templates/Header', $data);
	$this->load->view('admin/login');
	$this->load->view('templates/Footer');

}

public function logout() {

	if ($this->admin->_is_logged_in() === TRUE) {
		
		if ($this->admin->_logout() === TRUE) {
			
			redirect('admin/login');

		}

	}

}














public function logs() {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	$data['title'] = 'Logs - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['logs'] = $this->logs->_get();

	$this->load->view('templates/Header', $data);
	$this->load->view('admin/logs', $data);
	$this->load->view('templates/Footer');

}









public function admin() {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	$data['title'] = 'Admin Accounts - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['admins'] = $this->admin->_get_admin();

	$this->load->view('templates/Header', $data);
	$this->load->view('admin/admin', $data);
	$this->load->view('templates/Footer');

}

public function add_admin() {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	if (isset($_POST['create'])) {

		$un = $this->input->post('username');
		$pw = $this->input->post('password');
		$cpw = $this->input->post('cpassword');

		if ($this->admin->_add($un, $pw, $cpw) === TRUE) {
			
			redirect('admin/admin');

		}

	}

	$data['title'] = 'New Admin Account - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['admins'] = $this->admin->_get_admin();

	$this->load->view('templates/Header', $data);
	$this->load->view('admin/add_admin', $data);
	$this->load->view('templates/Footer');

}

public function users() {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	$data['title'] = 'User Accounts - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['users'] = $this->user->_get_all();

	$this->load->view('templates/Header', $data);
	$this->load->view('admin/users', $data);
	$this->load->view('templates/Footer');

}








public function calendar($year = NULL, $month = NULL) {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	$y = '';
	$m = '';

	if ($year === NULL && $month === NULL) {
		
		$y = date('Y');
		$m = date('m');

	} else {

		$y = $year;
		$m = $month;

	}

	$data['title'] = 'Event Calendar - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['calendar'] = $this->calendar->_generate($y, $m, 'Asia/Manila', 'admin/calendar');

	$this->load->view('templates/Header', $data);
	$this->load->view('admin/calendar', $data);
	$this->load->view('templates/Footer');

}

public function events($year, $month, $day) {

			// Checks if an admin is currently logged in
	if ($this->admin->_is_logged_in() !== TRUE) {

		redirect('admin/login');

	}

	$data['title'] = 'Scheduled Events - Admin Panel | Facility Reservation System SPUP';
	$data['admin'] = $this->admin->_get();
	$data['events'] = $this->reservations->_get_on_date($year, $month, $day);
	$data['date'] = date('F j, Y', strtotime($year.'-'.$month.'-'.$day));


	$this->load->view('templates/Header', $data);
	$this->load->view('admin/events', $data);
	$this->load->view('templates/Footer');

}

}
