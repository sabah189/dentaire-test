<?php



$conn = mysqli_connect("localhost","root","","dentaire");

mysqli_query($conn,"SET NAMES 'utf8'");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  
?>
<!-- 
<div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                       
                    </div>

                    <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Kumkum Rai <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Message</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Log Out</a>
                       
                </div> -->