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

 	$selectedDate = $_POST['date'];
 	$from = $_POST['from'];
 	$to = $_POST['to'];
	//echo ($selectedDate);

	if($from == 'Jaffna'){
			$query="SELECT * FROM seatReserve WHERE bookedDate LIKE '$selectedDate%' AND id LIKE '0%' ";
	} else if($from == 'Badulla'){
			$query="SELECT * FROM seatReserve WHERE bookedDate LIKE '$selectedDate%' AND id LIKE '1%' ";
	}

		



$result = $con->query($query);
$a=array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
        $aa = $row["booked"];
        array_push($a, $aa);
    }
} 



$txt = "________/";
$twoSpace = "__";

$test = getValue(1, $a);
$test1 = getValue(2, $a);
$test2 = getValue(3,$a);
$test3 = getValue(4,$a);
$test4 = getValue(5,$a);
$test5 = getValue(6,$a);
$test6 = getValue(7,$a);
$test7 = getValue(8,$a);
$test8 = getValue(9,$a);
$test9 = getValue(10,$a);
$test10 = getValue(11,$a);
$test11 = getValue(12,$a);
$test12 = getValue(13,$a);
$test13 = getValue(14,$a);
$test14 = getValue(15,$a);
$test15 = getValue(16,$a);
$test16 = getValue(17,$a);
$test17 = getValue(18,$a);
$test18 = getValue(19 ,$a);
$test19 = getValue(20,$a);
$test20 = getValue(21 ,$a);
$test21 = getValue(22,$a);
$test22 = getValue(23,$a);
$test23 = getValue(24 ,$a);
$test24 = getValue(25 ,$a);
$test25 = getValue(26 ,$a);
$test26 = getValue(27 ,$a);
$test27 = getValue(28 ,$a);
$test28 = getValue(29 ,$a);
$test29 = getValue(30 ,$a);
$test30 = getValue(31,$a);
$test31 = getValue(32 ,$a);
$test32 = getValue(33 ,$a);
$test33 = getValue(34 ,$a);
$test34 = getValue(35,$a);
$test35 = getValue(36 ,$a);
$test36 = getValue(37,$a);
$test37 = getValue(38 ,$a);
$test38 = getValue(39 ,$a);
$test39 = getValue(40 ,$a);
$test40 = getValue(41 ,$a);
$test41 = getValue(42 ,$a);
$test42 = getValue(43,$a);
$test43 = getValue(44 ,$a);
$test44 = getValue(45 ,$a);
$test45 = getValue(46 ,$a);
$test46 = getValue(47 ,$a);
$test47 = getValue(48 ,$a);
$test48 = getValue(49 ,$a);
$test49 = getValue(50 ,$a);
$test50 = getValue(51 ,$a);
$test51 = getValue(52,$a);
$test52 = getValue(53 ,$a);
$test53 = getValue(54,$a);
$test54 = getValue(55 ,$a);
$test55 = getValue(56,$a);
$test56 = getValue(57 ,$a);
$test57 = getValue(58 ,$a);
$test58 = getValue(59 ,$a);
$test59 = getValue(60 ,$a);
$test60 = getValue(61 ,$a);
$test61 = getValue(62 ,$a);


$firstRow = ($test.$test1.$twoSpace.$test2.$test3);
$secondRow = ($test4.$test5.$twoSpace.$test6.$test7);
$thirdRow = ($test8.$test9.$twoSpace.$test10.$test11);
$fourthRow = ($test12.$test13.$twoSpace.$test14.$test15);
$fifthRow = ($test16.$test17.$twoSpace.$test18.$test19);
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



function getValue($getDb, $a){
	

	if (in_array($getDb, $a))
  {
  		return 'U';
  }
	else
  {
  		return 'A';
  }
}


// print json_encode( ´40]['availability']);
print json_encode( $final);


// function getValue($value) {
// 	$getValue = ($value == 1) ? 'U' : 'A';
//     return $getValue;
// }

mysqli_close($con);
?>


