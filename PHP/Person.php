<?php
class Person
{
    public $id;
	public $fn;
	public $ln;
	public $age;
  
    public function Person($id, $fn, $ln, $age)
    {
        $this->id = $id;
		$this->fn = $fn;
		$this->ln = $ln;
		$this->age = $age;
    } 
}
?>