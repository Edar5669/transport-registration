<?php
    include 'config.php';
?>
<link href="mystyle.css" rel="stylesheet">
  
  <div class="container">
  <form  action="" method="post">
      <section >
   
   NOM: <input type="text" placeholder="Enter noms" name="noms" required>
  PRENOMS:<input type="text" placeholder="Enter prenoms" name="prenoms" required><br/>
  COMPAGNIE:
    <!--selection de la compagnie en provenance de la BD, pour faire un combobox-->
  <select name="compagnie" required>
    <?php 
      $result =mysqli_query($conn, "SELECT id, nom FROM compagnies");
    while($ri = mysqli_fetch_array($result)) 
    { 
    ?>
      <option value="<?php echo $ri['id'] ?>"> <?php echo $ri['nom'] ?></option>
    <?php
    }
    ?>
  </select>
    <!--FIN DE LA selection de la compagnie en provenance de la BD-->
  VILLE DE DEPART:
  <select name="depart" required>
    <?php 
      $result =mysqli_query($conn, "SELECT id, ville FROM ville");
    while($ri = mysqli_fetch_array($result)) 
    { 
    ?>
      <option value="<?php echo $ri['id'] ?>"> <?php echo $ri['ville'] ?></option>
    <?php
    }
    ?>
    </select>
  VILLE D'ARRIVEE: <select name="arrivee" required>
    <?php 
      $result =mysqli_query($conn, "SELECT id, ville FROM ville");
    while($ri = mysqli_fetch_array($result)) 
    { 
    ?>
      <option value="<?php echo $ri['id'] ?>"> <?php echo $ri['ville'] ?></option>
<?php
}
 ?>
</select><br>

  DATE DE DEPART:<input type="date" placeholder="Enter date de depart" name="departdate" required><br/>

  HEURE DE DEPART:<input type="time" placeholder="Enter heure de depart" name="heuredepart" required><br/>


    <button type="ok" name = "valider">ENREGISTRER </button>
    <button class="cancelbtn" type="reset" name = "reset">ANNULER </button>
</section>
</form>

<?php
  if(isset($_POST['valider'])){
      $noms = addslashes($_POST ['noms']);
      $prenoms = addslashes($_POST ['prenoms']);
      $company = ($_POST ['compagnie']);
      $depart = addslashes($_POST ['depart']);
      $arrivee = addslashes($_POST ['arrivee']);
      $departdate=($_POST['departdate']);//=date('d-m-y')
      $horaire=($_POST['heuredepart']);//=date("H:i:a")

    //insertion dans la table infos
      mysqli_query($conn, "INSERT INTO infos (noms,prenoms,datedepart,horaire,compagnie,depart,arrivee)
       VALUES ('$noms','$prenoms','$departdate','$horaire','$company','$depart','$arrivee')");
      echo "<font color = 'green'>";
      echo "noms: ".$noms." prenoms: ".$prenoms."  ".$depart." ".$arrivee." ".$departdate." ".$horaire.", a bien ete enregistre";
      echo "</font>";
      echo "<br>";      
       }     
      else{
          echo"Aucun enregistrement";
          echo "<br><br><br>";

      } 
      include 'page.php';
  ?>

