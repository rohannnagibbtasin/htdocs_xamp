document.getElementById("btn").addEventListener('click',makereq);

function makereq(){
    console.log("Clicked");
    const xhr = new XMLHttpRequest();
    xhr.open("GET","data.txt");
    xhr.onreadystatechange = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                console.log(xhr);
                console.log(xhr.responseText);

            }else{
                console.log("Failed");
            }
        }
    }
    xhr.send();
}