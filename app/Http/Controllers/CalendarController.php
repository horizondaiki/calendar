<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function calendar()
    {
    $calendarWeek = array([],[],[],[],[]);
    $Week = array('日','月','火','水','木','金','土');
    $WeekCount = count($Week);
    $start_date = date("9-01");
    $end_date = date("9-30");
    $start_week = date("w",strtotime($start_date));
    $end_week = 6 - date("w",strtotime($end_date)) -1;
    $datenumber = count($calendarWeek) * count($Week);
    $j = 0;
    for($i=1; $i <= 30; $i++) {
        if($i<10) {
            $date = '0'.$i;
        } else{
            $date = $i;
        }
        $day = date('w', strtotime('202209'. $date));
        if($i == 1) {
            for($s = 1; $s <= $start_week; $s++) {
                $calendarWeek[$j][] = null;
            }
        }

        $calendarWeek[$j][] = $i;
        if($day == 6){
            $j++;
        }

        if($i == 30){
            for($s = 1; $s <= $end_week; $s++) {
                $calendarWeek[$j][] = null;
            }
        }
        
        // if($i == $datenumber) {
        //     for($e = 1; $e <= 6 - $start_week; $e++) {
        //         $calendarWeek[$end_week][$e] = null;
        //     }
        // }
    }

    return view('calendar', compact('calendarWeek'));
    }

    // $calendarWeek = array(
    //     [null, null, null, null, 1, 2, 3],
    //     [4 , 5, 6 …],
    //     […],
    //     […],
    //     […],
    // );

    // echo '</tr>';
    // foreach($week as $key => $day){
    //     if($key == 0){
    //         echo '<th class="sun">'.$day.'</th>';
    //     }else if($key == 6){ 
	// 	    echo '<th class="sat">'.$day.'</th>';
	//     }else{ 
	// 	    echo '<th>'.$day.'</th>';
	//     }	
    // }
    // echo '</tr>';
 
  
    // echo '<tr>';

    // for($i=0; $i<$start_week; $i++){
	//     echo '<td></td>';
    // }
 
    // for($i=1; $i<=date("t"); $i++){
	//     $set_date = date("Y-m",strtotime($start_date)).'-'.sprintf("%02d",$i);
	//     $week_date = date("w", strtotime($set_date));
    //     if($week_date == 0){
	// 	    echo '<td class="sun">'.$i.'</td>';
	//     }else if($week_date == 6){
	// 	    //土曜日
	// 	    echo '<td class="sat">'.$i.'</td>';
	//     }else{
	// 	    //平日
	// 	    echo '<td>'.$i.'</td>';
	//     }	
	//     if($week_date == 6){
	// 	    echo '</tr>';
	// 	    echo '<tr>';
	//     }
    // }
 
    // for($i=0; $i<$end_week; $i++){
	//     echo '<td></td>';
    // }
 
    // echo '</tr>';
    // echo '</table>';
}