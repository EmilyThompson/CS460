<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
</head>
<body>
<p id="test"></p>
<?php 
session_start(); 
if(!isset($_SESSION['UserName'])){ 
header("Location: index.html");
}

$variable = $_SESSION['UserName'];
if(isset($_GET["imageId"])){
// who they clicked on
$imageid= $_GET["imageId"]; 
$imagesrc = $_GET['imagesrc'];
}

// Connection credentials
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

// if liked
if($imagesrc=="images/redheart.png"){
$sql = "INSERT INTO like_tbl (username,otherUser) VALUES ('".$variable."','".$imageid."')";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

//if unliked
else{
$sql = "DELETE FROM like_tbl WHERE username='".$variable."'and otherUser='".$imageid."'";
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>  
</body>
</html>