<?php   
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"bughound");
?>

<?php   
       
        if(isset($_POST['btn'])){
            $dbh=new PDO("mysql:host=localhost;dbname=bughound","root","");
            if($_FILES['myfile']['name']==""){
              echo '<script>alert("Please select a file to upload !")</script>';
            }
            else{
                $name=$_FILES['myfile']['name'];
                $type=$_FILES['myfile']['type'];
            $data=file_get_contents($_FILES['myfile']['tmp_name']);
            $stmt=$dbh->prepare("INSERT INTO attachment values('',?,?,?,?)");
            $stmt->bindParam(1,$name);
            $stmt->bindParam(2,$type);
            $stmt->bindParam(3,$data);
            $stmt->bindParam(4,$_GET['data']);

            if($stmt->execute())
            {
                echo '<script> alert("File uploaded successfully !")</script>';
            }
            else
                echo '<script> alert("File Upload failed !")</script>';
         }
    }
?>







<?php
if(isset($_POST['cancel'])){
    header("Location:welcome.php");
}
if(isset($_POST['B4'])){

    if(isset($_POST['programs'])){
        $programs=$_POST['programs'];
    }
    if(isset($_POST['reportType'])){
        $reportType=$_POST['reportType'];
    }
    if(isset($_POST['severity']))
    {
      $severity=$_POST['severity'];
    }
    if(isset($_POST['problem_summary'])){
        $problem_summary=$_POST['problem_summary'];
    }
    if(isset($_POST['problem'])){
        $problem=$_POST['problem'];
    }
    if(isset($_POST['suggestedFix'])){
        $suggestedFix=$_POST['suggestedFix'];
    }
    if(isset($_POST['reportedBy'])){
        $reportedBy=$_POST['reportedBy'];
    }
    if(isset($_POST['reportedDate'])){
        $reportedDate=$_POST['reportedDate'];
    }
    if(isset($_POST['functionalAreas'])){
        $functionalAreas=$_POST['functionalAreas'];
    }
    if(isset($_POST['assignedTo'])){
        $assignedTo=$_POST['assignedTo'];
    }
    if(isset($_POST['status'])){
        $status=$_POST['status'];
    }
    if(isset($_POST['priority'])){
        $priority=$_POST['priority'];
    }
    if(isset($_POST['resolution'])){
        $resolution=$_POST['resolution'];
    }
    if(isset($_POST['resolutionVersion'])){
        $resolutionVersion=$_POST['resolutionVersion'];
    }
    if(isset($_POST['resolvedBy'])){
        $resolvedBy=$_POST['resolvedBy'];
    }
    if(isset($_POST['resolvedDate'])){
        $resolvedDate=$_POST['resolvedDate'];
    }
    if(isset($_POST['testedBy'])){
        $testedBy=$_POST['testedBy'];
    }
    if(isset($_POST['testedDate'])){
        $testedDate=$_POST['testedDate'];
    }
    if(isset($_POST['comments'])){
        $comments=$_POST['comments'];
    }


    $connect=mysqli_connect('localhost','root',"",'bughound');
 
    if(mysqli_connect_errno($connect))
    {
        echo 'Failed to connect';
    }
    $bug=$_GET['data'];
    $query="UPDATE `bug` SET `Program`='$programs',`Report_type`='$reportType',`Severity`='$severity',`Functional_area`='$functionalAreas',`Assigned_to`='$assignedTo',`Status`='$status',`Priority`='$priority',`Resolution`='$resolution',`Reported_by`='$reportedBy',`Tested_by`='$testedBy',`Problem_summary`='$problem_summary',`Suggested_fix`='$suggestedFix',`Resolution_version`='$resolutionVersion',`Problem`='$problem',`Comments`='$comments' WHERE `BugID`='$bug'";
    if(mysqli_query($connect,$query)){
        
        echo '<script language="javascript">';
        echo 'alert("Bug record updated successfully")';
        echo '</script>';
    }
    else{
        echo "No records updated!";
    }

}
?>
<?php

$bugID=$_GET['data'];


$conn=new mysqli("localhost","root","","bughound");
if($conn->connect_error)
{ 
 die("connection failed:" . $conn->connect_error);
}

$q="SELECT * from bug where `BugID`=$bugID";
$r=$conn->query($q);    
$n=$r->num_rows;    
if($n>0){
    while($ro=mysqli_fetch_row($r)) {
        $prog=$ro[1];
        $area=$ro[4];
        $rtype=$ro[2];
        $sev=$ro[3];
        $assTo=$ro[5];
        $st=$ro[6];
        $pr=$ro[7];
        $res=$ro[8];
        $reportby=$ro[9];
        $testby=$ro[12];
        $resolveby=$ro[11];
        $resver=$ro[17];
        $reportdate=$ro[10];
        $prob_summary=$ro[15];
        $prob=$ro[18];
        $comm=$ro[19];
        $suggest_fix=$ro[16];
        $reportd=$ro[10];
        $testd=$ro[14];
        $resold=$ro[13];
    }
}
?>





<html>
<head>
<title>Bug Update Page </title>
<style>
.container{
    background-color: lightgrey;
  width: 300px;
  border: 15px solid green;
  padding: 50px;
  margin: 20px;
    
}
</style>
<script src="jquery-3.4.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#programs').on('change',function(){
        var program_id=$(this).val();
        if(program_id){
            $.ajax({
                url:'fetch_areas.php',
                type:'POST',
                data:'programId='+program_id,
                dataType:'text',
                success:function(html){
                $('#functionalAreas').html(html);
                
                }
         });
        }
        else{
            $('#functionalAreas').html('<option value="">Select program first</option>');
        }
    });
    
});
</script>
<script type="text/javascript">

    var rtype="<?php echo $rtype ?>";
    var sev="<?php echo $sev ?>";
    var assTo="<?php echo $assTo ?>";
    var st="<?php echo $st ?>";
    var pr="<?php echo  $pr ?>";
    var res="<?php echo  $res ?>";
    var reportby="<?php echo $reportby ?>";
    var testby="<?php echo  $testby ?>";
    var resolveby="<?php echo $resolveby ?>";
    var resver="<?php echo $resver ?>";
    var prog="<?php echo $prog ?>";
var area="<?php echo $area ?>";

    var prob_summary="<?php echo $prob_summary ?>";
    var comm="<?php echo $comm ?>";
    var suggest_fix="<?php echo $suggest_fix ?>";
    var prob="<?php echo $prob ?>";
    var reportd="<?php echo $reportd ?>";
    var resold="<?php echo $resold ?>";
    var testd="<?php echo $testd ?>";
    $(document).ready(function(){
    $('select[name="programs"]').first().val(prog);
    $('select[name="functionalAreas"]').first().val(area);
    $('select[name="reportType"]').first().val(rtype);
    $('select[name="severity"]').first().val(sev);
    $('select[name="assignedTo"]').first().val(assTo);
    $('select[name="status"]').first().val(st);
    $('select[name="priority"]').first().val(pr);
    $('select[name="resolution"]').first().val(res);
    $('select[name="reportedBy"]').first().val(reportby);
    $('select[name="testedBy"]').first().val(testby);
    $('select[name="resolvedBy"]').first().val(resolveby);
    $('select[name="resolutionVersion"]').first().val(resver);
    $('#problem_summary').val(prob_summary);
    $('#problem').val(prob);
    $('#suggestedFix').val(suggest_fix);
    $('#comments').val(comm);
    $('#dateReported').val(reportd);
    $('#dateTested').val(testd);
    $('#dateResolved').val(resold);


});
</script>
</head>
 
<body bgcolor="#FFFFFF">
    <form name="Edit" action="" method="post">
        <table align="center" width=60% width="100%" cellspacing="4" cellpadding="2" border="5">
            <tr>
                <td colspan="4" align="center"><b>Bug Update Page</b></td>
 
            </tr>
            <tr>
                <td align="left" valign="top" width="100%">Program</td>
                <td width="60%">
                <select name="programs" id="programs" required>
                        <option value="">Select Programs</option>
                        <?php 
                            $result=mysqli_query($link,"select * from program");
                            $rowCount=mysqli_num_rows($result);
                            if($rowCount>0){
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["prog_id"];?>><?php echo $row["program_name"]." ".$row["program_release"]." ".$row["program_version"];?></option>
                            <?php
                                }
                            }
                            else{
                                echo '<option value="">Programs not available</option>';
                            }
                         ?>
                </select>
                </td>
            </tr>
            <tr>
        		<td align="left" valign="top" width="41%">Report Type</td>
        		<td width="57%"><select name="reportType" required>
                    <option value="">Select</option>
					<option value="Coding Error">Coding Error</option>
					<option value="Design Issue">Design Issue</option>
					<option value="Suggestion">Suggestion</option>
					<option value="Documentation">Documentation</option> 
					<option value="Hardware">Hardware</option>
					<option value="Query">Query</option>
					</select></td>
 			</tr>
 			<tr>
        		<td align="left" valign="top" width="41%">Severity</td>
        		<td width="57%"><select name="severity" required>
                    <option value="">Select Severity</option>
					<option value="Fatal">Fatal</option>
					<option value="Serious">Serious</option>
					<option value="Minor">Minor</option>
					</select></td>
 			</tr>
            <tr>
                <td align="left" valign="top" width="35%">Problem Summary</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="problem_summary" cols="50" id="problem_summary" required></textarea><input type="checkbox" id="check">Reproducible</td>
             </tr >
             <tr>
                <td align="left" valign="top" width="35%">Problem</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="problem" cols="50" id="problem" required></textarea></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="35%">Suggested Fix</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="suggestedFix" id="suggestedFix" cols="50"></textarea></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="35%">Reported By</td>
 
                <td width="57%">
                
                <select name="reportedBy" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                </td>    

                <td align="left" valign="top" width="60%">Date</td>
 
                <td width="57%"><input type="date" id="dateReported" name="reportedDate"  required></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="35%">Functional Area</td>
 
                <td width="57%">
                <select name="functionalAreas" id="functionalAreas">
                        <option value="">Select Areas</option>
                </select>
            
                
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Assigned to</td>
 
                <td width="57%">
                
                <select name="assignedTo" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                
                </td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Comments</td>
 
                <td width="57%"><textarea rows="4" maxlen="200" name="comments" id="comments" cols="20" required></textarea></td>
            </tr >
            <tr>
                <td align="left" valign="top" width="41%">Status</td>
                <td width="57%"><select name="status" required>
                    <option value="">Select Status</option>
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Priority</td>
                <td width="57%"><select name="priority" required>
                <option value="">Select Priority</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Resolution</td>
                <td width="57%"><select name="resolution" required>
                <option value="">Select Resolution</option>
                    <option value="Pending">Pending</option>
                    <option value="Fixed">Fixed</option>
                    <option value="Irreproducible">Irreproducible</option>
                    <option value="Deferred">Deferred</option> \
                    <option value="As assigned">As assigned</option>
                    <option value="Cant fix">Can't fix</option>
                    <option value="Withdrawn by Reporter">Withdrawn by Reporter</option> \
                    <option value="Need more Info">Need more Info</option>
                    <option value="Disagree with suggestion">Disagree with suggestion</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Resolution Version</td>
                <td width="57%"><select name="resolutionVersion" required>
                    <option value="">Select Resolution Version</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    </select></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%">Resolved By</td>
 
                <td width="57%">
                
                <select name="resolvedBy" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                
                </td>
                <td align="left" valign="top" width="41%">Date</td>
 
                <td width="57%"><input type="date" id="dateResolved" name="resolvedDate" required></td>
            </tr>
            <tr>
                <td align="left" valign="top" width="41%" >Tested By</td>
 
                <td width="57%">
                
                <select name="testedBy" required>
                        <option value="">Select User</option>
                        <?php 
                            $result=mysqli_query($link,"select * from employee");
                        
                            while($row=mysqli_fetch_array($result))
                            {
                                ?>
                            <option value=<?php echo $row["emp_id"];?>><?php echo $row["name"];?></option>
                            <?php
                            }
                            ?>
                </select>
                
                </td>
                <td align="left" valign="top" width="41%">Date</td>
 
                <td width="57%"><input type="date" id="dateTested" name="testedDate" required></td>
            </tr>
                <tr>
                    <td><input type="checkbox" id="check" name="Treat as deferred"><label for="check"> Treat as Deferred</label>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p align="center">
                        <input type="submit" value="  Submit" name="B4">
                        <input type="reset" value="  Reset All   " name="reset"></td>
                        
            </tr>
            
        </table>
    </form>
    <form method="post" enctype="multipart/form-data">
        <div align="center">
        <label>Attachments:</label>
        <input type="file" name="myfile"/>
        <button name="btn">Upload</button>
        <br>
        <br>
        </div>
    </form>
    <div align="center">
    <button onclick="location.href='Display.php'">Display Records </button>
    <button onclick="location.href='welcome.php'">Cancel</button>
    <button onclick="location.href='logout.php'">Logout</button>
    </div>

</body>
 
</html>
