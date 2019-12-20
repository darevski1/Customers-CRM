
function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

function validateLogin(){
    
    let email = document.getElementById('inputEmail').value;
    let password = document.getElementById('inputPassword').value;

    if(email == "" || email == null){
        alert("Vnesi email");
    }
    else if(!validateEmail(email)){
        let error = document.getElementById('errormsg').innerHTML = "Грешен Формат на емаил"
    }

    


}

function alertme(){

    alert("dssdsdsds");
}