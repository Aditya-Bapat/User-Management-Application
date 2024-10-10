<?php
$conn = mysqli_connect("localhost","root","","gokul_infotech");

if (!$conn) 
{
    die("Open Xampp !".mysqli_connect_error());
}
else 
{
    echo "<BR><BR> DataBase is Connected ! <BR><BR>";
}

echo "Using Database: ";
$sdb = "gokul_infotech";
if ($conn->query("USE gokul_infotech")) 
{
    echo $sdb;
}
else 
{
    echo "Data Base doesn't Exist !";
}
?>
