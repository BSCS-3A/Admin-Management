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
    <script src="../assets/js/dataTables.bootstrap.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/a076d05399.js"></script>
    <script type="text/javascript">
        (function() {
            var css = document.createElement('link');
            css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css';
            css.rel = 'stylesheet';
            css.type = 'text/css';
            document.getElementsByTagName('head')[0].appendChild(css);
        })();
    </script>
    <!--additional scripts-->
    <script src="../assets/js/bootstrap-show-password.min.js"></script>
    <!--<script src="../assets/js/customized.js"></script>-->
    <link rel="stylesheet" href="../assets/css/customized.css">
    <!--<script src="../assets/js/popper.min.js"></script>-->



    <title>Add New Account</title>
</head>

<body>
    <nav>
        <!--<input id="nav-toggle" type="checkbox">-->
        <div class="logo">
            <h2>BUCEILS HS</h2>
            <h3>ONLINE VOTING SYSTEM</h3>
        </div>
        <label for="btn" class="icon"><span class="fa fa-bars"></span></label>
        <!--<input type="checkbox" id="btn">-->
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
        <h1>ADMINISTRATORS</h1>
    </div>
    <div class="container">
        <section>
            <div class="btn-toolbar">
                <button class="btn btn-button2" data-title="otp" data-toggle="modal" data-target="#otp" data-placement="top" data-toggle="modal" title="Add Account"><span class="fa fa-user-plus"></span> ADD ACCOUNT</button>
            </div>
        </section>

        <div class="row">
            <div class="col-md-12">

                <?php

                //Create connection
                $connection = mysqli_connect("localhost", "root", "");
                $db = mysqli_select_db($connection, 'buceils_db');

                $query = "SELECT * FROM admin_table";
                $query_run = mysqli_query($connection, $query);
                ?>
                <div class="table-responsive">
                    <table class="center" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                        <thead>
                            <tr>
                                <th class="text-center">NO.</th>
                                <th class="text-center">FIRST NAME</th>
                                <th class="text-center">MIDDLE NAME</th>
                                <th class="text-center">LAST NAME</th>
                                <th class="text-center">EMAIL ADDRESS</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <?php
                        if ($query_run) {
                            foreach ($query_run as $row) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $row['admin_fname']; ?></td>
                                        <td><?php echo $row['admin_mname']; ?></td>
                                        <td><?php echo $row['admin_lname']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td style="white-space: nowrap;">
                                            <button class="btn btn-primary btn-xs" data-title="Edit" name="editinfo" data-toggle="modal" data-target="#edit" data-placement="top" data-toggle="tooltip" title="Edit"><span class="glyphicon glyphicon-pencil"></span> EDIT</button>
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="fa fa-trash"></span> DELETE</button>
                                        </td>

                                    </tr>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">REGISTER</h4>
                </div>

                <form action="../php/backFun_adAccnts_v0_1.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <input class="form-control" name="admin_lname" type="text" placeholder="Surname" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="admin_fname" type="text" placeholder="Firstname" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="admin_mname" type="text" placeholder="Middle Name" required>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="username" type="email" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" data-toggle="password" placeholder="*********" onChange="onChange()" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" name="conpassword" class="form-control" data-toggle="password" placeholder="*********" onChange="onChange()" required>
                        </div>

                        <div class="container container1">
                            <label for="photo" width="100%">Upload photo</label><br />
                            <input type="file" name="my_image" id="my_image" /><br />
                            <span id="admin_newupload_errorloc" class="error"></span>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" name="saveAccount" class="btn btn-success" id="go"><span class="fa fa-check-circle"></span> Save Account</button>
                            <button type="button" class="btn btn-default" id="cancel2" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->



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
                    <button type="button" class="btn btn-warning btn-lg" id="save" style="width: 100%;"><span class="fa fa-check-circle"></span> Update Account</button>
                    <button type="button" class="btn btn-default" id="cancel" style="width:100%;" data-dismiss="modal"><span class="fa fa-times-circle"></span> Cancel</button>
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
                    <div class="alert alert-danger"><span class="fa fa-exclamation-triangle"></span> Are you sure you want to delete this account?</div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-success" id="yes"><span class="fa fa-check-circle"></span> Yes</button>
                    <button type="button" class="btn btn-default" id="no" data-dismiss="modal"><span class="fa fa-times-circle"></span> No</button>
                </div>
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
        function onChange() {
            const password = document.querySelector('input[name=password]');
            const confirm = document.querySelector('input[name=conpassword]');
            if (confirm.value === password.value) {
                confirm.setCustomValidity('');
            } else {
                confirm.setCustomValidity('Passwords do not match');
            }
        }
    </script>
</body>

</html>