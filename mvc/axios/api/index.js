document.getElementById('btn').addEventListener('click',makereq);

// function makereq(){
//     axios('https://jsonplaceholder.typicode.com/posts/1').then(res=>{
//         console.log(res);
//     })
// }

async function makereq(){
    const res = await axios('https://jsonplaceholder.typicode.com/posts/1')
    console.log(res);
}