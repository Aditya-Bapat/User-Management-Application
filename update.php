<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "gokul_infotech");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Collect form data
$fn = $_REQUEST['fname'];
$ln = $_REQUEST['lname'];
$pn = $_REQUEST['phn_no'];
$em = $_REQUEST['email'];
$ad = $_REQUEST['address'];

if ($conn) {
    // Update user details where email matches
    $query = "UPDATE user 
              SET fname='$fn', lname='$ln', phn_no='$pn', uaddress='$ad'
              WHERE email='$em'";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if any rows were affected by the update
    if (mysqli_affected_rows($conn) > 0) {
        // Successful update
        echo "<script>
                alert('Details updated successfully!');
                window.location.href = 'main_page.html'; // Redirect after success
              </script>";
        exit;
    } else {
        // If no rows affected, the email doesn't exist, so insert the record
        $query_insert = "INSERT INTO user(fname, lname, phn_no, email, uaddress) 
                         VALUES ('$fn', '$ln', '$pn', '$em', '$ad')";

        $insert_result = mysqli_query($conn, $query_insert);

        if ($insert_result) {
            // Successful insertion
            echo "<script>
                    alert('Registration Successful!');
                    window.location.href = 'main_page.html'; // Redirect after success
                  </script>";
            exit;
        } else {
            // Show the specific SQL error
            echo "<br><br><hr>Insertion Failed: " . mysqli_error($conn);
        }
    }
}
?>
<HTML>
<body>
    <BR><BR><a href="main_page.html">Home Page</a><BR><BR>
    <a href="update.html">Reload this Form !</a><BR><BR>
</body>
</HTML>
