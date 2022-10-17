<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{BASE_URL}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DROPS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet"
        href="https://cdn.rawgit.com/mfd/09b70eb47474836f25a21660282ce0fd/raw/e06a670afcb2b861ed2ac4a1ef752d062ef6b46b/Gilroy.css">

</head>

<body>
    <header>
        <div class="encabezado">
            <a href="home">
                <h1 class="h1-header">DROPS</h1>
            </a>

            <div class="buscador">
                <input class="input-buscar" type="text" placeholder="Busca en nuestra tienda">
            </div>

            <div class="iconos">
                {if !isset($smarty.session.USER_ID) }
                    <a href='login' type='button' class="btn-login">LOGIN</a>
                {else}
                    <a href='logout' type='button' class="btn-logout">LOGOUT ({$smarty.session.USER_EMAIL})</a> 
                {/if}
                <img class="icono-encabezado" src="img/luna.png" alt="luna">
                <img class="icono-encabezado" src="img/carrito.png" alt="carrito">
                <img class="icono-usuario" src="img/usuario-2.jpg" alt="usuario">
            </div>
            <div class="btn-menu">
                <a>MENU</a>
            </div>
        </div>


        <nav class="menu-superior">
            <ul class="navegacion">
                <li><a href="home">Home</a></li>
                <li><a href="category">Categorias</a></li>
                <li><a href="products">Productos</a></li>
                <li><a href="admin">Admin</a></li>
            </ul>
        </nav>

    </header>



    <!-- inicio main container -->
<main>