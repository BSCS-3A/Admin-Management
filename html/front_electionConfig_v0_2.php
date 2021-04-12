<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../assets/img/buceils-logo.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/style2.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/electionConfig.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <script src="../assets/js/jquery-1.11.1.min.js"></script>
    <script src="../assets/js/jquery.dataTables.min.js"></script>
    <script src="../assets/js/dataTables.bootstrap.js" ></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/electionConfig.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <title>Election Configuration</title>
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
       <h1>Time Scheduler</h1>
    </div>
    <form class="isog" method="POST" action="../php/backFun_setcountdown_v0_1.php">
    <div class="leftdiv">
       <br>
        <div>
            <label for="date">Date Start:</label>

        <input type="date" id="date" name="date" value="yyyy-mm-dd" placeholder="" required></input>
        </div>
        <br>

        <div>
            <label for="tstart">Time Starts:</label>
            <input type="time" id="tstart" name="tstart" placeholder="" required></input>
        </div>
        <br>
        <div>
            <label for="date">Date Ends:</label>

        <input type="date" id="date" name="dateEnd" value="yyyy-mm-dd" placeholder="" required></input>
        </div>
        <br>
        <div>
            <label for="tends">Time Ends:</label>
            <input type="time" id="tends" name="tends" placeholder="" required></input>
        </div>
        <br>
        <div>
           <!-- <script type="text/javascript" src="../assets/js/awaw.js"></script>onclick="passvalues();"-->
            <button class="btn" type="submit" id="btnsave" name="savesched" >SAVE</button><!-- onclick="myFunction('date','tstart','tends')-->
            <button class="btn" type="submit" name="editsched" >EDIT</button>
        </div>
    </div>

</form>

<form method="post" action="../backFun_schedConfig_v0_1.php" >
		<div class="input-group">
			<label>Vote Reminders:</label>
            <textarea rows="15" cols="68" name="message" placeholder="" required></textarea>
		</div>
		<div class="input-group">
			<button class="btn" type="submit" name="save" >SEND REMINDERS</button>
		</div>
	</form>


    <div class="footer">
        <p class="footer-txt">BS COMPUTER SCIENCE 3A © 2021</p>
    </div>

    <script>
        $('.icon').click(function () {
            $('span').toggleClass("cancel");
        });
    </script>
	</div>

    
    <?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

</body>

</html>
