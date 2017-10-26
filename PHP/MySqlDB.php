<?php
require_once 'IPersonDao.php';
require_once 'PerformFactory.php';

class MySqlDB implements IPersonDao
{
	private $host;
	private $user;
	private $password;
	private $db;
	private $table;
	
	public function __construct()
	{
		$this->host = "localhost";
		$this->user = "root";
		$this->password = "";
		$this->db = "persons";
		$this->table  = "persontable";
	}
    public function Read($method)
	{
		$con=new mysqli($this->host, $this->user, $this->password, $this->db);
		$read="SELECT * FROM " . $this->table;
		$result = $con->query($read);
		$people = array();
		
		if($result)
		{
			$rows = mysqli_num_rows($result);  
			for ($i = 0 ; $i < $rows ; ++$i)
			{
				$row = mysqli_fetch_row($result);
				array_push($people, new Person($row[0],$row[1],$row[2],$row[3]));
			}
		}
					
		$performer = PerformFactory::GetInstance($method);	
		$return = $performer->Perform($people);		
		$con->close();
		
		return $return;
	}
    public function Update($person)
	{
		$con=new mysqli($this->host, $this->user, $this->password, $this->db);
		$update="UPDATE ". $this->table ." SET FirstName='".$person->fn . "',
									   LastName='".$person->ln . "',
									   Age=".$person->age . 
								 " WHERE Id=".$person->id;
		$con->query($update);
		$con->close();
	}
	public function Create($person)
	{
		$con=new mysqli($this->host, $this->user, $this->password, $this->db);
		$create="INSERT INTO ". $this->table ." ( ID, FirstName, LastName, Age) 
						   VALUES (". $person->id . ", '" . $person->fn . "' , '" . $person->ln . "' ," . $person->age . ")";
		$con->query($create);
		$con->close();
	}
    public function Delet($person)
	{	
		$con=new mysqli($this->host, $this->user, $this->password, $this->db);
		$delete="DELETE FROM ". $this->table ." WHERE Id=".$person->id;
		$con->query($delete);
		$con->close();
	}
}
?>