<?php 
require_once "dbconnection.php";
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	echo $id;
	$sql="insert into selected(FLIGHT_CODE) values('$id')";
	$sql1="select PRICE_BUSINESS from flight where FLIGHT_CODE='$id'";
	if(mysqli_query($con,$sql)){
		if(mysqli_query($con,$sql1)){
			$query=mysqli_query($con,$sql1);
			$rows=mysqli_fetch_array($query);
			$price=$rows['PRICE_BUSINESS'];
			$sql2="insert into price(PRICE,TYPE) values('$price','BUSINESS CLASS')";
			if(mysqli_query($con,$sql2)){
				echo "<script>window.location='../html/passengerinfo.html'</script>";
			}else{
				echo "<script>alert('Error')";
			}
		}else{
			echo "<script>alert('Error')";
		}
    }else{
		echo "<script>alert('Error')</script>";
		echo"<script>window.location='../home.html'</script>";
	}
}else{
        echo "<script>alert('Click Select text !')</script>";
	    echo "<script>window.location='../home.html'</script>";
    }

?>