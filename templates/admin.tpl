{include file="header.tpl"}

{include file="form_products.tpl"}


<h1>Lista de productos: </h1>

<div class="tabla-productos">
    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Precio</th>
            </tr>
        </thead>
        {foreach from=$products item=$product}
            <tr>
                <td>{$product->modelo} </td>
                <td>{$product->marca} </td>
                <td>${$product->precio}</td>
                <td><a href='deleteProduct/{$product->id}' type='button' class="btn">Borrar</a></td>
                <td><a href='detailProduct/{$product->id}' type='button' class="btn">Detalle</a></td>
                <td><a href='showFormEditProduct/{$product->id}' type='button' class="btn">Editar</a></td>
            </tr>
        {/foreach}
    </table>
</div>

<h1>Lista de categorias: </h1>

<div class="tabla-categorias">
<table>
    <thead>
        <tr>
            <th>Categoria</th>
        </tr>
    </thead>

    {foreach from=$categories item=$category}
        <tr>
            <td>{$category->categoria}</td>
            <td><a href='deleteCategory/{$category->id}' type='button' class="btn">Borrar</a></td>
            <td><a href='detailCategory/{$category->id}' type='button' class="btn">Productos</a></td>
            <td><a href='showFormEditCateg/{$category->id}' type='button' class="btn">Editar</a></td>
        </tr>
    {/foreach}

</table>
</div>

{include file="footer.tpl"}