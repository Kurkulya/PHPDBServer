function read()
{	
	var table = document.getElementById('tPersons').getElementsByTagName('tbody')[0];

	var db = document.querySelector('input[name="db"]:checked').value;
	var method = document.querySelector('input[name="read"]:checked').value;
	
	var req = "do=Read&dbtype="+db+"&method="+method;
	var rr = new XMLHttpRequest();
	rr.open('GET', 'PHP/Server.php?'+req, false);
	rr.send(null);
	
	var response = rr.responseText;
	
	var reader = Factory.getReader(method);

	table.innerHTML = reader.Read(response);
}