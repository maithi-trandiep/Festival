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
                     <h1 class="m-0 text-dark">Détail établissement</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ url('home') }}">Accueil</a></li>
                     <li class="breadcrumb-item"><a href="{{ url('listeEtablissements') }}">Liste établissement</a></li>
                     <li class="breadcrumb-item active">Détail établissement</li>
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

                     // $idEtab=$_GET['idEtab'];  
                     // debug_to_console($idEtab);
                     // OBTENIR LE DÉTAIL DE L'ÉTABLISSEMENT SÉLECTIONNÉ

                     // $lgEtab=obtenirDetailEtablissement($connexion, $idEtab);

                     $nomEtab=$etablissement->nomEtab;
                     $adresseRue=$etablissement->adresseRue;
                     $codePostal=$etablissement->codePostal;
                     $ville=$etablissement->ville;
                     $tel=$etablissement->tel;
                     $adresseElectronique=$etablissement->adresseElectronique;
                     $type=$etablissement->type;
                     $civiliteResponsable=$etablissement->civiliteResponsable;
                     $nomResponsable=$etablissement->nomResponsable;
                     $prenomResponsable=$etablissement->prenomResponsable;
                     $nombreChambresOffertes=$etablissement->nombreChambresOffertes;
                  ?>
                     <div class="row justify-content-center">
                        <div class="col-auto">
                           <?php
                              echo '<table class="table table-bordered table-detailEtab">';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Nom établissemnt</th>';
                              echo '<td align="center">'.$nomEtab.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Adresse rue</th>';
                              echo '<td align="center">'.$adresseRue.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Code postal</th>';
                              echo '<td align="center">'.$codePostal.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Ville</th>';
                              echo '<td align="center">'.$ville.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Téléphone</th>';
                              echo '<td align="center">'.$tel.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Adresse electronique</th>';
                              echo '<td align="center">'.$adresseElectronique.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Type</th>';
                              if ($type == 1)
                              {
                              echo '<td align="center">Etablissement scolaire</td>';
                              }
                              else
                              {
                                 echo '<td align="center">Autre établissement</td>';
                              }
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Civilité responsable</th>';
                              echo '<td align="center">'.$civiliteResponsable.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Nom responsable</th>';
                              echo '<td align="center">'.$nomResponsable.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Prénom responsable</th>';
                              echo '<td align="center">'.$prenomResponsable.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';
                              echo '<tr>';
                              echo '<thead class="thead-info">';
                              echo '<th class="table-info" scope="row">Nombre chambres offertes</th>';
                              echo '<td align="center">'.$nombreChambresOffertes.'</td>';
                              echo '</th>';
                              echo '</thead>';
                              echo '</tr>';        
                              echo'</table>';
                           $connexion=NULL;
                           ?>
                           <div class="row justify-content-center">
                              <a class="btn btn-outline-dark" href="{{ url('listeEtablissements') }}" role="button">Retour</a>
                           </div>     
                        </div>
                     </div>
               </div>
            </section>
            </br>
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
