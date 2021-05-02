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
    <link rel="stylesheet" href="../assets/css/autocomplete.css">
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.js" ></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/tablesort.js"></script>
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
              ?>
              <?php
              $file = file_get_contents('../php/sig_array.json');
              $decoded = json_decode($file, true);
              $id = explode(",",$decoded);
              $id = array_filter($id);
              $in = '(' . implode(',', $id) .')';
              $query = "SELECT * FROM admin_table WHERE admin_id IN". $in;
              $query_run = mysqli_query($connection, $query);
              error_reporting(E_ERROR | E_PARSE);
              ?>

      <table class= "table-sortable" id="datatable" width="100%" cellspacing="0" cellpadding="2px">
                          <thead>
                              <tr>
                                <th class="text-center">FIRST NAME</th>
                                <th class="text-center">LAST NAME</th>
                                <th class="text-center">POSITION</th>
                                <th class="text-center">ACTION</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php    while ($row = mysqli_fetch_array($query_run)) { #START OF FETCHING OF RECORDS FROM DATABASE  ?>

                                    <tr>
                                      <td><?php  echo $row['admin_fname'];?></td>
                                      <td><?php  echo $row['admin_lname'];?></td>
                                      <td><?php  echo $row['comelec_position'];?></td>
                                      <td>
                                        <button class="btn btn-danger btn-xs deletebtn" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="fa fa-trash"></span> DELETE</button>
                                      </td>
                                    </tr>
                                    <?php } ?>
                          </tbody>
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

<form action="../php/backFun_adSig_v1.php" method="POST" autocomplete="off">
  <?php
  $sql = "SELECT * FROM admin_table";
  $result = mysqli_query($connection,$sql);
  $data = array();
  $fname = array();
  $lname = array();
  $pos = array ();

    if(mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
      }
    }
  ?>

  <script type="text/javascript" language="javascript">
      var array1 = new Array();
      <?php foreach($data as $key){
      $fname = $key['admin_fname'];?>
      array1.push('<?php echo $fname; ?>');
      <?php } ?>

  </script>

  <script type="text/javascript" language="javascript">
      var array2 = new Array();
      <?php foreach($data as $key){
      $lname = $key['admin_lname'];?>
      array2.push('<?php echo $lname; ?>');
      <?php } ?>

  </script>

  <script type="text/javascript" language="javascript">
      var array3 = new Array();
      <?php foreach($data as $key){
      $pos = $key['comelec_position'];?>
      array3.push('<?php echo $pos; ?>');
      <?php } ?>

  </script>

      <div class="modal-body">
                <div class="autocomplete">
                    <input class="form-control form-control-lg rounded-0 border-info" type="text" placeholder="First Name" required name="sigfname" id="sigfname">
                </div>
                <br><br>

                <div class="autocomplete">
                    <input class="form-control form-control-lg rounded-0 border-info" type="text" placeholder="Last Name" required name="siglname" id="siglname">
                </div>
                <br><br>
                <div class="autocomplete">

                    <input class="form-control form-control-lg rounded-0 border-info" type="text" placeholder="Position" required name="sigpos" id="sigpos">
                </div>
                <br><br>

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

          <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                <div class="modal-dialog">
          <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
          </div>
                <div class="modal-body">
                  <form action="../php/backFun_delSig_v0_1.php" method="POST" autocomplete="off">
                  <input type="hidden" name="signatory_fname"id="signatory_fname">
                  <input type="hidden" name="signatory_lname"id="signatory_lname">
                  <input type="hidden" name="signatory_position"id="signatory_position">
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
  function autocomplete(inp, inp2, arr, arr2) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;

    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            let number = i;
                b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/

                inp.value = this.getElementsByTagName("input")[0].value;
                /*autocompletes the record*/
                inp2.value = arr2[number];
                document.getElementById("siglname").value = array2[number];
                document.getElementById("sigpos").value = array3[number];
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });

            a.appendChild(b);
          }

        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
  }

</script>

<script>
autocomplete(document.getElementById("sigfname"), document.getElementById("siglname"), array1, array2);
autocomplete(document.getElementById("siglname"), document.getElementById("sigfname"), array2, array1);
autocomplete(document.getElementById("sigpos"), document.getElementById("sigfname"), array3, array1);
</script>

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
                $('#signatory_fname').val(data[0]);
                $('#signatory_lname').val(data[1]);
                $('#signatory_position').val(data[2]);

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
