<?php

            if(isset($_COOKIE['username']) && isset($_COOKIE['password'])){

                    header("Location: welcome.php");

            }

?>


<?php
if(isset($_POST['submit'])){
$username=$_POST['username'];
$password=$_POST['password'];
$connection=mysqli_connect("localhost","root","","bughound");
if(mysqli_connect_errno()){
    echo "Database connection failed";
}
$query="SELECT * FROM `employee` where `username`='$username' AND `password`='$password' LIMIT 1";
$result=mysqli_query($connection,$query);
if($result){
    $row=mysqli_num_rows($result);

    $record = mysqli_fetch_row($result);
    if($row==1){

            setcookie("username",$record[2],time()+(60*60*24));
            setcookie("password",$record[3],time()+(60*60*24));
            setcookie("empID",$record[0],time()+(60*60*24));
            setcookie("name",$record[1],time()+(60*60*24));
            setcookie("userlevel",$record[4],time()+(60*60*24));
            header("Location: welcome.php");
    
    }
    else{
        echo "Username or Password Incorrect!";
    }
}
else
    echo "Connection failed";

mysqli_close($connection);
}
?>

<html>
<head>
<title>BugHound Website !</title>

</head>
<body >
<div class="login-box">
<h1> BugHound Website  </h1>
<form name="form1" action="" method="post">
<div class="textbox">
<label>Username:</label>
<input type="text" placeholder="Username" name="username" width="50" height="50" ><br/>
</div>
<div class="textbox">
<label>Password:</label>
<input type="password" placeholder="password" name="password" width="50" height="50" ><br/>
</div>
<input type="submit" name="submit" value="Login">
</div>
</form>


</body>
</html>
