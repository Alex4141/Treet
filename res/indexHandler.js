function openModal(){
	var modal = document.getElementsByClassName("modal")[0];
	modal.style.display = 'inline';
}

function closeModal(){
	var modal = document.getElementsByClassName("modal")[0];
	modal.style.display = 'none';	
}

function returnHome(){
	window.location = "/home";
}