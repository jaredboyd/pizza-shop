$(document).ready(function(e) {

	$("#button").click(function() {
		//Clear validity checks
		var validity = document.getElementsByClassName('validity');
		var firstError = document.getElementById('firstError');
		var lastError = document.getElementById('lastError');
		var passwordError = document.getElementById('passwordError');
		var repasswordError = document.getElementById('repasswordError');
		var emailError = document.getElementById('emailError');
		var successString = document.getElementById('successString');
		for (var i = 0; i < validity.length; i++) {
			validity[i].style.display="none";
		}

		var success = true;

		var first = $("#fName").val();
		var last = $("#lName").val();
		var password = $("#password").val();
		var repassword = $("#repassword").val();
		var email = $("#email").val();

		//Validate first name
		if ($.trim(first).length == 0) {
			firstError.style.display="block";
			event.preventDefault();
			success = false;
		}
		if (!validFirst(first)) {
			firstError.style.display="block";
			event.preventDefault();
			success = false;
		}

		//Validate last name
		if ($.trim(last).length == 0) {
			lastError.style.display="block";
			event.preventDefault();
			success = false;
		}
		if (!validLast(last)) {
			lastError.style.display="block";
			event.preventDefault();
			success = false;
		}

		//Validate password
		if ($.trim(password).length == 0) {
			passwordError.style.display="block";
			event.preventDefault();
			success = false;
		}
		if (!validPassword(password)) {
			passwordError.style.display="block";
			event.preventDefault();
			success = false;
		}

		//Validate retyped password
		if (!validRepassword(password, repassword)) {
			repasswordError.style.display="block";
			event.preventDefault();
			success = false;
		}

		//Validate email
		if ($.trim(email).length == 0) {
			emailError.style.display="block";
			event.preventDefault();
			success = false;
		}
		if (!validEmail(email)) {
			emailError.style.display="block";
			event.preventDefault();
			success = false;
		}

		//Display login success if true
		if (success === true) {
			successString.style.display="block";
		}
	});

});

function validEmail(email) {
	var valid = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	if (valid.test(email)) {
		return true;
	} else {
		return false;
	}
}

function validFirst(first) {
	var valid = /^[a-zA-Z]{1,20}$/;
	if (valid.test(first)) {
		return true;
	} else {
		return false;
	}
}

function validLast(last) {
	var valid = /^[a-zA-Z]{1,20}$/;
	if (valid.test(last)) {
		return true;
	} else {
		return false;
	}
}

function validPassword(password) {
	var valid = /^[a-zA-Z0-9_!@-]{6,20}$/
	if (valid.test(password)) {
		return true;
	} else {
		return false;
	}
}

function validRepassword(password, repassword) {
	if (repassword === password) {
		return true;
	} else {
		return false;
	}
} 