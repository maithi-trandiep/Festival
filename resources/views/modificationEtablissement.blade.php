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
                     <h1 class="m-0 text-dark">Modification établissement</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ url('home') }}">Accueil</a></li>
                     <li class="breadcrumb-item"><a href="{{ url('listeEtablissements') }}">Liste établissement</a></li>
                     <li class="breadcrumb-item active">Modification établissement</li>
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

                     $tabCivilite=array("M.","Mme","Melle");

                     $idEtab=$etablissement->idEtab;
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

                     echo '<div class="card card-info">
                              <div class="card-header">
                                 <h3 class="card-title">'.$nomEtab.' ('.$idEtab.')</h3>
                              </div>';
                              ?>
                              <form class="formModifEtab" method="POST" action="{{ url('listeEtablissements/update/'.$etablissement->idEtab) }}">
                              
                              {{ method_field('PATCH') }}
                              {{ csrf_field() }}
                               <?php  
                                       echo '<div class="card-body">
                                             <div class="row">
                                                   <!-- START OF FIRST COL-->
                                                   <div class="col">
                                                      <h5>Etablissement</h5>
                                                      <div class="form-group">
                                                         <label for="formEtab">Id*:</label>
                                                         <input type="text" value="'.$idEtab.'" name="idEtab" class="form-control" readonly>
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Nom*:</label>
                                                         <input type="text" value="'.$nomEtab.'" name="nomEtab" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Adresse*:</label>
                                                         <input type="text" value="'.$adresseRue.'" name="adresseRue" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Code postal*:</label>
                                                         <input input type="text" value="'.$codePostal.'" name="codePostal" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Ville*:</label>
                                                         <input type="text" value="'.$ville.'" name="ville" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Téléphone*:</label>
                                                         <input type="text" value="'.$tel.'" name="tel" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">E-mail:</label>
                                                         <input type="text" value="'.$adresseElectronique.'" name="adresseElectronique" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Type*:</label>';
                                                         if ($type==1)
                                                         {
                                                            echo '<div class="form-check">
                                                               <input class="form-check-input" type="radio" name="type" id="type" value="1" checked>
                                                               <label class="form-check-label" for="typeRadio">
                                                                  Etablissement Scolaire
                                                               </label>
                                                               </div>
                                                               <div class="form-check">
                                                               <input class="form-check-input" type="radio" name="type" id="type" value="0">
                                                               <label class="form-check-label" for="typeRadio">
                                                                  Autre
                                                               </label>
                                                               </div>
                                                               </div>';
                                                         }
                                                         else
                                                         {
                                                            echo '<div class="form-check">
                                                               <input class="form-check-input" type="radio" name="type" id="type" value="1">
                                                               <label class="form-check-label" for="typeRadio">
                                                                  Etablissement Scolaire
                                                               </label>
                                                               </div>
                                                               <div class="form-check">
                                                               <input class="form-check-input" type="radio" name="type" id="type" value="0" checked>
                                                               <label class="form-check-label" for="typeRadio">
                                                                  Autre
                                                               </label>
                                                               </div>
                                                               </div>';
                                                         } 
                                                      
                                                   echo '</div>
                                                   <!-- END OF FIRST COL -->
                     
                                                   <!-- START OF SECOND COL -->
                                                   <div class="col">
                                                      <h5>Responsable</h5>
                                                         <div class="form-group">
                                                            <label for="formEtab">Civilité*:</label>
                                                            <select class="form-control" name="civiliteResponsable">';
                                                            for ($i=0; $i<3; $i=$i+1)
                                                               if ($tabCivilite[$i]==$civiliteResponsable) 
                                                               {
                                                                  echo "<option selected>$tabCivilite[$i]</option>";
                                                               }
                                                               else
                                                               {
                                                                  echo "<option>$tabCivilite[$i]</option>";
                                                               }
                                                            echo '</select>
                                                         </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Nom*:</label>
                                                         <input type="text" value="'.$nomResponsable.'" name="nomResponsable" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Prénom*:</label>
                                                         <input type="text"  value="'.$prenomResponsable.'" name="prenomResponsable" class="form-control">
                                                      </div>
                                                      <div class="form-group">
                                                         <label for="formEtab">Nombre chambres offertes*:</label>
                                                         <input type="text" value="'.$nombreChambresOffertes.'" name="nombreChambresOffertes" class="form-control">
                                                      </div>
                                                   </div>
                                                   <!-- END OF SECOND COL -->
                                             </div> 
                                       </div>
                                       <div class="text-center">
                                          <input class="btn btn-outline-info" type="submit" value="Valider" name="valider">
                                          <input class="btn btn-outline-dark" type="reset" value="Annuler" name="annuler">
                                       </div>
                                    </form>
                           </div>';
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
