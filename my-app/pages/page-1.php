
<h1>Submitted</h1>
<p>Your color is <?php echo $_POST["stc"] ?>.</p>

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

				$stc = $_POST["stc"];

                $result = mysqli_query($con,"SELECT * FROM studentlist WHERE STUDENT_CD = $stc");

                while($row = mysqli_fetch_array($result))
                {
                echo "". $row['STD_NAME'] ."";
                echo "". $row['TYPE_NAME'] ."";
                echo "". $row['STD_GRADE'] ."";
                echo "". $row['MOBILE'] ."";
                echo "". $row['STD_SEX'] ."";
                }
                

                mysqli_close($con);
?>
