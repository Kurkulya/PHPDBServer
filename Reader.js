function readJSON() 
{
	var persons = JSON.parse(requestRead("JSON"));
	
	var table = document.getElementById('tPersons').getElementsByTagName('tbody')[0];
    table.innerHTML = "";
	
    persons.forEach(function(item) 
    {
        var newRow = table.insertRow(table.rows.length);
        
        var cellId = newRow.insertCell(0);
        var cellFn = newRow.insertCell(1);
        var cellLn = newRow.insertCell(2);
        var cellAge = newRow.insertCell(3);

        cellId.appendChild(document.createTextNode(item.id));
        cellFn.appendChild(document.createTextNode(item.fn));
        cellLn.appendChild(document.createTextNode(item.ln));
        cellAge.appendChild(document.createTextNode(item.age));
    });
}


function readXML() 
{
	var xmlDoc = new DOMParser().parseFromString(requestRead("XML"), "text/xml");
	
	var table = document.getElementById('tPersons').getElementsByTagName('tbody')[0];
    table.innerHTML = "";
	
	for(var i = 0; i<xmlDoc.firstChild.childElementCount; i++)
	{
		var newRow = table.insertRow(table.rows.length);
        
        var cellId = newRow.insertCell(0);
        var cellFn = newRow.insertCell(1);
        var cellLn = newRow.insertCell(2);
        var cellAge = newRow.insertCell(3);

        cellId.appendChild(document.createTextNode(xmlDoc.getElementsByTagName("Id")[i].childNodes[0].nodeValue));
        cellFn.appendChild(document.createTextNode(xmlDoc.getElementsByTagName("FirstName")[i].childNodes[0].nodeValue));
        cellLn.appendChild(document.createTextNode(xmlDoc.getElementsByTagName("LastName")[i].childNodes[0].nodeValue));
        cellAge.appendChild(document.createTextNode(xmlDoc.getElementsByTagName("Age")[i].childNodes[0].nodeValue));
	}       
}

function readHTML() 
{
	var table = document.getElementById('tPersons').getElementsByTagName('tbody')[0];
    table.innerHTML = requestRead("HTML");  
}

function readXSLT() 
{
		xmlText = requestRead("XSLT");
		var xsltText =		
		'<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">'+
		'<xsl:output method="html" encoding="UTF-8"/>'+
		'<xsl:template match="/">'+
		'<html>'+
		'<table border="3" id="tPersons"   width="50%"   cellpadding="4" cellspacing="3">'+
			'<thead>'+
			   ' <th align="center"><strong>Id</strong></th>'+
			   ' <th align="center"><strong>FirstName</strong></th>'+
				'<th align="center"><strong>LastName</strong></th>'+
			   ' <th align="center"><strong>Age</strong></th>'+
			'</thead>'+
			'<tbody>'+
			   ' <xsl:for-each select="Persons/Person">'+
			   ' <tr>'+
				  '  <td><xsl:value-of select="Id"/></td>'+
				   ' <td><xsl:value-of select="FirstName"/></td>'+
				   ' <td><xsl:value-of select="LastName"/></td>'+
				   ' <td><xsl:value-of select="Age"/></td>'+
				'</tr>'+
				'</xsl:for-each>'+
			'</tbody>'+
		'</table>'+
		'</html>'+
		'</xsl:template>'+
		'</xsl:stylesheet>';
		
        var xmlDoc = new DOMParser().parseFromString(xmlText, "text/xml");
        var xslDoc = new DOMParser().parseFromString(xsltText, "text/xml");

        if (window.ActiveXObject ) 
		{
            var ex = xmlDoc.transformNode(xslDoc);
            document.getElementById("Table").innerHTML = ex;
        }
        else if (document.implementation && document.implementation.createDocument) 
		{
            var xsltProcessor = new XSLTProcessor();
            xsltProcessor.importStylesheet(xslDoc);
            resultDocument = xsltProcessor.transformToFragment(xmlDoc, document);
            document.getElementById("Table").innerHTML = "";
            document.getElementById("Table").appendChild(resultDocument);
        }
}

function requestRead(method)
{
	var db = document.querySelector('input[name="db"]:checked').value;
	var req = "do=Read&dbtype="+db+"&method="+method;
	var rr = new XMLHttpRequest();
	rr.open('GET', 'PHP/Server.php?'+req, false);
	rr.send(null);
	return rr.responseText;
}

