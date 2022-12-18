<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Calendar_model extends CI_Model {


		public function __construct() {

			parent::__construct();

		}


		public function _generate($year, $month, $timezone, $url) {

			$this->_timezone($timezone);

			$calendar = '<div class="calendar">';
			$calendar .= $this->_header($year, $month, $url);
			$calendar .= '<table class="table table-bordered">';

			foreach ($this->_weeks($year, $month, cal_days_in_month(CAL_GREGORIAN, $month, $year)) as $week) {
				$calendar .= $week;
			}

			$calendar .= '</table>';
			$calendar .= '</div>';

			return $calendar;

		}

        public function _generate2($year, $month, $timezone, $url) {

            $this->_timezone($timezone);

            $calendar = '<div class="calendar">';
            $calendar .= $this->_header($year, $month, $url);
            $calendar .= '<table class="table table-bordered">';

            foreach ($this->_weeks2($year, $month, cal_days_in_month(CAL_GREGORIAN, $month, $year)) as $week) {
                $calendar .= $week;
            }

            $calendar .= '</table>';
            $calendar .= '</div>';

            return $calendar;

        }


		public function _timezone($timezone) {

			return date_default_timezone_set($timezone);

		}


		public function _header($year, $month, $url) {

			$url = base_url().$url.'/';
			$prev = $month == 1 ? $url.($year - 1).'/12' : $url.$year.'/'.($month - 1);
			$next = $month == 12 ? $url.($year + 1).'/1' : $url.$year.'/'.($month + 1);
			$p = $month == 1 ? strtoupper(date('M Y', strtotime(($year - 1).'-12-01'))) : strtoupper(date('M Y', strtotime($year.'-'.($month - 1).'-01')));
			$n = $month == 12 ? strtoupper(date('M Y', strtotime(($year + 1).'-12-01'))) : strtoupper(date('M Y', strtotime($year.'-'.($month + 1).'-01')));

			$header = '<div class="header d-flex justify-content-between align-items-center">';
			$header .= '<a href="'.$prev.'"><span class="fas fa-angle-left"></span> '.$p.'</a>';
			$header .= '<h3 class="mb-0">'.date('F Y', strtotime($year.'-'.$month.'-01')).'</h3>';
			$header .= '<a href="'.$next.'">'.$n.' <span class="fas fa-angle-right"></span></a>';
			$header .= '</div>';

			return $header;

		}


		public function _weeks($year, $month, $days) {

            $timestamp = strtotime($year.'-'.$month.'-1');
            $w = date('w', $timestamp);

            $weeks = array();
            $string = '';

            $string .= str_repeat('<td class="col"></td>', $w);

            for ($day = 1; $day <= $days; $day++, $w++) { 
                
                if (date('Y-m-d') == date('Y-m-d', strtotime($year.'-'.$month.'-'.$day))) {
                    
                    $string .= '<td class="today">';

                    if ($this->_events($year, $month, $day)->num_rows() > 0) {

                    	$string .= '<a href="'.base_url().'admin/events/'.$year.'/'.$month.'/'.$day.'" class="has-events"><span class="day">'.$day.'</span>';
                    	$string .= $this->_events($year, $month, $day)->num_rows() > 1 ? '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Events</p>' : '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Event</p>';
                    	$string .= '<p class="mt-2">Click to view</p></a>';


                    } else {

                    	$string .= '<a href=""><span class="day">'.$day.'</span></a>';

                    }


                } else {

                    $string .= '<td>';

                    if ($this->_events($year, $month, $day)->num_rows() > 0) {

                    	$string .= '<a href="'.base_url().'admin/events/'.$year.'/'.$month.'/'.$day.'" class="has-events"><span class="day">'.$day.'</span>';
                    	$string .= $this->_events($year, $month, $day)->num_rows() > 1 ? '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Events</p><a/>' : '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Event</p>';
                    	$string .= '<p class="mt-2">Click to view</p></a>';

                    } else {

                    	$string .= '<a href=""><span class="day">'.$day.'</span></a>';

                    }

                }

                $string .= '</td>';

                if ($day < $days) {

                    if (date('w', strtotime($year.'-'.$month.'-'.$day)) % 7 == 6) {

                        $weeks[] = '<tr>'.$string.'</tr>';

                        $string = '';

                    }

                } else {

                    $string .= str_repeat('<td class="col"></td>', 6 - (date('w', strtotime($year.'-'.$month.'-'.$day)) % 7));

                    $weeks[] = '<tr>'.$string.'</tr>';

                }

            }

            return $weeks;

        }


        public function _weeks2($year, $month, $days) {

            $timestamp = strtotime($year.'-'.$month.'-1');
            $w = date('w', $timestamp);

            $weeks = array();
            $string = '';

            $string .= str_repeat('<td class="col"></td>', $w);

            for ($day = 1; $day <= $days; $day++, $w++) { 
                
                if (date('Y-m-d') == date('Y-m-d', strtotime($year.'-'.$month.'-'.$day))) {
                    
                    $string .= '<td class="today">';

                    if ($this->_events($year, $month, $day)->num_rows() > 0) {

                        $string .= '<a href="'.base_url().'schedules/events/'.$year.'/'.$month.'/'.$day.'" class="has-events"><span class="day">'.$day.'</span>';
                        $string .= $this->_events($year, $month, $day)->num_rows() > 1 ? '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Events</p><a/>' : '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Event</p>';
                        $string .= '<p class="mt-2">Click to view</p></a>';


                    } else {

                        $string .= '<a href=""><span class="day">'.$day.'</span></a>';

                    }


                } else {

                    $string .= '<td>';

                    if ($this->_events($year, $month, $day)->num_rows() > 0) {

                        $string .= '<a href="'.base_url().'schedules/events/'.$year.'/'.$month.'/'.$day.'" class="has-events"><span class="day">'.$day.'</span>';
                        $string .= $this->_events($year, $month, $day)->num_rows() > 1 ? '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Events</p><a/>' : '<p class="events">'.$this->_events($year, $month, $day)->num_rows().' Event</p>';
                        $string .= '<p class="mt-2">Click to view</p></a>';

                    } else {

                        $string .= '<a href=""><span class="day">'.$day.'</span></a>';

                    }

                }

                $string .= '</td>';

                if ($day < $days) {

                    if (date('w', strtotime($year.'-'.$month.'-'.$day)) % 7 == 6) {

                        $weeks[] = '<tr>'.$string.'</tr>';

                        $string = '';

                    }

                } else {

                    $string .= str_repeat('<td class="col"></td>', 6 - (date('w', strtotime($year.'-'.$month.'-'.$day)) % 7));

                    $weeks[] = '<tr>'.$string.'</tr>';

                }

            }

            return $weeks;

        }


        public function _events($year, $month, $day) {

        	$r = $this->db->get_where('reservations', array('date' => $year.'-'.$month.'-'.$day));

        	if ($r) {

        		return $r;

        	}

        }


	}