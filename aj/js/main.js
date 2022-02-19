let tbody = document.getElementById("tbody");
function showdata(){
    tbody.innerHTML = "";
    const xhr = new XMLHttpRequest();
    xhr.open("GET","retrieve.php",true);
    xhr.responseType = "json";
    xhr.send();
    xhr.onload = ()=>{
        if(xhr.status == 200){
            if(xhr.response){
                x = xhr.response;
            }else{
                x="";
            }
            for(i=0;i<x.length;i++){
                tbody.innerHTML += `<tr><td>${x[i].id}</td><td>${x[i].name}</td><td>${x[i].email}</td><td>${x[i].password}</td><td><button class=' btn-warning btn-sm btn-edit' data-sid='${x[i].id}'>Edit</button><button class=' btn-danger btn-sm btn-delete' data-sid='${x[i].id}'>Delete</button></td></tr>`;
            }
        }else{
            console.log("Problem Occured");
        }
        student_del();
        student_edit();
    }
}




let btn = document.getElementById("btnadd");

btn.addEventListener('click',mak);

function mak(e){
    e.preventDefault();
    let stid = document.getElementById("stuid").value;
    let nm = document.getElementById("nameid").value;
    let em = document.getElementById("emailid").value;
    let pass = document.getElementById("passwordid").value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST","insert.php");

    xhr.setRequestHeader("Content-Type","application/json");

    xhr.onload = ()=>{
        if(xhr.status === 200){
            document.getElementById("msg").innerHTML = `<div class='alert alert-dark mt-3' roll='alert'>${xhr.responseText}</div>`;
            document.getElementById("myform").reset();
            showdata();
        }
        else{
            console.log("Problem Ocurred");
        }
    }
    const mydata = {id:stid,name:nm,email:em,password:pass};
    const data = JSON.stringify(mydata);
    xhr.send(data);
}

function student_del(){
    const x = document.getElementsByClassName("btn-delete");
    for(let i=0;i<x.length;i++){
        x[i].addEventListener('click',(e)=>{
            e.preventDefault();
            id = x[i].getAttribute("data-sid");
            const xhr =  new XMLHttpRequest();
            xhr.open("POST","delete.php");
            xhr.setRequestHeader("Content-Type","application/json");
            xhr.onload = ()=>{
                if(xhr.status == 200){
                    document.getElementById("msg").innerHTML = `<div class='alert alert-dark mt-3' roll='alert'>${xhr.responseText}</div>`;
                    showdata();
                    
                }else{
                    console.log("Problem Occured");
                }
            }
            const mydata = {sid: id};
            const data = JSON.stringify(mydata);
            xhr.send(data);
        });
    }
}






function student_edit(){
    const x = document.getElementsByClassName("btn-edit");
    let stid = document.getElementById("stuid");
    let nm = document.getElementById("nameid");
    let em = document.getElementById("emailid");
    let pass = document.getElementById("passwordid");
    for(let i=0;i<x.length;i++){
        x[i].addEventListener('click',(e)=>{
            e.preventDefault();
            id = x[i].getAttribute("data-sid");
            const xhr =  new XMLHttpRequest();
            xhr.open("POST","edit.php");
            xhr.responseType = "json";
            xhr.setRequestHeader("Content-Type","application/json");
            xhr.onload = ()=>{
                if(xhr.status == 200){
                    a = xhr.response;
                    stid.value = a.id;
                    nm.value = a.name;
                    em.value = a.email;
                    pass.value = a.password;
                }else{
                    console.log("Problem Occured");
                }
            }
            const mydata = {sid: id};
            const data = JSON.stringify(mydata);
            xhr.send(data);
        });
    }
}