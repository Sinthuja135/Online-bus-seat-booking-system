<?php
//host
$host = "localhost";
//user name
$username = "root";
//database password
$pwd = "";
//database name.
$db = "travels";

$con=mysqli_connect($host,$username,$pwd,$db) or die("Unable to Connect");

if(mysqli_connect_error($con))
{
	echo "Failed to connect";
}

// $date = $_POST['getDate'];

// $now = time(); // or your date as well
// $your_date = strtotime($date);
// $datediff = $now - $your_date;

// $dateDifferentInNumber = ($datediff / (60 * 60 * 24));
// echo round($dateDifferentInNumber);

// if(round($dateDifferentInNumber) == 1) {

// 	$query=mysqli_query($con,"SELECT seat_no, availability FROM seat");

// } else if (round($dateDifferentInNumber) == 2) {

// 	$query=mysqli_query($con,"SELECT seat_no, availabilityTwo FROM seat");
// }

$query=mysqli_query($con,"SELECT seat_no, availability FROM seat");


$rows = array();
while($r = mysqli_fetch_assoc($query)) {

	if(isset( $r['availability'])){

		$r['availability'] = boolval($r['availability']);
       	$rows[] = $r;
	}
    
}


$txt = "________/";
$twoSpace = "__";

$test = getValue($rows[0]['availability']);
$test1 = getValue($rows[1]['availability']);
$test2 = getValue($rows[2]['availability']);
$test3 = getValue($rows[3]['availability']);
$test4 = getValue($rows[4]['availability']);
$test5 = getValue($rows[5]['availability']);
$test6 = getValue($rows[6]['availability']);
$test7 = getValue($rows[7]['availability']);
$test8 = getValue($rows[8]['availability']);
$test9 = getValue($rows[9]['availability']);
$test10 = getValue($rows[10]['availability']);
$test11 = getValue($rows[11]['availability']);
$test12 = getValue($rows[12]['availability']);
$test13 = getValue($rows[13]['availability']);
$test14 = getValue($rows[14]['availability']);
$test15 = getValue($rows[15]['availability']);
$test16 = getValue($rows[16]['availability']);
$test17 = getValue($rows[17]['availability']);
$test18 = getValue($rows[18]['availability']);
$test19 = getValue($rows[19]['availability']);
$test20 = getValue($rows[20]['availability']);
$test21 = getValue($rows[21]['availability']);
$test22 = getValue($rows[22]['availability']);
$test23 = getValue($rows[23]['availability']);
$test24 = getValue($rows[24]['availability']);
$test25 = getValue($rows[25]['availability']);
$test26 = getValue($rows[26]['availability']);
$test27 = getValue($rows[27]['availability']);
$test28 = getValue($rows[28]['availability']);
$test29 = getValue($rows[29]['availability']);
$test30 = getValue($rows[30]['availability']);
$test31 = getValue($rows[31]['availability']);
$test32 = getValue($rows[32]['availability']);
$test33 = getValue($rows[33]['availability']);
$test34 = getValue($rows[34]['availability']);
$test35 = getValue($rows[35]['availability']);
$test36 = getValue($rows[36]['availability']);
$test37 = getValue($rows[37]['availability']);
$test38 = getValue($rows[38]['availability']);
$test39 = getValue($rows[39]['availability']);
$test40 = getValue($rows[40]['availability']);
$test41 = getValue($rows[41]['availability']);
$test42 = getValue($rows[42]['availability']);
$test43 = getValue($rows[43]['availability']);
$test44 = getValue($rows[44]['availability']);
$test45 = getValue($rows[45]['availability']);
$test46 = getValue($rows[46]['availability']);
$test47 = getValue($rows[47]['availability']);
$test48 = getValue($rows[48]['availability']);
$test49 = getValue($rows[49]['availability']);
$test50 = getValue($rows[50]['availability']);
$test51 = getValue($rows[51]['availability']);
$test52 = getValue($rows[52]['availability']);
$test53 = getValue($rows[53]['availability']);
$test54 = getValue($rows[54]['availability']);
$test55 = getValue($rows[55]['availability']);
$test56 = getValue($rows[56]['availability']);
$test57 = getValue($rows[57]['availability']);
$test58 = getValue($rows[58]['availability']);
$test59 = getValue($rows[59]['availability']);
$test60 = getValue($rows[60]['availability']);
$test61 = getValue($rows[61]['availability']);


$firstRow = ($test.$test1.$twoSpace.$test2.$test3);
$secondRow = ($test4.$test5.$twoSpace.$test6.$test7);
$thirdRow = ($test8.$test9.$twoSpace.$test10.$test11);
$fourthRow = ($test12.$test13.$twoSpace.$test14.$test15);
$fifthRow = ($test15.$test17.$twoSpace.$test18.$test19);
$sixthRow = ($test20.$test21.$twoSpace.$test22.$test23);
$sevenRow = ($test24.$test25.$twoSpace.$test26.$test27);
$eightRow = ($test28.$test29.$twoSpace.$test30.$test31);
$nineRow = ($test32.$test33.$twoSpace.$test34.$test35);
$tenthRow = ($test36.$test37.$twoSpace.$test38.$test39);
$elevenRow = ($test40.$test41.$twoSpace.$test42.$test43);
$twelveRow = ($test44.$test45.$twoSpace.$test46.$test47);
$thirteenRow = ($test48.$test49.$twoSpace.$test50.$test51);
$fourteenRow = ($test52.$test53.$twoSpace.$test54.$test55);
$fifteenRow = ($test56.$test57.$test58.$test59.$test60.$test61);


$final =array();
$final['first']  = $firstRow ;
$final['second']  = $secondRow ;
$final['third'] = $thirdRow;
$final['fourth'] = $fourthRow;
$final['five'] = $fifthRow;
$final['six'] = $sixthRow;
$final['seven'] = $sevenRow;
$final['eight'] = $eightRow;
$final['nine'] = $nineRow;
$final['ten'] = $tenthRow;
$final['eleven'] = $elevenRow;
$final['twelve'] = $twelveRow;
$final['thirteen'] = $thirteenRow;
$final['fourteen'] = $fourteenRow;
$final['fifteen'] = $fifteenRow;
$final['space'] = $txt;

// print json_encode( $rows[0]['availability']);
print json_encode( $final);


function getValue($value) {
	$getValue = ($value == 1) ? 'U' : 'A';
    return $getValue;
}

mysqli_close($con);
?>


