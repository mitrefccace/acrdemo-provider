checked=false;
function checkedAll ()
{
	// works in Google Chrome
	var getInputs= document.getElementsByTagName("input");
	if (checked == false)
	{
	checked = true
	}
	else
	{
	checked = false
	}
	for (var i = 0, max = getInputs.length; i < max; i++){ if (getInputs[i].type === 'checkbox') getInputs[i].checked = checked; }
}

function showDetails(id)
{
	//alert(id);
	hideAllDivs();
	var e = document.getElementById(id);
	    e.style.display = 'block';

}

function hideAllDivs()
{
	var divs = document.getElementsByTagName('div');
		//HIDE all the <DIV>'s on the screen.
	for(var i=0; i< divs.length; i++){
		divs[i].style.display = "none";
	}
}

function copyData(id)
{
	var a;
	var b;
	//id
	b = document.getElementById("vrs_u");
	b.value = id;
	//username
	a = document.getElementById("username_"+id);
	b = document.getElementById("username_u");
	b.value = a.innerHTML;
	//password
	a = document.getElementById("password_"+id);
	b = document.getElementById("password_u");
	b.value = a.innerHTML;
	//first_name
	a = document.getElementById("first_name_"+id);
	b = document.getElementById("first_name_u");
	b.value = a.innerHTML;
	//last_name
	a = document.getElementById("last_name_"+id);
	b = document.getElementById("last_name_u");
	b.value = a.innerHTML;
	//address
	a = document.getElementById("address_"+id);
	b = document.getElementById("address_u");
	b.value = a.innerHTML;
	//city
	a = document.getElementById("city_"+id);
	b = document.getElementById("city_u");
	b.value = a.innerHTML;
	//state
	a = document.getElementById("state_"+id);
	b = document.getElementById("state_u");
	b.value = a.innerHTML;
	//zip_code
	a = document.getElementById("zip_code_"+id);
	b = document.getElementById("zip_code_u");
	b.value = a.innerHTML;
	//email
	a = document.getElementById("email_"+id);
	b = document.getElementById("email_u");
	b.value = a.innerHTML;

    // enable Update button now
    var updateButton = document.getElementById('submit');
    updateButton.disabled = false;
    //updateButton.className = "btn btn-primary active";

}
