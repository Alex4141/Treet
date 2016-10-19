
module.exports = function(server, db){
	
	server.get('/', function(request, resonse){
		response.sendFile('./Views/index.html');
	});


}