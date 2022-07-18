<?php

include('config.php');



    //Get Users from Database

    $stmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $count = 1;

    
    echo "<div style='overflow:auto'>";

    if($stmt->rowCount() > 0){
       
    // start table
    echo "<table class='table table-responsive table-bordered table-striped' style='max-width:2000px; margin:auto; width:1100px;'>";
     
        // creating our table heading
        echo "<tr>
                <th>S/N</th>
                <th>Firstname</th>
                <th>Surname</th>
                <th>Email</th>
                <th>City</th>
                <th>Street</th>
                <th>Zipcode</th>
                <th class='width-20-pct'>Action</th>
            </tr>";
         
       foreach($rows as $row){
        
          
 // creating new table row per record
 echo "<tr id='row_".$row['id']."'>
        <td>".$count."</td>
        <td>".$row['firstname']."</td>
        <td>".$row['surname']."</td>
        <td>".$row['email']."</td>
        <td>".$row['city']."</td>
        <td>".$row['street']."</td>
        <td>".$row['zipcode']."</td>
        
        
    <td style='text-align:center;width:210px;'>
        <div class='btn btn-primary update margin-right-1em' id='get_".$row['id']."'>Update</div>
        <div class='btn btn-danger delete' id='del_".$row['id']."'>Delete</div>
    </td>

        </tr>";
        
        $count++;        //page Count 
        }

     
    //end table
    echo "</table>";

     
}
else{
echo "<b><h3>No records found</h3></b>";
}
 
echo "</div>";

?>
