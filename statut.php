<?php

include('conn.php');


$id       =$_GET ['id_rdv'];
$statut   =$_GET ['statut'];


$q="UPDATE rdv set statut =$statut where id_rdv =$id";
mysqli_query($conn,$q);

header('location:dash.php');



?>