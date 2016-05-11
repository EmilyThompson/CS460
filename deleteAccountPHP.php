<html>
<head>
<link rel="stylesheet" type="text/css" href="final.css">
<title>Delete Account</title>
</head>
<body>
<?php
session_start();
$variable=$_SESSION['UserName'];

$servername = "frodo.bentley.edu";
$username = "cs460teamd";
$password = "cs460teamd";
$dbname = "cs460teamd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL statement to delete from profile
$sql1= "DELETE profile.* from profile where Username='".$variable."'";
echo $sql1.'<br>';
$result = $conn->query($sql1);
if ($conn->query($sql1)===True){
echo 'Profile deleted from profile table';
} else echo 'Error deleting profile from profile table';

// SQL statement to delete from location
$sql2= "DELETE locationform.* from locationform where User='".$variable."'";
echo $sql2.'<br>';
$result2 = $conn->query($sql2);
if ($conn->query($sql2)===True){
echo 'Profile deleted from profile table';
} else echo 'Error deleting profile from profile table';

// SQL statement to delete from hobby
$sql3 = "DELETE weekendhobby.* from weekendhobby where user='".$variable."'";
echo $sql3.'<br>';
$result3 = $conn->query($sql2);
if ($conn->query($sql3)===True){
echo 'Profile deleted from profile table';
} else echo 'Error deleting profile from profile table';

// SQL statement to delete from like table
$sql4 = "DELETE like_tbl.* from like_tbl where username='".$variable."' OR otherUser='".$variable."'";
echo $sql4.'<br>';
$result3 = $conn->query($sql4);
if ($conn->query($sql4)===True){
echo 'Profile deleted from profile table';
} else echo 'Error deleting likes from like';

// SQL statement to delete from login table
$sql5 = "DELETE logintable.* from logintable where Username='".$variable."'";
echo $sql5.'<br>';
$result3 = $conn->query($sql5);
if ($conn->query($sql5)===True){
echo 'Login deleted from login table';
} else echo 'Error deleting login from login table';

// Delete picture from server
unlink("uploadedPictures/".$variable."jpg");

header("Location:logout.php");
?>

</body>
</html>