
<?php
if(isset($_POST["export"]))
{
    $tablename=$_POST["table"];

        $connect=mysqli_connect("localhost","root","","bughound");
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=data.csv');
        $output=fopen("php://output","w");
        if($tablename=='employee'){
           fputcsv($output,array('emp_id','name','username','level'));
            $query="SELECT `emp_id`,`name`,`username`,`level` from $tablename";
        }
        else if($tablename=='area'){
            fputcsv($output,array('area_id','prog_id','functional_name'));
            $query="SELECT * from $tablename";
        }
        else{
            fputcsv($output,array('prog_id','program_name','program_release','program_version'));
            $query="SELECT * from $tablename";
        }
        $results=mysqli_query($connect,$query);
        while($row=mysqli_fetch_assoc($results))
        {
            fputcsv($output,$row);
        }
        fclose($output);
}
?>