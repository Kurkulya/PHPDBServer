function Person(id,fn,ln,age)
{
    this.id = id;
    this.fn = fn;
    this.ln = ln;
    this.age = age;
    return this;
   
}

function getPerson() {
    var id = document.getElementById('Id').value;
    var fn = document.getElementById('Fn').value;
    var ln = document.getElementById('Ln').value;
    var age = document.getElementById('Age').value;
    return new Person(id,fn,ln,age);
}