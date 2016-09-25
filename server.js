var express = require('express');
var pgp = require("pg-promise")(/*options*/);
var db = pgp("postgres://postgres:marist@localhost:3000/TreetDB");
var server = express();

server.use(express.static(__dirname + '/res'));

server.get('/', function(request, response) {
	response.sendFile('./index.html', {root: '../Treet'});
});

server.get('/home', function(request, response) {
	response.sendFile('./index.html', {root: '../Treet'});
});

server.listen(3001, function() {
	console.log('Example app listening on port 3001!');
});

/*
Example
db.any("SELECT FirstName FROM Customers", [true])
    .then(function (data) {
    	//for(var d in data){
        	console.log("DATA:", data);
    	//}
    })
    .catch(function (error) {
        console.log("ERROR:", error);
    });
*/