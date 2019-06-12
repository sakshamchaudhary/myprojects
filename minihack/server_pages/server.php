<?php

$con = mysqli_connect("localhost","root","","minihack");

//header('Access-Control-Allow-Origin: *');//external
header('Access-Control-Allow-Methods; GET,POST,PATCH,PUT,DELETE,OPTIONS');
header('Access-Control-Allow-Headers; Origin, Content-Type, X-Auth-Token');

$data = json_decode(file_get_contents("php://input"));
if(count($data)>0) {
    
    $grpname = mysqli_real_escape_string($con, $data->grpname);
    $grpno = sizeof($data->grpno);
    $err = 0;
    $query = "SELECT gid FROM groups WHERE gname='$grpname'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)>0) {    
        echo "ERROR: Group name already registered!";
        $err = 1;
    };
    
    for($i=0;$i<$grpno && $err==0;$i++) {
        $email = mysqli_real_escape_string($con, $data->data[$i]->email);
        $query = "SELECT mid FROM members WHERE email='$email'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result)>0) {    
            echo "ERROR: Email already registered!";
            $err = 1;
        };
    };
        
    if($err == 1) {    
        
    } else {
        $query = "INSERT INTO groups(gname,gmemno) VALUES('$grpname','$grpno')";
        if (mysqli_query($con, $query)) {
                $query = "SELECT gid FROM groups WHERE gname='$grpname'";
                $row = mysqli_fetch_array(mysqli_query($con, $query));
                $grpid = $row[0];
                $flag=1;
                for($i=0;$i<$grpno && $flag==1;$i++) {
                    $name = mysqli_real_escape_string($con, $data->data[$i]->name);
                    $email = mysqli_real_escape_string($con, $data->data[$i]->email);
                    $branch = mysqli_real_escape_string($con, $data->data[$i]->branch);
                    $year = mysqli_real_escape_string($con, $data->data[$i]->year); 
                    $query = "INSERT INTO members(name,branch,email,year,gid) VALUES('$name','$branch','$email','$year',$grpid)";
                    if(mysqli_query($con, $query)) {$flag=1;} else {$flag=0;};
                };
                if($flag==1) {echo "Registered Successfully";} else {echo "Server Error";};
            } else {
                echo "Server Error";
            };
    };
};
?>