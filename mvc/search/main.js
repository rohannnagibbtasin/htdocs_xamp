jQuery.noConflict();

jQuery(document).ready(function($){
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
                    output += `<tr><td>${x[i].id}</td><td>${x[i].name}</td><td>${x[i].email}</td><td>${x[i].password}</td></tr>`;
                }
                $("#tbody").html(output);
            }
        })
    }
    showdata();

    $("#search").on("keyup",function(){
        let search_item = $(this).val();
        output = "";
        $.ajax({
            url:"search.php",
            type:"POST",
            dataType:"json",
            data:{search :search_item},
            success:(data)=>{
                if(data){
                    x = data;
                }else{
                    x="";
                }
                for(let i=0;i<x.length;i++){
                    output += `<tr><td>${x[i].id}</td><td>${x[i].name}</td><td>${x[i].email}</td><td>${x[i].password}</td></tr>`;
                }
                $("#tasin").html(output);
            }

        });

    });


});