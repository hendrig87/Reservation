<?php 
      
class SimpleCalendar {



	
	public $wday_names = false;
	private $now;
	private $daily_html = array();
	private $offset = 0;
        var $show_next_prev	= FALSE;
        var $next_prev_url	= '';
	
	function __construct( $date_string = NULL ) {
		$this->setDate($date_string);
	}

	
	public function setDate( $date_string = null ) {
		if( $date_string ) {
			 $this->now = getdate(strtotime($date_string));
		} else {
			$this->now = getdate();
		}
                
	}

	
	public function addDailyHtml( $html, $start_date_string, $end_date_string = null ) {
		static $htmlCount = 0;
		$start_date = strtotime($start_date_string);
		if( $end_date_string ) {
			$end_date = strtotime($end_date_string);
		} else {
			$end_date = $start_date;
		}

		$working_date = $start_date;
               
		do {
			$tDate = getdate($working_date);
			$working_date += 86400;
			$this->daily_html[$tDate['year']][$tDate['mon']][$tDate['mday']][$htmlCount] = $html;
		} while( $working_date < $end_date + 1 );

		$htmlCount++;

	}

	
	public function clearDailyHtml() { $this->daily_html = array(); }

	
	public function setStartOfWeek( $offset ) {
		if( is_int($offset) ) {
			$this->offset = $offset % 7;
		} else {
			$this->offset = date('N', strtotime($offset)) % 7;
		}
	}

	
	public function show( $echo = true ) {
		if( $this->wday_names ) {
			$wdays = $this->wday_names;
		} else {
			$today = (86400 * (date('N')));
			$wdays = array();
			for( $i = 0; $i < 7; $i++ ) {
				$wdays[] = strftime('%A', time() - $today + ($i * 86400));
			}
		}

		$this->array_rotate($wdays, $this->offset);
		$wday    = date('N', mktime(0, 0, 1, $this->now['mon'], 1, $this->now['year'])) - $this->offset;
		$no_days = cal_days_in_month(CAL_GREGORIAN, $this->now['mon'], $this->now['year']);
         
          $date= $this->now['year'].'-'.$this->now['mon'];      
                
          //      $date = "1998-08";
$predate = strtotime ( '-1 month' , strtotime ( $date ) ) ;
$prevdate = date ( 'Y/m' , $predate );

$nextdate = strtotime ( '+1 month' , strtotime ( $date ) ) ;
$nexvdate = date ( 'Y/m' , $nextdate );
 
                
                $prevMth = $this->now['mon'] - 01;
                $nextMth = $this->now['mon'] + 01;
                $prevurl= base_url().'index.php/dashboard/calender/'.$prevdate;
                $nexturl= base_url().'index.php/dashboard/calender/'.$nexvdate;
                
		$out = '<table cellpadding="0" cellspacing="0" class="SimpleCalendar"><thead><tr>';
                $out .='<th><a href="'.$prevurl.'">Prev. Month</a></th>';
                $out .= '<th colspan="5" id="mthName">'.date("F", mktime(0, 0, 0, $this->now['mon'], 10)).'-'.$this->now['year'].'</th>';
                $out .='<th><a href="'.$nexturl.'">Next Month</a></th></tr><tr>';
		for( $i = 0; $i < 7; $i++ ) {
			$out .= '<td class="days">' . $wdays[$i] . '</td>';
		}

		$out .= "</tr></thead>\n<tbody>\n<tr>";

		$wday = ($wday + 7) % 7;

		if( $wday == 7 ) {
			$wday = 0;
		} else {
			$out .= str_repeat('<td class="SCprefix">&nbsp;</td>', $wday);
		}

		$count = $wday + 1;
		for( $i = 1; $i <= $no_days; $i++ ) {
			$out .= '<td' . ($i == $this->now['mday'] && $this->now['mon'] == date('n') && $this->now['year'] == date('Y') ? ' id="today"' : '') . ' class="asdf">';

			$datetime = mktime(0, 0, 1, $this->now['mon'], $i, $this->now['year']);

			$out .= '<time id="dateTime" datetime="' . date('Y-m-d', $datetime) . '">' . $i . '</time>';

			$dHtml_arr = false;
			if( isset($this->daily_html[$this->now['year']][$this->now['mon']][$i]) ) {
				$dHtml_arr = $this->daily_html[$this->now['year']][$this->now['mon']][$i];
			}

			if( is_array($dHtml_arr) ) {
				foreach( $dHtml_arr as $dHtml ) {
					$out .= '<div class="event" name="'.$dHtml.'">' . $dHtml . '</div>';
				}
			}

			$out .= "</td>";

			if( $count > 6 ) {
				$out .= "</tr>\n" . ($i != $count ? '<tr>' : '');
				$count = 0;
			}
			$count++;
		}
		$out .= ($count != 1 ? str_repeat('<td class="SCsuffix">&nbsp;</td>', 8 - $count) : '') . "</tr>\n</tbody></table>\n";
		if( $echo ) {
			echo $out;
		}

		return $out;
	}

	private function array_rotate( &$data, $steps ) {
		$count = count($data);
		if( $steps < 0 ) {
			$steps = $count + $steps;
		}
		$steps = $steps % $count;
		for( $i = 0; $i < $steps; $i++ ) {
			array_push($data, array_shift($data));
		}
	}

}
