<?php
 
function Decoder_data($deta_1 , $deta_2)
{
	$deta_filter_1 = explode("-", $deta_1);
	$deta_filter_2 = explode("-", $deta_2);

	$Year_1 = $deta_filter_1[0];
	$Mon_1  = $deta_filter_1[1];
	$Day_1  = $deta_filter_1[2];
	$Year_2 = $deta_filter_2[0];
	$Mon_2  = $deta_filter_2[1];
	$Day_2  = $deta_filter_2[2];   
	
	function TFarsiTools($W_Year,$W_Month,$W_Day)
	{
	    $M_Day = array(
	        1 => 31,
	        2 => 28,
	        3 => 31,
	        4 => 30,
	        5 => 31,
	        6 => 30,
	        7 => 31,
	        8 => 31,
	        9 => 30,
	        10=> 31,
	        11=> 30,
	        12=> 31
	    );
	    $S_Day = array(
	        1 => 31,
	        2 => 31,
	        3 => 31,
	        4 => 31,
	        5 => 31,
	        6 => 31,
	        7 => 30,
	        8 => 30,
	        9 => 30,
	        10 => 30,
	        11 => 30,
	        12 => 29
	    );
	    $Mon = array(
	        1 => 0,
	        2 => 0,
	        3 => 0,
	        4 => 0,
	        5 => 0,
	        6 => 0,
	        7 => 0,
	        8 => 0,
	        9 => 0,
	        10 => 0,
	        11 => 0,
	        12 => 0
	    );
	    $_sum = 0;
	    $_mon = 1;
	    $Irm  = 0;

	    $leap1 = intdiv(($W_Year - 1) , 400);
	    $leap2 = $W_Year - 1 - 400 * $leap1;
	    $leap3 = intdiv($leap2, 100);
	    $leap4 = fmod($leap2, 100);
	    $leap5 = intdiv($leap4, 4);

	    if((fmod($W_Year, 4) == 0)and(fmod($W_Year,100 )!== 0)or(fmod($W_Year , 400 ) == 0)){
	        $M_Day[2] = 29;
	    }
	    $Day1 = $W_Day;
	    for ($i=1; $i <=$W_Month-1 ; $i++){
	        $Day1 = $Day1 + $M_Day[$i];
	    }
	    $Temp = $W_Year - 1;
	    $Temp = $Temp * 365;
	    $Temp = $Temp + $Day1;
	    $Temp = $Temp + $leap5;
	    $Temp = $Temp + 97 * $leap1;
	    $Temp = $Temp + 24 * $leap3;
	    $Daynum = $Temp - 221056;
	    $Iry1 = intdiv($Daynum ,12053);
	    $Iry2 = $Daynum - 12053 * $Iry1;
	    $Iry = 33 * $Iry1 - 16;

	    if($Iry2 > 365 ){
	        $Iry  = $Iry+1;
	        $Iry2 = $Iry2-365;
	    }
	    $Iry3 =intdiv( $Iry2 , 1461);
	    $Iry4 =fmod  ( $Iry2 , 1461);
	    $Iry5 =intdiv($Iry4  , 365);
	    $Iry6 =fmod ($Iry4 , 365);
	    $Iry  = $Iry + 1 + 4 * $Iry3 + $Iry5;
	    $Esfand = (( 8 * $Iry + 22 ) / 33 ) - 0.001;
	    $Esfand = $Esfand - $Esfand;
	    $S_Day[12] = 29;

	    if( $Esfand > 0.77 ){
	        $S_Day[12] = 30;

	    }
	    for ($i = 1; $i<=12; $i++ ){
	        if($Iry6 > $S_Day[$i]){
	            $Iry6 = $Iry6-$S_Day[$i];
	        }else {
	            $Irm = $i;
	            $Day1 = $Iry6;
	            break;
	        }
	    }
	    $Day1 = $Day1+5;
	    if($Day1 > $S_Day[$Irm]){
	        $Day1 = $Day1 - $S_Day[$Irm];
	        $Irm = $Irm+1;
	        if($Irm>12){
	            $Irm = 1;
	            $Iry = $Iry +1;
	        }
	    }
	    $Eirdae = 3 * $Irm - 3;
	    if($Irm>7){
	        $Eirdae = $Eirdae - $Irm + 7;
	    }
	    $Cirdae = intdiv(( 8 * $Iry + 22 ) , 33);
	    $Cirdae = $Cirdae + $Iry + $Eirdae + $Day1 + 3;
	    $Cirdae = fmod($Cirdae , 7);
	    $Cirdae = $Cirdae + 1;
	    if($Cirdae == 8){
	        $Cirdae = 1;
	    }
	    $FYear = $Iry;
	    $FMon  = $Irm;
	    $FDay  = $Day1;
	    $FWeek = $Cirdae;
	    while (true){
	        if($FMon == $_mon){break;}
	        $_sum = $S_Day[$_mon]+$_sum;
	        $_mon = $_mon + 1;
	    }

	    $_sum = $_sum + $FDay;
	    $_sum = fmod($_sum,7);
	    if($_sum == 0 ){
	        $_sum = 7;
	    }
	    $_sum = $_sum-1;
	    if($_sum > $FWeek){
	        $_sum = $_sum - $FWeek;
	    }else{
	        $_sum = $FWeek-$_sum;
	    }
	    $_sum = 7 - $_sum;
	    $Mon[1] = $_sum;
	    $Mon[2] = $_sum + 3;
	    $Mon[3] = $_sum + 6;
	    $Mon[4] = $_sum + 2;
	    $Mon[5] = $_sum + 5;
	    $Mon[6] = $_sum + 1;
	    $Mon[7] = $_sum + 4;
	    $Mon[8] = $_sum + 6;
	    $Mon[9] = $_sum + 1;
	    $Mon[10]= $_sum + 3;
	    $Mon[11]= $_sum + 5;
	    $Mon[12]= $_sum;
	    for($i=0; $i>=12; $i++){
	        if($Mon[$i] > 7){
	            $Mon[$i] = $Mon[$i]-7;
	        }
	    }
	    $Year= $FYear;
	    $Mon = $FMon;
	    $Day = $FDay;

	    return $Year."-".$Mon."-".$Day;
    }	
    TFarsiTools($Year_1,$Mon_1,$Day_1);
    TFarsiTools($Year_2,$Mon_2,$Day_2);

    function EncodeSolar($data)
    {
        $M_Day = array(
            1 => 31,
            2 => 28,
            3 => 31,
            4 => 30,
            5 => 31,
            6 => 30,
            7 => 31,
            8 => 31,
            9 => 30,
            10=> 31,
            11=> 30,
            12=> 31
        );
        $S_Day = array(
            1 => 31,
            2 => 31,
            3 => 31,
            4 => 31,
            5 => 31,
            6 => 31,
            7 => 30,
            8 => 30,
            9 => 30,
            10 => 30,
            11 => 30,
            12 => 29
        );
        $Mon = array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
            6 => 0,
            7 => 0,
            8 => 0,
            9 => 0,
            10 => 0,
            11 => 0,
            12 => 0
        );
        $data_1=explode("-",$data);
        $year = intval($data_1[0]);
        $Mon  = intval($data_1[1]);
        $Day  = intval($data_1[2]);

        $W_Year = $year+621;
        $W_Month = 4;
        $W_Day = 1;
        $result = false;

        $leap1 = intdiv(($W_Year - 1) , 400);
        $leap2 = $W_Year - 1 - 400 * $leap1;
        $leap3 = intdiv($leap2, 100);
        $leap4 = fmod($leap2, 100);
        $leap5 = intdiv($leap4, 4);

        if((fmod($W_Year, 4) == 0)and(fmod($W_Year,100 )!== 0)or(fmod($W_Year , 400 ) == 0)){
            $M_Day[2] = 29;
        }
        $Day1 = $W_Day;
        for ($i=1; $i <=$W_Month-1 ; $i++){
            $Day1 = $Day1 + $M_Day[$i];
        }
        $Temp = $W_Year - 1;
        $Temp = $Temp * 365;
        $Temp = $Temp + $Day1;
        $Temp = $Temp + $leap5;
        $Temp = $Temp + 97 * $leap1;
        $Temp = $Temp + 24 * $leap3;
        $Daynum = $Temp - 221056;
        $Iry1 = intdiv($Daynum ,12053);
        $Iry2 = $Daynum - 12053 * $Iry1;
        $Iry = 33 * $Iry1 - 16;

        if($Iry2 > 365 ){
            $Iry  = $Iry+1;
            $Iry2 = $Iry2-365;
        }
        $Iry3 =intdiv( $Iry2 , 1461);
        $Iry4 =fmod  ( $Iry2 , 1461);
        $Iry5 =intdiv($Iry4  , 365);
        $Iry6 =fmod ($Iry4 , 365);
        $Iry  = $Iry + 1 + 4 * $Iry3 + $Iry5;
        $Esfand = (( 8 * $Iry + 22 ) / 33 ) - 0.001;
        $Esfand = $Esfand - $Esfand;
        $S_Day[12] = 29;
        if ($Esfand > 0.77){
            $result =  true;
        }
        
	    $Code = 0;
	    if ($result== true){
	            $Code++;
	        }
	    for ($i=1; $i < $year; $i++) {
	        $Code=$Code+360;
	        
	    }

	    $Code=$Code+$Day;

	    if ($Mon<7)
	    {


	        for ($i=1; $i<$Mon;  $i++)
	        {   $Code = $Code+31;
	        }
	    }else
	    {
	        $Code=$Code+186;
	        if($Mon<12)
	        {
	            for($i = 7; $i<$Mon; $i++ ){
	                $Code = $Code+30;
	            }
	        }else
	        {
	            $Code = $Code+150;
	        }
	    }
	    return $Code;
    }
	$DeCode_1 =EncodeSolar(TFarsiTools($Year_1,$Mon_1,$Day_1));
	$DeCode_2 =EncodeSolar(TFarsiTools($Year_2,$Mon_2,$Day_2));
	
	return $DeCode_1-$DeCode_2;
}


