<?php  
	
require_once 'GetAllTargets.php';
require_once 'GetTarget.php';

ob_start();

$instance = new GetAllTargets();
$jsonResponse = $instance->GetResponseBody();
$objResponse = json_decode($jsonResponse, true);

$targetCollections = array();
foreach ($objResponse['results'] as $targetID) {
	$individualTarget = array();
	$targetRetrievalInstance = new GetTarget($targetID);
	$jsonTargetResponse = $targetRetrievalInstance->GetResponseBody();
	$targetObj = json_decode($jsonTargetResponse);

	array_push($targetCollections, $targetObj);
}

ob_end_clean();

echo json_encode($targetCollections);

?>