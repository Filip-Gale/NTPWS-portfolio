<?php
// API endpoint URL
$api_url = "https://console.firebase.google.com/project/portfolio-817d5/storage/portfolio-817d5.appspot.com/files";

// Make a GET request to the API
$response = file_get_contents($api_url);

// Handle the response data (for example, print it)
echo $response;
?>
