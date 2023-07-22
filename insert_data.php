<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // MongoDB Atlas connection string
    $connectionString = "mongodb+srv://your_username:your_password@your_cluster_url/your_database_name?retryWrites=true&w=majority";

    try {
        // Connect to MongoDB Atlas
        $mongoClient = new MongoDB\Client($connectionString);

        // Select the database and collection
        $database = $mongoClient->selectDatabase("your_database_name");
        $collection = $database->selectCollection("your_collection_name");

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
