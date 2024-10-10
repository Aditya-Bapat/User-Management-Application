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
    // Delete user where email matches
    $query = "DELETE FROM user WHERE email='$em'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any rows were affected by the deletion
    if (mysqli_affected_rows($conn) > 0) {
        // Successful deletion
        echo "<script>
                alert('User deleted successfully!');
                window.location.href = 'main_page.html'; // Redirect after success
              </script>";
        exit;
    } else {
        // If no rows affected, it means the email doesn't exist
        echo "<script>
                alert('User with the given email not found!');
                window.location.href = 'update.html'; // Redirect back to the form
              </script>";
    }
}
?>
<HTML>
<body>
    <BR><BR><a href="main_page.html">Home Page</a><BR><BR>
    <a href="del.html">Reload this Form!</a><BR><BR>
</body>
</HTML>
