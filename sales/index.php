

<?php 
include '../incl/header.incl.php';
include '../incl/conn.incl.php';

if(isset($_GET['delete'])){
    $id = (int) $_GET['id']; 
mysql_query("DELETE FROM `sales` WHERE `id` = '$id' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
}
?>
<h1>Sales</h1>
<br/>
<a href='add.php' class='btn btn-large btn-primary'  ><i class="icon-plus icon-white"></i>New Sale</a><br/><br/> 
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
        <th>#</th>
        <th>Id:</th>
         <th>Farmer NO:</th>
        <th>KGs:</th>
        <th>Date</th>
        <th>Deliverer:</th>
       <th style="text-align: center">Tasks</th>
        </thead>
    <tbody>
 <?php
$result = mysql_query("SELECT * FROM `sales`") or trigger_error(mysql_error()); 
$i=0;
while($row = mysql_fetch_array($result)){ 
foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
$i+=1;
echo "<tr>";  
 echo '<td>'.$i.'</td>';
echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_f_no']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_kg']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_dt']) . "</td>";  
echo "<td valign='top'>" . nl2br( $row['r_deliverer']) . "</td>";  
 echo '<td  style="text-align: center">
                <a href="'.PAGE_URL.'sales/edit.php?edit=1&id='.$row['id'].'" class="btn btn-primary btn-mini"><i class="icon-edit icon-white"></i>Edit</a> | 
                <a href="'.PAGE_URL.'sales/?delete=1&id='.$row['id'].'" class="btn btn-danger btn-mini"><i class="icon-remove icon-white"></i>Delete</a> 
             </td>';
echo "</tr>"; 
} 
echo "</table>"; 



include '../incl/footer.incl.php';
?>