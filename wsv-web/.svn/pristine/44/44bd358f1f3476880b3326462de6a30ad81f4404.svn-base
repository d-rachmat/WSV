<?php  
	
require_once 'SetTargetActive.php';

ob_start();

$targetID = $_POST['targetID'];
$activeFlag = 0;

if($_POST['targetActive'] == "true")
	$activeFlag = 1;
else if($_POST['targetActive'] == "false")
	$activeFlag = 0;

$instance = new SetTargetActive($targetID, $activeFlag);
$jsonResponse = $instance->GetResponseBody();

ob_end_clean();

echo $jsonResponse;


?>