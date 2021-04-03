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



    <title>Activity Logs</title>
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
    <section>
    <div class="header" id="myHeader">
        <h1>ACTIVITY LOGS</h1>
    </div>
    <div class="container">
       <section>
              <div class="row">
              <div class="col-md-12">
                  
      <table class= "center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                          <thead>
                              <tr> 
                                  <th class="text-center">DATE AND TIME</th>
                                  <th class="text-center">ADMIN ID</th>
                                  <th class="text-center">ACTION</th>    
                    
                              </tr>
                          </thead> 
     
                          <tbody>
                              <?php
                                  // Create connection
                                  $connection = mysqli_connect("localhost","root","");
                                  $db = mysqli_select_db($connection, 'buceils_db');

                                  $results = mysqli_query($connection, "SELECT * FROM activity_log");

                                  while($row = mysqli_fetch_array($results))
                                  {
                                      echo "<tr>";
                                          echo "<td>" . $row['activity_time_&_date'] . "</td>";
                                          echo "<td>" . $row['admin_id'] . "</td>";
                                          echo "<td>" . $row['activity_description'] . "</td>";
                                      echo "</tr>";
                                  }
                              ?>
                          </tbody>
                      </table>
          </div>
          </div>
      </div>
    </div>
  </section>
    <div class="modal fade" id="new" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
        <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title custom_align" id="Heading">Import new list?</h4>
      <div class="modal-footer ">
      <button type="button" class="btn btn-success" id="go" ><span class="glyphicon glyphicon-ok-sign"></span> Continue</button>
      <button type="button" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
    </div>
      </div>
    </div>
    <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
  </div>
    <div class="modal fade" id="otp" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title custom_align" id="Heading">Generate One Time Password for this list?</h4>
    <div class="modal-footer ">
    <button type="button" class="btn btn-success" id="go" ><span class="glyphicon glyphicon-ok-sign"></span> Continue</button>
    <button type="button" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
  </div>
    </div>
  </div>
  <!-- /.modal-content --> 
  </div>
  <!-- /.modal-dialog --> 
</div>
</section>
      <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
            <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Admin Information</h4>
                </div>
                <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Username">
                </div>
                <div class="form-group">              
                    <input class="form-control " type="text" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Confirm Password">
                </div>
                
            </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-warning btn-lg" id="save" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update Account</button>
                    
                </div>
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
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
          </div>
              <div class="modal-footer ">
              <button type="button" class="btn btn-success" id="continue" ><span class="glyphicon glyphicon-ok-sign"></span> Continue</button>
              <button type="button" class="btn btn-default" id= "cancel2" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
              </div>
          <!-- /.modal-content --> 
        </div>
            <!-- /.modal-dialog --> 
          </div>

    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

    <script>$(document).ready(function() 
     {
        $('.icon').click(function () 
        {
          $('span').toggleClass("cancel");
        } );
        $('#datatable').DataTable( 
        {
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
        } );
        $("[data-toggle=tooltip]").tooltip();
    } );
    </script>
</body>

</html>
