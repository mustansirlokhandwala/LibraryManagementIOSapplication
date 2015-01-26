<?php
 header('Content-type: text/plain; charset=utf-8');
// Create connection
if($_GET['id'] == signup){

$con=mysqli_connect("localhost","root","mzl1990","Project");

 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username = ($_POST['username']);
$password = ($_POST['password']);

$check="select * from student where username = '".$username."' and password = '".$password."'";
$rs = mysqli_query($con,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 1) 
{
    echo "User Already in Exists";
}
else
{
    $newUser="insert into student(firstname,lastname,collegeID,username,password,email,street_address,city,state,country,zipcode,Telephone) values ('".$_POST['first']."','".$_POST['last']."',".$_POST['cid'].",'".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['street']."','".$_POST['city']."','".$_POST['state']."','".$_POST['country']."',".$_POST['zip'].",'".$_POST['tel']."') ";
    if (mysqli_query($con,$newUser))
    {
        echo "You are now registered";
    }
    else
    {
        echo "Error adding user in database<br/>";
    }
}	
// Close connections
mysqli_close($con);

}



if($_GET['id'] == update){

$con=mysqli_connect("localhost","root","mzl1990","Project");

 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$bookid = ($_GET['bookid']);
$password = ($_POST['password']);

$check="select Book-Count from Books where ISBN = '".$bookid."'" ;
$result = $mysqli->query($check);
$data = $result->mysqli_fetch_array(MYSQLI_NUM);


    echo $date[1];

// else
// {
//     $newUser="insert into student(firstname,lastname,collegeID,username,password,email,street_address,city,state,country,zipcode,Telephone) values ('".$_POST['first']."','".$_POST['last']."',".$_POST['cid'].",'".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['street']."','".$_POST['city']."','".$_POST['state']."','".$_POST['country']."',".$_POST['zip'].",'".$_POST['tel']."') ";
//     if (mysqli_query($con,$newUser))
//     {
//         echo "You are now registered";
//     }
//     else
//     {
//         echo "Error adding user in database<br/>";
//     }
// }	
// Close connections
mysqli_close($con);

}











if($_GET['id'] == books){

$con=mysqli_connect("localhost","root","mzl1990","Project");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT * FROM Books";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}
 
// Close connections
mysqli_close($con);

}
else if ($_GET['id'] == insertbook){
	
	$con=mysqli_connect("localhost","root","mzl1990","Project");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// This SQL statement selects ALL from the table 'Locations'
$book = $_GET['book'];
$user = $_GET['user'];
$date = $_GET['date'];

$sql = "insert into student_books(book_id,student_id,return_date) values ('".$book."',".$user.",'".$date."')";
 
// Check if there are results
if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
	// echo "failure already exists";
    echo "Error: " . $sql . "<br>" . $con->error;
}
 
// Close connections
mysqli_close($con);

}

else if ($_GET['id'] == mybook){

	$con=mysqli_connect("localhost","root","mzl1990","Project");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
// This SQL statement selects ALL from the table 'Locations'
$sid = $_GET['sid'];
$sql = "SELECT * FROM Books join student_books on (Books.ISBN = student_books.book_id) join student on (student_books.student_id = student.id) where student.id =".$sid." ";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}
 
// Close connections
mysqli_close($con);

}

else if ($_GET['id'] == login){

	$con=mysqli_connect("localhost","root","mzl1990","Project");
 
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
$username = $_GET['username'];
$password = $_GET['password'];


// This SQL statement selects ALL from the table 'Locations'
$sql = "SELECT * FROM student where student.username = '".$username."'and student.password ='".$password."'";
 
// Check if there are results
if ($result = mysqli_query($con, $sql))
{
	// If so, then create a results array and a temporary one
	// to hold the data
	$resultArray = array();
	$tempArray = array();
 
	// Loop through each row in the result set
	while($row = $result->fetch_object())
	{
		// Add each row into our results array
		$tempArray = $row;
	    array_push($resultArray, $tempArray);
	}
 
	// Finally, encode the array to JSON and output the results
	echo json_encode($resultArray);
}
 
// Close connections
mysqli_close($con);

}

?>