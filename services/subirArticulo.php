<?php

    
    include_once '../../services/db_functions.php';
    include_once '../../services/config.php';

    $db= new db_functions;

    $idRevista = $_POST["idRevista"];
    $pagina = $_POST["pagina"];
    $autor = $_POST["autor"];
    $pais = $_POST["pais"];
    $titulo = $_POST["titulo"];
    $claseTitulo = $_POST["estiloTitulo"];
    $flotadoImagen = $_POST["flotadoImagen"];
    $texto = $_POST["texto"];
    $imagen = $_POST["imagen"];
    $anchoImagen = $_POST["anchoImagen"];
    $nivel = $_POST["nivel"];
    $schNew = $_POST["schnew"];
    $categoria = $_POST["categoria"];
    $emoticono = $_POST["emoticono"];
    $flotarEmoticono = $_POST["flotarEmoticono"];
    $audio = $_POST["audio"];
    $pregunta = $_POST["pregunta"];
    $respuesta1 = $_POST["respuesta1"];
    $respuesta2 = $_POST["respuesta2"];
    $respuesta3 = $_POST["respuesta3"];
    $respuesta4 = $_POST["respuesta4"];
    $correcta = $_POST["correcto"];



    $subirArticulo = $db->insertarArticulo($idRevista, $pagina, $autor, $pais, $titulo, $claseTitulo, $flotadoImagen, $texto, $imagen, $anchoImagen, $nivel, $schNew, $categoria, $emoticono, $flotarEmoticono, $audio, $pregunta, $respuesta1, $respuesta2, $respuesta3, $respuesta4, $correcta);

?>