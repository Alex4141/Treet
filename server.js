//Modules
var express = require('express');
var bodyParser = require("body-parser");
var server = express();
var pgp = require("pg-promise")();
var db = pgp("postgres://postgres:marist@localhost:3000/TreetDB");

//Set Up
server.use(express.static(__dirname + '/Views'));
server.use(express.static(__dirname + '/res'));

server.use(bodyParser.urlencoded({ extended: true }));

server.use(bodyParser.json());

//Routes
require('./Routing/routes.js')(server, db);

server.listen(8080, function(){
	console.log("Listening on port 8080");
})