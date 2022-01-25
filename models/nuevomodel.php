<?php

class NuevoModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function insert($datos){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO catalogoproductos (sku, descripcion, marca, color, precio) VALUES(:sku, :descripcion, :marca, :color, :precio)');
            $query->execute(['sku' => $datos['sku'], 'descripcion' => $datos['descripcion'], 'marca' => $datos['marca'], 'color' => $datos['color'], 'precio' => $datos['precio']]);
            return true;
        }catch(PDOException $e){
            //echo $e->getMessage();
            echo "Ya existe ese producto";
            return false;
        }        
    }
}

?>