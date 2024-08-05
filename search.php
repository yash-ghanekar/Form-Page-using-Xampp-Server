<?php

// Database connection
$connection = mysqli_connect('localhost', 'root', '', 'database_form','3307');

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());

}

// Get the search query from the form
$search_query = $_POST['search'];

// Prepare the SELECT statement
$filtervalues = $_GET['search'];
$stmt = $connection->prepare("SELECT * FROM database_table WHERE CONCAT(fname,mobile) LIKE '%$filtervalues%'");

// Bind the search query to the statement
$stmt->bind_param("s", $search_query);

// Execute the statement
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if there are any rows
if ($result->num_rows > 0) {
    // Output the data
    while ($row = $result->fetch_assoc()) {
        echo $row['mobile'] . ' - ' . $row['fname'] . ' - ' . $row['review'] . '<br>';
    }
} else {
    echo 'No results found';
}

// Close the statement and the connection
$stmt->close();
mysqli_close($connection);

?>