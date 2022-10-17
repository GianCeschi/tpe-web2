<?php

class CategoryModel {

    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    public function getAllCategories() {
        // 1. abro conexión a la DB
        // ya esta abierta por el constructor de la clase

        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare("SELECT * FROM categorias");
        $query->execute();

        // 3. obtengo los resultados
        $categories = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos
        
        return $categories;
    }

    public function getCategory($id){

        $query = $this->db->prepare("SELECT * FROM categorias WHERE id = ?"); //
        $query->execute([$id]);

        $category = $query->fetch(PDO::FETCH_OBJ);
        return $category;
    }

    public function insertCategory($categoriaNueva) {
        
        $query = $this->db->prepare("INSERT INTO categorias (categoria) VALUES (?)");// tener cuidado en que el nombre de todos los items de la consulta sea el mismo que en phpmyAdmin
        $query->execute([$categoriaNueva]);

        return $this->db->lastInsertId();
    }

    function deleteCategoryById($id) {
        $query = $this->db->prepare('DELETE FROM categorias WHERE id = ?');
        $query->execute([$id]);

        header("Location: " . BASE_URL ); // Te redirige directo cuando elimina no es necesario actualizar la pagina.
    }

    function updateCategoryById($categoriaNueva,$id) {
        $query = $this->db->prepare('UPDATE categorias SET categoria = ? WHERE id = ?;');
        $query->execute([$categoriaNueva,$id]);

        header("Location: " . BASE_URL. "admin" );
       // var_dump($query->errorInfo()); //se ve el error
    }

}