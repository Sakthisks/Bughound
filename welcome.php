<html>
<head>

</head>
<body>
<?php

    if(isset($_COOKIE["userlevel"])){ ?>
    <h3>Welcome to BugHound Website</h3>
    <h4>LoggedIn User:<?php echo " ". $_COOKIE['name']." with employee ID ".$_COOKIE['empID'];?></h4>
    <?php
        if($_COOKIE["userlevel"]==3){ ?>
            <h4>User level: <?php echo " ".$_COOKIE['userlevel']." "; ?></h4>
            <div><a href="bugentry.php">Enter New Bug</a></div>
            <div><a href="SearchBug.php">Update Existing Bug</a></div>
            <div><a href="DeleteSearchBug.php">Delete Existing Bug</a></div>
            <div><a href="dbmaintainence.php">Database Maintenance</a></div>
        <?php
        }
        else if($_COOKIE["userlevel"]==2){ ?>
            <h4>User level: <?php echo " ".$_COOKIE['userlevel']." "; ?></h4>
            <div><a href="bugentry.php">Enter New Bug</a></div>
            <div><a href="SearchBug.php">Update Existing Bug</a></div>
            <div><a href="dbmaintainence.php">Database Maintenence</a></div>
            <div><a href="DeleteSearchBug.php">Delete Existing Bug</a></div>
            <h3>empid:<?php echo " ".$_COOKIE['empID'];?></h3>
        
        <?php }

        else{
            ?>
                <h4>User level: <?php echo " ".$_COOKIE['userlevel']." "; ?></h4>
                <div><a href="bugentry.php">Enter New Bug</a></div>
                <div><a href="SearchBug.php">Update Existing Bug</a></div>
        <?php 
            }
    }

?>
<div><button name="logout" onclick='location.href="logout.php"'>Logout</button></div>
</body>
</html>