<?php 
	$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => 'http://eshop-deve.herokuapp.com/api/v2/orders',
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => '',
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 0,
	  CURLOPT_FOLLOWLOCATION => true,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => 'GET',
	  CURLOPT_HTTPHEADER => array(
	    'Authorization: eyJhbGciOiJIUzUxMiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJwUGFINU55VXRxTUkzMDZtajdZVHdHV3JIZE81cWxmaCIsImlhdCI6MTYyMDY2Mjk4NjIwM30.lhfzSXW9_TC67SdDKyDbMOYiYsKuSk6bG6XDE1wz2OL4Tq0Og9NbLMhb0LUtmrgzfWiTrqAFfnPldd8QzWvgVQ'
	  ),
	));

	$response = curl_exec($curl);

	curl_close($curl);


	$result = json_decode($response, true);


	if ($result) {
		echo json_encode(['data' => 'ok','resultados'=>$result]);
	}else{
		echo json_encode(['data' => 'error']);
	}


?>