window.onload=function(){
    var btn = document.getElementById("lookup");
    
    btn.addEventListener("click", (e) => {
            e.preventDefault();
            var searchQ = document.getElementById("country").value;
            var req = new XMLHttpRequest();
            var url = "world.php?country=" + searchQ;

            req.onreadystatechange = getlist;
            req.open("GET", url);
            req.send();

            function getlist(){
                if(req.readyState === XMLHttpRequest.DONE){
                    if(req.status === 200){
                        var response = req.responseText;
                        var result = document.getElementById("result");
                        result.innerHTML = response;
                    }else{
                        alert('There was a problem');
                    }
                }
            }
            });
    var btn2 = document.getElementById("lookupcities");
        btn2.addEventListener("click",(e)=>{
            e.preventDefault();
            var searchQ = document.getElementById("country").value;
            var req= new XMLHttpRequest();
            var url= "world.php?country=" + searchQ + "&context=cities" ;
            
            req.onreadystatechange= getcity;
            req.open("GET",url);
            req.send();
    
            function getcity(){
                if(req.readyState===XMLHttpRequest.DONE){
                    if(req.status===200){
                        var response= req.responseText;
                        var result=document.getElementById("result");
                        result.innerHTML=response;
                    }else{
                        alert("There was a problem with this request");
                    }
                }
            }
        });
    }