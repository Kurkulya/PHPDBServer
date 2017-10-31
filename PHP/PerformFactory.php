<?php
require_once 'IPerformData.php';
require_once 'PerformData.php';

class PerformFactory
{
	public static function GetInstance($perform)
	{
		$method;

		switch($perform)
		{
			case "HTML": $method = new PHTML(); break;
			case "XML": $method = new PXML(); break;
			case "XSLT": $method = new PXML(); break;
			case "JSON": $method = new PJSON(); break;
			case "YAML": $method = new PYAML(); break;
		}

		return $method;
	}
}
?>