<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <link rel="icon" href="../assets/img/buceils-logo.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.js" ></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <title>Signatory</title>
</head>

<body>
    <nav>
        <input id="nav-toggle" type="checkbox">
        <div class="logo">
            <h2>BUCEILS HS</h2>
            <h3>ONLINE VOTING SYSTEM</h3>
        </div>
        <label for="btn" class="icon"><span class="fa fa-bars"></span></label>
        <input type="checkbox" id="btn">
        <ul>
            <li>
                <label for="btn-1" class="show">ACCOUNTS</label>
                <a href="#">ACCOUNTS</a>
                <input type="checkbox" id="btn-1">
                <ul>
                    <li><a href="#">Students</a></li>
                    <li><a href="addAdmin.html">Admin</a></li>
                </ul>
            </li>
            <li>
                <label for="btn-2" class="show">ELECTION</label>
                <a href="#">ELECTION</a>
                <input type="checkbox" id="btn-2">
                <ul>
                    <li><a href="#">Archive</a></li>
                    <li><a href="#">Vote Status</a></li>
                    <li><a href="#">Vote Result</a>
                        <ul>
                            <li><a href="#">Make Report</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Configuration</a>
                    <ul>
                            <li><a href="#">Scheduler</a>
                                <li><a href="signatory.html">Signatory</a>
                        </ul>
                </ul>
            </li>
            <li><a href="#">CANDIDATES</a></li>
            <li>
                <label for="btn-4" class="show">LOGS</label>
                <a href="#">LOGS</a>
                <input type="checkbox" id="btn-4">
                <ul>
                    <li><a href="#">Access Log</a></li>
                    <li><a href="actLogs.html">Activity Log</a></li>

                    <li><a href="#">Vote Summary</a></li>
                </ul>
            </li>
            <li><a href="#">MESSAGES</a></li>
            <li>
                <label for="btn-5" class="show">Admin Name</label>
                <a class="user" href="#"><img class="user-profile" src="../assets/img/user.png"></a>
                <input type="checkbox" id="btn-5">
                <ul>
                    <li><a class="username" href="#">Admin Name</a></li>
                    <li class="logout">
                        <span class="fa fa-sign-out"></span><a href="#">LOGOUT</a></span>
                    </li>
                </ul>
            </li>
        </ul>
        <!--end of list-->
    </nav>

    <div class="header" id="myHeader">
        <h1>SIGNATORY DETAILS</h1>
    </div>
    <div class="container">
<section> <div class="btn-toolbar">
        <input id="file-input" type="file" name="name" style="display: none;" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
        <button class="btn btn-button3"  data-title="otp" data-toggle="modal" data-target="#otp"data-placement="top" data-toggle="tooltip" title="Add"><span class= "glyphicon glyphicon-lock"></span> ADD</button>
      </div></section>
              <div class="row">
              <div class="col-md-12">
              <?php

                //Create connection
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, 'buceils_db');

                $insert = "SELECT * FROM signatory_table";
                $query = mysqli_query($connection, $insert);
              ?>

      <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                          <thead>
                              <tr>
                                <th style="display:none;"></th>
                                <th class="text-center">NAMES</th>
                                <th class="text-center">POSITION</th>
                                <th class="text-center">ACTION</th>

                              </tr>
                          </thead>
                          <?php
                          $rollno=0;
                          if ($query) {
                              foreach ($query as $row) {
                          ?>
                          <tbody>
                              <tr>
                                <td style="display:none;"><?php echo $row['id']; ?></td>
                                <td><?php echo $row['signame']; ?></td>
                                <td><?php echo $row['sigpos']; ?></td>
                                <td style="white-space: nowrap;">
                                    <button class="btn btn-primary btn-xs editbtn" data-title="Edit" name="editinfo" data-toggle="modal" data-target="#edit" data-placement="top" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span> EDIT</button>
                                    <button class="btn btn-danger btn-xs deletebtn" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="fa fa-trash"></span> DELETE</button>
                                </td>
                          </tbody>
                          <?php
                              }
                          } else {
                              echo "No Record Found";
                          }
                          ?>
                      </table>
          </div>
          </div>
      </div>
    </div>





    <div class="modal fade" id="otp" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

          <h4 class="modal-title custom_align" id="Heading">Add an entry</h4>
      </div>

<form action="../php/backFun_adSig_v0_1.php" method="POST">
      <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Name" required name="signame" id="signame">
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Position" required name="sigpos" id="sigpos">
                </div>


            </div>




    <div class="modal-footer ">
    <button type="submit" class="btn btn-success" id="go" ><span class="glyphicon glyphicon-ok-sign" name="saveSignatory"></span> ADD</button>
    <button type="button" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> CANCEL</button>

  </div>
  </form>
    </div>
  </div>
  <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


      <form action="../php/backFun_editSig_v0_1.php" method="POST">
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Signatory Information</h4>
                </div>
                <input type="hidden" name="update_id" id="update_id">
                <div class="modal-body">
                <div class="form-group">
                    <input class="form-control" name="signame"type="text" placeholder="Full Name" required>
                </div>
                <div class="form-group">
                    <input class="form-control" name="sigpos" type="text" placeholder="Position" required>
                </div>

            </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-warning btn-lg" id="save" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update Account</button>

                </div>
            </form>
            </div>
          <!-- /.modal-content -->
        </div>
            <!-- /.modal-dialog -->
          </div>

          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
          </div>
                <div class="modal-body">
                  <form action="../php/backFun_delSig_v0_1.php" method="POST">
                  <input type="hidden" name="Delete_ID"id="Delete_ID">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this signatory?</div>
              <div class="modal-footer ">
              <button type="submit" class="btn btn-success" name="yes"id="continue"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
              <button type="button" class="btn btn-default" id= "no" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
            </div>
            </div>
          </form>
              </div>
          <!-- /.modal-content -->
        </div>
            <!-- /.modal-dialog -->
          </div>





    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>
    <script>
        $('.icon').click(function() {
            $('span').toggleClass("cancel");
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable({
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ]
            });
            $("[data-toggle=tooltip]").tooltip();
        });
    </script>

    <script>
        $('#otp').on('hidden.bs.modal', function(e) {
            $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
        })
    </script>
    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#Delete_ID').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
            });
        });
    </script>
    <script>
        $('.icon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>
</body>

</html>
