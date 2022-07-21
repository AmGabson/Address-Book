$(document).ready(function(){

    //Load Items on page load
    $("#page").load("read.php");
    $("#loader").hide();



    //Define Page title function
    function changeTitle(pageTitle){

        //change page header title
        $("#page-title").text(pageTitle);

        //change Document Title
        document.title=pageTitle;
    }







   //ADD ADDRESS
   $("#create").click(function(){

    //show Load img
    $("#loader").show();

        //fadeOut effect first
        $("#page").fadeOut("slow", function(){

        //fadeIn, swap btn, load address form and hide loader img
        $("#page").load("create_form.php");
        
        //swap btn
        $("#create").hide();
        $("#back").show();

        $("#page").fadeIn("slow");
        $("#loader").hide();
    
    });
  
    //Page Title
    changeTitle("Add New Address");

        });
   







        //UPDATE ADDRESS
        $(document).on('click', '.update', function(){ 
        
        //show Load img
        $("#loader").show();

        //get the address id
        let getId = this.id;
        let splitId = getId.split("_");
        let id = splitId[1];


            //fadeOut page and load update form & Pass the ID to upate_form Url
            $("#page").fadeOut("slow", function(){

                $("#page").load("update_form.php?postId="+id);
        
                //swap btn
                $("#create").hide();
                $("#back").show();

                $("#page").fadeIn("slow");
                $("#loader").hide();
    
            });
        
            //Page Title
            changeTitle("Update Address");
        });









          //DELETE ADDRESS
          $(document).on('click', '.delete', function(){ 
        
            //show Load img
            $("#loader").show();
    
            //get the address id
            let getId = this.id;
            let splitId = getId.split("_");
            let delId = splitId[1];
    
    
                //fadeOut table row and Pass row ID to delete url
            $.post("function.php", {delId:delId}).done(function(data){ 
                
                if(data == 1){
                $("#row_"+delId).css({"box-shadow":"0px 0px 5px #ff4040"}).fadeOut();
                $("#loader").hide();
                }
            });
            
            });
    








     //IF CREATE FORM WAS SUBMITTED
    $(document).on('submit', '#form', function(e){
            e.preventDefault();
            
        //serialize the form input and pass to url
        $.post("function.php", $(this).serialize()).done(function(data){ 
            
            console.log(data);

        if(data == 1){
                    
            //fadeOut effect first
           $("#page").fadeOut("slow", function(){
            
            //load address book
            $("#page").load("read.php");
    
             //swap btn
            $("#create").show();
            $("#back").hide();
            $("#page").fadeIn("slow");
            $("#loader").hide();

               });
            }

            });

        });















        

     //IF UPDATE FORM WAS SUBMITTED
    $(document).on('submit', '#updateForm', function(e){
        e.preventDefault();
        
    //serialize the form input and pass to url
    $.post("function.php", $(this).serialize()).done(function(data){ 
        
        console.log(data);

    if(data == 1){
                
        //fadeOut effect first
       $("#page").fadeOut("slow", function(){
        
        //load address book
        $("#page").load("read.php");

         //swap btn
        $("#create").show();
        $("#back").hide();
        $("#page").fadeIn("slow");
        $("#loader").hide();

           });
        }

        });

    });


















   //BACK BUTTON
   $("#back").click(function(){

    //show Load img
    $("#loader").show();

    //fadeOut effect first
    $("#page").fadeOut("slow", function(){

        //fadeIn, show Create btn, load address Book and hide loader img
        $("#page").load("read.php");
        
        //swap btn
        $("#create").show();
        $("#back").hide();
        
        $("#page").fadeIn("slow");
        $("#loader").hide();
    
    });

    //Page Title
    changeTitle("Address Book");

   });
   


   

   









        //Process Download table as JSON file
        $("#downloadJson").click(function(){

            let download = "downloadJSON";
            $.post("function.php", {download:download}).done(function(data){
                    console.log(data);
                    if(data == 1){
                        $(".successMsg").fadeIn(function(){
                            setInterval(function(){
                                $(".successMsg").fadeOut("slow"); 
                            }, 1500);
                        });
                    }
            });
        });

       
       
       
       
       
       
       
       
        //Process Download table as XML file
        $("#downloadXml").click(function(){

            let download = "downloadXML";
            $.post("function.php", {download:download}).done(function(data){
                    console.log(data);
                    if(data == 1){
                        $(".successMsg").fadeIn(function(){
                            setInterval(function(){
                                $(".successMsg").fadeOut("slow"); 
                            }, 1500);
                        });
                    }
            });
        });





    });
    

