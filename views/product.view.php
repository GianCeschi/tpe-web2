<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class ProductView{

    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty(); //Inicializo Smarty.
    }


    function showProducts($products){ 

        //asigno variables al tpl Smarty.
        $this->smarty->assign('products', $products);

        //mostrar el tpl.
        $this->smarty->display('product.tpl');
       
    }

    function showProduct($product){

        $this->smarty->assign('product', $product);

        $this->smarty->display('detailProduct.tpl');
    }

    function showHome(){
        $this->smarty->assign('home');

        $this->smarty->display('home.tpl');
    }

    function ShowProductsAdmin($products, $categories){ 
        
        $this->smarty->assign('products', $products);
        $this->smarty->assign('categories', $categories);
    
        $this->smarty->display('admin.tpl');
    }

    function ShowFormEdit($product,$categories){

        $this->smarty->assign('product',$product);
        $this->smarty->assign('categories',$categories);

        $this->smarty->display('form_edit_product.tpl');
    }

}
?>

