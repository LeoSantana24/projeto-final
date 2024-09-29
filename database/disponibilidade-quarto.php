<?php

if(isset($_POST["submit"])){
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $adults = $_POST["adults"];
    $children = $_POST["children"];

    $erros = "";
    if($checkin == null){
        $erros .= "&res-checkin=false";
    }
    if($checkout == null){
        $erros .= "&res-checkout=false";
    }
    if($adults == null){
        $erros .= "&res-adults=false";
    }
    if($children == null){
        $erros .= "&res-children=false";
    }


    
}











?>