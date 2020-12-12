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
                     <h1 class="m-0 text-dark">Liste établissements</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="home">Accueil</a></li>
                     <li class="breadcrumb-item active">Liste établissements</li>
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

                     // FAIRE LES REQUETES
                     // $req=obtenirReqEtablissements();
                     // $rsEtab=$connexion->query($req);
                     // $lgEtab=$rsEtab->fetchAll(PDO::FETCH_ASSOC);
                  ?>
                     <!-- BOUCLE SUR LES ÉTABLISSEMENTS -->
                  </br>
                     <div class="row justify-content-center">
                        <div class="col-auto">
                           <table class="table table-Etab table-hover">
                              <!-- <caption style="caption-side:top;text-align:center">Etablissements</caption>-->
                                    <tbody>
                                    <?php foreach ($etablissement as $row) {
                                       $nomEtab = $row->nomEtab;
                                       $idEtab = $row->idEtab;
                                       echo '<tr>';
                                       echo '<td style="width: 500px;">'.$nomEtab.'
                                             </td>';
                                       echo '<td>
                                                <a href="/listeEtablissements/'.$idEtab.'">Voir détail</a>
                                             </td>';
                                       echo '<td>
                                                <a href="/listeEtablissements/edit/'.$idEtab.'">Modifier</a>
                                             </td>';
                                       $nbOccup = obtenirNbOccup($connexion, $idEtab);
                                       $nbOffertes = obtenirNbOffertes($connexion, $idEtab);
                                       if ($nbOccup == $nbOffertes)
                                          {
                                             echo '<td>Complet</td>';
                                          }
                                       else if (!existeAttributionsEtab($connexion, $idEtab))
                                          {
                                             echo '<td>
                                                      <form method="POST" action="/listeEtablissements/delete/'.$idEtab.'" onsubmit="return ConfirmDelete( this )">';
                                                      ?>
                                                      {{ method_field('DELETE') }}
                                                      {{ csrf_field() }}
                                                      <?php
                                                      echo '<button type="button" class="btn btn-info btn-sm">Supprimer</button>
                                                      </form>
                                                   </td>';
                                          }
                                       else
                                          {
                                             echo '<td></td>';          
                                          }        
                                    }
                                    echo'</table>';
                                    $connexion=NULL;
                                    echo  '<tr>';
                                    ?>
                                    <div class="row justify-content-center">
                                             <a class="btn btn-outline-dark" href="{{ url('listeEtablissement/create') }}" role="button">Création établissement</a>
                                    </div>
                                    
                                    
                                    </tbody>
                           </table>
                        </div>
                     </div>
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
