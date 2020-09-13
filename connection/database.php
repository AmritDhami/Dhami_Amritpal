<?php
$host="localhost";
$db="a3001738_scpfiles";
$user="a3001738_admin";
$pwd="G(Wg})5q59Dx";


$dsn="mysql:host=$host; dbname=$db";
try
{
    $conn= new PDO($dsn,$user,$pwd);
}
catch(PDOException $error)
{
echo "<h3> Error </h3>" . $error->getMessage(); 
}

$selectall="select * from scp_file ";
	$record=$conn->prepare($selectall);
	$record->execute();

?>
