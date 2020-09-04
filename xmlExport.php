<?php
if(isset($_POST["export"]))
{
    $tablename=$_POST["table"];
    $connect=mysqli_connect("localhost","root","","bughound");
    if(mysqli_connect_errno($connect))
    {
            echo 'Failed to connect';
    }
    if($tablename=='employee'){
         $query="SELECT `emp_id`,`name`,`username`,`level` from $tablename";
         $emp_id='emp_id';
         $name='name';
         $username='username';
         $level='level';
         $filename = "employee".date("Y-m-d-h-i-s-A");
         $results=mysqli_query($connect, $query);
         header('Content-type: text/xml');
         header('Content-Disposition: attachment; filename="'.$filename.'.xml"');
         $text ='<?xml version="1.0" encoding="iso-8859-1"?>';
         $text.="\n";
         $text .= "<table name=\"$tablename\">"; 
         $text.="\n";
         $text .= "<fields>"; 
         $text .= "<field id=\"$emp_id\" name=\"$name\" username=\"$name\" level=\"$name\" />";
             $text.="\n";
             $text .= "</fields>"; 
             $text.="\n";
             $text .= "<records>"; 
             $text.="\n";
             while ($record = mysqli_fetch_assoc($results)) {
                $text.= "<record>";
                $text.="\n";
                foreach ($record as $key=>$value) {
                    $text.= '<'.$key.'>'.htmlspecialchars(stripslashes($value)).'</'.$key.'>';
                    $text.="\n";
                }
                $text.="</record>";
                $text.="\n";
            }
             $text .= "</records>";
             $text.="\n";
            $text .= "</table>";
            $text.="\n";
            $text .= "</schema>";
     }
     else if($tablename=='area'){
         $query="SELECT * from $tablename";
     }
     else{
         $query="SELECT * from $tablename";
     }
}
?>