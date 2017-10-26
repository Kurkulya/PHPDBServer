<?php
require_once 'IPersonDao.php';
require_once 'PerformFactory.php';

class MOCK implements IPersonDao
{
	private $people = array();
	
	public function __construct()
	{
		$this->people[0] = new Person("1","A","B","12");
		//$this->people[1] = new Person("2","Vasya","Pupkin","32");
		//$this->people[2] = new Person("3","Normal","Name","333");		
	}
    public function Read($method)
	{		
		$performer = PerformFactory::GetInstance($method);	
		$return = $performer->Perform($this->people);		
		
		return $return;
	}
    public function Update($person)
	{
		for($x = 0; $x < count($this->people); $x++) 
		{
			if($this->people[$x]->id == $person->id)
			{
				$this->people[$x]->fn = $person->fn;
				$this->people[$x]->ln = $person->ln;
				$this->people[$x]->age = $person->age;
			}
		}
	}
	public function Create($person)
	{
		array_push($this->people, $person);
	}
    public function Delet($person)
	{	
		for($x = 0; $x < count($this->people); $x++) 
		{
			if($this->people[$x]->id == $person->id)
			{
				unset($this->people[$x]);
				break;
				
			}
		}
	}
}
?>