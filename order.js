$(document).ready(function(e) {

	$("#button").click(function() {
		var validity = document.getElementsByClassName('validity');
		var fNameError = document.getElementById('fNameError');
		var lNameError = document.getElementById('lNameError');
		for (var i = 0; i < validity.length; i++) {
			validity[i].style.display = "none";
		}

		var firstName = $("#fName").val();
		var lastName = $("#lName").val();

		//Validate first name
		if(!validFirstName(firstName)) {
			event.preventDefault();
			fNameError.style.display = "block";
		}

		//Validate last name
		if(!validLastName(lastName)) {
			event.preventDefault();
			lNameError.style.display = "block";
		}

	})

});


function validFirstName(first) {
	var valid = /^[a-zA-Z]{1,30}$/;
	if(valid.test(first)) {
		return true;
	} else {
		return false;
	}
}

function validLastName(last) {
	var valid = /^[a-zA-Z]{1,40}$/;
	if(valid.test(last)) {
		return true;
	} else {
		return false;
	}
}
