document.getElementById('btn').addEventListener('click',makereq);
// function makereq(){
//     config = {method:'POST',
//         url:'https://reqres.in/api/users',
//         headers:{'Content-Type':'appliactions/json'},
//         data:{"name":"sonam","roll":101}
//     }
//     axios(config).then(res=>{
//         console.log(res);
//     })
// }

async function makereq(){
        config = {method:'POST',
        url:'https://reqres.in/api/users',
        headers:{'Content-Type':'appliactions/json'},
        data:{"name":"sonam","roll":101}
    }
    const res = await axios(config)
    console.log(res);
}