<?php
class CategoryView{

    
    private $smarty;

    public function __construct(){
        $this->smarty = new Smarty(); //Inicializo Smarty.
    }

    function showCategories($categories){       

        //asigno variables al tpl Smarty.
        $this->smarty->assign('categories', $categories);

        //mostrar el tpl.
        $this->smarty->display('category.tpl');
       
    }

    
    function showProducts($products){ //Siempre las views reciben lo que quieren mostrar.
        
        $this->smarty->assign('products', $products);
    
        $this->smarty->display('detailCategory.tpl');
    }
     
    function ShowCategoriesAdmin($categories){ 

        $this->smarty->assign('categories', $categories);

        $this->smarty->display('admin.tpl'); 
    }

    function ShowFormEditCateg($category){
        $this->smarty->assign('category',$category);
        $this->smarty->display('form_edit_categ.tpl');
    }
}

?>