function create() 
{
	requestCUD('Create');
}

function upd() 
{
	requestCUD('Update');
}

function del() 
{
	requestCUD('Delete');
}

function requestCUD(dodb)
{
	var db = document.querySelector('input[name="db"]:checked').value;
	var p = getPerson();
	var req = "id="+p.id+"&fn="+p.fn+"&ln="+p.ln+"&age="+p.age+"&do="+dodb+"&dbtype="+db;
	var rr = new XMLHttpRequest();
	rr.open('GET', 'PHP/Server.php?'+req, false);
	rr.send(null);
}
