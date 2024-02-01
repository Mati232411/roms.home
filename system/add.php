<?php
include("/var/www/auth.php");
function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
//File
$file=reset($_FILES);
if(empty($file['size'])){
    die('{"success": false, "msg": "Please provide a file"}');
}
$fileType=mime_content_type($file['tmp_name']);
if ($fileType != "image/png") {
	if ($fileType != "image/jpeg") {
		if($fileType != "image/gif") {
	die("You can only upload images in format: png, jpeg, gif. You uploaded $fileType");
	}}		
}
$filename=generateRandomString(64);
move_uploaded_file($file['tmp_name'], "/srv/roms/img/$filename");
$platform=$_POST['platform'];
$name=$_POST['name'];
$year=$_POST['year'];
$region=$_POST['region'];
$shortdesc=$_POST['shortdesc'];
$filelink=$_POST['filelink'];
$query = "INSERT INTO main(platform, name, year, region, shortdesc, filelink, img) VALUES ('{$platform}', '{$name}', '{$year}', '{$region}', '{$shortdesc}', '{$filelink}', '{$filename}');";
$result = mysqli_query($con,$query);
header("Location: /");