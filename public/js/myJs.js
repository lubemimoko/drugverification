// $("#myModal").modal()
function searchJS(event){
    event.preventDefault();

        let search = document.getElementById('search').value;
        if(search.length < 3){return;}
        let route = document.getElementById('route').value;
        let _token = $('[name=_token]').val();
        let form = document.getElementById("searchForm");
        let form_data = new FormData(form);
        
        // console.log(form_data)
        // console.log(search)
        
        //return
        $.ajax({
        url:'user/drugs/'+search,
        data: form_data,
        method:'POST',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success:function(res){
            // console.log(res);
            if(res.indexOf("Not Found!'") > -1){

            }else{
                var li=""
                res.forEach(data => {
                   
                   li+= `<li><a href="#" onclick="getsearch2('${data.nafdac}', '${data.drugName}')">${data.drugName} - Nafdac Code[${data.nafdac}]</a></li>`
                }) 

                myUl = document.getElementById("myUL");
                myUl.innerHTML=li
                myUl.style.display="block";

            }
            
        },
        error: function(res){
            // console.log(res.responseJSON.message);
           
        }
    });
}


function getsearch2(par1, par2){
        document.getElementById('search').value=par2;
        mainSearch(par1)
        
}

function mainSearch(par1=""){

    let search = document.getElementById('search').value;
    if(par1 ==""){par1 = search}
    let route = document.getElementById('route').value;
    let _token = $('[name=_token]').val();
    let form = document.getElementById("searchForm");
    let form_data = new FormData(form);
    
    //return
    $.ajax({
        url:'user/drugs/'+par1+'/edit',
        data: form_data,
        method:'POST',
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        processData: false,
        contentType: false,
        success:function(res){
            // console.log(res);
            if(typeof res!="object"){
                $("#name").text("No Record")
                $("#img").attr("src", "")
                $("#expiring").text("No Record")
                $("#manu").text("No Record")
                $("#nafdac").text("No Record")
                $("#created").text("No Record")
                $("#company").text("No Record")
                $("#complain").text("No Record")
                $("#status").text("No Record")
                $("#myModal").modal()
             
            }else{
                
                data = res
                // console.log(data.complainid);return;
                if(data.complain < 1) {

                    comNum = "(There Are No Complains About The Drug )"
                }else{
                    comNum = "(You have "+data.complain +" Complain(s) About The Drug )"
                }

                if(data.status ==1){

                    if(data.complain < 1){
                    status = "<span class='text-success'> Approved "+comNum+"</span>"
                    }else{
                        status = `<a title='Click to See Complains' href="user/complain/${data.complainid}" class='text-danger'> Not Approved ${comNum}</a>`
                    }
                }else{
                    if(data.complain < 1){
                        status = "<span class='text-danger'> Not Approved </span>"
                    }else{
                        status = `<a title='Click to See Complains' href="user/complain/${data.complainid}" class='text-danger'> Not Approved ${comNum}</a>`
                    }
                    

                }//alert("inside")
                // console.log(status)
                   $("#name").text("Drug Name: "+data.drugName)
                   $("#img").attr("src",  data.drugLogo  )
                   $("#expiring").text("Expiring Date: "+data.expiring_date)
                   $("#manu").text(data.manufacturing_date)
                   $("#nafdac").text("Nafdac: "+data.nafdac)
                   $("#created").text(data.created_at)
                   $("#company").text(data.name)
                   $("#complain").text("")
                   $("#status").html(status)
                   $("#myModal").modal()
                
                myUl = document.getElementById("myUL");
                // myUl.innerHTML=li
                myUl.style.display="none";

            }
            
        },
        error: function(res){
            // console.log(res.responseJSON.message);
           
        }
    });
}



function leaveFocus(){
    // myUl = document.getElementById("myUL").style.display="none";
}



