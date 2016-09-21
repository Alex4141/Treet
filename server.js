var express = require('express');
var server = express();

server.use(express.static(__dirname + '/res'));

server.get('/', function(request, response) {
	response.sendFile('./index.html', {root: '../Treet'});
});

server.get('/home', function(request, response) {
	response.sendFile('./index.html', {root: '../Treet'});
});

server.listen(3000, function() {
	console.log('Example app listening on port 3000!');
});

