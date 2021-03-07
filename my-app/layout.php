<?php
if($_GET){
    $route = $_GET['page'] ? 'pages/page-' . $_GET['page'] : 'partials/_content';
} else {
    $route = 'partials/_content';
}
?>


<!--begin::Main-->

		<?php include("partials/_header-mobile.php"); ?>
		<div class="d-flex flex-column flex-root">

			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">

				<?php include("partials/_aside.php"); ?>

				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<?php include("partials/_header.php"); ?>

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">



						<?php include($route . ".php"); ?>
					</div>

					<!--end::Content-->

					
				</div>

				<!--end::Wrapper-->
			</div>

			<!--end::Page-->
		</div>

		<!--end::Main-->