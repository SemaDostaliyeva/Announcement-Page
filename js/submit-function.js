function check(){
    
    let val = true;
    let email = document.getElementById("email").value;
    let fullname = document.getElementById("fullname").value;
    let sifre = document.getElementById("password").value;
    let sifretekrar = document.getElementById("password-confirm").value;
    let pswwarning = document.getElementById("psw-warning");
    let fillwarning = document.getElementById("fill-warning");

    if(email == "" || sifre == "" || sifretekrar == "" || fullname == ""){
        fillwarning.style.display= "block";
        pswwarning.style.display= "none";
        val = false;
    }
    if(sifre != sifretekrar && sifre!="" && sifretekrar !=""){
		pswwarning.style.display= "block"; 
        fillwarning.style.display= "none";
		val = false;
	}
    return val;
}