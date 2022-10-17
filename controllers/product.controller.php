<?php
require_once 'models/product.model.php';
require_once 'views/product.view.php';
require_once 'models/category.model.php';
require_once 'helpers/auth.helpers.php';

class ProductController
{
  private $model;
  private $view;
  private $categoryModel;

  function __construct()
  {
    $this->model = new ProductModel();  
    $this->view = new ProductView();
    $this->categoryModel = new CategoryModel();
  }

  function showProducts()
  {
    session_start(); //Para que aparezca CERRAR SESION si esta logueado.
    //Obtiene los productos del modelo.
    $products = $this->model->getAllProducts();
    $this->view->showProducts($products);
  }

  function showProduct($id)
  { //DETALLE.
    //Obtiene un producto especifico.     
    session_start(); //Para que aparezca CERRAR SESION si esta logueado.
    $product = $this->model->getProduct($id);
    $this->view->showProduct($product);
  }

  function showHome()
  {
    session_start(); //Para que aparezca CERRAR SESION si esta logueado.
    $this->view->showHome();
  }

  function showProductsAdmin() 
  {
    // barrera de seguridad
    $authHelper = new AuthHelper();
    $authHelper->checkLoggedIn();

    //Obtiene los productos del modelo.
    $products = $this->model->getAllProducts();
    $categories = $this->categoryModel->getAllCategories();
    $this->view->ShowProductsAdmin($products, $categories);
  }

  function addProduct()
  {
    // barrera de seguridad
    $authHelper = new AuthHelper();
    $authHelper->checkLoggedIn();

    //El administrador agrega productos.

    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $categoria = (int)$_POST['categoria']; // Paso la categoria a int porque la tomaba como string

    //--------------- LO QUE AGREGO PARA PONER UNA IMAGEN

    if (
      $_FILES['imagen']['type'] == "image/jpg" ||
      $_FILES['imagen']['type'] == "image/jpeg" ||    
      $_FILES['imagen']['type'] == "image/png"
    ) {
      $this->model->insertProduct($modelo, $marca, $precio, $categoria, $_FILES['imagen']['tmp_name']);
    } else {
      $this->model->insertProduct($modelo, $marca, $precio, $categoria);
    }

    header("Location: admin");
  }


  //Elimino un producto con su ID.
  function deleteProduct($id)
  {
    // barrera de seguridad
    $authHelper = new AuthHelper();
    $authHelper->checkLoggedIn();

    $this->model->deleteProductById($id);
    header("Location: " . BASE_URL . "admin");
  }


  function showFormEdit($id)
  {
    // barrera de seguridad
    $authHelper = new AuthHelper();
    $authHelper->checkLoggedIn();

    $product = $this->model->getProduct($id);
    $categories = $this->categoryModel->getAllCategories(); // TRAIGO LAS CATEGORIAS DESDE EL MODELO DE CATEGORIAS.                                  
    $this->view->ShowFormEdit($product, $categories);
  }

  function updateProduct()
  {
    // barrera de seguridad
    $authHelper = new AuthHelper();
    $authHelper->checkLoggedIn();

    if (!empty($_POST)) {
      $id = $_POST['id'];
      $modelo = $_POST['modelo'];
      $marca = $_POST['marca'];
      $precio = $_POST['precio'];
      $imagen = $_POST['imagen'];
      $id_categoria = (int)$_POST['id_categoria']; //Es el mismo nombre que en la tabla de php(no va categoria solo).

      $this->model->updateProductById($modelo, $marca, $precio, $imagen, $id_categoria, $id);
    }
  }
}
