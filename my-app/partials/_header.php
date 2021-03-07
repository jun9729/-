<?php
    if($_GET){
        $title = $_GET['page'] ? 'Page ' . $_GET['page'] : 'Dashboard';
    }else{
        $title = 'Dashboard';
    }
?>

<!--begin::Header-->
					<div id="kt_header" class="header header-fixed">

						<!--begin::Container-->
						<div class="container-fluid d-flex align-items-stretch justify-content-between">

                            <div class="d-flex align-items-center flex-wrap mr-1">

                                <!--begin::Page Heading-->
                                <div class="d-flex align-items-baseline flex-wrap mr-5">

                                    <!--begin::Page Title-->
                                    <h5 class="text-dark font-weight-bold my-1 mr-5">
                                        
                                    </h5>
                                        
                                    <!--end::Page Title-->
                                </div>

                            <!--end::Page Heading-->
                            </div>

							<!--begin::Topbar-->
							<div class="topbar">

								<!--begin::User-->
								<div class="dropdown">

									<!--begin::Toggle-->
									<?php
									if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin']==1){
										echo '<div class="topbar-item" data-offset="0px,0px">
										<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
											<a href = "admin.php" class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline">관리자페이지</a>
										</div>
									</div>';
									}
									?>
									
									
									<div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
										<div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2">
											<span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
											<span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"><?php echo ''.$user_profile.'' ?></span>
											<span class="symbol symbol-35 symbol-light-success">
												<span class="symbol-label font-size-h5 font-weight-bold">S</span>
											</span>
										</div>
									</div>

									<!--end::Toggle-->

									<!--begin::Dropdown-->
									<div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg p-0">

										<?php include("partials/_extras/dropdown/user.html"); ?>
									</div>

									<!--end::Dropdown-->
								</div>

								<!--end::User-->
							</div>

							<!--end::Topbar-->
						</div>

						<!--end::Container-->
					</div>

					<!--end::Header-->