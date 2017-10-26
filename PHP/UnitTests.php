<?php
use PHPUnit\Framework\TestCase;
require_once 'MOCK.php';
require_once 'Person.php';

class DBTests extends TestCase
{	
	protected $db;
	protected $person;
	
    public function setUp()
    {
		$this->person = new Person("5","A","B","12");
        $this->db = new MOCK();
		$this->db->Create($this->person);
    }
	
	public function testCreate()
	{	
		$exp = '[' . json_encode($this->person) . ']';	
		$res = $this->db->Read("JSON");			
		$this->assertEquals($exp, $res);
	}
	
	public function testUpdate()
	{

		$person = new Person("5","B","A","21");
		$exp = '[' . json_encode($person) . ']';
		
		$this->db->Update($person);
		$res = $this->db->Read("JSON");	
		
		$this->assertEquals($exp, $res);
	}
	
	public function testDelete()
	{
		$this->db->Delet($this->person);		
		$res = $this->db->Read("JSON");				
		$this->assertEquals("[]", $res);
	}
	
	public function testReadJSON()
	{
		$exp = '[{"id":"5","fn":"A","ln":"B","age":"12"}]';
		$res = $this->db->Read("JSON");				
		$this->assertEquals($exp, $res);
	}
		
	public function testReadXML()
	{
		$exp = '<Persons>'.
		'<Person>'.
		'<Id>5</Id>'.
		'<FirstName>A</FirstName>'.
		'<LastName>B</LastName>'.
		'<Age>12</Age>'.
		'</Person>'.
		'</Persons>';	
		$res = $this->db->Read("XML");			
		$this->assertEquals($exp, $res);
	}
	
	public function testReadXSLT()
	{
		$exp = '<Persons>'.
		'<Person>'.
		'<Id>5</Id>'.
		'<FirstName>A</FirstName>'.
		'<LastName>B</LastName>'.
		'<Age>12</Age>'.
		'</Person>'.
		'</Persons>';	
		$res = $this->db->Read("XSLT");			
		$this->assertEquals($exp, $res);
	}
	
	public function testReadHTML()
	{
		$exp = '<tr><td>5</td><td>A</td><td>B</td><td>12</td></tr></table>';	
		$res = $this->db->Read("HTML");			
		$this->assertEquals($exp, $res);
	}

}