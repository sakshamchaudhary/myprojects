<?php
require "required.php";
foreach($_POST as $key => $value)
 {
    if($key!="job")
    {
        $$key=(trim($value));
    }
 }
$abc;
foreach($_POST as $key => $value){
    if($key=="job")
        $abc=$value;  
}


  $q="insert into customers(company_name,company_address,contact_number,contact_person,gst_no,pan_no,item_name,surface_area,remarks,quantity) values('$companyName','$companyAddress','$contactNumber','$contactPerson','$gst','$pan','$itemName','$surfaceArea','$remarks','$quantity')";
mysqli_query($conn,$q);
  $q2="select customer_id from customers where pan_no='$pan'";
  $result=mysqli_query($conn,$q2);
  $row=mysqli_fetch_array($result,MYSQLI_NUM);
//var_dump($row);
foreach($abc as $value)
{
  $q3="insert into customer_job values('$row[0]','$value')";
    mysqli_query($conn,$q3);
    
    if($value=="Electroplating")
    {
        foreach($_POST as $key => $value2){
    if($key=="platingType")
        {
         
        $q4="insert into plating_type values('$row[0]','$value2')";
        mysqli_query($conn,$q4);
    }  
        }
            
    }
}
/*if()
	echo "Success";
else
	echo "failed";*/
?>