<?php

require_once 'HTTP/Request2.php';
require_once 'SignatureBuilder.php';

// See the Vuforia Web Services Developer API Specification - https://developer.vuforia.com/resources/dev-guide/retrieving-target-cloud-database
// The SetTargetActive sample demonstrates how to update the attributes of a target using a JSON request body. This example updates the target's metadata.

class SetTargetActive{

	//Server Keys
	private $access_key 	= "b98bbd8bd30ce7f40d899e88c43294555d904193";
	private $secret_key 	= "bb2f2c1919570d8bc2f349352efdfd626d920272";

	private $url 			= "https://vws.vuforia.com";
	private $requestPath 	= "/targets/";
	private $request;
	private $jsonBody 		= "";

	private $responseBody = "";
	
	function __construct($targetId, $activeFlag){

		$this->requestPath = $this->requestPath . $targetId;
		$this->jsonBody = json_encode( array( 'active_flag' =>  $activeFlag) );
		$this->execSetTargetActive();

	}

	public function execSetTargetActive(){

		$this->request = new HTTP_Request2();
		$this->request->setMethod( HTTP_Request2::METHOD_PUT );
		$this->request->setBody( $this->jsonBody );

		$this->request->setConfig(array(
				'ssl_verify_peer' => false
		));

		$this->request->setURL( $this->url . $this->requestPath );

		// Define the Date and Authentication headers
		$this->setHeaders();


		try {

			$response = $this->request->send();

			if (200 == $response->getStatus()) {
				$this->responseBody = $response->getBody();
				echo $this->responseBody;
			} else {
				echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
						$response->getReasonPhrase(). ' ' . $response->getBody();
			}
		} catch (HTTP_Request2_Exception $e) {
			echo 'Error: ' . $e->getMessage();
		}


	}

	private function setHeaders(){
		$sb = 	new SignatureBuilder();
		$date = new DateTime("now", new DateTimeZone("GMT"));

		// Define the Date field using the proper GMT format
		$this->request->setHeader('Date', $date->format("D, d M Y H:i:s") . " GMT" );
		$this->request->setHeader("Content-Type", "application/json" );
		// Generate the Auth field value by concatenating the public server access key w/ the private query signature for this request
		$this->request->setHeader("Authorization" , "VWS " . $this->access_key . ":" . $sb->tmsSignature( $this->request , $this->secret_key ));

	}

	public function GetResponseBody()
	{
		return $this->responseBody;
	}
}

?>
