<?php

require_once 'HTTP/Request2.php';
require_once 'SignatureBuilder.php';

// See the Vuforia Web Services Developer API Specification - https://developer.vuforia.com/resources/dev-guide/retrieving-target-cloud-database
// The DeleteTarget sample demonstrates how to delete a target from its Cloud Database using the target's target id.
// * note that targets cannot be 'Processing' and must be inactive to be deleted.

class DeleteTarget{

	//Server Keys
	private $access_key 	= "b98bbd8bd30ce7f40d899e88c43294555d904193";
	private $secret_key 	= "bb2f2c1919570d8bc2f349352efdfd626d920272";
	
	private $url 			= "https://vws.vuforia.com";
	private $requestPath 	= "/targets/";
	private $request;

	private $responseBody;
	
	function __construct($targetId){

		$this->requestPath = $this->requestPath . $targetId;
		
		$this->execDeleteTarget();

	}

	public function execDeleteTarget(){

		$this->request = new HTTP_Request2();
		$this->request->setMethod( HTTP_Request2::METHOD_DELETE );
		
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
		// Generate the Auth field value by concatenating the public server access key w/ the private query signature for this request
		$this->request->setHeader("Authorization" , "VWS " . $this->access_key . ":" . $sb->tmsSignature( $this->request , $this->secret_key ));

	}

	public function GetResponseBody()
	{
		return $this->responseBody;
	}
}

?>
