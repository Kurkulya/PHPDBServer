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
	var obj = {
	    command: dodb,
		data: {
			database: db,
			person: p
		},
		resp_type: ""
	}
	
	var req = 'req=' + Builder.buildRequest("POST", obj);
	
	var rr = new XMLHttpRequest();
	
	rr.open('POST', 'PHP/Server.php', false);
	rr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	rr.send(req);
}
