<?php
require_once 'IPerformData.php';

class PHTML implements IPerformData
{
	public function Perform($people)
	{
		if($people)
		{
			$echo = "";
			for ($i = 0 ; $i < count($people); ++$i)
			{
				$echo .= "<tr>";
				$echo .= "<td>".$people[$i]->id."</td>";
				$echo .= "<td>".$people[$i]->fn."</td>";
				$echo .= "<td>".$people[$i]->ln."</td>";
				$echo .= "<td>".$people[$i]->age."</td>";
				$echo .= "</tr>";
			}
			$echo .= "</table>";
			return $echo;
		}
	}
}

class PJSON implements IPerformData
{
    public function Perform($people)
	{		
		return json_encode($people);
	}
}
class PXML implements IPerformData
{
	public function Perform($people)
	{
		if($people)
		{ 
			$echo = "";	
			$echo .= "<Persons>";
			for ($i = 0 ; $i < count($people) ; ++$i)
			{
				$echo .=  "<Person>";
				$echo .=  "<Id>".$people[$i]->id."</Id>";
				$echo .=  "<FirstName>".$people[$i]->fn."</FirstName>";
				$echo .=  "<LastName>".$people[$i]->ln."</LastName>";
				$echo .=  "<Age>".$people[$i]->age."</Age>";
				$echo .=  "</Person>";
			}
			$echo .=  "</Persons>";
			return $echo;
		}
	}
}

class PYAML implements IPerformData
{
	public function Perform($people)
	{
		$echo = "Persons:";	
		for ($i = 0 ; $i < count($people) ; ++$i)
		{
			$echo .=  "\n- Id: ".$people[$i]->id;
			$echo .=  "\n\tFirstName: ".$people[$i]->fn;
			$echo .=  "\n\tLastName: ".$people[$i]->ln;
			$echo .=  "\n\tAge: ".$people[$i]->age;
		}
		return $echo;
	}
}

?>