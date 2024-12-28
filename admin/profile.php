<?php
require "./inc/head.php";
require "./inc/headbar.php";
require "./inc/sidebar.php";

if (isset($_GET['admin_id']) && !empty($_GET['admin_id'])) {
	$admin_id = $_GET['admin_id'];

	$select_user = runFatch("SELECT * FROM tbl_admin WHERE id = '{$admin_id}'");
}
?>
<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Profile</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="./index.php">Home</a></li>
						<li class="breadcrumb-item active">Profile</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="profile-header">
					<div class="row align-items-center">
						<div class="col-auto profile-image">
							<a href="#">
								<?php
								$profile = @$select_user[0]['profile'];

								if ($profile) {
								?>
									<img class="rounded-circle" alt="User Image" src="../upload/<?= $profile ?>">
								<?php
								} else {
								?>
									<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
								<?php
								}
								?>
							</a>
						</div>
						<div class="col ms-md-n2 profile-user-info">
							<h4 class="user-name mb-0"><?= @$select_user[0]['name'] ?></h4>
						</div>
						<div class="col-auto profile-btn">
							<a href="./admin_update.php?user_id=<?= @$select_user[0]['id'] ?>" class="btn btn-primary">
								Edit
							</a>
						</div>
					</div>
				</div>
				<div class="profile-menu">
					<ul class="nav nav-tabs nav-tabs-solid">
						<li class="nav-item">
							<a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">About</a>
						</li>
					</ul>
				</div>
				<div class="tab-content profile-tab-cont">

					<!-- Personal Details Tab -->
					<div class="tab-pane fade show active" id="per_details_tab">

						<!-- Personal Details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title d-flex justify-content-between">
											<span>Personal Details</span>
											<a class="edit-link" href="./admin_update.php?user_id=<?= @$select_user[0]['id'] ?>"><i class="far fa-edit me-1"></i>Edit</a>
										</h5>
										<div class="row">
											<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
											<p class="col-sm-9"><?= @$select_user[0]['name'] ?></p>
										</div>
										<div class="row">
											<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
											<p class="col-sm-9"><a href="#"><?= @$select_user[0]['username'] ?></a></p>
										</div>
										<div class="row">
											<p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
											<p class="col-sm-9"><?= @$select_user[0]['phone'] ?></p>
										</div>
										<div class="row">
											<p class="col-sm-3 text-muted text-sm-end mb-0">Address</p>
											<p class="col-sm-9 mb-0"><?= @$select_user[0]['address'] ?><br>
												<?= @$select_user[0]['city'] ?><br>
												<?php
												$state_id = @$select_user[0]['state'];
												$select_state = runFatch("SELECT * FROM tbl_states WHERE id = {$state_id}");
												echo $select_state[0]['name'];
												?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Personal Details -->

					</div>
					<!-- /Personal Details Tab -->
				</div>
			</div>
		</div>

	</div>


	<?php
	require "./inc/footer.php";
	require "./inc/script.php";
	?>