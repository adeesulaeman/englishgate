             <?php
             try {
                $jumlah_data_Reading = 0;
                  $stmt1 = $db->prepare('SELECT * FROM tbl_question WHERE type = "Reading"');
                  while($row1 = $stmt1->fetch()){
                    $jumlah_data_Reading++;
                    echo $row1['type'];
                  }

                  } catch(PDOException $e) {
                    echo $e->getMessage();
                }

                try {
                $jumlah_data_Listening = 0;
                  $stmt2 = $db->prepare('SELECT * FROM tbl_question WHERE type = "Listening"');
                  $stmt2->execute(array(':type' => $type));
                  while($row2 = $stmt2->fetch()){
                    $jumlah_data_Listening++;
                  }

                  } catch(PDOException $e) {
                    echo $e->getMessage();
                }

                try {
                $jumlah_data_Grammar = 0;
                  $stmt3 = $db->prepare('SELECT * FROM tbl_question WHERE type = "Grammar"');
                  $stmt3->execute(array(':type' => $type));
                  while($row3 = $stmt3->fetch()){
                    $jumlah_data_Grammar++;
                  }

                  } catch(PDOException $e) {
                    echo $e->getMessage();
                }
             ?>

             <div class="sidebar content-box" style="display: block;">
                    <ul class="nav">

                            <li class="submenu" class="current">
                                 <a href="#">
                                    <i class="glyphicon glyphicon-tasks"></i> Reading
                                    <span class="caret pull-right"></span>
                                 </a>
                                 <!-- Sub menu -->
                                 <ul>
                                 <?php for ($i=1; $i < $jumlah_data_Reading; $i++) { ?>
                                    <li><a href="answer.php?code=READING<?php echo $i; ?>">Modul <?php echo $i; ?></a></li>
                                <?php     } 
                                ?> 
                                </ul>
                            </li>

                            <li class="submenu" class="current">
                                 <a href="#">
                                    <i class="glyphicon glyphicon-tasks"></i> Listening
                                    <span class="caret pull-right"></span>
                                 </a>
                                 <!-- Sub menu -->
                                 <ul>
                                 <?php for ($i=1; $i < $jumlah_data_Listening; $i++) { ?>
                                    <li><a href="answer.php?code=LISTENING<?php echo $i; ?>">Modul <?php echo $i; ?></a></li>
                                <?php     } 
                                ?> 
                                </ul>
                            </li>

                            <li class="submenu" class="current">
                                 <a href="#">
                                    <i class="glyphicon glyphicon-tasks"></i> Grammar
                                    <span class="caret pull-right"></span>
                                 </a>
                                 <!-- Sub menu -->
                                 <ul>
                                 <?php for ($i=1; $i < $jumlah_data_Grammar; $i++) { ?>
                                    <li><a href="answer.php?code=GRAMMAR<?php echo $i; ?>">Modul <?php echo $i; ?></a></li>
                                <?php     } 
                                ?> 
                                </ul>
                            </li>
                    </ul>
                </div>