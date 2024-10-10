<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "gokul_infotech");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$em = $_REQUEST['email'];

if ($conn) {
    // Select user details where email matches
    $query = "SELECT * FROM user WHERE email='$em'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        echo "<h2>User Details</h2>";
        echo "<p><strong>First Name:</strong> " . $row['fname'] . "</p>";
        echo "<p><strong>Last Name:</strong> " . $row['lname'] . "</p>";
        echo "<p><strong>Phone Number:</strong> " . $row['phn_no'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>Address:</strong> " . $row['uaddress'] . "</p>";
        echo "<br><br><a href='main_page.html'>Back to Home</a><br><br>";
    } else {
        // If no rows were found, the email doesn't exist
        echo "<script>
                alert('User with the given email not found!');
                window.location.href = 'view.html'; // Redirect back to the form
              </script>";
    }
}
?>
<HTML>
<body>
    <BR><BR><a href="main_page.html">Home Page</a><BR><BR>
    <a href="view.html">Search Again!</a><BR><BR>
</body>
</HTML>
