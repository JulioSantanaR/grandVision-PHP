<?php

include_once 'models/tipoAlmacen.php';
include_once 'models/existencias.php';

class AlmacenModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function getCatalogoAlmacen(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT catAlmacen.*, tipo.tipoAlmacen FROM catalogoalmacenes catAlmacen INNER JOIN tipoalmacenes tipo ON catAlmacen.idTipoAlmacen = tipo.idTipoAlmacen");
            while($row = $query->fetch()){
                $item = new Almacen();
                $item->idAlmacen = $row['idAlmacen'];
                $item->nombreAlmacen = $row['nombreAlmacen'];
                $item->localizacion = $row['localizacion'];
                $item->responsable = $row['responsable'];
				$item->idTipoAlmacen = $row['idTipoAlmacen'];
                $item->tipoAlmacen = $row['tipoAlmacen'];
                array_push($items, $item);
            }
			
            return $items;
        } catch(PDOException $e){
            return [];
        }
    }

    public function getTipoAlmacen(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM tipoalmacenes");
            while($row = $query->fetch()){
                $item = new TipoAlmacen();
                $item->idTipoAlmacen = $row['idTipoAlmacen'];
                $item->tipoAlmacen = $row['tipoAlmacen'];
                array_push($items, $item);
            }
			
            return $items;
        } catch(PDOException $e){
            return [];
        }
    }

    public function insertarAlmacen($almacen){
        try{
            $query = $this->db->connect()->prepare('INSERT INTO catalogoalmacenes (nombreAlmacen, localizacion, responsable, idTipoAlmacen) VALUES(:nombreAlmacen, :localizacion, :responsable, :idTipoAlmacen)');
            $query->execute(['nombreAlmacen' => $almacen['nombreAlmacen'], 'localizacion' => $almacen['localizacion'], 'responsable' => $almacen['responsable'], 'idTipoAlmacen' => $almacen['idTipoAlmacen']]);
            return true;
        }catch(PDOException $e){
            echo "No se pudo insertar el almacen";
            return false;
        }        
    }

    public function getExistenciaProducto($idProducto, $idTipoAlmacen) {
        $items = [];
        try {
            $query = $this->db->connect()->prepare("SELECT exist.idExistencias, exist.idProducto, exist.idAlmacen, exist.existencias, catAlmacen.nombreAlmacen FROM existencias exist INNER JOIN catalogoalmacenes catAlmacen ON exist.idAlmacen = catAlmacen.idAlmacen AND exist.idProducto = :idProducto AND catAlmacen.idTipoAlmacen = :idTipoAlmacen");
            $query->execute(['idProducto' => $idProducto, 'idTipoAlmacen' => $idTipoAlmacen]);
            while($row = $query->fetch()){
                $item = new Existencias();
                $item->idExistencias = $row['idExistencias'];
                $item->idProducto = $row['idProducto'];
                $item->idAlmacen = $row['idAlmacen'];
                $item->existencias = $row['existencias'];
				$item->nombreAlmacen = $row['nombreAlmacen'];
                array_push($items, $item);
            }

            return $items;
        } catch(PDOException $e) {
            return null;
        }
    }
}

?>