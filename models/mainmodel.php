<?php

include_once 'models/producto.php';

class MainModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function get(){
        $items = [];
        try{
            $query = $this->db->connect()->query("SELECT * FROM catalogoproductos");
            while($row = $query->fetch()){
                $item = new Producto();
                $item->idProducto = $row['idProducto'];
                $item->sku = $row['sku'];
                $item->descripcion = $row['descripcion'];
                $item->marca = $row['marca'];
				$item->color = $row['color'];
				$item->precio = $row['precio'];
                array_push($items, $item);
            }
			
            return $items;
        } catch(PDOException $e){
            return [];
        }
    }

    public function getById($idProducto) {
        $item = new Producto();
        try {
            $query = $this->db->connect()->prepare("SELECT * FROM catalogoproductos WHERE idProducto = :idProducto");
            $query->execute(['idProducto' => $idProducto]);
            while($row = $query->fetch()){
                $item->idProducto = $row['idProducto'];
                $item->sku = $row['sku'];
                $item->descripcion = $row['descripcion'];
                $item->marca = $row['marca'];
				$item->color = $row['color'];
				$item->precio = $row['precio'];
            }

            return $item;
        } catch(PDOException $e) {
            return null;
        }
    }

    public function update($item){
        try{
            $query = $this->db->connect()->prepare('UPDATE catalogoproductos SET sku = :sku, descripcion = :descripcion, marca = :marca, color = :color, precio = :precio WHERE idProducto = :idProducto');
            $query->execute([
                'sku' => $item['sku'],
                'descripcion' => $item['descripcion'],
                'marca' => $item['marca'],
                'color' => $item['color'],
                'precio' => $item['precio'],
                'idProducto' => $item['idProducto']
            ]);
            return true;
        } catch(PDOException $e){
            return false;
        }        
    }

    public function deleteProduct($idProducto){
        try{
            $query = $this->db->connect()->prepare('DELETE FROM catalogoproductos WHERE idProducto = :idProducto');
            $query->execute(['idProducto' => $idProducto]);
            return true;
        } catch(PDOException $e){
            return false;
        }
    }
}

?>