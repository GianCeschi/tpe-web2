<?php
require_once 'controllers/product.controller.php';
require_once 'controllers/category.controller.php';
require_once 'controllers/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$productController = new ProductController();
$categoryController = new CategoryController(); //NO OLVIDAR DE INSTANCIAR CONTROLADOR QUE AGREGO PORQUE NO FUNCIONA SINO.
$authController = new AuthController();

// product/ID

// tabla de ruteo
switch ($params[0]) {
    case 'login':
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController->validateUser();
        break;
    case 'logout':
        $authController->logout();
        break;

    case 'home':
        $productController->showHome();
        break;
    case 'category':
        $categoryController->showCategories();
        break;
    case 'detailProduct':
        $id = $params[1];
        $productController->showProduct($id); 
        break;
    case 'detailCategory':
        $id = $params[1];
        $categoryController->showProductOfCategory($id);
        break;
    case 'products':
        $productController->showProducts();
        break;
    case 'admin': 
        $productController->showProductsAdmin();
        if ((isset($_POST)) && (!empty($_POST))) {
            $productController->addProduct();
            break;
        }
        break;
    case 'add-category':
        $categoryController->showCategoriesAdmin();
        if ((isset($_POST)) && (!empty($_POST))) {
            $categoryController->addCategory();        //Agrego una categoria
            break;
        }
        break;
    case 'showFormEditProduct':
        $id = $params[1];
        $productController->showFormEdit($id);     //UPDATE ES EN DOS PARTES. 1)MUESTRO FORM. 2)EDITAR PRODUCTOS.
        break;
    case 'editProduct':
        $productController->updateProduct(); //
        break;
    case 'showFormEditCateg':
        $id = $params[1];
        $categoryController->showFormEditCateg($id);
        break;
    case 'editCategory':
        $categoryController->updateCategory();
        break;
    case 'deleteProduct':
        // obtengo el parametro de la acción
        $id = $params[1];
        $productController->deleteProduct($id);
        break;
    case 'deleteCategory':
        $id = $params[1];
        $categoryController->deleteCategory($id);
        break;
    default:
        echo ('404 Page not found');
        break;
}
