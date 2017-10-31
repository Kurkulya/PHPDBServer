class Builder {
	static buildRequest(method, obj){
		if(method == 'GET'){
			return JSON.stringify(obj);
		}
		else{
			return "<request>" + objectToXml(obj) + "</request>";
		}
	}
}

function objectToXml(obj) {
        var xml = '';
		

        for (var prop in obj) {
            if (!obj.hasOwnProperty(prop)) {
                continue;
            }

            if (obj[prop] == undefined)
                continue;

            xml += "<" + prop + ">";
            if (typeof obj[prop] == "object")
                xml += objectToXml(new Object(obj[prop]));
            else
                xml += obj[prop];

            xml += "</" + prop + ">";
        }
	
        return xml;
    }


