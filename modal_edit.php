<?php
   include 'insrt/conn.php';
   
   $modal_id=$_GET['id'];
	$sql = "SELECT * FROM connector where id = '$modal_id'";
	
	$result = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($result))
		{
?>

<div class="modal-dialog">
    <div class="modal-content">

		<div class="modal-header">
        <h5 class="modal-title">Edit the record of a member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
        	<form id="form-update" action="edit_view.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Usernames</label>
                    <input type="hidden" name="modal_id" id="edit-id"  class="form-control" value="<?php echo $row['id']; ?>">
     				<input type="text" name="username" id="edit-username" class="form-control" value="<?php echo $row['username_']; ?>" />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Description">Sponsor</label>
					<input type="text" name="sponsor" id="edit-sponsor" class="form-control" value="<?php echo $row['user_sponsor']; ?>" disabled/>
                </div>
                
                <div class="form-group">
                    <label for="Description">Investment</label>
                    <div class="input-group">
                    	
    					<input type="text" name="investment" id="edit-sponsor" class="form-control" value="<?php echo $row['initial_invest']; ?>"/>
    					<div class="input-group-addon">
                            <i class="fa fa-usd"></i>
                        </div>
                    </div>
                </div>
                
                
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Description">Wallet</label>
					<input type="text" name="wallet" id="edit-sponsor" class="form-control" value="<?php echo $row['user_stock']; ?>"/>
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Description">Profit</label>
					<input type="text" name="profit" id="edit-sponsor" class="form-control" value="<?php echo $row['user_incentive']; ?>"/>
                </div>
                

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Date">User Status</label>       
					<select name="status" id="edit-sponsor"  class="form-control">
						<option value="Up">UP</option>
						<option value="Down" >DOWN</option>
						<option value="Admin" >Admin</option>
					</select>
                </div>

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit" name="submit">
	                    Update
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

             <?php } ?>

            </div>

           
        </div>
    </div>