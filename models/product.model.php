<?php

class ProductModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    /**
     * Devuelve la lista de tareas completa.
     */
    public function getAllProducts() {  
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT productos.*, categorias.categoria FROM productos JOIN categorias ON productos.id_categoria = categorias.id order by productos.id asc"); //vinculo categoria con producto. LO HAGO PARA MOSTRAR LAS CATEGORIAS EN TODOS LOS PRODUCTOS. CON ORDER BY el producto agregado se muestra ultimo. (ASC -> ULTIMO)
        $query->execute();

        // 3. obtengo los resultados
        $products = $query->fetchAll(PDO::FETCH_OBJ); 
        
        return $products;
    }

    public function getProduct($id){

        $query = $this->db->prepare("SELECT productos.*, categorias.categoria FROM productos JOIN categorias ON productos.id_categoria = categorias.id WHERE productos.id = ?"); // Join (agrego productos.id para seleccionar ese id) LO HAGO PARA MOSTRAR LA CATEGORIA EN EL DETALLE.
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    
   public function getProductsByCategory($id){
        $query = $this->db->prepare("SELECT * FROM productos WHERE id_categoria = ?");
        $query->execute([$id]);

        $productByCategory = $query->fetchAll(PDO::FETCH_OBJ);  //LE PONGO FETCH ALL PORQUE TRAE VARIOS.
        return $productByCategory;

    }

    public function insertProduct($modelo, $marca, $precio,$categoria, $imagen = null) {
        $pathImg = '';
        if ($imagen)        //Si hay imagen que la muestre, sino q muestre el campo vacio.
            $pathImg = $this->uploadImage($imagen);

            $query = $this->db->prepare("INSERT INTO productos (modelo, marca, precio, id_categoria, imagen) VALUES (?, ?, ?, ?,?)");
            $query->execute([$modelo, $marca, $precio,$categoria,$pathImg]);
    
            return $this->db->lastInsertId();  
    }

    //AGREGO ESTE METODO PRIVADO PARA INSERTAR IMAGENES
    private function uploadImage($image){
        $target = 'uploads/' . uniqid() . '.jpg'; //esta funcion nos genera un id que es unico, por si hay img con mismo nombre cuando se ingresa
        move_uploaded_file($image, $target);
        return $target;
    }


    function deleteProductById($id) {
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$id]);

        header("Location: " . BASE_URL ); 
    }

    function updateProductById($modelo,$marca,$precio,$imagen,$id_categoria,$id) {
        $query = $this->db->prepare('UPDATE productos SET modelo = ?, marca = ?, precio = ?, imagen = ?, id_categoria = ? WHERE id = ?;');
        $query->execute([$modelo,$marca,$precio,$imagen,$id_categoria,$id]);

        header("Location: " . BASE_URL. "admin" ); //Lo mando a la seccion admin luego de editar.
    }

}
