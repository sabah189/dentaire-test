<?php

include('conn.php');
$code = $_GET['code']; 
$req1 = "SELECT * from patient  WHERE pat_id=$code  ";
$rs1 = mysqli_query($conn,$req1) ;
$row1 = mysqli_fetch_assoc($rs1);



$sql_all    ="SELECT * FROM categorie_med  ORDER BY id_cat ";
$result_all = mysqli_query($conn,$sql_all);

$req2    ="SELECT * FROM rdv  ";
$rs2= mysqli_query($conn,$req2);
$row2 = mysqli_fetch_assoc($rs2);


	
if (isset($_POST['ajouter'])) {
    $pat = $_POST['pat'];
    $date=$_POST['date'];
    $type = $_POST['type'];
    $motif = $_POST['motif'];
    $acte = $_POST['acte'];
    $tarif=$_POST['tarif'];


// $id=$_GET['code'];
    $req3="INSERT INTO consultation ( date_cons, motif,type,tarif,pat_id,id_acte) values ('$date','$motif','$type', '$tarif','$pat','$acte');";  
    $row3 =mysqli_query($conn,$req3);

    header('location:patient.php');
   
  }


  $req4   ="SELECT * FROM consultation ";
  $rs4= mysqli_query($conn,$req4);

   
  $code = $_GET['code'];    
  $req5 = "SELECT * from certificat  WHERE pat_id=$code";
  $rs5 = mysqli_query($conn,$req5) ;
  
   
  
  
             if (isset($_POST['ajou'])) {
              $id = $_POST['id'];
              $de = $_POST['de'];
              $a = $_POST['a'];
      
           
          
          
          // $id=$_GET['code'];
              $req6="INSERT INTO certificat (de,a,pat_id) values ('$de', '$a','$id');";  
              $row6 =mysqli_query($conn,$req6);
         
              header('location:dossier.php?code='.$code.'');
            }
             

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
          
          <nav aria-label="breadcrumb"  >
  <ol class="breadcrumb"style="background-image: url('assets/images/icon/opticiens.jpg');background-repeat: no-repeat;background-attachment: fixed;background-size: 100% 100%;">
    <li class="breadcrumb-item"><a href="patient.php">Retour</a></li>
    <li class="breadcrumb-item active" aria-current="page">Dossier du patient</li>
  </ol>
</nav>
            <!-- page title area end -->
            <div class="main-content-inner">
                

<div class="row">


   <!-- nav tab start -->
   <div class="col-lg-12 mt-4">
   <h4  class="mb-3" style="color:#0066CC" >
   					<?php echo ($row1['nom']); ?>						<?php echo ($row1['prenom']); ?>
							
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo ($row1['sexe']); ?> <?php echo ($row1['ddn']); ?>

							</h4>
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Consultations</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Ordannances</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#certificat" role="tab" aria-controls="contact" aria-selected="false">Certificat</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#image" role="tab" aria-controls="contact" aria-selected="false">Imageries</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#paye" role="tab" aria-controls="contact" aria-selected="false">Paiement</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <p>  <!-- Hoverable Rows Table start -->
                   

                        <div class="card">
                        <div>
                   

                   <button type="button" class="btn btn-outline-success" style="width:20%" data-toggle="modal" data-target="#myModal">     Nouveau</button>
               
              
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
                                            <form action="" method="post">
                                            <div class="modal-body">
                                                <div class="row">

                                                <div class="col">
                          

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">Date :</label>
                            <input class="form-control" type="date" name="date" id="example-date-input"  value ="<?php echo ($row2['date']); ?>" readonly>
                        </div>

                        <div class="form-group">
                                            <label class="col-form-label">Type :</label>
                                            <select class="form-control" name="type">
                                                <option>--</option>
                                                <option value="marie">Consultation</option>
                                                <option value="celibataire">Controle</option>
                                            
                                            </select>
                        </div>

                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">Motif :</label>
                                <input class="form-control" type="text" name="motif" id="example-text-input">
                        </div>
                  
                        <div class="form-group">
                                            <label class="col-form-label">Acte :</label>
                                            <input class="form-control" type="text" name="acte" id="example-text-input">
       
                        </div>
                        <div class="form-group">
                                            <label class="col-form-label">Tarif :</label>
                                            <input class="form-control" type="text" name="tarif" id="example-text-input">
                        </div>
                        <div class="form-group">
                                            <label class="col-form-label">pat :</label>
                                            <input class="form-control" type="text" name="pat" id="example-text-input">
                        </div>
                    
                                                </div>

<?php


include('dentchart.php');
?>


                                            </div>      </div>


                       
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <input type="submit" class="btn btn-secondary" name="ajouter" value="ajouter">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                
                        
                    <!-- Extra Large modal modal end -->
                            <div class="card-body">
                            
                                <h6 style="    text-decoration: underline;text-color:blue" class="text-secondary mb-3">Historique de consultation</h6>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Acte</th>
                                                    <th scope="col">Motif</th>
                                                    <th scope="col">Tarif</th>                                                   
                                                    <th>Action</th>
                                              
                                                </tr>
                                            </thead>
                                            <?php  while ($row4 = mysqli_fetch_assoc($rs4))  {  ?>

                                            <tbody>
                                                <tr>
                                                <td>	<?php echo ($row4['type']); ?></td>
                                                    <td><?php echo ($row4['id_acte']); ?></td>
                                                    <td><?php echo ($row4['motif']); ?></td>
                                                    <td><?php echo ($row4['tarif']); ?></td>

                                                    <td > <a href="#"data-toggle="modal" data-target="#myModal2" > <i class="fa fa-eye"></i></a>&nbsp;&nbsp;
                                                    <a href="#"data-toggle="modal" data-target="#myModal2" > <i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
                                                    <a href="#"data-toggle="modal" data-target="#myModal2" > <i class="fa fa-trash"></i></a>
                                                </td>
                                
                                                </tr>
                                         
                                            </tbody>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                        </div>
                        </div>
                
                    <!-- Hoverable Rows Table end --></p>


                     <!-- Extra Large modal start -->
       
                                <!-- Large modal -->
                                <div class="modal fade bd-example-modal-lg modal-xl" id="myModal2">
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
                      
                                                </div>

<?php


include('dentchart.php');
?>


                                            </div>      </div>

                                                         
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                
                        
                    <!-- Extra Large modal modal end -->
                                    </div>
                                        <!-- Ordannance start end -->
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <p>

                                        <?php 


$req = "select * from categorie_med";
$rs = mysqli_query($conn,$req) or die(mysqli_error());
$option = NULL;

while($row = mysqli_fetch_assoc($rs))
    {
      $option .= '<option value = "'.$row['id_cat'].'"> '.$row['nom_cat'].' </option>';
    }


	$req2 = "SELECT * from medicament ";
$rs2 = mysqli_query($conn,$req2) or die(mysqli_error());
$option2 = NULL;
while($row2 = mysqli_fetch_assoc($rs2))
    {
      $option2 .= '<option value = "'.$row2['id_med'].'">'.$row2['nom_med'].'</option>';
    }




?>



                        
                                        <div class="card-body">
                            
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th scope="col">Categorie </th>
                                          
                                            </tr>
                                        </thead>
                                        <?php  while ($et = mysqli_fetch_assoc($result_all))  {  ?>
                                        <tbody>
                                            <tr>
                                            <td> <a href=""  data-toggle="modal" data-target="#myModali" ><?php echo ($et['nom_cat']); ?> </a></td>
                                     
                                            </tr>

                                            
                                            <!-- basic modal start -->

                                            
                       
                       <!-- Modal -->
                       <div class="modal fade" id="myModali" data-backdrop="static">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                                   <div class="form-group">
                          
                                   <select name="cat" id="cat" class="form-control"  onchange="Fetchmed(this.value)"  > 
        <option value = "<?php while($row = mysqli_fetch_assoc($rs))
    {
      $option .= '<option value = "'.$row['id_cat'].'">'.$row['nom_cat'].'</option>'; }  ?>"><?php echo $option; ?></option>
    </select>
                        </div>
                        <div class="form-group">
                        <select name="med" id="med" class="form-control"   required>
            <option value="">Select Medicament</option>
        
          </select>
                        </div>
                        
                        
                        
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary">Valider</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                 

           <!-- basic modal end -->
                                     




       <!-- basic modal start -->

                                            
                       
                       <!-- Modal -->
                       <div class="modal fade" id="my" data-backdrop="static">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                             gregher
                        
                        
                        
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <button type="button" class="btn btn-primary">Valider</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                 

           <!-- basic modal end -->







           <script type="text/javascript">
  function Fetchmed(id){
    $('#med').html('');
    $.ajax({
      type:'post',
	  url: 'ajaxdata.php',
      data : { cat_id : id},
      success : function(data){
         $('#med').html(data);
      }

    })
  }

  

  
</script>
                                        </tbody>
                                        <?php } ?>
                                    
                                    </table>
                                </div>
                            </div>
                    </div>


                                        
                  
                                        
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="contact-tab">
                                        <p>

                                        <?php



if(isset($_POST["submit"]))
{
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
	
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number

    $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
    $dst = "all_images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "all_images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name

    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
	
    $check = mysqli_query($conn,"insert into images(name,image) values('$_POST[name]','$dst_db')");  // executing insert query
		
    if($check)
    {
    	echo '<script type="text/javascript"> alert("Données insérées avec succès ! "); </script>';  // alert message
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Erreur lors du téléchargement des données !"); </script>';  // when error occur
    }
}
?>
                                         <!-- Custom file input start -->
                            <div class="col-12">
                                <div class="card mt-5">
                                    <div class="card-body">
                                        <h4 class="header-title">Attacher les fichiers</h4>
                                        <form method="post" enctype="multipart/form-data">
  <table>
    <tr>
    
     <input type="text" name="name" placeholder="Nom"  class="form-control mb-3" Required>
    </tr>
    <tr>
    <div class="custom-file">
    <input type="file" name="image" class="custom-file-input" id="inputGroupFile02" Required>                                                 
       <label class="custom-file-label" for="inputGroupFile02">Choisir le fichier</label>
                                                </div>
  
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="submit" value="  Télécharger " class="input-group-text mt-3"></td>			
    </tr>
  </table>
</form>
                                    </div>

                                    <table class="table text-center">
                                    <thead class="text-uppercase bg-light">
  <tr>

    <td>Nom</td>
    <td>Images</td>
  </tr>
  </thead>
<?php

$records = mysqli_query($conn,"select * from images"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>

    <td><?php echo $data['name']; ?></td>
    <td><img src="<?php echo $data['image']; ?>" width="100" height="100"></td>
  </tr>	
<?php
}
?>

</table>
                                </div>
                            </div>
                            <!-- Custom file input end -->
                                        </p>
                                    </div>

                                    <div class="tab-pane fade" id="paye" role="tabpanel" aria-labelledby="contact-tab">
                                        <p>pas encore</p>
                                    </div>

                                    <div class="tab-pane fade" id="certificat" role="tabpanel" aria-labelledby="contact-tab">
                                        <p>


                        
                    <!-- Extra Large modal modal end -->
                    <div class="card">
                            <div>
                    <button type="button" class="btn btn-outline-success mb-3" style="width:20%" data-toggle="modal" data-target="#myModal8">     Nouveau</button>

                    </div>

                                            <!-- basic modal start -->

                                            <?php
           
   
           ?> 
                       
                       <!-- Modal -->
                       <div class="modal fade" id="myModal8" data-backdrop="static">
                           <div class="modal-dialog">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                   </div>
                                   <div class="modal-body">
                                   <form action="" method="post">
                                   <input class="form-control" type="text" name="id" id="example-text-input" value="<?php echo $code; ?>">
                        
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">De:</label>
                                <input class="form-control" type="date" name="de" id="example-text-input">
                        </div>
                        <div class="form-group">
                            <label for="example-text-input" class="col-form-label">à:</label>
                                <input class="form-control" type="date" name="a" id="example-text-input">
                        </div>
                        
                        
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                       <input type="submit" class="btn btn-primary" name="ajou" value="ajouter">
                                       <button type="button" class="btn btn-warning" >Imprimer</button>
                                   </div>
                                  </form>
                               </div>
                           </div>
                       </div>
                 

           <!-- basic modal end -->

      
                            <h6 style="    text-decoration: underline;text-color:blue" class="text-secondary mb-3">les certificats</h6>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th style="display:none"></th>
                                                <th scope="col">Certificat N°</th>
                                                <th scope="col">Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  while ($et = mysqli_fetch_assoc($rs5))  {  ?>
                                            <tr>
                                            <td> <?php echo ($et['id_certif']); ?></td>
                                                <td> <?php echo ($et['de']); ?> <?php echo ($et['a']); ?></td>
                                                <td > <a href="#" > <i class="fa fa-eye"></i></a>      </td>
                                             
                                               
                                         
                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                        
                                    </table>
                                </div>
                            </div>
                    </div>
                    </div>
            
                <!-- Hoverable Rows Table end --></p>


                 <!-- Extra Large modal start -->



                                        </p>
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
