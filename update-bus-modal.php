<?php
	session_start();
	include_once("dbconni.php");
	
	$trans = $_POST['trans'];
	
		switch ($trans) {
			
			case "updatebus":
			
				$service_id = $_POST['dtrans'];
				
				$query = mysqli_query($con,"SELECT * FROM tbl_bus WHERE id='".$service_id."'");
				$row = mysqli_fetch_array($query);
			
					
				
			break;	
	}

?>
						<div class="form-group">
                        <div id='ajaxDiv' class="alert alert-success" style="display: none;"></div>
                        <label class="form-control-label" style="color:#555">Bus Unit</label>
                        <input type="text" id="bus" value="<?php echo $row['bus_unit'];?>" class="form-control">
                        <div id="errorfname" style="color:red;"></div>
                      </div>
                     
                      <div class="form-group">       
                        <button type="button" onclick="EditSickness(<?php echo $row['id']?>)" class="btn btn-primary btn-icon-split">
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
						
						window.location.href='list-bus.php';
						$('#customerModal').modal('hide');
					
					}
					$("#ajaxDiv").fadeTo(200,50);
				}
			}
			
			var errorfname =document.getElementById('errorfname');
          errorfname.innerHTML = "";
          var bus = document.getElementById('bus').value;
          if(bus==""){
            document.getElementById('bus').style.border="1px solid red";
            errorfname.innerHTML = "Please fill out this field.";
            return;
          }else{
            document.getElementById('bus').style.border="1px solid gray";
            errorfname.innerHTML="";
          }

          
          var queryString = "?trans=updatebus&bus=" + bus + "&bus_id=" + idx;
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