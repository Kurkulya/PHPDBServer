<?php
require_once 'Person.php';
require_once 'DBFactory.php';
$request;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$xml = simplexml_load_string($_POST['req'], "SimpleXMLElement", LIBXML_NOCDATA);
	$json = json_encode($xml);
	$request = json_decode($json);
}
else if($_SERVER['REQUEST_METHOD'] === 'GET')
{
	$request = json_decode($_GET['req']);	
}

$db = DBFactory::GetInstance($request->data->database);

$do = $request->command;

if($do == "Create")
{
	$db->Create($request->data->person);
}
else if($do == "Update")
{
	$db->Update($request->data->person);
}
else if($do == "Delete")
{								 
	$db->Delet($request->data->person);
}
else if($do == "Read")
{									 
	echo $db->Read($request->resp_type);
}
?>