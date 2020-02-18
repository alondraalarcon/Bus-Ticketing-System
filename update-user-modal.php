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
                        <label class="form-control-label" style="color:#555">Username</label>
                        <input type="text" id="username" value="<?php echo $row['username'];?>" class="form-control">
                        <div id="errorusername" style="color:red;"></div>
                      </div>
                      <div class="form-group">
                        <div id='ajaxDiv' class="alert alert-success" style="display: none;"></div>
                        <label class="form-control-label" style="color:#555">Password</label>
                        <input type="password" id="password" value="<?php echo $row['username'];?>" class="form-control">
                        <div id="errorpassword" style="color:red;"></div>
                      </div>
                      <div class="form-group">
                         <label for="exampleInputUsername1">User Type</label>
                       <select class="form-control" id="usertype">
                        <option value="0">Please Select</option>
                        <option name="usertype"<?php if($row['usertype']==1){echo "selected";}?> value="1">Admin</option>
                        <option name="usertype"<?php if($row['usertype']==2){echo "selected";}?> value="2">Conductor</option>
                        <option name="usertype"<?php if($row['usertype']==3){echo "selected";}?> value="3">User</option>
                      </select>
                        <span id="errorusertype" style="color:red;"></span>
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
					
					if(wresponse=='Record updated'){
						
						window.location.href='list-user.php';
						$('#customerModal').modal('hide');
					
					}
					$("#ajaxDiv").fadeTo(200,50);
				}
			}
			
			var errorusername =document.getElementById('errorusername');
          errorusername.innerHTML = "";
          var username = document.getElementById('username').value;
          if(username==""){
            document.getElementById('username').style.border="1px solid red";
            errorusername.innerHTML = "Please fill out this field.";
            return;
          }else{
            document.getElementById('username').style.border="1px solid gray";
            errorusername.innerHTML="";
          }

          var errorpassword =document.getElementById('errorpassword');
          errorpassword.innerHTML = "";
          var password = document.getElementById('password').value;
          if(password==""){
            document.getElementById('password').style.border="1px solid red";
            errorpassword.innerHTML = "Please fill out this field.";
            return;
          }else{
            document.getElementById('password').style.border="1px solid gray";
            errorpassword.innerHTML="";
          }

          var errorusertype =document.getElementById('errorusertype');
          errorusertype.innerHTML = "";
          var usertype = document.getElementById('usertype').value;
          if(password==0){
            document.getElementById('usertype').style.border="1px solid red";
            errorusertype.innerHTML = "Please fill out this field.";
            return;
          }else{
            document.getElementById('usertype').style.border="1px solid gray";
            errorusertype.innerHTML="";
          }

          
          var queryString = "?trans=updateuser&username=" + username + "&password=" + password + "&usertype=" + usertype + "&user_id=" + idx;
          request.open("GET", "update_records.php" + queryString, true);
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