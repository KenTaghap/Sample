<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // MongoDB Atlas connection string
    $connectionString = "mongodb://kenUser:KenPassword@ac-kvsfcpt-shard-00-00.qrj9egp.mongodb.net:27017,ac-kvsfcpt-shard-00-01.qrj9egp.mongodb.net:27017,ac-kvsfcpt-shard-00-02.qrj9egp.mongodb.net:27017/Sample?ssl=true&replicaSet=atlas-4pn5vh-shard-0&authSource=admin&retryWrites=true&w=majority";

    try {
        // Connect to MongoDB Atlas
        $mongoClient = new MongoDB\Client($connectionString);

        // Select the database and collection
        $database = $mongoClient->selectDatabase("Sample");
        $collection = $database->selectCollection("Connect");

        // Get data from the form
        $field1 = $_POST["field1"];
        $field2 = $_POST["field2"];

        // Insert the data into the collection
        $document = array("field1" => $field1, "field2" => $field2);
        $collection->insertOne($document);

        // Redirect to a success page or display a success message
        header("Location: success.php");
        exit;
    } catch (MongoDB\Driver\Exception\Exception $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}
?>
