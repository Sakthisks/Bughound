<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Blob File MySQL</title>
</head>
<body>
    <?php   
        $dbh=new PDO("mysql:host=localhost;dbname=bughound","root","");
        if(isset($_POST['btn'])){
            if($_FILES['myfile']['name']==""){
              echo '<script>alert("Please select a file to upload !")</script>';
            }
            else{
                $name=$_FILES['myfile']['name'];
                $type=$_FILES['myfile']['type'];
            $data=file_get_contents($_FILES['myfile']['tmp_name']);
            $stmt=$dbh->prepare("INSERT INTO attachment values('',?,?,?)");
            $stmt->bindParam(1,$name);
            $stmt->bindParam(2,$type);
            $stmt->bindParam(3,$data);
            $stmt->execute();
            }
        }
    ?>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="myfile"/>
        <button name="btn">Upload</button>
    </form>
    <p></p>
    <ol>
    <?php   
        $stat=$dbh->prepare("SELECT * FROM attachment");
        $stat->execute();
        while($row=$stat->fetch()){
            echo "<li><a target='_blank' href='view.php?id=".$row['attachment_Id']."'>".$row['name']."</a></li>";
        }
    ?>
    </ol>
</body>
</html>