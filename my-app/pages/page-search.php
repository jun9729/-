
<div class="container-fluid pt-3">
<div class="card card-custom">

    <div class="card-body">
        <!--begin: Search Form-->
        <!--begin::Search Form-->
        <div class="mb-7">
            <div class="row align-items-center">
                <div class="col-lg-9 col-xl-8">
                    <div class="row align-items-center">
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="input-icon">
                                <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                                <span>
                                    <i class="flaticon2-search-1 text-muted"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-0">
                            <div class="d-flex align-items-center">
                                <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                                <select class="form-control" id="kt_datatable_search_status">
                                    <option value="">All</option>
                                    <option value="1">재원생</option>
                                    <option value="2">퇴원생</option>
                                    <option value="3">예비생</option>
                                    <option value="4">졸업생</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                    <a href="#" class="btn btn-light-primary px-6 font-weight-bold">Search</a>
                </div> -->
            </div>
        </div>
        <!--end::Search Form-->
        <!--end: Search Form-->
        <!--begin: Datatable-->
        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
            <thead>
                <tr>
                    <th title="Field #1">학생이름</th>
                    <th title="Field #2">Status</th>
                    <th title="Field #3">학년</th>
                    <th title="Field #4">전화번호</th>
                    <th title="Field #5">성별</th>
                    <th title="Field #6">담임</th>
                    <th title="Field #7">상담</th>
                </tr>
            </thead>
            <tbody>
            
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


                $result = mysqli_query($con,"SELECT DISTINCT studentlist.STUDENT_CD, studentlist.FA_MOBILE, studentlist.TYPE_NAME, studentlist.STD_NAME, studentlist.MOBILE,studentlist.SCHOOL_NAME,studentlist.STD_SEX,studentlist.FAMILY_NAME,studentlist.STD_GRADE, sttc.tc FROM studentlist  LEFT JOIN sttc ON studentlist.STUDENT_CD = sttc.STUDENT_CD ");

                if($_SESSION['is_admin']==1){
                    while($row = mysqli_fetch_array($result))
                    {
                    $tcresult = mysqli_query($con,"SELECT * FROM tclist");
    

                    echo "<tr>";
                    echo "<td>" . $row['STD_NAME'] . "</td>";
                    if($row['TYPE_NAME'] =="재원생"){
                        echo "<td>1</td>";
                    }else if($row['TYPE_NAME'] =="퇴원생"){
                        echo "<td>2</td>";
                    }else if($row['TYPE_NAME'] =="예비생"){
                        echo "<td>3</td>";
                    }else if($row['TYPE_NAME'] =="졸업생"){
                        echo "<td>4</td>";
                    }
                    
                    echo "<td>" . $row['STD_GRADE'] . "</td>";
                    echo "<td>" . $row['MOBILE'] . "</td>";
                    echo "<td>" . $row['STD_SEX'] . "</td>";
                    echo '<td><form method="POST">
                    <input type="hidden" name="stc" value="'. $row['STUDENT_CD'] .'">
                    <select onchange="this.form.submit()" name="teacher">';
                    
                        
                    if ($row['tc'] == NULL or $row['tc'] == '미배정'){
                        echo '<option value="미배정" selected>미배정</option>';                     
                    }else{
                        echo '<option value="미배정">미배정</option>'; 
                    }

                    while($row2 = mysqli_fetch_array($tcresult)){
                        if ($row['tc'] == $row2['tcname']){

                            echo '<option value="'.$row2['tcname'].'" selected>'.$row2['tcname'].'</option>';               

                        }else{
                            echo '<option value="'.$row2['tcname'].'">'.$row2['tcname'].'</option>';   
                        }
                    }
                    
                    echo '</select></form></td>';
                    echo "<td><form method='post' action='?page=3'><button class='btn' name='stc' type = 'submit' value = '". $row['STUDENT_CD'] . "'>";
                    echo '<span class="svg-icon svg-icon-md">	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>	                                    </g>	                                </svg>	                            </span>';
                    echo "</button></form></td>";
                    echo "</tr>";
                    }
                }else{
                    while($row = mysqli_fetch_array($result))
                    {
                    $tcresult = mysqli_query($con,"SELECT * FROM tclist");

                    echo "<tr>";
                    echo "<td>" . $row['STD_NAME'] . "</td>";
                    if($row['TYPE_NAME'] =="재원생"){
                        echo "<td>1</td>";
                    }else if($row['TYPE_NAME'] =="퇴원생"){
                        echo "<td>2</td>";
                    }else if($row['TYPE_NAME'] =="예비생"){
                        echo "<td>3</td>";
                    }else if($row['TYPE_NAME'] =="졸업생"){
                        echo "<td>4</td>";
                    }
                    echo "<td>" . $row['STD_GRADE'] . "</td>";
                    echo "<td>" . $row['MOBILE'] . "</td>";
                    echo "<td>" . $row['STD_SEX'] . "</td>";
                    
                    
                        
                    while($row2 = mysqli_fetch_array($tcresult)){
                        if ($row['tc'] == $row2['tcname']){  
                            echo "<td>" .$row2['tcname']. "</td>";
                            break;
                        }
                    }
                    if($row['tc'] == null or $row['tc'] == "미배정"){
                        echo "<td>미배정</td>";                     
                    }
                    

                    
                    echo "<td><form method='post' action='?page=3'><button class='btn' name='stc' type = 'submit' value = '". $row['STUDENT_CD'] . "'>";
                    echo '<span class="svg-icon svg-icon-md">	                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect x="0" y="0" width="24" height="24"></rect>	                                        <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>	                                        <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>	                                    </g>	                                </svg>	                            </span>';
                    echo "</button></form></td>";
                    echo "</tr>";
                    }
                }

                mysqli_close($con);
                ?>
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
</div>
<script src="assets/js/pages/crud/ktdatatable/base/html-table.js"></script>
<!-- <script src="assets/js/pages/crud/ktdatatable/base/translation.js"></script> -->

<?php

if ( ($_SERVER['REQUEST_METHOD'] == 'POST') and isset($_POST['teacher']) and isset($_POST['stc'])){
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
    $teacher = $_POST['teacher'];

    $sql = "
    INSERT INTO sttc
      (STUDENT_CD, tc)
      VALUES(
          '{$stc}',
          '{$teacher}'
          
      )ON DUPLICATE KEY UPDATE 
      STUDENT_CD='{$stc}',
      tc='{$teacher}';
  ";

  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo '<script>alert("수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요")</script>';
    error_log(mysqli_error($conn));
  } 

  mysqli_close($conn);

  echo '
    
  <form style="display:none" name="input_form" method="POST" action="?page=search">
  <input type="submit" id="page3">
  </form>
  <script>document.getElementById("page3").click()</script>
  ';

}
?>
