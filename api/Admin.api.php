<?php
require_once '../classes/dbconnect.class.php';
require_once '../classes/Admin.class.php';

$Adm = new Admin();

if ($_REQUEST['mode'] == 'load') {
    $ListRespo = $Adm->ReadAllResponsable();
    $row = $ListRespo->fetchAll();
    echo json_encode($row);
} else if ($_REQUEST['mode'] == 'loadOne') {
    $R1 = $Adm->ReadSpecificResponsable($_REQUEST['id']);
    $row = $R1->fetch();
    echo json_encode($row);
} else if ($_REQUEST['mode'] == 'insert') {
    var_dump($_REQUEST);
    $Adm->AddResponsable($_REQUEST['cin'],$_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['email'],$_REQUEST['login'],$_REQUEST['psw'],$_REQUEST['sexe']);
} else if ($_REQUEST['mode'] == 'update') {
    $Adm->UpdateResponsable($_REQUEST['cin'],$_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['email'],$_REQUEST['login'],$_REQUEST['psw'],$_REQUEST['sexe']);
} else if ($_REQUEST['mode'] == 'delete') {
    $Adm->DeleteResponsable($_REQUEST['id']);
}