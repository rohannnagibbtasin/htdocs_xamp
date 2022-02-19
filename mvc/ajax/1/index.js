const get = document.getElementById("get");
const post = document.getElementById("post");
const insert = document.getElementById("insert");

get.addEventListener('click',mkreq);

function mkreq(){
    const xhr = new XMLHttpRequest();
    xhr.open("GET","https://jsonplaceholder.typicode.com/posts");
    xhr.send();
    xhr.responseType = "json";
    xhr.onload = ()=>{
        if(xhr.status = 200){
            x=xhr.response;
            for(i=0;i<x.length;i++){
                insert.innerHTML += "<tr><td>"+x[i].body+"</td><td>"+x[i].id+"</td><td>"+x[i].title+"</td><td>"+x[i].userId+"</td></tr>";
            }
        }
    }
}