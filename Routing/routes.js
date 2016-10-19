

module.exports = function(server, db){

	server.get('/', function(request, resonse){
		response.sendFile('./index.html', {root: '../Treet'});
	});


	server.post('/', function(request, response){
		var user_name=request.body.usernameInput;
		var password=request.body.passwordInput;
		db.any("SELECT FirstName FROM Customers WHERE FirstName=$1 AND Password = $2", [user_name, password])
    .then(function (data) {
        	console.log("DATA:", data);
        	if(data.length === 1){
        		// Log in user and route
        		console.log("Dank");
        	}
        	else{
    			request.body.incorrectLogin = 'visible';	
        	}
    })
    .catch(function (error) {
        console.log("ERROR:", error);
    });
		//console.log("User name = "+user_name+", password = " + password);
  //response.end("yes");
	});

}