const loginbtn = document.getElementById("login");
const email = document.getElementById("email");
const password = document.getElementById("password");
const login = document.getElementById("loginform");

login.addEventListener('input',()=>{
    if (email.value.length>0 && password.value.length>5){
        loginbtn.removeAttribute('disabled');
    }
    else{
        loginbtn.setAttribute('disabled','disabled');
    }
});




