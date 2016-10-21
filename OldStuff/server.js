//Modules
var express = require('express');
var bodyParser = require("body-parser");
var server = express();
var pgp = require("pg-promise")();
var db = pgp("postgres://postgres:marist@localhost:3000/TreetDB");


//Let the application access CSS, Client-Side JS, Images
server.use(express.static(__dirname + '/res'));

//Body Parser configuration for the application
server.use(bodyParser.urlencoded({ extended: true }));
server.use(bodyParser.json());

//Routes
require('./Routing/routes.js')(server, db);

server.listen(8080, function(){
	console.log("Listening on port 8080");
});