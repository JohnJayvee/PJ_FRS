<?php 

	function res_date_format($date, $time, $duration) {

		$d = date('j F, Y', strtotime($date));
		$time_from = date('h:i a', strtotime($time));
		$time_to = date('h:i a', strtotime($time + date('h:i', strtotime($duration))));

		return $d.' - '.$time_from.' to '.$time_to;

	}

	function res_status($status) {

		$r = '';

		switch ($status) {

			case 0 : $r = '<small class="status pending">Pending</small>'; break;
			case 1 : $r = '<small class="status rejected">Rejected</small>'; break;
			case 2 : $r = '<small class="status approved">Approved</small>'; break;
			case 3 : $r = '<small class="status cancelled">Cancelled</small>'; break;
			case 4 : $r = '<small class="status completed">Completed</small>'; break;

		}

		return $r;

	}