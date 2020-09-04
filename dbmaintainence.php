<?php

if(!isset($_COOKIE['username']) && !isset($_COOKIE['password'])){
    header("Location:error.php"); 
}

?>



<html>
 
<head>
 
    <title>Database Maintainence</title>
    

</head>
 
<body bgcolor="#FFFFFF">
	<div>
    <h2>Database Maintainence</h2>
	<a href="AddEmployee.php">Add Employee</a><br>
    <a href="AddProgram.php">Add Program</a><br>
	<a href="AddArea.php">Add Area</a><br>
    <a href="EditEmployee.php">Edit Employee</a><br>
    <a href="EditProgram.php">Edit Program</a><br>
	<a href="simpleDropdown.php">Edit Area</a><br>
    <a href="exporting.php">Exports</a><br>
    <button onclick="location.href='logout.php'">Logout</button>
    <button onclick="location.href='welcome.php'">Welcome page</button>
    </div>
</body>
 
</html>
