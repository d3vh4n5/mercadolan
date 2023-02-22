<?php
include '../class/autoload.php';

if (!isset($_GET['redireccion'])){
    header('location: ../index.php');
    return;
} else {
    $nuevaVisita = new visitas();
    switch ($_GET['origen']){
        case 'mlan':
            $nuevaVisita->origen = 'CV-mlan';
            $nuevaVisita->guardar();
            header('location: ../index.php');
            break;
        case 'codemlan':;
            $nuevaVisita->origen = 'CV-Code-mlan';
            $nuevaVisita->guardar();
            header('location: https://github.com/JuanBasgall/mercadolan');
            break;
        case 'codecrudcac':
            $nuevaVisita->origen = 'CV-Code-CRUD-CaC';
            $nuevaVisita->guardar();
            header('location: https://github.com/JuanBasgall/CRUDCaCPython');
            break;
        case 'arbeit':
            $nuevaVisita->origen = 'CV-Arbeit';
            $nuevaVisita->guardar();
            header('location: https://drive.google.com/drive/folders/1k1b9El1rcq3YwZVhu9kriLMYnr0KENds');
            break;
        case 'linkedin':
            $nuevaVisita->origen = 'CV-linkedin';
            $nuevaVisita->guardar();
            header('location: https://www.linkedin.com/in/juanangelbasgall/');
            break;
        case 'github':
            $nuevaVisita->origen = 'CV-GitHub';
            $nuevaVisita->guardar();
            header('location: https://github.com/JuanBasgall');
            break;
        case 'linkcv':
            $nuevaVisita->origen = 'CV-Link-Version: IT';
            $nuevaVisita->guardar();
            header('location: ./views/cv.pdf');
            break;
        default:
            break;
        
    }
}
/*
 * localhost:
 * http://localhost/MIPROYECTO/backend/redireccion.php?redireccion&origen=linkcv
 * 
 * Links para el cv:
https://mercadolan.000webhostapp.com/backend/redireccion.php?redireccion&origen=mlan
https://mercadolan.000webhostapp.com/backend/redireccion.php?redireccion&origen=codemlan
https://mercadolan.000webhostapp.com/backend/redireccion.php?redireccion&origen=codecrudcac
https://mercadolan.000webhostapp.com/backend/redireccion.php?redireccion&origen=arbeit
https://mercadolan.000webhostapp.com/backend/redireccion.php?redireccion&origen=linkedin
https://mercadolan.000webhostapp.com/backend/redireccion.php?redireccion&origen=github
https://mercadolan.000webhostapp.com/backend/redireccion.php?redireccion&origen=linkcv
 * 
 * 
 */