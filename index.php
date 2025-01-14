<?php

// Initial Version 1.0

require 'vendor/autoload.php';

use GuzzleHttp\Client;

function getDnsLists(string $baseUrl = null, string $apiKey = null, int $clientId = 100) {
    try {
        if($baseUrl === null || $apiKey === null) {
            return "Error: Parameters are empty!";
        }
    
    
        $client = new Client();
    
        $response = $client->get("$baseUrl/domains/$clientId", [
            'query' => [
                'api_key' => $apiKey
            ]
        ]);
    
        if($response->getStatusCode() === 200) {
            $data = json_decode($response->getBody()->getContents(), true);
            return $data;
        } else {
            return "Error: " . $response->getStatusCode();
        }
        
    
    } catch (Exception $e) {
        return "Error: " . $e->getMessage();
    }
}

$baseUrl = "https://api.recruitment.shq.nz";
$apiKey = "h523hDtETbkJ3nSJL323hjYLXbCyDaRZ";
$clientId = 100;


$output = getDnsLists($baseUrl, $apiKey);

print_r( $output );

