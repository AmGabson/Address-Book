<?php

include('config.php');

	//Get Cities
    $stmt = $pdo->prepare("SELECT * FROM cities");
    $stmt->execute();
    $cities = $stmt->fetchAll();
	
?>	
			
			
			<form id="form">
			<input type='hidden' name='createForm' value="createForm" />

			<table class='table table-hover table-responsive table-bordered'>
		
			<tr>
	            <td>First Name</td>
	            <td><input type='text' name='firstname' class='form-control' required /></td>
	        </tr>
	       
	        <tr>
	            <td>Surname</td>
	            <td><input type='text' name='surname' class='form-control' required /></td>
	        </tr>
	       
	        <tr>
	            <td>Email</td>
	            <td><input type='email' name='email' class='form-control' required /></td>
	        </tr>
	       
	        <tr>
	            <td>City</td>
	            <td>
			
			<select name='city' class='form-control' required style="height:auto!important">
			<?php foreach($cities as $city){?>
			
				<option value="<?php echo htmlspecialchars($city["cityName"]);?>">
				<?php echo htmlspecialchars($city["cityName"]);?>
				</option>
			
				<?php }?>
			</select>

			
			
			</td>
	        </tr>
	       
	        <tr>
	            <td>Zipcode</td>
	            <td><input type='text' name='zipcode' class='form-control' required /></td>
	        </tr>


			<tr>
	            <td>Street</td>
	            <td><textarea name='street' class='form-control' required></textarea></td>
	        </tr>
	    
			<tr>
				<td></td>
				<td>
					<button name="submit" type="submit" id="createPost" class='btn btn-primary'>
					<span class='glyphicon glyphicon-plus'></span> Add Address
	        		</button>

	            </td>
	        </tr>

	    </table>
</form>


