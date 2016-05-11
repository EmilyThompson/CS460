<?php
session_start();

// define Username for this session
$variable = $_SESSION['UserName'];
$FNErr=$_SESSION['FNErr'];
$LNErr=$_SESSION['LNErr'];
$LErr=$_SESSION['LErr'];
$WErr=$_SESSION['WErr'];
$AYErr=$_SESSION['AYErr'];

// define variables that have errors and set Errors
$FNErr=$LNErr=$LErr=$WErr=$AYErr=""; 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST['Text1'])){
  	$FNErr = "Invalid Firstname.";
} else $Firstname = $_POST['Text1'];
if(empty($_POST['Text2'])){
  	$LNErr = "Invalid Lastname.";
} else $Lastname = $_POST['Text2'];
if (empty($_POST['my_location'])){
$LErr ="Please select at least one location.";
}else $Location= $_POST['my_location'];
if(empty($_POST['weekend'])){
  	$WErr = "Please select at least one weekend hobby.";
} else $Hobby = $_POST['weekend'];
if (empty($_POST['aboutyou'])){
	$AYErr ="Please enter something about yourself.";
} else $AboutYou = $_POST['aboutyou'];

echo $FNErr."<br>".$LNErr."<br>".$LErr."<br>".$AYErr;
}
   
// define variables without errors 
if(isset($_POST["submit"])){
$Gender = $_POST['gender'];
$Athlete = $_POST['athlete'];
$Smoker = $_POST['smoker'];
$Drinker = $_POST['drinker'];
$StudyHours = $_POST['studyhours'];
$StudyLocation = $_POST['studylocation'];
$SleepHours = $_POST['sleephours'];
$SleeperType = $_POST['sleepertype'];
$CleaningHabits = $_POST['cleaning'];
$FriendsOver= $_POST['friendsover'];
$OvernightGuests = $_POST['overnightguest'];
$Roommate_friendsover = $_POST['roommate_friendsover'];
$Roommate_overnightguest = $_POST['roommate_overnightguest'];
$Expectations = $_POST['expectations'];
$Sharing = $_POST['sharing'];
$YearOfGraduation = $_POST['yog'];
$ClassCode = $_POST['class_code'];
$Facebook = $_POST['facebook'];
$LinkedIn = $_POST['linkedin'];
$Instagram = $_POST['instagram'];
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
echo 'Errors are: '.$LNErr.$FNErr.$LErr.$WErr.$AYErr;
if (empty($FNErr) && empty($LNErr) && empty($LErr) && empty($WErr) && empty($AYErr)){
echo ' entered loop';

// SQL statement to update profile
$sql2 = "UPDATE profile SET Firstname='$Firstname', Lastname='$Lastname', YOGID='$YearOfGraduation', ClassCode=$ClassCode, Gender='$Gender',Athlete='$Athlete',Smoker='$Smoker',Drinker='$Drinker',clean='$CleaningHabits',sleepType='$SleeperType',sleepHours='$SleepHours',studyHours='$StudyHours',locationOfStudy='$StudyLocation',friends='$FriendsOver',guest='$OvernightGuests',roommateFriend='$Roommate_friendsover',roommateGuest='$Roommate_overnightguest',expectations='$Expectations',belongings='$Sharing', AboutYou='$AboutYou', Facebook='$Facebook', LinkedIn='$LinkedIn', Instagram='$Instagram' WHERE  Username='$variable'";
echo $sql2;
if ($conn->query($sql2) === TRUE) {
    echo "Profile updated <br>";
} else {
    echo "Error with updating profile: " . $sql2. "<br>" . $conn->error;
}

// SQL Statement to 1. Delete locations from locationform table, 2. Readd existing and add new ones
$sqldelete ="DELETE FROM locationform WHERE User='".$variable."'";
echo $sqldelete;
if ($conn->query($sqldelete)===True){
echo "location deleted";
}else {
    echo "Error with updating profile: " . $sqldelete . "<br>" . $conn->error;
}
foreach($Location as $value){
$sql3 = "INSERT INTO locationform (location, User) VALUES('$value','$variable')";
if ($conn->query($sql3) === TRUE) {
    echo "Profile updated <br>";
} else {
    echo "Error with updating profile: " . $sql3 . "<br>" . $conn->error;
}}

// SQL statement to 1. Delete hobbys from weekendhobby table, 2. Readd existing and add new ones
$sqldelete2 ="DELETE FROM weekendhobby WHERE User='thompso_emil@bentley.edu' AND hobby='Going out with friends' OR hobby='Netflix' OR hobby='Depends on homework' OR hobby='I go home' OR hobby='On campus events, clubs' OR hobby='Watching sports'";
if ($conn->query($sqldelete2)===True){
echo "hobbies deleted";
}else {
    echo "Error with updating profile: " . $sqldelete2 . "<br>" . $conn->error;
}
foreach($Hobby as $value2){
$sql3 = "INSERT INTO weekendhobby (hobby, user) VALUES('$value2','$variable')";
if ($conn->query($sql3) === TRUE) {
    echo "Profile updated <br>";
} else {
    echo "Error with updating profile: " . $sql3 . "<br>" . $conn->error;
}}
}else {
echo ' There is an error somewhere';
}
$_SESSION['UpdateErr']=$FNErr.$LNErr.$LErr.$WErr.$AYErr;
$_SESSION['FNErr']=$FNErr;
$_SESSION['LNErr']=$LNErr;
$_SESSION['LErr']=$LErr;
$_SESSION['WErr']=$WErr;
$_SESSION['AYErr']=$AYErr;

echo "Location Error is".$LErr;
echo "Session error is".$_SESSION['LErr'];

header("location:account.php");

// close connection
$conn->close();
?>