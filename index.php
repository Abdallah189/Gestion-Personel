<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Acceuil</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>

  <body id="page-top">
      <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">List Des Responsable</li>
          </ol>


       
    </div>
    <div class="container">
        
        <!-- <button onclick="loadData()">Test</button> -->
        <br>
        <div class="row">
            <div class="col-lg-6">
                <div class="input-group">
                    <button class="btn btn-info" data-toggle="modal" data-target="#newResponsableModal">
                        <i class="fas fa-user-plus"></i>&nbsp; Nouveau Responsable
                    </button>
                </div>
            </div>
            
        </div>
        <br>
      
        <div class="row">
        <div class="col-lg-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" id="search" placeholder="Rechercher dans la liste des Joueurs" required>
                </div>
            </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>num</th>
                            <th>cin</th>
                            <th>num Serie</th>   
                            <th>Nom</th>   
                            <th>Prenom</th>  
                            <th>email</th>  
                            <th>sexe</th>                   
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="listRespo">                                          
                    </tbody>
                </table>
                <center><div class="loader" style="display:none"></div></center>
            </div>
        </div>
        <!-- The new Joueur modal -->
        <div class="modal fade" id="newResponsableModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Nouveau Responsable</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                <div class="form-group">
                        <label class="control-label " for="nom">Cin:</label>
                        <input type="Number" name="nom" class="form-control" id="cin" placeholder="CIN de Responsable">
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="nom">Nom:</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom de Responsable">
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="prenom">Prénom:</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom de Responsable">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="email">Adresse Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email de Responsable">
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="sexe">Sexe:</label>
                        <select class="form-control" name="" id="sexe">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        </select>                     
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="login">Login:</label>
                        <input type="text" name="adresse" class="form-control" id="login" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="psw">Mot de passe:</label>
                        <input type="password" name="psw" class="form-control" id="psw" placeholder="Mot de passe">
                    </div>   
                    <div class="form-group">
                        <label class="control-label " for="Vpsw">Verifier le Mot de passe:</label>
                        <input type="password" name="psw" class="form-control" id="Vpsw" placeholder="Mot de passe">
                    </div>                 
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" required> Contrat lu et accepté</label>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btValider" id="btValider" class="btn btn-info">Valider</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                </div>

                </div>
            </div>
        </div>
        <!-- Edit Responsable modal -->
        <div class="modal fade" id="editResponsable">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Editer Responsable</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">    
                <div class="form-group">
                        <label class="control-label " for="numEdit">Numéro de Serie:</label>
                        <input type="Number" name="num" class="form-control" id="numEdit" placeholder="" disabled>
                    </div>            
                    <div class="form-group">
                        <label class="control-label " for="cinEdit">Cin:</label>
                        <input type="Number" name="nom" class="form-control" id="cinEdit" placeholder="CIN de Responsable" disabled>
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="nomEdit">Nom:</label>
                        <input type="text" name="nom" class="form-control" id="nomEdit" placeholder="Nom de Responsable">
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="prenomEdit">Prénom:</label>
                        <input type="text" name="prenom" class="form-control" id="prenomEdit" placeholder="Prénom de Responsable">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="emailEdit">Adresse Email:</label>
                        <input type="text" name="email" class="form-control" id="emailEdit" placeholder="Email de Responsable">
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="sexeEdit">Sexe:</label>
                        <select class="form-control" name="" id="sexeEdit">
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                        </select> 
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="loginEdit">Login:</label>
                        <input type="text" name="adresse" class="form-control" id="loginEdit" placeholder="Login">
                    </div>
                    <div class="form-group">
                        <label class="control-label " for="pswEdit">Mot de passe:</label>
                        <input type="password" name="psw" class="form-control" id="pswEdit" placeholder="Mot de passe">
                    </div> 
                    <div class="form-group">
                        <label class="control-label " for="VpswEdit">Verifier le Mot de passe:</label>
                        <input type="password" name="psw" class="form-control" id="VpswEdit" placeholder="Mot de passe">
                    </div> 
                    <div class="form-group">
                        <div class="checkbox">
                            <label><input type="checkbox" required> Contrat lu et accepté</label>
                        </div>
                    </div>
                    <input type="text" name="idEdit" id="idEdit" hidden>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" name="btUpdateJoueur" id="btUpdateRespo" class="btn btn-info">Valider</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                </div>
                
                </div>
            </div>
        </div>
    </div>   

  <script src="scripts/app.js"></script>
  </body>
</html>
