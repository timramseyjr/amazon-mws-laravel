<?php

return [
	'store' => [
		'store' => [
			'merchantId' => env('AMAZON_SELLER_ID',''),
			'marketplaceId' => env('AMAZON_MARKETPLACE_ID',''),
			'keyId' => env('AMAZON_AWS_ACCESS_KEY_ID',''),
			'secretKey' => env('AMAZON_AWS_SECRET_ACCESS_KEY',''),
			'amazonServiceUrl' => env('AMAZON_SERVICE_URL','https://mws.amazonservices.com/'),
			'MWSAuthToken' => env('AMAZON_MWS_AUTH_TOKEN','')
		]
	],
	'AMAZON_SERVICE_URL' => env('AMAZON_SERVICE_URL','https://mws.amazonservices.com/'),
	'muteLog' => env('AMAZON_MUTE_LOG',false)
];
