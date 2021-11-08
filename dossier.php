<?php

include('conn.php');

$req1 = "SELECT * from patient  ";
$rs1 = mysqli_query($conn,$req1) ;
$row1 = mysqli_fetch_assoc($rs1);


$req2 = "SELECT * from rdv  ";
$rs2  = mysqli_query($conn,$req2) ;



?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dossier</title>
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



    <style>

body{
  background: white
}

.tooth-chart{
  width:450px;
}


  polygon, path{
    -webkit-transition:fill .25s;
    transition:fill .25s;
  }
  polygon:hover, polygon:active, path:hover, path:active{
    fill:#dddddd !important;
  }

    </style>
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<?php 
      include('sidebar.php'); 
      
      ?>
 
 
    <!-- page container area start -->
 
        <!-- sidebar menu area start -->
    
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
       
            <?php 
      include('header.php'); 
      
      ?>
          
            <!-- page title area end -->
            <div class="main-content-inner">
                

<div class="row">


   <!-- nav tab start -->
   <div class="col-lg-8 mt-4">
   <h3  class="mb-3">
							<?php echo ($row1['nom']); ?>						<?php echo ($row1['prenom']); ?>
							
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo ($row1['sexe']); ?> <?php echo ($row1['ddn']); ?>

							</h3>
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Consultations</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Rendez-vous</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Ordannances</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#image" role="tab" aria-controls="contact" aria-selected="false">Imageries</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <p>  <!-- Hoverable Rows Table start -->
                   

                        <div class="card">
                        <div>
                   

                   <button type="button" class="btn btn-outline-success" style="width:20%" data-toggle="modal" data-target="#myModal">     Nouveau</button>
                    <button type="button" class="btn btn-outline-warning " style="width:20%">    Modifier </button>
                    <button type="button" class="btn btn-outline-danger "style="width:20% ">   Supprimer </button>
              
        </div>

         <!-- Extra Large modal start -->
       
                                <!-- Large modal -->
                                <div class="modal fade bd-example-modal-lg modal-xl" id="myModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ajouter une consultation</h5>
                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">

                                                <div class="col">
                                                <div class="form-group">
                            <label for="example-text-input" class="col-form-label" >Patient :</label>
                                <input class="form-control" type="text" name="cin" id="example-text-input" readonly>
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Date :</label>
                            <input class="form-control" type="date" name="ddn" id="example-date-input" readonly>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Motif :</label>
                                <input class="form-control" type="text" name="prenom" id="example-text-input">
                        </div>
                        <div class="form-group">
                                            <label class="col-form-label">Type :</label>
                                            <select class="form-control" name="sitfam">
                                                <option>--</option>
                                                <option value="marie">Consultation</option>
                                                <option value="celibataire">Controle</option>
                                            
                                            </select>
                        </div>
                       <!-- table primary start -->
          
                        <div class="card">
                            <div class="card-body">
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table text-center">
                                            <thead class="text-uppercase bg-primary">
                                                <tr class="text-white">
                                                    <th scope="col">Acte</th>
                                                    <th scope="col">Dent</th>
                                                    <th scope="col">Tarif</th>
                                                    <th style="display:none"></th>
                                                    <th style="display:none"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Extraction</th>
                                                    <td>22</td>
                                                    <td>150dh</td>
                                                    <td style="display:none"></td>
                                                    <td style="display:none"></td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- table primary end -->
                                                </div>

                                                

<?php


include('dentchart.php');
?>
                                    <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-warning">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                            </div>      </div>

                                                              <!-- basic modal start -->

                            <div class="card-body">
                       
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModalLong" data-backdrop="static">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                                   <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Dent:</label>
                                <input class="form-control" type="text" name="prof" id="example-text-input" readonly>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Acte:</label>
                                <input class="form-control" type="text" name="prof" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Tarif:</label>
                                <input class="form-control" type="text" name="prof" id="example-text-input">
                        </div>
                        
                        
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary">Save changes</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                 
           </div>
           <!-- basic modal end -->
                                        
                
                        
                    <!-- Extra Large modal modal end -->
                            <div class="card-body">
                            
                                <h6 style="text-decoration: underline;text-color:blue" class="text-secondary mb-3">Historique de consultation</h6>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Acte</th>
                                                    <th scope="col">Dent</th>
                                                    <th>Action</th>
                                                    <th style="display:none"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                <td>Mark</td>
                                                    <td>Mark</td>
                                                    <td>09 / 07 / 2018</td>
                                                    <td > <a href=""> <i class="fa fa-eye"></i></a></td>
                                                    <td style="display:none"></td>
                                                </tr>
                                         
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        </div>
                
                    <!-- Hoverable Rows Table end --></p>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <button type="button" class="btn btn-outline-success" style="width:20%" data-toggle="modal" data-target="#exampleModalLong">     Nouveau</button>
                    <button type="button" class="btn btn-outline-warning " style="width:20%">    Modifier </button>
                    <button type="button" class="btn btn-outline-danger "style="width:20% ">   Supprimer </button>


                        
                    <!-- Extra Large modal modal end -->
                    
             
                <!-- Hoverable Rows Table end -->
                                    </div>







                                    
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta soluta doloribus, ullam, ut obcaecati laboriosam eos, officia dolores voluptatum quas impedit placeat cumque animi quos odio quibusdam voluptatibus magnam minima facilis necessitatibus libero! Error velit veritatis veniam ipsa? Reiciendis quas qui neque atque repudiandae quidem incidunt, a consectetur ipsam impedit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- nav tab end -->

             
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