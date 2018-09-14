<?php  

require_once 'PostNewTarget.php';
include_once('../externals/getID3-1.9.15/getid3/getid3.php');

ob_start();

// Let's do the check in the beginning, especially the image
// Check if image file is a actual image or fake image
$info = "";

if(!CheckIsValidMarker($info)) {
	ob_end_clean();
	echo $info;
	return;
}

if(!CheckIsValidVideo($info)) {
	ob_end_clean();
	echo $info;
	return;
}

if(!CheckIsValidBackgroundImage($info)) {
	ob_end_clean();
	echo $info;
	return;
}

// Construct Metadata
$bgExt = strtolower(pathinfo($_FILES["background"]["name"],PATHINFO_EXTENSION));
$vidExt = strtolower(pathinfo($_FILES["video"]["name"],PATHINFO_EXTENSION));
$metadataArr = array('lootbox' => $_POST['lootbox'],
					 'linipoin' => $_POST['linipoin'],
					 'bgFileName' => 'Image.' . $bgExt,
					 'videoFileName' => 'Video.' . $vidExt);

// Beginning to push the marker to Vuforia
$instance = new PostNewTarget($_POST['name'], json_encode($metadataArr), $_FILES["marker"]["tmp_name"]);
$jsonResponse = $instance->GetResponseBody();
$objResponse = json_decode($jsonResponse, true);

// Create new folder 
$upload_dir = "uploads/";
$asset_dir = $upload_dir . $objResponse['target_id'];
if (!is_dir($asset_dir)) {
	mkdir($asset_dir, 0777, true);
}

// Upload Marker Image to Server
$fileExt = strtolower(pathinfo($_FILES["marker"]["name"],PATHINFO_EXTENSION));
$filePath = $upload_dir . $objResponse['target_id'] . "/" . "Marker";

if (!move_uploaded_file($_FILES["marker"]["tmp_name"], $filePath)) {
	$info = "Sorry, there was an error uploading your marker.";
	echo $info;
	return;
}

$videoExt = strtolower(pathinfo($_FILES["video"]["name"],PATHINFO_EXTENSION));
$videoFileName = "Video." . $videoExt;
$videoFilePath = $asset_dir . "/" . $videoFileName;  
if (!move_uploaded_file($_FILES["video"]["tmp_name"], $videoFilePath)) {
	$info = "Sorry, there was an error uploading your video file.";
	echo $info;
	return;
}

$bgExt = strtolower(pathinfo($_FILES["background"]["name"],PATHINFO_EXTENSION));
$bgFileName = "Image." . $bgExt;
$bgFilePath = $asset_dir . "/" . $bgFileName; 
if (!move_uploaded_file($_FILES["background"]["tmp_name"], $bgFilePath)) {
	$info = "Sorry, there was an error uploading your bg image file.";
	echo $info;
	return;
} 

ob_end_clean();

echo $jsonResponse;

function CheckIsValidMarker(&$info)
{
	$check = getimagesize($_FILES['marker']['tmp_name']);
	if($check !== false) {
		$info = "Marker File is an image - " . $check["mime"] . ".";
	} else {
		$info = "Marker File is not an image.";
		return false;
	}

	// Check file size
	if ($_FILES["marker"]["size"] > 2000000) {
		$info = "Sorry, cannot upload marker file that is larger than 2MB.";
		return false;
	}

	// Allow certain file formats
	$fileType = exif_imagetype($_FILES['marker']['tmp_name']);
	if($fileType != IMAGETYPE_PNG && $fileType != IMAGETYPE_JPEG ) {
		$info = "Sorry, only JPG, & PNG files are allowed for marker file.";
		return false;
	}

	return true;
}

function CheckIsValidVideo(&$info)
{
	// Type contains video/mp4,video/avi,video/mpeg,video/mpg etc
	if(preg_match('/video\/*/',$_FILES['video']['type'])): 
		$info = "THIS IS A VIDEO FILE : ". $_FILES['video']['type'];
	else:
		$info = "NOT A VIDEO FILE : " . $_FILES['video']['type'];   
		return false;        
	endif;

    // Check file size
	// if ($_FILES["video"]["size"] > 2500000) {
	// 	$info = "Sorry, cannot upload video that is larger than 2MB.";
	// 	return false;
	// }

	// Limit Extension to mp4 and 3gp
	$ext = pathinfo($_FILES["video"]["name"])["extension"];
	if($ext != "mp4")
	{
		$info = "file is not the correct extension";
		return false;
	}

	// Check resolutions: capped to '800*1280'
	// $getID3 = new getID3;
	// $file = $getID3->analyze($_FILES["video"]["tmp_name"]);
	// $w = (int)$file['video']['resolution_x'];
	// $h = (int)$file['video']['resolution_y'];

	// if($w > 800 || $h > 1280)
	// {
	// 	$info = "sorry, the video resolutions are more than 800x1280";
	// 	return false;
	// }

	return true;
}

function CheckIsValidBackgroundImage(&$info)
{
	$check = getimagesize($_FILES['background']['tmp_name']);
	if($check !== false) {
		$info = "Bg File is an image - " . $check["mime"] . ".";
	} else {
		$info = "Bg File is not an image.";
		return false;
	}

	// Check file size
	// if ($_FILES["background"]["size"] > 1000000) {
	// 	$info = "Sorry, bg image is larger than 1MB.";
	// 	return false;
	// }

	// Allow certain file formats
	$fileType = exif_imagetype($_FILES['background']['tmp_name']);
	if($fileType != IMAGETYPE_PNG && $fileType != IMAGETYPE_JPEG ) {
		$info = "Sorry, only JPG, & PNG files are allowed for Bg Image.";
		return false;
	}

	// Check resolutions: capped to '800*1280'
	// $w = (int)$check[0];
	// $h = (int)$check[1];
	// if($w > 800 || $h > 1280)
	// {
	// 	$info = "sorry, the bg image resolutions are more than 800x1280. The img resolution is " . $w . "x" . $h;
	// 	return false;
	// }

	return true;
}

?>