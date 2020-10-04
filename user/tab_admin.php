
<script language="JavaScript" type="text/javascript">
              function tambah()
              {
                  var jumlah = prompt ('Masukan Jumlah Data : ',''); 
                  window.location.href = 'add_question.php?n='+jumlah;
              }
              </script>
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li class="current"><a href="result.php"><i class="glyphicon glyphicon-backward"></i> View Result</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-user"></i> Student
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="user.php">Manage Student</a></li>
                            <li><a href="add_user.php">Add Student</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-user"></i> Teacher
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="teacher.php">Manage Teacher</a></li>
                            <li><a href="add_user.php">Add Teacher</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-link"></i> Link
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="../index.html">Home Page</a></li>
                            <!-- <li><a href="signup.html">Logout</a></li> -->
                        </ul>
                    </li>
                </ul>
             </div>
