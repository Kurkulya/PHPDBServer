function read()
{	
	var table = document.getElementById('tPersons').getElementsByTagName('tbody')[0];

	var db = document.querySelector('input[name="db"]:checked').value;
	var method = document.querySelector('input[name="read"]:checked').value;
	
	//var req = "do=Read&dbtype="+db+"&method="+method;
	var obj = {
	    command: "Read",
		data: {
			database: db,
			person: ""
		},
		resp_type: method
	}
	var req = Builder.buildRequest("GET", obj);
	var rr = new XMLHttpRequest();
	rr.open('GET', 'PHP/Server.php?req='+req, false);
	rr.send(null);
	
	var response = rr.responseText;
	
	var reader = Factory.getReader(method);

	table.innerHTML = reader.Read(response);
}