let username = document.getElementById("username");
username.addEventListener("keydown",(e)=>{
    let xhr = new XMLHttpRequest();
    let val = username.textContent;
    mydata = {user : val};
    data = JSON.stringify(mydata);
    xhr.open("POST","check.php");
    xhr.send(data);
    xhr.onload = ()=>{
        if(xhr.status == 200){
            console.log(xhr.response);
            console.log(xhr.responseText);
        }
    }
})