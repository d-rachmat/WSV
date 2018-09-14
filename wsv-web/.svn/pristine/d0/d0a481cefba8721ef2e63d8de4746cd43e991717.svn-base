<?php  
	
require_once 'DeleteTarget.php';

ob_start();

$targetID = $_POST['targetID'];
$instance = new DeleteTarget($targetID);
$jsonResponse = $instance->GetResponseBody();
$objResponse = json_decode($jsonResponse, true);

if($objResponse['result_code'] == "Success")
{
	$files = glob("uploads/". $targetID . ".*");
	foreach ($files as $file) {
		unlink($file);
	}
}

ob_end_clean();

echo $jsonResponse;


?>