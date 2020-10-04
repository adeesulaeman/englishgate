<?php
//include config
require_once('../includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: ../login.php'); }
else { $userID = $_SESSION['loggedin']; }

//show message from add / edit page
if(isset($_GET['deljawab'])){ 

  $stmt = $db->prepare('DELETE FROM process WHERE id_process = :id_process') ;
  $stmt->execute(array(':id_process' => $_GET['deljawab']));

  header('Location: result.php?action=deleted');
  exit;
}

// show message from add / edit page
if(isset($_GET['id_score']) ){ 
  $stmt = $db->prepare('UPDATE process set score = :score WHERE id_process = :id_process') ;
        $stmt->execute(array(
          ':score' => $_GET['newscore'],
          ':id_process' => $_GET['id_score']
        ));

  header('Location: result.php?action=scoreEdited');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>ENGLISH GATE</title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" /> -->

     <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <!-- <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" /> -->

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <!-- <link rel="stylesheet" href="assets/css/ace-skins.min.css" /> -->
    <!-- <link rel="stylesheet" href="assets/css/ace-rtl.min.css" /> -->

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <!-- <script src="assets/js/ace-extra.min.js"></script> -->

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  <script language="JavaScript" type="text/javascript">
  function deljawab(id, username)
  {
    if (confirm("Are you sure you want to delete '" + username + "'"))
    {
      window.location.href = 'result.php?deljawab=' + id;
    }
  }
  </script>

  <script language="JavaScript" type="text/javascript">
  function editscore(id)
  {
    swal({
      title: 'Edit Score',
      input: 'text',
      showCancelButton: true,
      inputValidator: function (value) {
        return new Promise(function (resolve, reject) {
          if (value) {
            resolve()
          } else {
            reject('You need to write something!')
          }
        })
      }
    }).then(function (result) {
      swal({
        type: 'success',
        html: 'You entered: ' + result
      })
      window.location.href = 'result.php?id_score='+id+'&&newscore='+result;
    })
  }
  </script>

  <!-- Sweet Allert -->
  <!-- for IE and Android native browser support -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <script src="sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert2/sweetalert2.min.css">

  </head>
  <body>
  <?php 
  include "menu.php";
  ?>
    <div class="page-content">
      <div class="row">
      <div class="col-md-3">
      <?php
        if( $user->cek_level($userID) =='admin'){
          include "tab_admininstrator.php";
        } else if ($user->cek_level($userID) =='instruktur') {
          include "tab_admin.php";
        } else {
          include "tab_student.php";
        }
      ?>
     </div>

        <div class="col-md-8">
          <div class="content-box-large">
              <div class="panel-heading">
                <div class="panel-title">Result of Student's Answer</div>
              </div>
              <div class="panel-body">

              <table id="simple-table" class="table  table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Unit</th>
                    <th>Full Name</th>
                    <th>Class</th>
                    <th>Score</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php
                        try {
                        $no = 1;
                        $stmt = $db->prepare('SELECT * FROM process LEFT JOIN users on process.userID = users.userID ORDER BY date_process ASC');
                        $stmt->execute(array(':userID' => $userID));
                        while($row = $stmt->fetch()){
                        ?>

                        <td><?php echo $no; ?></td>
                        <td><?php echo '<p>'.$row['date_process'].'</p>'; ?></td>
                        <td><?php echo '<p>'.$row['code_question'].'</p>'; ?></td>
                        <td><?php echo '<p>'.$row['nama_lengkap'].'</p>'; ?></td>
                        <td><?php echo '<p>'.$row['class_murid'].'</p>'; ?></td>
                        <td class="center">
                          <div class="action-buttons">
                            <a href="#" class="brown bigger-120 show-details-btn" title="Show Details">
                              <?php echo '<p>'.$row['score'].'</p>'; ?>
                            <span class="sr-only">Details</span>
                            </a>
                          </div>
                        </td>
                        <td>
                          <a href="javascript:deljawab('<?php echo $row['id_process'];?>','<?php echo $row['username'];?>')">Clear</a>
                        </td>
                    </tr>
                    <tr class="detail-row">
                          <td colspan="7">
                            <div class="table-detail">
                              <div class="row">
                                <div class="col-xs-12">
                                  <div class="profile-user-info profile-user-info-striped">
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> No. 1 </div>
                                      <?php if ($row['jawaban1'] == "Correct") { ?>
                                        <div class="green profile-info-value">
                                        <span><?php echo $row['hasil1']; ?></span>
                                        </div>
                                      <?php
                                      } else { ?>
                                        <div class="red profile-info-value">
                                        <span><?php echo $row['hasil1']; ?></span>
                                        </div>
                                      <?php
                                      } ?>
                                    </div>
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> No. 2 </div>
                                      <?php if ($row['jawaban2'] == "Correct") { ?>
                                        <div class="green profile-info-value">
                                        <span><?php echo $row['hasil2']; ?></span>
                                        </div>
                                      <?php
                                      } else { ?>
                                        <div class="red profile-info-value">
                                        <span><?php echo $row['hasil2']; ?></span>
                                        </div>
                                      <?php
                                      } ?>
                                    </div>
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> No. 3 </div>
                                      <?php if ($row['jawaban3'] == "Correct") { ?>
                                        <div class="green profile-info-value">
                                        <span><?php echo $row['hasil3']; ?></span>
                                        </div>
                                      <?php
                                      } else { ?>
                                        <div class="red profile-info-value">
                                        <span><?php echo $row['hasil3']; ?></span>
                                        </div>
                                      <?php
                                      } ?>
                                    </div>
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> No. 4 </div>
                                      <?php if ($row['jawaban4'] == "Correct") { ?>
                                        <div class="green profile-info-value">
                                        <span><?php echo $row['hasil4']; ?></span>
                                        </div>
                                      <?php
                                      } else { ?>
                                        <div class="red profile-info-value">
                                        <span><?php echo $row['hasil4']; ?></span>
                                        </div>
                                      <?php
                                      } ?>
                                    </div>
                                    <div class="profile-info-row">
                                      <div class="profile-info-name"> No. 5 </div>
                                      <?php if ($row['jawaban5'] == "Correct") { ?>
                                        <div class="green profile-info-value">
                                        <span><?php echo $row['hasil5']; ?></span>
                                        </div>
                                      <?php
                                      } else { ?>
                                        <div class="red profile-info-value">
                                        <span><?php echo $row['hasil5']; ?></span>
                                        </div>
                                      <?php
                                      } ?>
                                    </div>
                                  </div>
                                  <a href="javascript:editscore('<?php echo $row['id_process'];?>')"><span>Edit Score</span></a>
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                  <?php $no++; }

                  } catch(PDOException $e) {
                      echo $e->getMessage();
                  }
                  ?>
                        
                      </tbody>
                    </table>
            </div>
          </div>
        </div>
    </div>
  </div>


      <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2017 <a href='../about.php'>English Gate</a>
            </div>
            
         </div>
      </footer>

    <!-- basic scripts -->

    <!--[if !IE]> -->
    <script src="assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>

    <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>


    <script src="assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
    <script src="assets/js/dataTables.buttons.min.js"></script>
    <script src="assets/js/buttons.flash.min.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/buttons.colVis.min.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>

    <!-- ace scripts -->
    <script src="assets/js/ace-elements.min.js"></script>
    <script src="assets/js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#dynamic-table')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable( {
          bAutoWidth: false,
          "aoColumns": [
            { "bSortable": false },
            null, null,null, null, null,
            { "bSortable": false }
          ],
          "aaSorting": [],
          
          
          //"bProcessing": true,
              //"bServerSide": true,
              //"sAjaxSource": "http://127.0.0.1/table.php" ,
      
          //,
          //"sScrollY": "200px",
          //"bPaginate": false,
      
          //"sScrollX": "100%",
          //"sScrollXInner": "120%",
          //"bScrollCollapse": true,
          //Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
          //you may want to wrap the table inside a "div.dataTables_borderWrap" element
      
          //"iDisplayLength": 50
      
      
   
          } );
      
        //And for the first simple table, which doesn't have TableTools or dataTables
        //select/deselect all rows according to table header checkbox
        var active_class = 'active';
        $('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
          var th_checked = this.checked;//checkbox inside "TH" table header
          
          $(this).closest('table').find('tbody > tr').each(function(){
            var row = this;
            if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
            else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
          });
        });
        
        //select/deselect a row when the checkbox is checked/unchecked
        $('#simple-table').on('click', 'td input[type=checkbox]' , function(){
          var $row = $(this).closest('tr');
          if($row.is('.detail-row ')) return;
          if(this.checked) $row.addClass(active_class);
          else $row.removeClass(active_class);
        });
      
        
      
        /********************************/
        //add tooltip for small view action buttons in dropdown menu
        $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
        
        //tooltip placement on right or left
        function tooltip_placement(context, source) {
          var $source = $(source);
          var $parent = $source.closest('table')
          var off1 = $parent.offset();
          var w1 = $parent.width();
      
          var off2 = $source.offset();
          //var w2 = $source.width();
      
          if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
          return 'left';
        }
        
        
        
        
        /***************/
        $('.show-details-btn').on('click', function(e) {
          e.preventDefault();
          $(this).closest('tr').next().toggleClass('open');
          $(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
        });
        /***************/
        
        
        
        
        
        /**
        //add horizontal scrollbars to a simple table
        $('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
          {
          horizontal: true,
          styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
          size: 2000,
          mouseWheelLock: true
          }
        ).css('padding-top', '12px');
        */
      
      
      })
    </script>
  </body>
</html>
