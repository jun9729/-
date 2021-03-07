<?php

    include('dbcon.php');
    include('check.php');
   
    if (is_login()){

        if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin']==1)
            header("Location: admin.php");
        else
            header("Location: mainpage.php");
    }


function validatePassword($password){
	//Begin basic testing
	if(strlen($password) < 8 || empty($password)) {
		return 0;//Returns 0 if: password is too short (<8 characters) OR doesn't exist.
	}
	if((strlen($password) > 48)) {
		return 0;//Returns 0 if: password is too long (>48 characters)
	}
	//End basic length tests
	
	//Begin more advanced testing
	
	if(preg_match('/[A-Z]/',$password) == (0 || false)){
		return 1;//Returns 1 if: password does NOT contain upper case letters
	}
	if(!preg_match('/[\d]/',$password) != (0 || false)){
		return 2;//Returns 2 if: password does NOT contain digits
	}
	if(preg_match('/[\W]/',$password) == (0 || false)){
		return 3;//Returns 3 if: password does NOT contain any special characters
	}
	return true;
}

	
        if( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit']))
	{
 
        foreach ($_POST as $key => $val)
        {
            if(preg_match('#^__autocomplete_fix_#', $key) === 1){
                $n = substr($key, 19);
                if(isset($_POST[$n])) {
                    $_POST[$val] = $_POST[$n];
            }
        }
        } 

		$username=$_POST['newusername'];
		$password=$_POST['newpassword'];
		$confirmpassword=$_POST['newconfirmpassword'];
		$userprofile=$_POST['newuserprofile'];

             //   if (!validatePassword($password)){
	//		$errMSG = "잘못된 패스워드";
          //      }

                if ($_POST['newpassword'] != $_POST['newconfirmpassword']) {
                        $errMSG = "패스워드가 일치하지 않습니다.";
                }

		if(empty($username)){
			$errMSG = "아이디을 입력하세요.";
		}
		else if(empty($password)){
			$errMSG = "패스워드를 입력하세요.";
		}
		else if(empty($userprofile)){
			$errMSG = "이름을 입력하세요.";
		} 

                try { 
                    $stmt = $con->prepare('select * from users where username=:username');
                    $stmt->bindParam(':username', $username);
                    $stmt->execute();

               } catch(PDOException $e) {
                    die("Database error: " . $e->getMessage()); 
               }

               $row = $stmt->fetch();
               if ($row){
                    $errMSG = "이미 존재하는 아이디입니다.";
               }



		if(!isset($errMSG))
		{
                   try{
			$stmt = $con->prepare('INSERT INTO users(username, password, userprofile, salt) VALUES(:username, :password, :userprofile, :salt)');
			$stmt->bindParam(':username',$username);
                        $salt = bin2hex(openssl_random_pseudo_bytes(32));
                        $encrypted_password = base64_encode(encrypt($password, $salt));
                        $stmt->bindParam(':password', $encrypted_password);
			$stmt->bindParam(':userprofile',$userprofile);		
			$stmt->bindParam(':salt',$salt);		

			if($stmt->execute())
			{
				$successMSG = "새로운 사용자를 추가했습니다.";
				header("refresh:1;index.php");
			}
			else
			{
				$errMSG = "사용자 추가 에러";
			}
                     } catch(PDOException $e) {
                        die("Database error: " . $e->getMessage()); 
                     }



		}


	}
	
// include('head.php');
?>






<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>Login Page 1 | Keenthemes</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="assets/css/pages/login/login-1.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">

				<!--begin::Content-->
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-center">
                        
                        <!--begin::Signup-->
						<div class="login-form">
                            <?php
                                if(isset($errMSG)){
                                        ?>
                                        <div class="alert alert-danger">
                                        <span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
                                        </div>
                                        <?php
                                }
                                else if(isset($successMSG)){
                                    ?>
                                    <div class="alert alert-success">
                                        <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
                                    </div>
                                    <?php
                                }
                            ?> 
							<!--begin::Form-->
							<form class="form" method="POST">
								<!--begin::Title-->
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
									<p class="text-muted font-weight-bold font-size-h4">Enter your details to create your account</p>
								</div>
								<!--end::Title-->
								<!--begin::Form group-->
								<div class="form-group">
                                            <? $r1 = rmd5(rand().mocrotime(TRUE)); ?>
                                            <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text" name="<? echo $r1; ?>" placeholder="아이디을 입력하세요." autocomplete="off" readonly onfocus="this.removeAttribute('readonly');" />
                                            <input type="hidden" name="__autocomplete_fix_<? echo $r1; ?>" value="newusername" /> 
									<!-- <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text" placeholder="Fullname" name="fullname" autocomplete="off" /> -->
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="text" name="<? echo $r4; ?>" placeholder="이름을 입력하세요" autocomplete="off" readonly 
    onfocus="this.removeAttribute('readonly');" />
            <input type="hidden" name="__autocomplete_fix_<? echo $r4; ?>" value="newuserprofile" /> 
									<!-- <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="email" placeholder="Email" name="email" autocomplete="off" /> -->
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" name="<? echo $r2; ?>"  placeholder="패스워드를 입력하세요" autocomplete="off" readonly 
                   onfocus="this.removeAttribute('readonly');" />
            <input type="hidden" name="__autocomplete_fix_<? echo $r2; ?>" value="newpassword" /> 
									<!-- <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Password" name="password" autocomplete="off" /> -->
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group">
                                <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" name="<? echo $r3; ?>"  placeholder="패스워드를 다시 한번 입력하세요" autocomplete="off" readonly 
                   onfocus="this.removeAttribute('readonly');" />
            <input type="hidden" name="__autocomplete_fix_<? echo $r3; ?>" value="newconfirmpassword" />
									<!-- <input class="form-control form-control-solid h-auto py-6 px-6 rounded-lg font-size-h6" type="password" placeholder="Confirm password" name="cpassword" autocomplete="off" /> -->
								</div>
								<!--end::Form group-->
								<!--begin::Form group-->

								<!--end::Form group-->
								<!--begin::Form group-->
								<div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
									<button type="submit" name="submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
									<button type="button" onclick="location.href='index.php'" class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
								</div>
								<!--end::Form group-->
							</form>
							<!--end::Form-->
						</div>
						<!--end::Signup-->

					</div>
					<!--end::Content body-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		
		<!--begin::Global Theme Bundle(used by all pages)-->
		<!-- <script src="assets/plugins/global/plugins.bundle.js"></script>
		<script src="assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
		<script src="assets/js/scripts.bundle.js"></script> -->
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<!-- <script src="assets/js/pages/custom/login/login-general.js"></script> -->
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>