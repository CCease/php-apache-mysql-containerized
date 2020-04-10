function validate_name1(){
	var namec = document.getElementById("name_checking1").value;

	if(namec.length <1)
	{
		document.getElementById("name_checking1").style.borderWidth = "0 0 2px;";
		document.getElementById("name_checking1").style.borderColor = "red";


	}

	else{
		document.getElementById("name_checking1").style.borderWidth = "0 0 2px;";
		document.getElementById("name_checking1").style.borderColor = "green";
	}

}

function validate_name2(){
	var namec = document.getElementById("name_checking2").value;

	if(namec.length <1)
	{
		document.getElementById("name_checking2").style.borderWidth = "0 0 2px;";
		document.getElementById("name_checking2").style.borderColor = "red";

	}

	else{
		document.getElementById("name_checking2").style.borderWidth = "0 0 2px;";
		document.getElementById("name_checking2").style.borderColor = "green";
	}

}



function validate_email() {

	var emailc = document.getElementById("email_checking").value;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;



	if(emailc.match(mailformat))
	{
		document.getElementById("email_checking").style.borderWidth = "0 0 2px;";
		document.getElementById("email_checking").style.borderColor = "green";



	}

	else{
		document.getElementById("email_checking").style.borderWidth = "0 0 2px;";
		document.getElementById("email_checking").style.borderColor = "red";


	}



}

function validate_pw1(){
	var pass = document.getElementById("password_checking1").value;


	if(pass.length <1){
		document.getElementById("password_checking1").style.borderWidth = "0 0 2px;";
		document.getElementById("password_checking1").style.borderColor = "red";
	}
	else{
		document.getElementById("password_checking1").style.borderWidth = "0 0 2px;";
		document.getElementById("password_checking1").style.borderColor = "green";
	}
}

function validate_pw2(){
	var pass = document.getElementById("password_checking1").value;
	var passR = document.getElementById("password_checking2").value;

	if(passR.length >0){
		if (passR == pass)
		{
			document.getElementById("password_checking2").style.borderWidth = "0 0 2px;";
			document.getElementById("password_checking2").style.borderColor = "green";
		}
		else{
			document.getElementById("password_checking2").style.borderWidth = "0 0 2px;";
			document.getElementById("password_checking2").style.borderColor = "red";
			}
	}
	else{
		document.getElementById("password_checking2").style.borderWidth = "0 0 2px;";
		document.getElementById("password_checking2").style.borderColor = "red";
	}


}

function validate_contact(){
	var cont = document.getElementById("contact_checking").value;

	if(cont.length<1)
	{
		document.getElementById("contact_checking").style.borderWidth = "0 0 2px;";
		document.getElementById("contact_checking").style.borderColor = "red";
	}
	else{
		document.getElementById("contact_checking").style.borderWidth = "0 0 2px;";
		document.getElementById("contact_checking").style.borderColor = "green";
	}
}

function validate_ic(){
	var ic = document.getElementById("ic_checking").value;

	if(ic.length<1)
	{
		document.getElementById("ic_checking").style.borderWidth = "0 0 2px;";
		document.getElementById("ic_checking").style.borderColor = "red";
	}
	else{
		document.getElementById("ic_checking").style.borderWidth = "0 0 2px;";
		document.getElementById("ic_checking").style.borderColor = "green";
	}
}

function register(){
	if (document.getElementById("name_checking1").style.borderColor == "green" &&
		document.getElementById("name_checking2").style.borderColor == "green" &&
		document.getElementById("email_checking").style.borderColor == "green" &&
		document.getElementById("password_checking1").style.borderColor == "green" &&
		document.getElementById("password_checking2").style.borderColor == "green" &&
		document.getElementById("contact_checking").style.borderColor == "green" &&
		document.getElementById("ic_checking").style.borderColor == "green"
		)
		 {
			 alert("Register successfully");
		 }
	else{
		alert("Please fill up the form!!");
		}
}
