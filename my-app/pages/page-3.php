<?php
    $con=mysqli_connect("127.0.0.1","root","gm2580!!","stlist");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    mysqli_query($con, "set session character_set_connection=utf8;");

    mysqli_query($con, "set session character_set_results=utf8;");

    mysqli_query($con, "set session character_set_client=utf8;");
    if(empty($_POST["stc"])){
        header("Location: mainpage.php");
    }
    $stc = $_POST["stc"];


    $result = mysqli_query($con,"SELECT DISTINCT studentlist.STUDENT_CD, studentlist.FA_MOBILE, studentlist.TYPE_NAME, studentlist.STD_NAME, studentlist.MOBILE,studentlist.SCHOOL_NAME,studentlist.STD_SEX,studentlist.FAMILY_NAME,studentlist.STD_GRADE, sttc.tc,sttc.firstcon,sttc.lasttime FROM studentlist  LEFT JOIN sttc ON studentlist.STUDENT_CD = sttc.STUDENT_CD WHERE studentlist.STUDENT_CD = $stc");
     
    $row = mysqli_fetch_array($result);
    

    $studentname = $row['STD_NAME'];
    $studenttype = $row['TYPE_NAME'];
    $studentgrade = $row['STD_GRADE'];
    $teacher = $row['tc'];
    $phone = $row['FA_MOBILE'];
    $sex = $row['STD_SEX'];

    $firstcon = $row['firstcon'];
    $lasttime = $row['lasttime'];

    // echo "". $row['STD_NAME'] ."";
    // echo "". $row['TYPE_NAME'] ."";
    // echo "". $row['STD_GRADE'] ."";
    // echo "". $row['MOBILE'] ."";
    // echo "". $row['STD_SEX'] ."";

    $result = mysqli_query($con,"SELECT * FROM stgrade WHERE stid = $stc");

    $row = mysqli_fetch_array($result);
    $goalschool = $row['goalschool'];
    $spastschool = $row['spastschool'];
    $jpastschool = $row['jpastschool'];

    $guk11 = $row['guk11'];
    $su11 = $row['su11'];
    $en11 = $row['en11'];
    $tamone11 = $row['tamone11'];
    $tamtwo11 = $row['tamtwo11'];
    $han11 = $row['han11'];
    $je11 = $row['je11'];

    $guk69 = $row['guk69'];
    $su69 = $row['su69'];
    $en69 = $row['en69'];
    $tamone69 = $row['tamone69'];
    $tamtwo69 = $row['tamtwo69'];
    $han69 = $row['han69'];
    $je69 = $row['je69'];

    $gukmo = $row['gukmo'];
    $sumo = $row['sumo'];
    $enmo = $row['enmo'];
    $tamonemo = $row['tamonemo'];
    $tamtwomo = $row['tamtwomo'];
    $hanmo = $row['hanmo'];
    $jemo = $row['jemo'];

    $gukne = $row['gukne'];
    $sune = $row['sune'];
    $enne = $row['enne'];
    $tamonene = $row['tamonene'];
    $tamtwone = $row['tamtwone'];
    $hanne = $row['hanne'];
    $jene = $row['jene'];
    
            
?>
<link href="tagi/tagify.css" rel="stylesheet">
<script src="tagi/jQuery.tagify.min.js"></script>
<script src="tagi/tagify.js"></script>

<!--begin::Container-->
<div class="container-fluid pt-3">
    <!--begin::Education-->
    <div class="d-flex flex-row">
        <!--begin::Aside-->
        <div class="flex-row-auto offcanvas-mobile w-400px w-xl-325px" id="kt_profile_aside">
            <!--begin::Nav Panel Widget 2-->
            
            
                <div class="card card-custom gutter-b">
                    <!--begin::Body-->

                    <?php if($studentgrade == "N수"){?>

                    <div class="card-body">
                        <!--begin::Wrapper-->
                        <div class="d-flex justify-content-between flex-column pt-4 h-100">
                            
                            <form method="POST">
                            
                            <!--begin::Container-->
                            <div class="pb-5">
                                <!--begin::Header-->
                                <div class="d-flex flex-column flex-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                        <span class="symbol-label">
                                            <?php if($sex == '남') {?>
                                                <img src="assets/media/svg/avatars/007-boy-2.svg" class="h-75 align-self-end" alt="" />
                                            <?php } else{?>
                                                <img src="assets/media/svg/avatars/006-girl-3.svg" class="h-75 align-self-end" alt="" />
                                            <?php }?>
                                            
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Username-->
                                    <a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1"><?php echo "".$studentname."" ?></a>
                                    <!--end::Username-->
                                    <!--begin::Info-->
                                    <div class="font-weight-bold text-dark-50 font-size-sm pb-6"><?php echo "".$studentgrade.",".$studenttype."" ?></div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="pt-1">
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-weight-nirmal font-size-lg m-0 pb-7"></p>
                                    <!--end::Text-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                            
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">반</a>
                                            <span class="text-muted font-weight-bold">미구현</span>
                                        </div>
                                        <!--end::Text-->

                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                        
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">담임</a>
                                            <span class="text-muted font-weight-bold"><?php echo "$teacher" ?></span>
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">전화번호</a>
                                            <span class="text-muted font-weight-bold"><?php echo "$phone" ?></span>
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <div>
                                                <a style="float:left;" href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">과거 정시 지원현황</a>
                                                <div> 
                                                    <a onclick="bt_onclick3()" style="float:right;" href="#" class="btn btn-hover-light-primary btn-sm btn-icon" aria-haspopup="true" aria-expanded="false">
                                                        <i style="float:right;" class="ki ki-more-hor font-size-lg text-primary"></i>
                                                        <script>
                                                                function bt_onclick3(){
                                                                    
                                                                    
                                                                    
                                                                    // document.getElementById("concontent"+cnt).readOnly=false;
                                                                    
                                                                    // document.getElementById("cancle"+cnt).style.display="";
                                                                    var section1s = document.getElementsByClassName("gjj"); 
                                                                    
                                                                    for( var i = 0; i < section1s.length; i++ ){ 
                                                                        var section1 = section1s.item(i); 
                                                                        if(section1.readOnly == true){
                                                                            section1.readOnly = false; 
                                                                            section1.classList.remove('form-control-solid');
                                                                            document.getElementById("gjjbtn").style.display="";
                                                                        }else{
                                                                            section1.readOnly = true; 
                                                                            section1.classList.add('form-control-solid');
                                                                            document.getElementById("gjjbtn").style.display="none";
                                                                            
                                                                        }
                                                                    
                                                                    }

                                                                }
                                                        </script>
                                                    </a>
                                                </div>
                                            </div>
                                            <input type="text" name="stc" value=<?php echo $stc ?> style="display:none">
                                            <textarea class="form-control form-control-solid gjj" name="jjiwonschool" rows="5" readonly><?php echo $jpastschool ?></textarea>


                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <!--end::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                        
                                        <a style="float:left;" href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">과거 수시 지원현황</a>
                                        <textarea class="form-control form-control-solid gjj" name="sjiwonschool" rows="5" readonly><?php echo $spastschool ?></textarea>


                                            
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">작년 수능 등급</a>
                                            
                                                <div>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #1">국</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #2">수</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #3">영</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #4">탐1</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">탐2</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">한</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">제2</p>
                                                    
                                                </div>
                                                <div>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="guk11" value= "<?php echo $guk11 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="su11" value= "<?php echo $su11 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="en11" value= "<?php echo $en11 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamone11" value= "<?php echo $tamone11 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamtwo11" value= "<?php echo $tamtwo11 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="han11" value= "<?php echo $han11 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="je11" value= "<?php echo $je11 ?>" readonly>
                                                    
                                                </div>
                                                
                                                        
                                        
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">작년 6월,9월 평균등급</a>
                                            
                                                <div>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #1">국</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #2">수</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #3">영</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #4">탐1</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">탐2</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">한</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">제2</p>
                                                    
                                                </div>
                                                <div>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="guk69" value="<?php echo $guk69 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="su69" value="<?php echo $su69 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="en69" value="<?php echo $en69 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamone69" value="<?php echo $tamone69 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamtwo69" value="<?php echo $tamtwo69 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="han69" value="<?php echo $han69 ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="je69" value="<?php echo $je69 ?>" readonly>
                                                    
                                                </div>
                                                
                                                        
                                        
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--eng::Container-->
                            <!--begin::Footer-->
                            <div class="form-group d-flex flex-center" >
                                <button type="submit" name="savegrade" id = "gjjbtn" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" style="display:none;">수정</button>
                            </div>
                            <!--end::Footer-->
                            </form>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    

                    <?php }else{?>
                    <div class="card-body">
                        <!--begin::Wrapper-->
                        <div class="d-flex justify-content-between flex-column pt-4 h-100">
                            <form method="POST">
                            <!--begin::Container-->
                            <div class="pb-5">
                                <!--begin::Header-->
                                <div class="d-flex flex-column flex-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                                        <span class="symbol-label">
                                            <?php if($sex == '남') {?>
                                                <img src="assets/media/svg/avatars/007-boy-2.svg" class="h-75 align-self-end" alt="" />
                                            <?php } else{?>
                                                <img src="assets/media/svg/avatars/006-girl-3.svg" class="h-75 align-self-end" alt="" />
                                            <?php }?>
                                            
                                        </span>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Username-->
                                    <a href="#" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1"><?php echo "".$studentname."" ?></a>
                                    <!--end::Username-->
                                    <!--begin::Info-->
                                    <div class="font-weight-bold text-dark-50 font-size-sm pb-6"><?php echo "".$studentgrade.",".$studenttype."" ?></div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="pt-1">
                                    <!--begin::Text-->
                                    <p class="text-dark-75 font-weight-nirmal font-size-lg m-0 pb-7"></p>
                                    <!--end::Text-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                            
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">반</a>
                                            <span class="text-muted font-weight-bold">미구현</span>
                                        </div>
                                        <!--end::Text-->

                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                        
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">담임</a>
                                            <span class="text-muted font-weight-bold"><?php echo "$teacher" ?></span>
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">전화번호</a>
                                            <span class="text-muted font-weight-bold"><?php echo "$phone" ?></span>
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <div>
                                                <a style="float:left;" href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">목표 대학, 학과</a>
                                                <div> 
                                                    <a onclick="bt_onclick3()" style="float:right;" href="#" class="btn btn-hover-light-primary btn-sm btn-icon" aria-haspopup="true" aria-expanded="false">
                                                        <i style="float:right;" class="ki ki-more-hor font-size-lg text-primary"></i>
                                                        <script>
                                                                function bt_onclick3(){
                                                                    
                                                                    
                                                                    
                                                                    // document.getElementById("concontent"+cnt).readOnly=false;
                                                                    
                                                                    // document.getElementById("cancle"+cnt).style.display="";
                                                                    var section1s = document.getElementsByClassName("gjj"); 
                                                                    
                                                                    for( var i = 0; i < section1s.length; i++ ){ 
                                                                        var section1 = section1s.item(i); 
                                                                        if(section1.readOnly == true){
                                                                            section1.readOnly = false; 
                                                                            section1.classList.remove('form-control-solid');
                                                                            document.getElementById("gjjbtn").style.display="";
                                                                        }else{
                                                                            section1.readOnly = true; 
                                                                            section1.classList.add('form-control-solid');
                                                                            document.getElementById("gjjbtn").style.display="none";
                                                                            
                                                                        }
                                                                    
                                                                    }


                                                                    
                                                                    

                                                                }
                                                        </script>
                                                    </a>
                                                </div>
                                            </div>
                                            <input type="text" name="stc" value=<?php echo $stc ?> style="display:none">
                                            <textarea class="form-control form-control-solid gjj" name="goalschool" rows="5" readonly><?php echo $goalschool ?></textarea>

                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">모의고사 평균 등급</a>
                                            
                                                <div>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #1">국</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #2">수</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #3">영</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #4">탐1</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">탐2</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">한</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">제2</p>
                                                    
                                                </div>
                                                <div>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="gukmo" value="<?php echo $gukmo ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="sumo" value="<?php echo $sumo ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="enmo" value="<?php echo $enmo ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamonemo" value="<?php echo $tamonemo ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamtwomo" value="<?php echo $tamtwomo ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="hanmo" value="<?php echo $hanmo ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="jemo" value="<?php echo $jemo ?>" readonly>
                                                    
                                                </div>
                                                
                                                        
                                        
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                    <!--end::Item-->
                                    <div class="d-flex align-items-center pb-9">
                                    
                                        <!--begin::Text-->
                                        <div class="d-flex flex-column flex-grow-1">
                                            <a href="#" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">내신 평균 등급</a>
                                            
                                                <div>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #1">국</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #2">수</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #3">영</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #4">탐1</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">탐2</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">한</p>
                                                    <p style="width:14%;float:left;text-align:center;" title="Field #5">제2</p>
                                                    
                                                </div>
                                                <div>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="gukne" value="<?php echo $gukne ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="sune" value="<?php echo $sune ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="enne" value="<?php echo $enne ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamonene" value="<?php echo $tamonene ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="tamtwone" value="<?php echo $tamtwone ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="hanne" value="<?php echo $hanne ?>" readonly>
                                                    <input class="form-control form-control-solid p-0 m-0 gjj"style="width:14%;float:left;text-align:center;" maxlength=3 type="text" name="jene" value="<?php echo $jene ?>" readonly>
                                                    
                                                </div>
                                                
                                                        
                                        
                                        </div>
                                        <!--end::Text-->
                                
                                    </div>
                                </div>
                                <!--end::Body-->
                            </div>
                            <!--eng::Container-->
                            <!--begin::Footer-->
                            <div class="d-flex flex-center">
                                <button type="submit" name="savegrade" id = "gjjbtn" class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" style="display:none;">수정</button>
                                
                            </div>
                            <!--end::Footer-->
                            </form>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <?php }?>


                    
                    <!--end::Body-->
                </div>
            <!--end::Nav Panel Widget 2-->
            
        </div>
        
        <!--end::Aside-->
        <!--ㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡㅡ-->
        <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom gutter-bs">
                <!--Begin::Header-->
                <div class="container">
                <form method="POST">
                <div class="card-header card-header-tabs-line p-0 m-0">
                    <div class="timeline timeline-content">
                        <div class="mt-3">     
                            <div class="d-flex align-items-center justify-content-between mb-3">       
                            <input type="text" name="stc" value= <?php echo "$stc"; ?> style="display:none">            
                            <span class="text-muted">최종 수정일 : <?php echo "$lasttime"; ?></span>
                            
                            <div class="dropdown ml-2" data-toggle="tooltip" data-placement="left">
                            <input id="firstconmodify" class="btn btn-sm btn-light-primary font-weight-bold" type="submit" value="수정"" style="display:none">
                            <span onclick="bt_firstmodifycancle()" id="firstconcancle" class="btn btn-sm btn-light-primary font-weight-bold" type="submit" style="display:none">취소</span>
                                <a  onclick ="bt_firstmodify()"class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ki ki-more-hor font-size-lg text-primary"></i>
                                </a>
                            </div>
                        </div>
                            <textarea name="firstcon" class="form-control form-control-lg form-control-solid my-3" id="firstcon" rows="3" placeholder="학생 초반상담정보" readonly><?php echo "$firstcon"; ?></textarea>
                        </div>
                    </div>
                </div>
                </form>
                </div>
                <!--end::Header-->
                
                <!--Begin::Body-->
                <div class="card-body px-0">
                    <div class="tab-content pt-5">

                        <!--begin::Tab Content-->
                        <div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
                            <div class="container">
                                <form method="POST">
                                
                                
                                    <div class="input-group pb-4">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><i class="flaticon2-tag"></i></span>
                                        </div>
                                        <select class="form-control select2" id="kt_select2_3" name="conselect[]" multiple="multiple">
                                        <!-- <optgroup label=""> -->
                                        <option value="scecon" >스케쥴</option>
                                        <option value="gacon">과목</option>
                                        <option value="secon">생활</option>
                                        <option value="mocon">모의고사</option>
                                        <option value="decon">대학진로</option>
                                        <option value="sucon">수시</option>
                                        <option value="jucon">정시</option>
                                        <!-- </optgroup> -->
                                        </select>
                                    </div>
                                

                                    
                                    
                                
                                    <div class="form-group">
                                        <textarea name="consultcontent" class="form-control form-control-lg form-control-solid" id="exampleTextarea" rows="3" placeholder="Type notes"></textarea>

                                    </div>


                                    <div class="row">
                                        <div class="col">
                                            <?php
                                            echo '<button type="submit" name="stc" class="btn btn-light-primary font-weight-bold" value = '.$stc.'>저장</button>'
                                            ?>
                                        </div>
                                    </div>
                                </form>
                                <div class="separator separator-dashed my-10"></div>
                                <!--begin::Timeline-->
                                <div class="timeline timeline-3">
                                    <div class="timeline-items">
                                        <?php
                                            $result = mysqli_query($con,"SELECT * FROM stconsult WHERE stid = $stc ORDER BY `time` DESC");

                                            $count = 0;
                                            while($row = mysqli_fetch_array($result))
                                            {
                                                $count = $count + 1;
                                            // echo "". $row['STD_NAME'] ."";
                                            // echo "". $row['TYPE_NAME'] ."";
                                            // echo "". $row['STD_GRADE'] ."";
                                            // echo "". $row['MOBILE'] ."";
                                            // echo "". $row['STD_SEX'] ."";
                                            
                                            if($row['Consultant'] == $user_profile or $user_profile == 'admin'){
                                            echo '<div class="timeline-item">
                                            <div class="timeline-media">
                                                <span class="symbol-label font-size-h5 font-weight-bold">'.iconv_substr($row['Consultant'],-2,2,"utf-8").'</span>
                                            </div>
                                            <div class="timeline-content">
                                                    <div class="d-flex align-items-center justify-content-between mb-3">
                                                        <div class="mr-2">
                                                            
                                                            <span class="text-muted ml-2">'. $row['time'].'';
                                                            
                                                            if($row['scecon'] == 1)
                                                                echo '<span class="label label-light-success label-inline mx-2">스케쥴</span>';
                                                            if($row['gacon'] == 1)
                                                                echo '<span class="label label-light-warning label-inline mx-2">과목</span>';
                                                            if($row['secon'] == 1)
                                                                echo '<span class="label label-light-danger label-inline mx-2">생활</span>';
                                                            if($row['mocon'] == 1)
                                                                echo '<span class="label label-light-dark label-inline mx-2">모의고사</span>';
                                                            if($row['decon'] == 1)
                                                                echo '<span class="label label-light-primary label-inline mx-2">대학진로</span>';
                                                            if($row['sucon'] == 1)
                                                                echo '<span class="label label-light-info label-inline mx-2">수시</span>';
                                                            if($row['jucon'] == 1)
                                                                echo '<span class="label label-light-info label-inline mx-2">정시</span>';
                                                            
                                                        echo '</span></div>
                                                        <div class="dropdown ml-2" data-toggle="tooltip" data-placement="left">
                                                            <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="ki ki-more-hor font-size-lg text-primary"></i>
                                                            </a>
                                                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right">
																						<!--begin::Navigation-->
																						<ul class="navi navi-hover">
																
																							<li class="navi-separator mb-3 opacity-70"></li>
																							<li class="navi-item">
																								<a href="#" class="navi-link">
																									<span class="navi-text">
                                                                                                    
                                                                                                        <input id="time'.$count.'" type="text" name="time" value="'.$row['time'].'" style="display:none">
                                                                                                        
                                                                                                        
                                                                                                        <button class="btn label label-xl label-inline label-light-success" name="modify" onclick="bt_onclick('.$count.')">수정</button>
                                                                                                        <script>
                                                                                                            function bt_onclick(cnt){
                                                                                                                
                                                                                                               
                                                                                                                    
                                                                                                                document.getElementById("concontent"+cnt).readOnly=false;
                                                                                                                document.getElementById("modify"+cnt).style.display="";
                                                                                                                document.getElementById("cancle"+cnt).style.display="";
                                                                                                                
                                                                                                               
                                                                                                                

                                                                                                            }
                                                                                                        </script>
                                                                                                        
                                                                                               
                                                                
																									</span>
																								</a>
																							</li>
																							<li class="navi-item">
                                                                                            <span class="navi-link">
                                                                                                <span class="navi-text">

                                                                                                    <form method="POST">
                                                                                                    <input type="text" name="stc" value="'.$stc.'" style="display:none">
                                                                                                    <input type="text" name="time" value="'.$row['time'].'" style="display:none">
                                                                                                    <input type="text" name="Consultant" value="'.$row['Consultant'].'" style="display:none">
                                                                                                    <button class="btn label label-xl label-inline label-light-success" type="submit" name="delete">삭제</button>
                                                                                                    </form>
                                                                                                </span>
                                                                                            </span>
																							</li>
																							
																							<li class="navi-separator mt-3 opacity-70"></li>
																							
																						</ul>
																						<!--end::Navigation-->
																					</div>
                                                            
                                                        </div> 
                                                        
                                                    </div>
                                               
                                                    <form method="POST">
                                                    
                                                        <input type="text" name="stc" value="'.$stc.'" style="display:none">
                                                        <input type="text" name="time" value="'.$row['time'].'" style="display:none">
                                                        <input type="text" name="Consultant" value="'.$row['Consultant'].'" style="display:none">
                                                        
                                                        <textarea name="Consultantcontent" class="form-control form-control-solid tah" id="concontent'.$count.'"  readonly>'. $row['content'] .'</textarea>
                                                        <script>
                                                        function bt_onclick2(cnt){
                                                                                                                
                                                                                                               
                                                                                                                    
                                                            document.getElementById("concontent"+cnt).readOnly=true;
                                                            document.getElementById("modify"+cnt).style.display="none";
                                                            document.getElementById("cancle"+cnt).style.display="none";
                                                            
                                                           
                                                            

                                                        }
                                                        </script>
                                                        <button type="submit" id="modify'.$count.'" name="modify" class="btn label label-xl label-inline label-light-success" style="display:none">수정</button>
                                                        <button onclick="bt_onclick2('.$count.')" id="cancle'.$count.'" name="cancle" class="btn label label-xl label-inline label-light-success" style="display:none">취소</button>
                                                    
                                                    
                                                    </form>

                                                </div>
                                            </div>';
                                                }
                                                else{
                                                    echo '<div class="timeline-item">
                                                <div class="timeline-media">
                                                    <span class="symbol-label font-size-h5 font-weight-bold">'.iconv_substr($row['Consultant'],-2,2,"utf-8").'</span>
                                                </div>
                                                <div class="timeline-content">
                                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                                            <div class="mr-2">
                                                                <!-- <a href="#" class="text-dark-75 text-hover-primary font-weight-bold">New order has been placed</a> -->
                                                                <span class="text-muted ml-2">'. $row['time'] .'';
                                                                
                                                                if($row['scecon'] == 1)
                                                                echo '<span class="label label-light-success label-inline mx-2">스케쥴</span>';
                                                            if($row['gacon'] == 1)
                                                                echo '<span class="label label-light-warning label-inline mx-2">과목</span>';
                                                            if($row['secon'] == 1)
                                                                echo '<span class="label label-light-danger label-inline mx-2">생활</span>';
                                                            if($row['mocon'] == 1)
                                                                echo '<span class="label label-light-dark label-inline mx-2">모의고사</span>';
                                                            if($row['decon'] == 1)
                                                                echo '<span class="label label-light-primary label-inline mx-2">대학진로</span>';
                                                            if($row['sucon'] == 1)
                                                                echo '<span class="label label-light-info label-inline mx-2">수시</span>';
                                                            if($row['jucon'] == 1)
                                                                echo '<span class="label label-light-info label-inline mx-2">정시</span>';


                                                                echo '</span>
                                                                <!-- <span class="label label-light-success font-weight-bolder label-inline ml-2">new</span> -->
                                                            </div>
                                                            <!-- <div class="dropdown ml-2" data-toggle="tooltip" title="Quick actions" data-placement="left">
                                                                <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="ki ki-more-hor font-size-lg text-primary"></i>
                                                                </a>
                                                                
                                                            </div> -->
                                                            
                                                        </div>
                                                        <textarea name="Consultantcontent" class="form-control form-control-solid tah" id="concontent" readonly>'. $row['content'] .'</textarea>


                                                    </div>
                                                </div>';
                                                }
                                            }
                                        mysqli_close($con);

                                        ?>
                                        


                                    </div>
                                </div>
                                <!--end::Timeline-->
                            </div>
                        </div>
                        <!--end::Tab Content-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Education-->
</div>
<!--end::Container-->
<script>
// Class definition

    var KTAutosize = function () {

    // Private functions
    var demos = function () {
    // basic demo
    var demo1 = $('.tah');
    var demo3 = $('.gjj');
    var demo2 = $('#exampleTextarea');
    var demo4 = $('#firstcon');
    
    autosize(demo1);
    autosize(demo2);
    autosize(demo3);
    autosize(demo4);
    autosize.update(demo1);
    autosize.update(demo2);
    autosize.update(demo3);
    autosize.update(demo4);
    }

    return {
    // public functions
    init: function() {
    demos();
    }
    };
    }();

    jQuery(document).ready(function() {
    KTAutosize.init();
    });

    $("input, textarea").keyup(function(){



    var value = $(this).val();

    var arr_char = new Array();



    arr_char.push("'");

    arr_char.push("\"");

    arr_char.push("\\");



        

        

    for(var i=0 ; i<arr_char.length ; i++)

    {

        if(value.indexOf(arr_char[i]) != -1)

        {

            window.alert("'  \"  \\ 특수문자는 사용하실 수 없습니다.");

            value = value.substr(0, value.indexOf(arr_char[i]));



            $(this).val(value);				

        }

    }

});
</script>
<script>
    // Class definition
var KTSelect2 = function() {
 // Private functions
 var demos = function() {
  // basic
  $('#kt_select2_1').select2({
   placeholder: "Select a state"
  });

  // nested
  $('#kt_select2_2').select2({
   placeholder: "Select a state"
  });

  // multi select
  $('#kt_select2_3').select2({
   placeholder: "Select a state",
  });

  // basic
  $('#kt_select2_4').select2({
   placeholder: "Select a state",
   allowClear: true
  });

  // loading data from array
  var data = [{
   id: 0,
   text: 'Enhancement'
  }, {
   id: 1,
   text: 'Bug'
  }, {
   id: 2,
   text: 'Duplicate'
  }, {
   id: 3,
   text: 'Invalid'
  }, {
   id: 4,
   text: 'Wontfix'
  }];

  $('#kt_select2_5').select2({
   placeholder: "Select a value",
   data: data
  });

  // loading remote data

  function formatRepo(repo) {
   if (repo.loading) return repo.text;
   var markup = "<div class='select2-result-repository clearfix'>" +
    "<div class='select2-result-repository__meta'>" +
    "<div class='select2-result-repository__title'>" + repo.full_name + "</div>";
   if (repo.description) {
    markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
   }
   markup += "<div class='select2-result-repository__statistics'>" +
    "<div class='select2-result-repository__forks'><i class='fa fa-flash'></i> " + repo.forks_count + " Forks</div>" +
    "<div class='select2-result-repository__stargazers'><i class='fa fa-star'></i> " + repo.stargazers_count + " Stars</div>" +
    "<div class='select2-result-repository__watchers'><i class='fa fa-eye'></i> " + repo.watchers_count + " Watchers</div>" +
    "</div>" +
    "</div></div>";
   return markup;
  }

  function formatRepoSelection(repo) {
   return repo.full_name || repo.text;
  }

  $("#kt_select2_6").select2({
   placeholder: "Search for git repositories",
   allowClear: true,
   ajax: {
    url: "https://api.github.com/search/repositories",
    dataType: 'json',
    delay: 250,
    data: function(params) {
     return {
      q: params.term, // search term
      page: params.page
     };
    },
    processResults: function(data, params) {
     // parse the results into the format expected by Select2
     // since we are using custom formatting functions we do not need to
     // alter the remote JSON data, except to indicate that infinite
     // scrolling can be used
     params.page = params.page || 1;

     return {
      results: data.items,
      pagination: {
       more: (params.page * 30) < data.total_count
      }
     };
    },
    cache: true
   },
   escapeMarkup: function(markup) {
    return markup;
   }, // let our custom formatter work
   minimumInputLength: 1,
   templateResult: formatRepo, // omitted for brevity, see the source of this page
   templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
  });

  // custom styles

  // tagging support
  $('#kt_select2_12_1, #kt_select2_12_2, #kt_select2_12_3, #kt_select2_12_4').select2({
   placeholder: "Select an option",
  });

  // disabled mode
  $('#kt_select2_7').select2({
   placeholder: "Select an option"
  });

  // disabled results
  $('#kt_select2_8').select2({
   placeholder: "Select an option"
  });

  // limiting the number of selections
  $('#kt_select2_9').select2({
   placeholder: "Select an option",
   maximumSelectionLength: 2
  });

  // hiding the search box
  $('#kt_select2_10').select2({
   placeholder: "Select an option",
   minimumResultsForSearch: Infinity
  });

  // tagging support
  $('#kt_select2_11').select2({
   placeholder: "Add a tag",
   tags: true
  });

  // disabled results
  $('.kt-select2-general').select2({
   placeholder: "Select an option"
  });
 }

 var modalDemos = function() {
  $('#kt_select2_modal').on('shown.bs.modal', function () {
   // basic
   $('#kt_select2_1_modal').select2({
    placeholder: "Select a state"
   });

   // nested
   $('#kt_select2_2_modal').select2({
    placeholder: "Select a state"
   });

   // multi select
   $('#kt_select2_3_modal').select2({
    placeholder: "Select a state",
   });

   // basic
   $('#kt_select2_4_modal').select2({
    placeholder: "Select a state",
    allowClear: true
   });
  });
 }

 // Public functions
 return {
  init: function() {
   demos();
   modalDemos();
  }
 };
}();

// Initialization
jQuery(document).ready(function() {
 KTSelect2.init();
});
</script>

<script>

function bt_firstmodify(){
                                                                                                                                                                                                                   
    document.getElementById("firstcon").readOnly=false;
    document.getElementById("firstcon").classList.remove('form-control-solid');
    document.getElementById("firstconmodify").style.display="";
    document.getElementById("firstconcancle").style.display="";
    
}
function bt_firstmodifycancle(){
                                                                                                                                                                                                                   
    document.getElementById("firstcon").readOnly=true;
    document.getElementById("firstcon").classList.add('form-control-solid');
    document.getElementById("firstconmodify").style.display="none";
    document.getElementById("firstconcancle").style.display="none";
    
                                                                                                                                                                                                               }
</script>

<?php
if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['stc']) and isset($_POST['consultcontent']) ){



    $conn=mysqli_connect("127.0.0.1","root","gm2580!!","stlist");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($conn, "set session character_set_connection=utf8;");

    mysqli_query($conn, "set session character_set_results=utf8;");

    mysqli_query($conn, "set session character_set_client=utf8;");

    $stc = $_POST["stc"];
    $stcontent = $_POST["consultcontent"];

    if(isset($_POST['conselect'])){
        if(in_array("scecon",$_POST['conselect'])){
            $scecon = 1;
        }else{
            $scecon = 0;
        }
        if(in_array("gacon",$_POST['conselect'])){
            $gacon = 1;
        }else{
            $gacon = 0;
        }
        if(in_array("secon",$_POST['conselect'])){
            $secon = 1;
        }else{
            $secon = 0;
        }
        if(in_array("mocon",$_POST['conselect'])){
            $mocon = 1;
        }else{
            $mocon = 0;
        }
        if(in_array("decon",$_POST['conselect'])){
            $decon = 1;
        }else{
            $decon = 0;
        }
        if(in_array("sucon",$_POST['conselect'])){
            $sucon = 1;
        }else{
            $sucon = 0;
        }
        if(in_array("jucon",$_POST['conselect'])){
            $jucon = 1;
        }else{
            $jucon = 0;
        }
    }else{
        $scecon = 0;
        $gacon = 0;
        $secon = 0;
        $mocon = 0;
        $decon = 0;
        $sucon = 0;
        $jucon = 0;
    }


    $sql = "
    INSERT INTO stconsult
      (stid, stdname, content, time, Consultant, scecon, gacon, secon, mocon, decon, sucon, jucon)
      VALUES(
          '{$stc}',
          '{$studentname}',
          '{$stcontent}',
          NOW(),
          '{$user_profile}',
          '{$scecon}',
          '{$gacon}',
          '{$secon}',
          '{$mocon}',
          '{$decon}',
          '{$sucon}',
          '{$jucon}'
      )
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '<script>alert("저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요")</script>';
    error_log(mysqli_error($conn));
  } 

  mysqli_close($conn);
  
    
    echo '
    
    <form style="display:none" name="input_form" method="POST" action="?page=3">
    <input type="hidden" name="stc" value="'.$stc.'">
    <input type="submit" id="page3">
    </form>
    <script>document.getElementById("page3").click()</script>
    ';

}
if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['delete']) and isset($_POST['stc']) and isset($_POST['time']) and isset($_POST['Consultant']) ){



    $conn=mysqli_connect("127.0.0.1","root","gm2580!!","stlist");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($conn, "set session character_set_connection=utf8;");

    mysqli_query($conn, "set session character_set_results=utf8;");

    mysqli_query($conn, "set session character_set_client=utf8;");
    $stc = $_POST["stc"];
    $time = $_POST["time"];
    $Consultant = $_POST["Consultant"];

    $sql = "
    DELETE FROM stconsult
    WHERE time = '{$time}' and Consultant ='{$Consultant}';

  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '<script>alert("삭제하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요")</script>';
    error_log(mysqli_error($conn));
  } 

  mysqli_close($conn);
  echo '
    
  <form style="display:none" name="input_form" method="POST" action="?page=3">
  <input type="hidden" name="stc" value="'.$stc.'">
  <input type="submit" id="page3">
  </form>
  <script>document.getElementById("page3").click()</script>
  ';

}
if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['modify']) and isset($_POST['stc']) and isset($_POST['time']) and isset($_POST['Consultant']) and isset($_POST['Consultantcontent']) ){

    $conn=mysqli_connect("127.0.0.1","root","gm2580!!","stlist");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($conn, "set session character_set_connection=utf8;");

    mysqli_query($conn, "set session character_set_results=utf8;");

    mysqli_query($conn, "set session character_set_client=utf8;");
    $stc = $_POST["stc"];
    $time = $_POST["time"];
    $Consultant = $_POST["Consultant"];
    $content = $_POST["Consultantcontent"];

    echo 'alert('.$content.');';

    $sql = "
    UPDATE stconsult

    SET content = '{$content}'

    WHERE time = '{$time}' and Consultant ='{$Consultant}';

  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '<script>alert("수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요")</script>';
    error_log(mysqli_error($conn));
  } 

  mysqli_close($conn);

    echo '
    <form style="display:none" name="input_form" method="POST" action="?page=3">
    <input type="hidden" name="stc" value="'.$stc.'">
    <input type="submit" id="page3">
    </form>
    <script>document.getElementById("page3").click()</script>
    ';

}

if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['stc']) and isset($_POST['savegrade']) and isset($_POST['jjiwonschool'])  and isset($_POST['sjiwonschool'])){
    $conn=mysqli_connect("127.0.0.1","root","gm2580!!","stlist");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($conn, "set session character_set_connection=utf8;");

    mysqli_query($conn, "set session character_set_results=utf8;");

    mysqli_query($conn, "set session character_set_client=utf8;");

    $stc = $_POST["stc"];
    $jjiwonschool = $_POST['jjiwonschool'];
    $sjiwonschool = $_POST['sjiwonschool'];
    
    $guk11 = $_POST['guk11'];
    $su11 = $_POST['su11'];
    $en11 = $_POST['en11'];
    $tamone11 = $_POST['tamone11'];
    $tamtwo11 = $_POST['tamtwo11'];
    $han11 = $_POST['han11'];
    $je11 = $_POST['je11'];

    $guk69 = $_POST['guk69'];
    $su69 = $_POST['su69'];
    $en69 = $_POST['en69'];
    $tamone69 = $_POST['tamone69'];
    $tamtwo69 = $_POST['tamtwo69'];
    $han69 = $_POST['han69'];
    $je69 = $_POST['je69'];


    $sql = "
    INSERT INTO stgrade
      (stid, stname, jpastschool, spastschool, guk11, su11, en11, tamone11, tamtwo11, han11, je11, guk69, su69, en69, tamone69, tamtwo69, han69, je69)
      VALUES(
          '{$stc}',
          '{$studentname}',
          '{$jjiwonschool}',
          '{$sjiwonschool}',
          '{$guk11}',
          '{$su11}',
          '{$en11}',
          '{$tamone11}',
          '{$tamtwo11}',
          '{$han11}',
          '{$je11}',
          '{$guk69}',
          '{$su69}',
          '{$en69}',
          '{$tamone69}',
          '{$tamtwo69}',
          '{$han69}',
          '{$je69}'
          
      )ON DUPLICATE KEY UPDATE 
      stid='{$stc}',
      stname='{$studentname}',
      jpastschool='{$jjiwonschool}',
      spastschool='{$sjiwonschool}',
      guk11='{$guk11}',
      su11='{$su11}',
      en11='{$en11}',
      tamone11='{$tamone11}',
      tamtwo11='{$tamtwo11}',
      han11='{$han11}',
      je11='{$je11}',
      guk69='{$guk69}',
      su69='{$su69}',
      en69='{$en69}',
      tamone69='{$tamone69}',
      tamtwo69='{$tamtwo69}',
      han69='{$han69}',
      je69='{$je69}';
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '<script>alert("성적저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요")</script>';
    error_log(mysqli_error($conn));
  } 

  mysqli_close($conn);
  
    

    echo '
    
    <form style="display:none" name="input_form" method="POST" action="?page=3">
    <input type="hidden" name="stc" value="'.$stc.'">
    <input type="submit" id="page3">
    </form>
    <script>document.getElementById("page3").click()</script>
    ';

}
if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['stc']) and isset($_POST['savegrade']) and isset($_POST['goalschool'])  ){
    $conn=mysqli_connect("127.0.0.1","root","gm2580!!","stlist");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($conn, "set session character_set_connection=utf8;");

    mysqli_query($conn, "set session character_set_results=utf8;");

    mysqli_query($conn, "set session character_set_client=utf8;");

    $stc = $_POST["stc"];
    $goalschool = $_POST['goalschool'];
    
    $gukmo = $_POST['gukmo'];
    $sumo = $_POST['sumo'];
    $enmo = $_POST['enmo'];
    $tamonemo = $_POST['tamonemo'];
    $tamtwomo = $_POST['tamtwomo'];
    $hanmo = $_POST['hanmo'];
    $jemo = $_POST['jemo'];

    $gukne = $_POST['gukne'];
    $sune = $_POST['sune'];
    $enne = $_POST['enne'];
    $tamonene = $_POST['tamonene'];
    $tamtwone = $_POST['tamtwone'];
    $hanne = $_POST['hanne'];
    $jene = $_POST['jene'];


    $sql = "
    INSERT INTO stgrade
      (stid, stname, goalschool, gukmo, sumo, enmo, tamonemo, tamtwomo, hanmo, jemo, gukne, sune, enne, tamonene, tamtwone, hanne, jene)
      VALUES(
          '{$stc}',
          '{$studentname}',
          '{$goalschool}',
          '{$gukmo}',
          '{$sumo}',
          '{$enmo}',
          '{$tamonemo}',
          '{$tamtwomo}',
          '{$hanmo}',
          '{$jemo}',
          '{$gukne}',
          '{$sune}',
          '{$enne}',
          '{$tamonene}',
          '{$tamtwone}',
          '{$hanne}',
          '{$jene}'
          
      )ON DUPLICATE KEY UPDATE 
      stid='{$stc}',
      stname='{$studentname}',
      goalschool='{$goalschool}',
      gukmo='{$gukmo}',
      sumo='{$sumo}',
      enmo='{$enmo}',
      tamonemo='{$tamonemo}',
      tamtwomo='{$tamtwomo}',
      hanmo='{$hanmo}',
      jemo='{$jemo}',
      gukne='{$gukne}',
      sune='{$sune}',
      enne='{$enne}',
      tamonene='{$tamonene}',
      tamtwone='{$tamtwone}',
      hanne='{$hanne}',
      jene='{$jene}';
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '<script>alert("성적저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요")</script>';
    error_log(mysqli_error($conn));
  } 

  mysqli_close($conn);
  
    

    echo '
    
    <form style="display:none" name="input_form" method="POST" action="?page=3">
    <input type="hidden" name="stc" value="'.$stc.'">
    <input type="submit" id="page3">
    </form>
    <script>document.getElementById("page3").click()</script>
    ';

}
if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['stc']) and isset($_POST['firstcon'])){
    $conn=mysqli_connect("127.0.0.1","root","gm2580!!","stlist");

    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_query($conn, "set session character_set_connection=utf8;");

    mysqli_query($conn, "set session character_set_results=utf8;");

    mysqli_query($conn, "set session character_set_client=utf8;");

    $stc = $_POST["stc"];
    $firstcon = $_POST['firstcon'];


    $sql = "
    INSERT INTO sttc
      (STUDENT_CD, firstcon, lasttime)
      VALUES(
          '{$stc}',
          '{$firstcon}',
          NOW()
          
      )ON DUPLICATE KEY UPDATE 
      STUDENT_CD='{$stc}',
      firstcon='{$firstcon}',
      lasttime= NOW()
  ";
  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '<script>alert("수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요")</script>';
    error_log(mysqli_error($conn));
  } 

  mysqli_close($conn);
  
    

    echo '
    
    <form style="display:none" name="input_form" method="POST" action="?page=3">
    <input type="hidden" name="stc" value="'.$stc.'">
    <input type="submit" id="page3">
    </form>
    <script>document.getElementById("page3").click()</script>
    ';

}
?>