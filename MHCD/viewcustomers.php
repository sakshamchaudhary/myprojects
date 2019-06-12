<?php
require "required.php";
?><?php
include_once("topheader.php");
?>
 <div class="container" id="whiteBack" ><br>
<h2 class="text-strong text-center" style="color:dodgerblue;">CUSTOMER LIST</h1><br>
          <?php
$sql="SELECT * FROM customers";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	?><table class="table table-bordered">

<thead>
      <tr>
        <th>Company Name</th>
        <th>Company Address</th>
        <th>Contact Number</th>
		<th>Contact Person</th>
		<th>GST No.</th>
		<th>PAN No.</th>
		<th>Item Name</th>
		<th>Quantity</th>
		<th>Surface Area</th>
		
      </tr>
    </thead>
	<tbody><?php
	while($row=mysqli_fetch_assoc($result))
	{
		
?>
<tr >
<td><?php echo $row['company_name'];?></td>
<td><?php echo $row['company_address'];?></td>
<td><?php echo $row['contact_number'];?></td>
<td><?php echo $row['contact_person'];?></td>
<td><?php echo $row['gst_no'];?></td>
<td><?php echo $row['pan_no'];?></td>
<td><?php echo $row['item_name'];?></td>
<td><?php echo $row['quantity'];?></td>
<td><?php echo $row['surface_area'];?></td>

</tr>


<?php
}
}
else
	echo "  <BR><BR><h1 style=\"color:rgb(255,107,9); font-family:arial;\" ALIGN=\"CENTER\"> No customer found</h1>
	 <BR><BR>"?></tbody></table>
</div>
</head></body></html>