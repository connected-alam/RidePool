<?php
class main_operations {
   public static function post_ride($from, $to, $date, $time, $price, $seats) {
		//session_start();
		$db = mysqli_connect("localhost", "root", "", "ridepool");
		if (!$db) 
			die("MySQL connection error");
		
		$inuid = 2;
		$infrom = mysqli_real_escape_string($db, $from);
		$into = mysqli_real_escape_string($db, $to);
		$indate = mysqli_real_escape_string($db, $date);
		$intime = mysqli_real_escape_string($db, $time);
		$inprice = mysqli_real_escape_string($db, $price);
		$inseats = mysqli_real_escape_string($db, $seats);
		
		$query = "INSERT INTO ride_posts (poster, pickup, dest, date, time, price, seats) VALUES ('$inuid', '$infrom', '$into', '$indate', '$intime','$inprice','$inseats')";
		
		$result = mysqli_query($db, $query);
		
		mysqli_close($db);
   }
   public static function search_ride($from, $to, $date, $time1, $time2, $mprice) {
	   $db = mysqli_connect("localhost", "root", "", "ridepool");
		if (!$db) 
			die("MySQL connection error");
		
		$sdate = $date;
		$query = "SELECT * FROM ride_posts WHERE pickup='$from' and dest='$to'";
		$result = mysqli_query($db, $query);
		$count = mysqli_num_rows($result);
		$search_results = array();
		echo '<p>' . $count . '</p>';
		if ($count >= 1) {
			while ($row = mysqli_fetch_array($result)) {
				if ($row['time'] >= $time1 and $row['time'] <= $time2 and $mprice >= $row['price']) {
					array_push($search_results, $row);
				}
			}
		}
		
		return $search_results;
   }
}

?>
