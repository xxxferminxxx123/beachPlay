<?php

require '../Modelo/Persona.php';

    if($_POST){
        $persona=new Persona();
        switch($_POST["accion"]){

            case"CONSULTAR":
                echo json_encode($persona->Consultar());
                break;
            case"CONSULTAR_ID":
                echo json_encode($persona->ConsultarId($_POST["id_producto"]));
                break;
            case"GUARDAR":
                $id_producto=$_POST["id_producto"];
                $nombre=$_POST["nombre"];
                $precio=$_POST["precio"];
                $descripcion=$_POST["descripcion"];
                $respuesta=$persona->Guardar($id_producto,$nombre,$precio,$descripcion);
                echo json_encode($respuesta);
                break;
            case"MODIFICAR":
                $id_producto=$_POST["id_producto"];
                $nombre=$_POST["nombre"];
                $precio=$_POST["precio"];
                $descripcion=$_POST["descripcion"];
                $respuesta=$persona->Modificar($id_producto,$nombre,$precio,$descripcion);
                echo json_encode($respuesta);
                break;
            case"ELIMINAR":
                $id_producto=$_POST["id_producto"];
                $respuesta=$persona->ELIMINAR($id_producto); 
                echo json_encode($respuesta);
                 break;

        }

    }





?>