
<?php
if(isset($_GET["data"]))
{
    $prog_id=$_GET["data"];
}
?>
<?php


if(isset($_POST['B4'])){


$name = (isset($_POST['name']) ? $_POST['name'] : '');
$connect=mysqli_connect('localhost','root',null,'bughound');
 
if(mysqli_connect_errno($connect))
{
        echo 'Failed to connect';
}
$query="INSERT INTO `area`(`prog_id`, `functional_area`) VALUES ('$prog_id','$name')";
mysqli_query($connect,$query);
}
?>
<html>
<body>
<button id="myButton">Display</button>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "simpleDropdown.php";
    };
</script>
<button onclick="location.href='dbmaintainence.php'">cancel</button>
<button onclick="location.href='AddArea.php'">Add Another</button>
<button onclick="location.href='logout.php'">Logout</button>

</body>
</html>
