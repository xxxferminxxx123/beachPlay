<?php

require '../conexion.php';


class Persona{

    public function GUARDAR($id_producto,$nombre,$precio,$descripcion){
      $conexion=new Conexion();
      $stmt=$conexion->prepare("INSERT INTO producto(id_producto,nombre,precio,descripcion)
        VALUES( :id_producto,
                :nombre,
                :precio,
                :descripcion);
        ");
      $stmt->bindValue(":id_producto",$id_producto,PDO::PARAM_INT);
      $stmt->bindValue(":nombre",$nombre,PDO::PARAM_STR);
      $stmt->bindValue(":precio",$precio,PDO::PARAM_STR);
      $stmt->bindValue(":descripcion",$descripcion,PDO::PARAM_STR);
      if($stmt->execute()){
        return "OK";
      }else{
        return"ERROR : se ha generado un error al guardar la informacion";
      }
    }
    public function Modificar($id_producto,$nombre,$precio,$descripcion){
      $conexion=new Conexion();
      $stmt=$conexion->prepare("UPDATE producto
            SET nombre=:nombre,
                precio=:precio,
                descripcion=:descripcion
            WHERE id_producto=:id_producto;");
      $stmt->bindValue(":nombre",$nombre,PDO::PARAM_STR);
      $stmt->bindValue(":precio",$precio,PDO::PARAM_STR);
      $stmt->bindValue(":descripcion",$descripcion,PDO::PARAM_STR);
      $stmt->bindValue(":id_producto",$id_producto,PDO::PARAM_INT);

      if($stmt->execute()){
        return "OK";
      }else{
        return"ERROR : se ha generado un error al guardar la informacion";
      }
    }
    public function Eliminar($id_producto){
      $conexion=new Conexion();
      $stmt=$conexion->prepare("DELETE  FROM producto
          WHERE id_producto=:id_producto;
        ");
      $stmt->bindValue(":id_producto",$id_producto,PDO::PARAM_INT);

      if($stmt->execute()){
        return "OK";
      }else{
        return"ERROR : se ha generado un error al guardar la informacion";
      }
    }

    public function CONSULTAR(){
      $conexion=new Conexion();
      $stmt=$conexion->prepare("SELECT*FROM `beachplay`.`producto` ");
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function ConsultarId($id_producto){
      $conexion=new Conexion();
      $stmt=$conexion->prepare("SELECT*FROM `beachplay`.`producto` where id_producto=:id_producto");
      $stmt->bindValue(":id_producto",$id_producto, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_OBJ);
    }
}



?>