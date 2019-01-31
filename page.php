<?php
include 'config.php';
$result=mysqli_query($conn,"SELECT * FROM infos");

 echo'<p> </p>';
 echo'<table border="1">';
 echo'<tr><td><B>NOM ET PRENOMS</B></td><td><B>COMPAGNIE</B></td><td><B>VILLE DE DEPART</B></td><td><B>VILLE ARRIVEE</B></td><td><B>DATE ET HEURE DE DEPART</B></td></tr>';
 
 while($tbinfos = mysqli_fetch_assoc($result)) { 
 $noms = $tbinfos['noms'];
 $prenoms = $tbinfos['prenoms'];
 $datedepart= $tbinfos['datedepart'];
 $horaire= $tbinfos['horaire'];
 $departid = $tbinfos['depart'];
 $arriveeid = $tbinfos['arrivee'];
 $companyid =$tbinfos['compagnie'];

 //afficher la compagnie
 $company = '';
 $getComp = mysqli_query($conn,"SELECT * FROM compagnies WHERE id='$companyid'");
 while($comp = mysqli_fetch_assoc($getComp)){
    $company = $comp['nom'];
 }

 //afficher la ville de depart
 $depart = '';
 $getVille = mysqli_query($conn,"SELECT * FROM ville WHERE id='$departid'");

 while($ville = mysqli_fetch_assoc($getVille)){
    $depart = $ville['ville'];
 }

 //afficher la ville d'arrivee
 $arrivee = '';
 $getVille = mysqli_query($conn,"SELECT * FROM ville WHERE id='$arriveeid'");
 while($ville = mysqli_fetch_assoc($getVille)){
    $arrivee = $ville['ville'];
 }
   echo'<tr><td>' .$noms.' '.$prenoms. '</td><td>' .$company. '</td><td>' .$depart.'</td><td>' . $arrivee.'</td><td>' . $datedepart. ' A '.$horaire. '</td></tr>';
  }
  echo'<Br>';
  ?>
  