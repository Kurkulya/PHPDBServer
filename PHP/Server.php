<?php
require_once 'Person.php';
require_once 'DBFactory.php';

if($_GET['do'] == "Read")
{
	$dbtype = $_GET['dbtype'];
	$do = $_GET['do'];
	$method = $_GET['method'];
}
else
{
	$dbtype = $_GET['dbtype'];
	$id = $_GET['id'];
	$fn = $_GET['fn'];
	$ln = $_GET['ln'];
	$age = $_GET['age'];
	$do = $_GET['do'];	
}


$db = DBFactory::GetInstance($dbtype);


if($do == "Create")
{
	$person = new Person($id,$fn,$ln,$age);
	$db->Create($person);
}
else if($do == "Update")
{
	$person = new Person($id,$fn,$ln,$age);
	$db->Update($person);
}
else if($do == "Delete")
{		
	$person = new Person($id,$fn,$ln,$age);							 
	$db->Delet($person);
}
else if($do == "Read")
{									 
	echo $db->Read($method);
}
?>