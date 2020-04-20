<?php
require_once '../classes/dbconnect.class.php';
require_once '../classes/Responsable.class.php';

$Respo = new Responsable();


if ($_REQUEST['mode'] == 'load') {
    $ListMem = $Respo->ReadAllMembres();
    $row = $ListMem->fetchAll();
    echo json_encode($row);
} else if ($_REQUEST['mode'] == 'loadOne') {
    $M1 = $Respo->ReadSpecificMembres($_REQUEST['num']);
    $row = $M1->fetch();
    echo json_encode($row);
} else if ($_REQUEST['mode'] == 'insert') {
    $Respo->AddMembre($_REQUEST['cin'],$_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['age'],$_REQUEST['tel'],$_REQUEST['pro'],$_REQUEST['sexe']);
} else if ($_REQUEST['mode'] == 'update') {
    $Respo->UpdateMembres($_REQUEST['cin'],$_REQUEST['nom'],$_REQUEST['prenom'],$_REQUEST['age'],$_REQUEST['tel'],$_REQUEST['pro'],$_REQUEST['sexe']);
}