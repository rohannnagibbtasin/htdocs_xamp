$(document).ready(function(){
    function showdata(){
        output ="";
        $.ajax({
            url:"retrieve.php",
            method:"GET",
            dataType:"json",
            success:function(data){
                if(data){
                    x = data;
                }else{
                    x="";
                }
                for(let i=0;i<x.length;i++){
                    output += `<tr><td>${x[i].id}</td><td>${x[i].name}</td><td>${x[i].email}</td><td>${x[i].password}</td><td><button class='edit' data-sid='${x[i].id}'>Edit</button><button class='delete' data-sid='${x[i].id}'>Delete</button></td></tr>`;
                }
                $("#tbody").html(output);
            }
        })
    }
    showdata();
    //adding data
    $("#btnadd").click(function(e){
        e.preventDefault();
        let sid = $("#stuid").val();
        let nm = $("#nameid").val();
        let em = $("#emailid").val();
        let ps = $("#passwordid").val();
        mydata = {id:sid,name:nm,email:em,password:ps};
        $.ajax({
            url:"insert.php",
            method:"POST",
            data:JSON.stringify(mydata),
            success: function(data){
                barta = "<div class='alert alert-dark mt-3' roll='alert'>"+data+"</div>";
                $("#msg").html(barta);
                showdata();
                $("#myform")[0].reset();
                
            }
        })
    })
    //delete
    $("tbody").on("click",".delete",function(){
        let id = $(this).attr("data-sid");
        mydata = {sid:id};
        $.ajax({
            url:"delete.php",
            method:"POST",
            data:JSON.stringify(mydata),
            success:(d)=>{
                if(d==1){
                    barta = "<div class='alert alert-dark mt-3' roll='alert'>Student has been deleted</div>";
                    $(this).closest("tr").fadeOut();
                }else if(d==0){
                    barta = "<div class='alert alert-dark mt-3' roll='alert'>Unable to delete</div>";
                }
                $("#msg").html(barta);
            },
        })
    });
    //edit
    $("tbody").on("click",".edit",function(){
        let id = $(this).attr("data-sid");
        mydata = {sid:id};
        $.ajax({
            url:"edit.php",
            method:"POST",
            dataType:"json",
            data:JSON.stringify(mydata),
            success:(data)=>{
                $("#stuid").val(data.id);
                $("#nameid").val(data.name);
                $("#emailid").val(data.email);
                $("#passwordid").val(data.password);
            }
        });
    });
});