<?php
	session_start();
	include_once("dbconni.php");
	
	$trans = $_POST['trans'];
	
		switch ($trans) {
			
			case "updatebus":
			
				$service_id = $_POST['dtrans'];
				
				$query = mysqli_query($con,"SELECT * FROM tbl_user WHERE id_number='".$service_id."'");
				$row = mysqli_fetch_array($query);
			
					
				
			break;	
	}

?>
						<div class="form-group">
                        <div id='ajaxDiv' class="alert alert-success" style="display: none;"></div>
                       <p>Are you sure you want to delete this User?</p>
                      </div>
                     
                      <div class="form-group">       
                        <button type="button" onclick="EditSickness(<?php echo $row['id_number']?>)" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                          <i class="far fa-save" style="color:#fff"></i>
                        </span>
                        <span class="text" style="color:#fff">Save Changes</span>
                      </button>
                        <button type="button" class="btn btn-danger btn-icon-split" data-dismiss="modal">
                        <span class="icon text-white-50">
                          <i class="fas fa-ban" style="color:#fff"></i>
                        </span>
                        <span class="text" style="color:#fff">Cancel</span>
                      </button>
                        
                      </div>
<script type="text/javascript">
	
	function EditSickness(idx)
	{
		
		var request;
			try {
				request = new XMLHttpRequest();
			} catch(err) {
				try {
					request = new ActiveXObject("Msxml2.XMLHTTP");
				} catch(err) {
					try {
						request = new ActiveXObject("Microsoft.XMLHTTP");
					} catch(err) {
						alert("Your browser does not support XMLHTTP!");
						return false;
					}
				}
			}
			
			request.onreadystatechange = function(){
				if(request.readyState == 4){
					var ajaxDisplay = document.getElementById('ajaxDiv');
					ajaxDisplay.innerHTML = request.responseText.replace(/^\s+|\s+$/gm,'');
					var wresponse = request.responseText.replace(/^\s+|\s+$/gm,'');
					
					if(wresponse=='Record deleted'){
						
						window.location.href='list-user.php';
						$('#customerModal').modal('hide');
					
					}
					$("#ajaxDiv").fadeTo(200,50);
				}
			}
			
          var queryString = "?trans=deleteuser&user_id=" + idx;
          request.open("GET", "delete_records.php" + queryString, true);
          request.send(null); 
			
	}

function GetRValue1(status)
	{
		
		var rates = document.getElementsByName(status);
		var rate_value;
		for(var i = 0; i < rates.length; i++){
		if(rates[i].checked){
			rate_value = rates[i].value;
			return rate_value;
			}
		}
		
	}
	
	

</script>