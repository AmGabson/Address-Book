<?php

include('config.php');


// get the Address id
	$postId = isset($_GET['postId']) ? $_GET['postId'] : die('ERROR: Address ID not found.');

    
	//Get The Addresses
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->bindParam(":id", $postId, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch();


//Get The Cities
$stmt = $pdo->prepare("SELECT * FROM cities");
$stmt->execute();
$cities = $stmt->fetchAll();
	
?>




 
<form id="updateForm">
	<input type="hidden" name="addressId" value="<?php echo intval($postId); ?>">

	<table class='table table-hover table-responsive table-bordered'>
		
	<tr>
		<td>First Name</td>
		<td><input type='text' value="<?php if(!empty($data['firstname'])){echo $data['firstname'];}?>" name='firstname' class='form-control' required placeholder="Enter firstname"></td>
	</tr>
	   
		<tr>
			<td>Surname</td>
			<td>
			<input type='text' value="<?php if(!empty($data['surname'])){echo $data['surname'];}?>" name='surname' class='form-control' required placeholder="Enter surname"></td>
		</tr>
	   
		<tr>
			<td>Email</td>
			<td>
			<input type='email' value="<?php if(!empty($data['email'])){echo $data['email'];}?>" name='email' 
			class='form-control' required placeholder="Enter email"></td>
		</tr>
	   
		<tr>
			<td>City</td>
			<td>

			<select name='city' class='form-control' required style="height:auto!important">
			
			<?php foreach($cities as $city){?>
			
			<option  required <?php if($data['city'] == $city["cityName"]){echo "selected";}?> >
			<?php echo htmlspecialchars($city['cityName']);?>
			</option>
			
			<?php }?>


			</select>
	
			</td>
		</tr>
	   
		<tr>
			<td>Zipcode</td>
			<td>
			<input type='text' value="<?php if(!empty($data['zipcode'])){echo $data['zipcode'];}?>" name='zipcode' 
			class='form-control' required placeholder="Enter zipcode"></td>
		</tr>


		<tr>
			<td>Street</td>
			<td>
			<textarea name='street' class='form-control' required><?php if(!empty($data['street'])){echo $data['street'];}?></textarea></td>
		</tr>
	   

		
		<tr>
			<td></td>
			<td><button id="upatePost" class='btn btn-primary'>
				<span class='glyphicon glyphicon-plus'></span> Update Address
				</button>

			</td>
		</tr>

	</table>
</form>


