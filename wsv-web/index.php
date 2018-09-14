<!doctype html>
<html lang="en">
<head>
	<title>Macro AR Cloud</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- Material Dashboard CSS -->
	<link rel="stylesheet" href="assets/css/material-dashboard.min.css?v=2.0.2">

	<!-- Datatables -->
	<link rel="stylesheet" type="text/css" href="css/datatables.css"/>
	<link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap4.css"/>

	<!-- User Defined CSS -->
	<link rel="stylesheet" href="css/user.css">

</head>
<body>


	<!-- End Google Tag Manager (noscript) -->
	<div class="wrapper">
		<div class="sidebar" data-color="azure" data-background-color="white" data-image="assets/img/sidebar-1.png"> <!-- TODO: It is HTML Error here, fix when have time-->
			<div class="logo">
				<a href="#" class="simple-text logo-mini">
					<img src="img/MacroAd-Brand-Horizon-Dark-Bg-1x.png">
				</a>

				<a href="#" class="simple-text logo-normal">
					Macro AR Backend
				</a>
			</div>
			<div class="sidebar-wrapper">
				<ul class="nav">
					<li class="nav-item active  ">
						<a class="nav-link" href="./dashboard.html">
							<i class="material-icons">dashboard</i>
							<p>Vuforia Web Services</p>
						</a>
					</li>
					<li class="nav-item ">
						<a class="nav-link" href="./user.html">
							<i class="material-icons">person</i>
							<p>User Profile</p>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="main-panel">
			<!-- Navbar -->
			<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
				<div class="container-fluid">
					<div class="navbar-wrapper">
						<a class="navbar-brand" href="#">Vuforia Web Services</a>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
						<span class="navbar-toggler-icon icon-bar"></span>
					</button>
				</div>
			</nav>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header card-header-primary">
									<h4 class="card-title">Manage Existing Target</h4>
									<p class="card-category"> You can update and delete your marker here</p>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table" id="table-target-list">
											<thead class=" text-primary">
												<tr><th>
													ID
												</th>
												<th>
													Target Name
												</th>
												<th>
													Tracking Rating
												</th>
												<th>
													Reco Rating
												</th>
												<th>
													Active
												</th>
												<th>
													Options
												</th>
											</tr></thead>
											<tbody>
												<tr>
													<td>
														0
													</td>
													<td>
														<img src="assets/img/image_placeholder.jpg" class="img-small">	Dakota Rice
													</td>
													<td>
														<div class="rating"><span class="rating-3">3</span></div>
													</td>
													<td class="text-primary">
														123
													</td>
													<th>
														<div class="togglebutton">
															<label>
																<input type="checkbox" class="toggle-target-active">
																<span class="toggle"></span>
															</label>
														</div>
													</th>
													<th>
														<button type="button" class="btn btn-danger btn-delete-target" data-target-id="bingo">Delete</button>
													</th>
												</tr>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-12">
							<div class="card">
								<div class="card-header card-header-primary">
									<h4 class="card-title">Add Target</h4>
								</div>
								<div class="card-body">
									<form id="PostNewTarget" action="VuforiaWebServices/API_PostNewTarget.php" method="POST" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-5 col-sm-5">
												<div class="form-group">
													<label class="bmd-label-floating">Target Name</label>
													<input id="targetName" type="text" class="form-control" name="name">
												</div>
											</div>
											<div class="col-md-2 col-sm-5">
												<div class="form-group">
													<label class="bmd-label-floating">Lootbox ID</label>
													<input id="targetLootbox" type="text" class="form-control" name="lootbox">
												</div>
											</div>
											<div class="col-md-2 col-sm-5">
												<div class="form-group">
													<label class="bmd-label-floating">Linipoin Grant</label>
													<input id="targetLinipoin" type="text" class="form-control" name="linipoin">
												</div>
											</div>
										</div>
										<div class="row">
											<!-- For Image Upload -->
											<div class="col-md-4 col-sm-4">
												<h4 class="title">Marker</h4>
												<div class="fileinput fileinput-new text-center" data-provides="fileinput">
													<div class="fileinput-new thumbnail">
														<img src="assets/img/image_placeholder.jpg" alt="...">
													</div>
													<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
													<div>
														<span class="btn btn-rose btn-round btn-file">
															<span class="fileinput-new">Select image</span>
															<span class="fileinput-exists">Change</span>
															<input id="targetImage" type="hidden"><input type="file" name="marker">
														</span>
														<a href="#" id="targetImage_RemoveBtn" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
													</div>
													<p> .jpg or .png (max file 2mb)</p>
												</div>
											</div>
											<!-- For Video Upload -->
											<div class="col-md-4 col-sm-4">
												<h4 class="title">Video</h4>
												<div class="fileinput fileinput-new text-center" data-provides="fileinput">
													<div class="fileinput-new thumbnail">
														<img src="assets/img/image_placeholder.jpg" alt="...">
													</div>
													<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
													<div>
														<span class="btn btn-rose btn-round btn-file">
															<span class="fileinput-new">Select File</span>
															<span class="fileinput-exists">Change</span>
															<input id="targetVideo" type="hidden"><input type="file" name="video">
														</span>
														<a href="#" id="targetVideo_RemoveBtn" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
													</div>
													<p> .3gp or .mp4 (max file 2mb)</p>
													<p>  max resolution 800x1280</p>
												</div>
											</div>
											<!-- For Image Background Upload -->
											<div class="col-md-4 col-sm-4">
												<h4 class="title">Background</h4>
												<div class="fileinput fileinput-new text-center" data-provides="fileinput">
													<div class="fileinput-new thumbnail">
														<img src="assets/img/image_placeholder.jpg" alt="...">
													</div>
													<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
													<div>
														<span class="btn btn-rose btn-round btn-file">
															<span class="fileinput-new">Select Image</span>
															<span class="fileinput-exists">Change</span>
															<input id="targetVideo" type="hidden"><input type="file" name="background">
														</span>
														<a href="#" id="targetBg_RemoveBtn" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
													</div>
													<p> .jpg or .png (max file 1mb)</p>
													<p>  max resolution 800x1280</p>
												</div>
											</div>
										</div>
										<button type="submit" class="btn btn-primary pull-right">Submit</button>
										<div class="clearfix"></div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="float-left">
					</nav>
					<div class="copyright float-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script>, made with <i class="material-icons">favorite</i> by
						<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
					</div>
				</div>
			</footer>
		</div>

		<!--   Core JS Files   -->
		<script src="assets/js/core/jquery.min.js"></script>
		<script src="assets/js/core/popper.min.js"></script>
		<script src="assets/js/bootstrap-material-design.min.js"></script>
		<script src="assets/js/sweetalert2.js"></script>

		<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
		<script src="assets/js/plugins/bootstrap-notify.js"></script>

		<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
		<script src="assets/js/plugins/jasny-bootstrap.min.js"></script>

		<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
		<script src="assets/js/core/chartist.min.js"></script>

		<!-- Plugin for Scrollbar documentation here: https://github.com/utatti/perfect-scrollbar -->
		<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>

		<!-- Material Dashboard Core initialisations of plugins and Bootstrap Material Design Library -->
		<script src="assets/js/material-dashboard.min.js?v=2.0.2"></script>

		<!-- Datatables -->
		<script type="text/javascript" src="js/datatables.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap4.js"></script>

		<script>


			$( document ).on( "change", ".toggle-target-active", function() {
				// Disable first
				var thisToggleButton = $(this);
				thisToggleButton.prop("disabled", true);

				var targetId = $(this).data("target-id");
				var targetActive = $(this).prop("checked");
				console.log(targetId);

				$.ajax({
						url: "VuforiaWebServices/API_SetTargetActive.php",
						type: "POST",
						data: {targetID: targetId, targetActive: targetActive},
						dataType: "json",
						error: function(xhr, status, error){
							console.log(error);
							thisToggleButton.prop("disabled", false);
							thisToggleButton.prop("checked", !targetActive);
						},

						success: function(result, status, xhr){
							if(result.result_code == "Success")
							{
								// If success, hmm.. just be cool
							}
							else
							{
								// If fail return the switch
								thisToggleButton.prop("checked", !targetActive);
							}
							
							thisToggleButton.prop("disabled", false);
						}
					});

				
			});

			$( document ).on( "click", ".btn-delete-target", function() {
				var targetId = $(this).data("target-id");
				var rowElement = $(this).closest("tr");

				swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					showCancelButton: true,
					confirmButtonClass: 'btn btn-success',
					cancelButtonClass: 'btn btn-danger',
					confirmButtonText: 'Yes, delete it!',
					buttonsStyling: false
				}).then(function() {
					
					$.ajax({
						url: "VuforiaWebServices/API_DeleteTarget.php",
						type: "POST",
						data: {targetID: targetId},
						dataType: "json",
						beforeSend: function (xhr){
						},

						error: function(xhr, status, error){

						},

						success: function(result, status, xhr){

							if(result.result_code == "Success")
							{
								swal({
									title: 'Deleted!',
									text: 'Your target marker has been deleted.',
									type: 'success',
									confirmButtonClass: "btn btn-success",
									buttonsStyling: false
								});

								// Delete this table entry
								rowElement.remove();
							}
							else
							{
								swal({
									title: 'Error',
									text: 'There is an error in your request.',
									type: 'error',
									confirmButtonClass: "btn btn-info",
									buttonsStyling: false
								}).catch(swal.noop)
							}

						}
					});

				}).catch(swal.noop)

			});

			$("form#PostNewTarget").submit(function(e) {
				e.preventDefault();

				// Disable Submit Button for a while
				var submitButton = $(this).find(':submit');
				submitButton.prop( "disabled", true );

				var formData = new FormData($(this)[0]);

				$.ajax({
					url: $(this).attr("action"),
					type: "POST",
					data: formData,
					contentType: false,
					processData: false,
					dataType: "json",
					beforeSend: function (xhr){
					},

					error: function(xhr, status, error){
						console.log(error);
						swal({
							title: 'Invalid Request',
							text: xhr.responseText,
							type: 'error',
							confirmButtonClass: "btn btn-info",
							buttonsStyling: false
						}).catch(swal.noop)

						submitButton.prop( "disabled", false );
					},

					success: function(result, status, xhr){

						if(result.result_code == "TargetCreated")
						{

							swal({
								title: 'Added!',
								text: 'Your target marker has been added.',
								type: 'success',
								confirmButtonClass: "btn btn-success",
								buttonsStyling: false
							});

							// Refresh the target table
							loadAllMarkers();
							resetForm();
						}
						else
						{
							swal({
								title: 'Error',
								text: 'There is an error in your request.',
								type: 'error',
								confirmButtonClass: "btn btn-info",
								buttonsStyling: false
							}).catch(swal.noop)
						}

						submitButton.prop( "disabled", false );
						}
					});
			});

			function resetForm()
			{
				// Clear the form
				$("#targetName").val("");
				$("#targetLootbox").val("");
				$("#targetLinipoin").val("");
				$("#targetImage_RemoveBtn").click();
				$("#targetVideo_RemoveBtn").click();
				$("#targetBg_RemoveBtn").click();
			}

			function showNotification(title, message)
			{
				$.notify({
					icon: "3d_rotation",
					title: title,
					message: message

				},{
					type: 'success',
					timer: 4000,
					placement: {
						from: 'top',
						align: 'right'
					}
				});
			}

			function appendNewRowToTargetTable(number, targetName, targetId, trackingRating, recoRating, active)
			{
				// Construct HTML Checkbox
				var htmlActiveCheckBox = "";
				if(active)
					htmlActiveCheckBox = "checked";

				$("#table-target-list tbody").append(`<tr data-target-id="${targetId}">
			        	<td>
			        	${number+1}
			        	</td>
			        	<td>
			        	<img src="VuforiaWebServices/uploads/${targetId}/Marker" class="img-small">	${targetName}
			        	</td>
			        	<td>
			        	<div class="rating"><span class="rating-${trackingRating}">${trackingRating}</span></div>
			        	</td>
			        	<td class="text-primary">
			        	${recoRating}
			        	</td>
			        	<th>
			        	<div class="togglebutton">
			        	<label>
			        	<input type="checkbox" class="toggle-target-active" data-target-id="${targetId}" ${htmlActiveCheckBox}>
			        	<span class="toggle"></span>
			        	</label>
			        	</div>
			        	</th>
			        	<th>
			        	<button type="button" class="btn btn-danger btn-delete-target" data-target-id="${targetId}">Delete</button>
			        	</th>`);
			}

			function loadAllMarkers()
			{
				// Delete the Table first
				$("#table-target-list > tbody").empty();

				$.ajax({
					url: "VuforiaWebServices/API_GetAllTargets.php",
					type: "GET",
					beforeSend: function (xhr){
					},

					error: function(xhr, status, error){
						console.log(error);
					},

					success: function(result, status, xhr){
						var json = result;
						obj = jQuery.parseJSON(json);
						console.log(obj);


						var i;
						for (i = 0; i < obj.length ; i++){
							// Expose data
							var targetName = obj[i].target_record.name;
							var targetId = obj[i].target_record.target_id;
							var trackingRating = obj[i].target_record.tracking_rating;
							var recoRating = (obj[i].target_record.reco_rating = "" ? "0" : obj[i].target_record.reco_rating);
							var activeFlag = obj[i].target_record.active_flag;
							appendNewRowToTargetTable(i, targetName, targetId, trackingRating, recoRating, activeFlag);
						}
					}
				});
			}

			$(document).ready(function() {

				// Get All Target Data
				loadAllMarkers();

			});
			
		</script>
	</div>
</body>
</html>