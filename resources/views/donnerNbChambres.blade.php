<!DOCTYPE html>
<html>
   <!-- Header -->
   @include('header')
   <!-- /.header -->

   <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">

         @include('_debut')

         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
               <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="m-0 text-dark">Attribution chambres</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="home">Accueil</a></li>
                     <li class="breadcrumb-item"><a href="consultationAttributions">Consulter</a></li>
                     <li class="breadcrumb-item"><a href="modificationAttributions?action=demanderModifAttrib">Modifier</a></li>
                     <li class="breadcrumb-item active">Donner chambres</li>
                     </ol>
                  </div><!-- /.col -->
               </div><!-- /.row -->
               </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
               <div class="container-fluid">
                  <?php
                     ini_set("display_errors","on");
                     error_reporting(E_ALL);
                  ?>

                     @include('_gestionBase') 
                     @include('_controlesEtGestionErreurs')

                  <?php

                     // CONNEXION AU SERVEUR MYSQL PUIS SÉLECTION DE LA BASE DE DONNÉES festival

                     $connexion=connect();
                     if (!$connexion)
                     {
                        ajouterErreur("Echec de la connexion au serveur MySql");
                        afficherErreurs();
                        exit();
                     }
                     if (!selectBase($connexion))
                     {
                        ajouterErreur("La base de données festival est inexistante ou non accessible");
                        afficherErreurs();
                        exit();
                     }

                     // SÉLECTIONNER LE NOMBRE DE CHAMBRES SOUHAITÉES

                     $idEtab=$_REQUEST['idEtab'];
                     $idEquipe=$_REQUEST['idEquipe'];
                     $nbChambres=$_REQUEST['nbChambres'];
                     
                     echo '<form method="POST" action="modificationAttributions.php"><center>
                              <input type="hidden" value="validerModifAttrib" name="action">
                              <input type="hidden" value='.$idEtab.' name="idEtab">
                              <input type="hidden" value='.$idEquipe.' name="idEquipe">';
                              $nomEquipe=obtenirNomEquipe($connexion, $idEquipe);

                              echo '<div class="form-group">
                              <label><h5>Combien de chambres souhaitez-vous pour le Equipe '.$nomEquipe.' dans cet établissement ?</h5></label>
                              <select class="form-control" name="nbChambres" id="formDonnerChambres">';
                              
                              for ($i=0; $i<=$nbChambres; $i++)
                              {
                                 echo "<option>$i</option>";
                              }
                              echo '</select>
                                    </br>
                                    <div class="text-center">
                                       <input class="btn btn-outline-info" type="submit" value="Valider" name="valider">
                                       <input class="btn btn-outline-dark" type="reset" value="Annuler" name="Annuler">
                                    </div>
                                    </center>
                           </form>';
                  ?>
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->

         <!-- Footer -->
         @include('_footer')
         <!-- /.footer -->
      </div>
      <!-- ./wrapper -->

      <!-- jQuery -->
      @include('jQuery')
      <!-- /.jQuery -->
   </body>
</html>