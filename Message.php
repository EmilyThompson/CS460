<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Message</title>
<link href="final.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
session_start();
$name=$_GET['name'];
?>

<div align="left">
	<button id="submit" onclick="goBack()">&#10094; Back to Profile</button>
</div>
<div align="center">
	<a href="homepage.php">
	<img align="middle" alt="LOGO" src="images/Find%20a%20Falcon%20FINAL%20logo.png" title="Logo"></a>
</div>
<div id="popup">
	<form action="MAILTO:<?php echo $name?>?Subject=I%20Like%20Your%20Profile" method="post">
		<table align="center" style="width: 25%">
			<tr>
				<td id="formQuestion">To:</td>
			</tr>
			<tr>
				<td id="formAnswer">
				<input name="email" style="width: 340px" type="text" value="<?php echo $name?>"></td>
			</tr>
			<tr>
				<td id="formQuestion">Subject:</td>
			</tr>
			<tr>
				<td id="formAnswer">
				<input name="subject" style="width: 339px" type="text" value="I like your profile!"></td>
			</tr>
			<tr>
				<td id="formQuestion">Message:</td>
			</tr>
			<tr>
				<td id="formAnswer">
				<input name="message" style="width: 336px; height: 103px" type="text"></td>
			</tr>
			<tr>
				<td align="center"><button id="submit" type="submit">
				<!--onclick="<?php mail('to','subject','message')?>-->Send
				</button></td>
			</tr>
		</table>
	</form>
</div>
<script type="text/javascript">
function goBack() {
    window.history.back();
}
</script>
</body>
</html>