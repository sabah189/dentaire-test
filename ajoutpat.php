<?php 

include('conn.php');

if (isset($_POST['ajout'])) {

    $nom              = addslashes($_POST['nom']);
    $prenom           = addslashes($_POST['prenom']);
    $cin              = addslashes($_POST['cin']);
    $ddn              = addslashes($_POST['ddn']);
    // $inscri              = date("Y-m-d");
    $sitfam           = addslashes($_POST['sitfam']);
    $tel              = addslashes($_POST['tel']);
    $adresse          = addslashes($_POST['adresse']);
    $prof             = addslashes($_POST['prof']);
    $typemut          = addslashes($_POST['typemut']);
    $sexe             = addslashes($_POST['sexe']);
    
   
 
    $req="INSERT INTO patient(nom,prenom,cin,ddn,sitfam,telephone,adresse,profession,mutuelle,sexe) 
    values ('$nom','$prenom','$cin','$ddn','$sitfam','$tel','$adresse','$prof','$typemut','$sexe');";  
    mysqli_query($conn,$req);
    header('location:patient.php');
 
 }

		  

?>



<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ajouter patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amcharts css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <!-- style css -->
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
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php 
      include('header.php'); 
      
      ?>

         <form action="" method="post">
            <!-- page title area end -->
            <div class="main-content-inner" >
                <div class="row" align="center">
              
                    <!-- data table start -->

                    <div class="col-12 mt-5"  >
                        <div class="card col-sm-9"  style="   margin: 0 auto; ">
                            <div class="card-body col-sm-9"  style="   margin: 0 auto; ">
                                
                        <div class="form-group " style="   margin: 0 auto; text-align: center;" >
                            <label for="example-text-input" class="col-form-label">Nom :</label>
                                <input class="form-control" type="text" name="nom" id="example-text-input" >
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Prénom :</label>
                                <input class="form-control" type="text" name="prenom" id="example-text-input">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">CIN :</label>
                                <input class="form-control" type="text" name="cin" id="example-text-input">
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Adresse :</label>
                                <input class="form-control" type="text" name="adresse" id="example-text-input">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Date de naissance:</label>
                            <input class="form-control" type="date" name="ddn" id="example-date-input">
                        </div>

                        <div class="form-group">
                            <label for="example-tel-input" class="col-form-label">Telephone:</label>
                            <input class="form-control" type="tel" name="tel" id="example-tel-input">
                         </div>
                         <div class="form-group">
                                            <label class="col-form-label">Situation familiale :</label>
                                            <select class="form-control" name="sitfam" onchange="location = this.value;">
                                                <option>--</option>
                                                <option value="marie">Marié</option>
                                                <option value="celibataire">Célibataire</option>
                                                <option value="divorce">Divorcé</option>
                                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Profession:</label>
                                <input class="form-control" type="text" name="prof" id="example-text-input">
                        </div>
                        

                         <b class="text-muted mb-3 mt-4 d-block">Sexe:</b>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio"  id="customRadio" name="sexe" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio">Femme</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio2" name="sexe" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Homme</label>
                                            </div>

                        <b class="text-muted mb-3 mt-4 d-block">Mutuelle:</b>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio"  id="customRadio1" name="typemut" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio1">CNOPS</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadio4" name="typemut" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio4">CNSS</label>
                                            </div> 

                        <input type="submit" class="btn btn-primary btn-lg mb-3" value="valider" name="ajout" style=" margin-left:100%">
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                 
                </div>
            </div>
        </div>
    </div>
</form>
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

    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>



<script src="   https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css "></script> 
<script src="  https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css"></script> 
<script src="  https://cdn.datatables.net/fixedheader/3.2.0/css/fixedHeader.bootstrap.min.css"></script> 
<script src="  https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"></script> 

    <script>$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );</script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>