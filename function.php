<?php

include('config.php');
	
	
	
	
	
	//PROCESS CREATE ADDRESS
	
	if(isset($_POST["createForm"])){

	$firstname = htmlspecialchars(strip_tags($_POST["firstname"]));
	$surname = htmlspecialchars(strip_tags($_POST["surname"]));
	$email = htmlspecialchars(strip_tags($_POST["email"]));
	$city = htmlspecialchars(strip_tags($_POST["city"]));
	$street = htmlspecialchars(strip_tags($_POST["street"]));
	$zipcode = htmlspecialchars(strip_tags($_POST["zipcode"]));


    //INSERT
    $stmt = $pdo->prepare("INSERT INTO users (firstname, surname, email, city, street, zipcode) 
							VALUES (:firstname, :surname, :email, :city, :street, :zipcode)");
    $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
    $stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":city", $city, PDO::PARAM_STR);
    $stmt->bindParam(":street", $street, PDO::PARAM_STR);
    $stmt->bindParam(":zipcode", $zipcode, PDO::PARAM_STR);
    $stmt->execute();

	//if success
	if($stmt){ echo 1; }

}














	//UPDATE ADDRESS
	
	if(isset($_POST['addressId'])){
	
	//get the address Id 
	$addressId = intval($_POST['addressId']);

	$firstname = htmlspecialchars(strip_tags($_POST["firstname"]));
	$surname = htmlspecialchars(strip_tags($_POST["surname"]));
	$email = htmlspecialchars(strip_tags($_POST["email"]));
	$city = htmlspecialchars(strip_tags($_POST["city"]));
	$street = htmlspecialchars(strip_tags($_POST["street"]));
	$zipcode = htmlspecialchars(strip_tags($_POST["zipcode"]));

    $stmt = $pdo->prepare("UPDATE users SET firstname=(:firstname), surname=(:surname), email=(:email), 
							city=(:city), street=(:street), zipcode=(:zipcode) WHERE id=:id");
    $stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
    $stmt->bindParam(":surname", $surname, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":city", $city, PDO::PARAM_STR);
    $stmt->bindParam(":street", $street, PDO::PARAM_STR);
    $stmt->bindParam(":zipcode", $zipcode, PDO::PARAM_STR);
    $stmt->bindParam(":id", $addressId, PDO::PARAM_STR);
    $stmt->execute();

	//if success
	if($stmt){ echo 1; }

	}














		//PROCESS DELETE ADDRESS

		if(isset($_POST["delId"])){

		$delId = intval($_POST["delId"]);

		//Delete Data
		$stmt = $pdo->prepare("DELETE FROM users WHERE id=:id");
		$stmt->bindParam(":id", $delId, PDO::PARAM_INT);
		$stmt->execute();

		//if success
		if($stmt){ echo 1;}

		} 
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	//DOWNLOAD ADDRESSES AS JSON FILE

	if(isset($_POST["download"]) && $_POST["download"] == "downloadJSON"){
    
    //Get all adress
    $stmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
    $stmt->execute();
    $rows = $stmt->fetchAll();

    if($stmt->rowCount()>0){
    foreach($rows as $row){
       
    $table[] = 
            [
                "firstname" => $row['firstname'],
                "surname" => $row['surname'],
                "email" => $row['email'],
                "city" => $row['city'],
                "street" => $row['street'],
                "zipcode" => $row['zipcode'],
                "RegisteredDate" => $row['dateTime'],
        
             ];
    }

    //Convert to JSON
    $data = json_encode($table);

    //generate random name ext.
    $rand = substr(rand()."0987654321", 0, 6);

    //download file and add row id before for renaming
    if(file_put_contents("downloads/JSON/Address_List_".$rand.".json", $data))
        echo 1;
        else
        echo "Error Occured";
	}

	}










			
			
			
			
			
			
			
			
			
			
			
			
			
	//DOWNLOAD ADDRESSES AS XML FILE
	
	if(isset($_POST["download"]) && $_POST["download"] == "downloadXML" ){

    //Get all adress
    $stmt = $pdo->prepare("SELECT * FROM users ORDER BY id DESC");
    $stmt->execute();
    $rows = $stmt->fetchAll();

    if($stmt->rowCount()>0){

    foreach($rows as $row){
        
        $table[] = 

            [
                "firstname" => $row['firstname'],
                "surname" => $row['surname'],
                "email" => $row['email'],
                "city" => $row['city'],
                "street" => $row['street'],
                "zipcode" => $row['zipcode'],
                "RegisteredDate" => $row['dateTime'],
            
            ];
    }

		// array to xml function
		function array_to_xml($data, &$xml_data)
	{
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (is_numeric($key)) {
                $key = 'address';
            }
            $subnode = $xml_data->addChild($key);
            array_to_xml($value, $subnode);
        } else {
            $xml_data->addChild("$key", htmlspecialchars("$value"));
		}
		}
	}

	// creating object of SimpleXMLElement
	$xml_data = new SimpleXMLElement('<?xml version="1.0"?><Address_Book></Address_Book>');

	// function call to convert array to xml
	array_to_xml($table, $xml_data);


	//generate random name ext.
	$rand = substr(rand()."0987654321", 0, 6);

	//saving generated xml file; 
	$result = $xml_data->asXML('downloads/XML/addressBook_'.$rand.'.xml');


	if($result)
    echo 1;
    else
    echo "Error Occured";
      
	}


	}










