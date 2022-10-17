<?php
require_once 'models/category.model.php';
require_once 'views/category.view.php';
require_once 'models/product.model.php';

class CategoryController
{
    private $model;
    private $view;
    private $productModel;

    function __construct()
    {
        $this->model = new CategoryModel();
        $this->productModel = new ProductModel();
        $this->view = new CategoryView();
    }

    function showCategories()
    {
        session_start(); //Para que aparezca CERRAR SESION si esta logueado.
        //Obtiene las categorias del modelo.
        $categories = $this->model->getAllCategories();
        $this->view->showCategories($categories);
    }

    function showProductOfCategory($id)
    {
        session_start(); //Para que aparezca CERRAR SESION si esta logueado.

        $productsByCategory = $this->productModel->getProductsByCategory($id);
        $this->view->showProducts($productsByCategory);     //para ver productos segun categoria.

    }

    function showCategoriesAdmin()
    {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        //Obtiene las categorias del modelo.
        $categories = $this->model->getAllCategories();
        $this->view->ShowCategoriesAdmin($categories);
    }

    function addCategory()
    {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        //El administrador agrega productos.

        $categoriaNueva = $_POST['categoriaNueva'];

        $id = $this->model->insertCategory($categoriaNueva);

        header("Location: admin");
    }

    function deleteCategory($id)
    {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $this->model->deleteCategoryById($id);
        header("Location: " . BASE_URL . "admin");
    }

    function showFormEditCateg($id)
    {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        $category = $this->model->getCategory($id);
        //var_dump($category);  CUANDO HAY ERRORES HACER VAR_DUMP ENTRE MEDIO.                                
        $this->view->ShowFormEditCateg($category);
    }

    function updateCategory()
    {
        // barrera de seguridad
        $authHelper = new AuthHelper();
        $authHelper->checkLoggedIn();

        if (!empty($_POST)) {
            $id = $_POST['id'];
            $categoriaNueva = $_POST['categoriaNueva'];

            $this->model->updateCategoryById($categoriaNueva, $id);
        }
    }
}
