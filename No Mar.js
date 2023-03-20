hamburger = document.querySelector('.hamburger');
hamburger.onclick = function () {
    navbar = document.querySelector('.navbar');
    navbar.classList.toggle('active');
}

document.getElementById("checkout").addEventListener("submit", checkForm, false);

function checkForm(event)
{
    var checkResult = true;
    document.getElementById("card_msg").innerHTML="";
    document.getElementById("cvv_msg").innerHTML ="";

    var a = event.currentTarget.card.value;
    var b = event.currentTarget.cvv.value;

    var cardcheck = /\d{16}$/g;
    var cvvcheck = /\d{3}$/g;

    if (a==null || a =="" || cardcheck.test(a) == false)
	{
        document.getElementById("email_msg").innerHTML="Card must be 16 digits with no spaces.";
        checkResult = false;
    }

    if (b==null || b=="" || cardcheck.test(b) == false)
    {
        document.getElementById("cvv_msg").innerHTML="CVV must be 3 digits with no spaces."
        checkResult=fals
    }

    if (checkResult == false)
	{
		event.preventDefault ();
	}

}