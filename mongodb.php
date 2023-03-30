<?php

require_once DIR . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();


// Connect to MongoDB
$client = new MongoDB\Client($_ENV['ME_CONFIG_MONGODB_URL']);


// Select a database and collection
$database = $client->mydatabase;
$collection = $database->mycollection;

// // Insert a document
$insertResult = $collection->insertOne([
    'name' => 'John Doe',
    'email' => 'johndoe@example.com',
    'phone' => '123-456-7890'
]);

// // Print the result
printf("Inserted %d document(s)\n", $insertResult->getInsertedCount());

// // Find all documents
$cursor = $collection->find([]);

// // Print each document
foreach ($cursor as $document) {
    printf("%s - %s - %s\n", $document->name, $document->email, $document->phone);
}
