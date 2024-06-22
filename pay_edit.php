<?php
   include 'insrt/conn.php';
   
   $modal_id=$_GET['id'];
	$sql = "SELECT * FROM payout where id = '$modal_id'";
	
	$result = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($result))
		{
?>

<div class="modal-dialog">
    <div class="modal-content">

		<div class="modal-header">
        <h5 class="modal-title">Pay out form)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
        	<form id="form-update" action="edit_view.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Usernames</label>
                    <input type="hidden" name="modal_id" id="edit-id"  class="form-control" value="<?php echo $row['id']; ?>"/>
     				<input type="text" name="username" id="edit-username" class="form-control" value="<?php echo $row['receiver']; ?>"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Description">Address</label>
					<input type="text" name="address" id="edit-sponsor" class="form-control" value="" disabled/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Date">Amount</label>       
     				<input type="text" name="amount"  class="form-control" value="<?php echo $row['amount']; ?>" />
                </div>
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Date">Status</label>       
                     <!-- <input type="text" name="status"  class="form-control" value="<?php echo $row['status']; ?>" /> -->
                     <select name="status" id="" class="form-control">
                         <option value="payed">PAYED</option>
                         <option value="requested">REQUESTED</option>
                     </select>
                </div>
                
	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit" name='submit'>
	                    Pay
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