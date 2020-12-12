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
                     <h1 class="m-0 text-dark">Création établissement</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ url('home') }}">Accueil</a></li>
                     <li class="breadcrumb-item"><a href="{{ url('listeEtablissements') }}">Liste établissement</a></li>
                     <li class="breadcrumb-item active">Création établissement</li>
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
                  ?>

                     <div class="card card-info">
                        <div class="card-header">
                           <h3 class="card-title">Nouvel établissement</h3>
                        </div>
                        <form class="formCreEtab" method="POST" action="{{ url('listeEtablissement/store') }}">
                        
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                              
                           <div class="card-body">
                              <div class="row">
                                 <!-- START OF FIRST COL-->
                                 <div class="col">
                                    <h5>Etablissement</h5>
                                    <div class="form-group">
                                       <label for="formEtab">Id*:</label>
                                       <input type="text" class="form-control" value="" name="idEtab">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Nom*:</label>
                                       <input type="text" class="form-control" value="" name="nomEtab">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Adresse*:</label>
                                       <input type="text" class="form-control" value="" name="adresseRue">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Code postal*:</label>
                                       <input type="text" class="form-control" value="" name="codePostal">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Ville*:</label>
                                       <input type="text" class="form-control" value="" name="ville">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Téléphone*:</label>
                                       <input type="text" class="form-control" value="" name="tel">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">E-mail:</label>
                                       <input type="text" class="form-control" value="" name="adresseElectronique">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Type*:</label>
                                       <div class="form-check">
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
                                    </div>
                                 </div>     
                                                   
                                 <!-- END OF FIRST COL -->
   
                                 <!-- START OF SECOND COL -->
                                 <div class="col">
                                    <h5>Responsable</h5>
                                       <div class="form-group">
                                          <label for="formEtab">Civilité*:</label>
                                          <select class="form-control" name="civiliteResponsable">
                                             <option value="M.">M.</option>
                                             <option value="Mme">Mme</option>
                                             <option value="Melle">Melle</option>
                                          </select>    
                                       </div>
                                    <div class="form-group">
                                       <label for="formEtab">Nom*:</label>
                                       <input type="text" class="form-control" value="" name="nomResponsable">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Prénom*:</label>
                                       <input type="text" class="form-control" value="" name="prenomResponsable">
                                    </div>
                                    <div class="form-group">
                                       <label for="formEtab">Nombre chambres offertes*:</label>
                                       <input type="text" class="form-control" value="" name="nombreChambresOffertes">
                                    </div>
                                 </div>
                                 <!-- END OF SECOND COL -->
                              </div> 
                           </div>
                        <div class="text-center">
                           <input class="btn btn-outline-info" type="submit" value="Valider" name="valider" />
                           <input class="btn btn-outline-dark" type="reset" value="Annuler" name="annuler" />
                        </div>
                        </form>
                     </div>           
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
                  </br>

         <!-- Footer -->
         @include('_footer')
         <!-- /.footer -->    
      </div>
      <!-- ./wrapper -->

      <!-- ./wrapper -->

      <!-- jQuery -->
      @include('jQuery')
      <!-- /.jQuery -->
   </body>
</html>
