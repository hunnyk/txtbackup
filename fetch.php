<?php 
if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'tabledata')
{
	$dbname = $_POST['dbname'];
	$con = mysqli_connect("localhost","root","root",$dbname);
	$sql="SHOW TABLES";
	$res=mysqli_query($con,$sql);
	$data = '<option value="">Select table</option>';
	while ($row = mysqli_fetch_array($res)){ 
		$data .=	'<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}	
	echo $data;
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'columndata')
{
	$dbname= $_POST['dbname'];
	$tbname=$_POST['tbname'];
	$con=mysqli_connect("localhost","root","root",$dbname);
	$sql="SHOW COLUMNS from $tbname";
	//$sql="SELECT * from $tbname";
	$res=mysqli_query($con,$sql);
	//$data = '<option value=""></option>';
	while($row=mysqli_fetch_array($res)) {
		//echo $row[0];	
		$data.='<option value="'.$row['0'].'">'.$row['0'].'</option>';
	}
	echo $data;
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'recorddata')
{
	$dbname=$_POST['dbname'];
	$tbname=$_POST['tbname'];
	$recname=$_POST['recname'];

	$recname = implode($recname,",");

	$con=mysqli_connect("localhost","root","root",$dbname);
	//$sql="SELECT * from $tbname";
	$sql="SELECT ".$recname." from ".$tbname;
	//echo $sql;exit;
	$res=mysqli_query($con,$sql);
	echo "<table class='table'><tr>";
	while($row=mysqli_fetch_row($res)) 
	{
		foreach ($row as $key => $value) 
		{
			echo "<td>".$value."</td>";
		}
	}
	echo "</tr></table>";
}



?>
