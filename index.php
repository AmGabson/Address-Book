<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/jquery.min.js"></script>


</head>


<body>
    <div class="container">
        <div class='page-header'>
            <h1 id='page-title'>Address Book</h1>
        </div>  

        <div class='margin-bottom-1em overflow-hidden'>
            <div id='read-products' class='btn btn-primary pull-right display-none'>
                <span class='glyphicon glyphicon-list'></span> Address Book
            </div>
         
            <div class="pull-left">
            <div id='downloadJson' class='btn btnss' style="text-transform:capitalize;">Download JSON</div>&nbsp;
            <div id='downloadXml' class='btn btnss' style="text-transform:capitalize;">Download XML</div>
            </div>

            <!--Download success message-->
            <span class="successMsg display-none" style="color:#2ecc71; margin:20px; font-size:18px;">Downloded 
            <img src="images/tick.png" width="20px"></span>


            <div id='back' class='btn btn-danger pull-right display-none'>Go Back</div>
             
            <div id='create' class='btn btn-primary pull-right'>
                <span class='glyphicon glyphicon-plus'></span> Add Address
            </div>
             
            <div id='loader'><img src='images/ajax-loader.gif' /></div>
        </div> 

        <div id='page'></div>   

    </div>
      
    <script src="js/script.js"></script>





</body>
</html>