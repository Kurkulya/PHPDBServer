<?php
require_once 'Person.php';

interface IPersonDao
{
    public function Read($method);
    public function Update($person);
	public function Create($person);
    public function Delet($person);
}
?>