<?php 

include('conn.php');




		  

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>srtdash - SEO Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<?php 
      include('sidebar.php'); 
      
      ?>
 
  
  
    
    
        <!-- main content area start -->
        <div class="main-content">

         
        <?php 
      include('header.php'); 
      
      ?>

            <div class="main-content-inner">
                <div class="row">
                    <!-- seo fact area start -->
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-6 mt-5 mb-3">
                                <div class="card">
                                <div class="seo-fact sbg1">
                                        
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            
                                            <div class="seofct-icon"><i class="ti-user"></i><a href="patient.php" style ="color:white"> Patients</div>
                                            <?php

												 $result = mysqli_query($conn,"SELECT * FROM patient ");
                                                      $num_rows = mysqli_num_rows($result);
                                                {
                                                  ?>
                                            <h2><?php echo htmlentities($num_rows);  } ?>	</h2>
                                            
												
												</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mt-md-5 mb-3">
                                <div class="card">
                                
                                       
                                    <div class="seo-fact sbg2">
                                        <div class="p-4 d-flex justify-content-between align-items-center">
                                            <div class="seofct-icon"><i class="ti-calendar"></i><a href="rdv.php" style ="color:white"> Rendez-vous</div>
                                            <?php

                                                $result = mysqli_query($conn,"SELECT * FROM rdv ");
                                                    $num_rows = mysqli_num_rows($result);
                                                {
                                                ?>
                                                <h2><?php echo htmlentities($num_rows);  } ?>	</h2>


                                                </a>
                                   
                                    </div>                             
                                   </div>
                                </div>
                            </div>


                            
                       
                         
                        </div>
                    </div>
                    <!-- seo fact area end -->
                
          
                    <!-- Advertising area start -->
                    <div class="col-lg-4 mt-5">
                        <div class="card h-full seo-fact sbg5">
                              
                        <div class="p-4 d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">Total Paiement</h4>
                        <select class="custome-select border-0 pr-3">
                                            <option selected="">La semaine dernière </option>
                                            <option value="0">le mois dernier </option>
                                        </select>
                                        </div>


                                <canvas id="coin_sales5" height="100" width="302" style="display: block; height: 80px; width: 242px;" class="chartjs-render-monitor"></canvas>                            </div>
                    </div>
                    <!-- Advertising area end -->
                    <!-- sales area start -->
                    <div class="col-xl-6   mt-5">
                        <div class="card">
                            <div class="card-body">
                              
                                 <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">les rendez vous d'aujourd'hui :</h4>
                                <div class="data-tables">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Heure</th>
                <th>Type</th>
                <th>Etat</th>
                
            </tr>
        </thead>
        <tbody>
        <?php  
			$query  = "SELECT rdv.id_rdv,rdv.type as type,rdv.heure as heure,pat.nom as nom,pat.prenom as prenom,statut FROM patient pat,rdv rdv 
					   WHERE rdv.pat_id=pat.pat_id AND DATE(`date`) = CURDATE() and statut=0" ;

						$result =  mysqli_query($conn,$query);

						while ($et = mysqli_fetch_assoc($result))  { 
							 ?>
        
    
            <tr>
                <td><?php echo ($et['nom']); ?>      <?php echo ($et['prenom']); ?></td>
                <td><?php echo ($et['heure']); ?></td>
                <td><?php echo ($et['type']); ?></td>
                
            
                      
              <td>
              <?php 
	  
	  if ($et ['statut'] == 1) {
		  echo '<p> <a href="statut.php?id_rdv= '.$et[ 'id_rdv' ] . '& statut=0 " class=" label label-primary" id="modal"> En attente</a></p>';
	  }
	  else{
		  echo '<p> <a href="statut.php?id_rdv= '.$et[ 'id_rdv' ] . '& statut=1 " class=" label label-warning"> En cours</a></p>';
		  
	  }
			
	  
	  
?>
</td>
            </tr>
   
         
            <?php } ?>
                </tbody>
    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                               
                            </div>
                        </div>
                    </div>
                    <!-- sales area end -->
             

                           <!-- sales area start -->
                           <div class="col-xl-6   mt-5">
                        <div class="card">
                            <div class="card-body">
                                 <!-- data table start -->
                                 <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">En attente :</h4>
                                <div class="data-tables">
                                <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Heure</th>
                <th>Type</th>
                <th>Etat</th>
             
                
            </tr>
        </thead>
        <tbody>
        <?php  
			$query  = "SELECT rdv.id_rdv,rdv.type as type,rdv.heure as heure,pat.nom as nom,pat.prenom as prenom,statut FROM patient pat,rdv rdv 
					   WHERE rdv.pat_id=pat.pat_id AND DATE(`date`) = CURDATE() and statut=1 " ;

						$result =  mysqli_query($conn,$query);

						while ($et = mysqli_fetch_assoc($result))  { 
							 ?>
        
    
            <tr>
                <td><?php echo ($et['nom']); ?>      <?php echo ($et['prenom']); ?></td>
                <td><?php echo ($et['heure']); ?></td>
                <td><?php echo ($et['type']); ?></td>
               
              <td>
              <?php 
	  
	  if ($et ['statut'] == 1) {
		  echo '<p>  En attente</p>';
	  }
	  else{
		  echo '<p> <a href="statut.php?id_rdv= '.$et[ 'id_rdv' ] . '& statut=1 " class=" label label-warning"> En cours</a></p>';
		  
	  }
			
	  
	  
?>
</td>
            </tr>
   
         
            <?php } ?>
                </tbody>
    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                            </div>
                        </div>
                    </div>
                    <!-- sales area end -->
      
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2018. All right reserved. Template by <a href="https://colorlib.com/wp/">Colorlib</a>.</p>
            </div>
        </footer>
        <!-- footer area end-->
    </>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
        <div class="offset-close"><i class="ti-close"></i></div>
        <ul class="nav offset-menu-tab">
            <li><a class="active" data-toggle="tab" href="#activity">Activity</a></li>
            <li><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
        <div class="offset-content tab-content">
            <div id="activity" class="tab-pane fade in show active">
                <div class="recent-activity">
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Added</h4>
                            <span class="time"><i class="ti-time"></i>7 Minutes Ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You missed you Password!</h4>
                            <span class="time"><i class="ti-time"></i>09:20 Am</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Member waiting for you Attention</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>You Added Kaji Patha few minutes ago</h4>
                            <span class="time"><i class="ti-time"></i>01 minutes ago</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Ratul Hamba sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Hello sir , where are you, i am egerly waiting for you.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg2">
                            <i class="fa fa-exclamation-triangle"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="fa fa-bomb"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                    <div class="timeline-task">
                        <div class="icon bg3">
                            <i class="ti-signal"></i>
                        </div>
                        <div class="tm-title">
                            <h4>Rashed sent you an email</h4>
                            <span class="time"><i class="ti-time"></i>09:35</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse distinctio itaque at.
                        </p>
                    </div>
                </div>
            </div>
            <div id="settings" class="tab-pane fade">
                <div class="offset-settings">
                    <h4>General Settings</h4>
                    <div class="settings-list">
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch1" />
                                    <label for="switch1">Toggle</label>
                                </div>
                            </div>
                            <p>Keep it 'On' When you want to get all the notification.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show recent activity</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch2" />
                                    <label for="switch2">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show your emails</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch3" />
                                    <label for="switch3">Toggle</label>
                                </div>
                            </div>
                            <p>Show email so that easily find you.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Show Task statistics</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch4" />
                                    <label for="switch4">Toggle</label>
                                </div>
                            </div>
                            <p>The for attribute is necessary to bind our custom checkbox with the input.</p>
                        </div>
                        <div class="s-settings">
                            <div class="s-sw-title">
                                <h5>Notifications</h5>
                                <div class="s-swtich">
                                    <input type="checkbox" id="switch5" />
                                    <label for="switch5">Toggle</label>
                                </div>
                            </div>
                            <p>Use checkboxes when looking for yes or no answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offset area end -->
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <!-- start amcharts -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- all bar chart -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all map chart -->
    <script src="assets/js/maps.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
