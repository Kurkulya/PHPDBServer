<?php
require_once 'IPersonDAO.php';
require_once 'MySqlDB.php';
require_once 'MOCK.php';

class DBFactory
{	
	public static function GetInstance($dbt)
	{		
		$personDAO;
		switch($dbt)
		{
			case "MySql": $personDAO = new MySqlDB(); break;
			case "MOCK": $personDAO = new MOCK(); break;
		}

		return $personDAO;
	}
}
?>