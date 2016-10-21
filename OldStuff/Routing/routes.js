//Modules
var express = require('express');

module.exports = function(server, db){

    server.get('/', function(request, response){
        response.sendFile('./Views/index.html', {root: '../Treet'});
    });

    server.post('/', function(request, response){
        var user_name=request.body.usernameInput;
        var password=request.body.passwordInput;
        db.any("SELECT FirstName FROM Customers WHERE FirstName=$1 AND Password = $2", [user_name, password])
    .then(function (data) {
            console.log("DATA:", data);
           
            window.location = './Views/logged.html';      
           console.log("SAfsadfas")
    })
    .catch(function (error) {
        console.log("ERROR:", error);
    });
    });
}