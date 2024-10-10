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

if ($conn) 
{
    // Correct the SQL query
    $query1 = "INSERT INTO user(fname, lname, phn_no, email, uaddress) 
                VALUES ('$fn', '$ln', '$pn', '$em', '$ad')";
    
    // Execute the query
    $ins1 = mysqli_query($conn, $query1);
    
    if ($ins1) 
    {
        // Successful insertion, display alert
        echo "<script>
                alert('Registration Successful!');
                window.location.href = 'main_page.html'; // Redirect to adminlogin.html after success
              </script>";
        exit;
    }   
    else 
    {
        // Show the specific SQL error
        echo "<br><br><hr>Insertion Failed: " . mysqli_error($conn);
    }
}
?>
<HTML>
<body>
    <BR><BR><a href="main_page.html">Home Page</a><BR><BR>
    <a href="reg.html">Reload this Form !</a><BR><BR>
    <!-- <a href="adminlogin.html">Admin Login </a><BR> -->
</body>
</HTML>
