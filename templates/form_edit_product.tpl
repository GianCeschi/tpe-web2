{include file="header.tpl"}

<form action="editProduct" method="POST">

    <label for="">Modelo: </label>
    <input type="text" name="modelo" value="{$product->modelo}">

    <label for="">Marca: </label>
    <input type="text" name="marca" value="{$product->marca}">

    <label for="">Precio: </label>
    <input type="number" name="precio" value="{$product->precio}">

    <label for="">Imagen</label>
    <input type="" name="imagen" value="{$product->imagen}">

    <label >Categoria</label>
    <select name="id_categoria" value="{$product->categoria}">
        {foreach from=$categories item=$product} <!-- recorre la tabla categorias dependiendo el producto -->
        <option value="{$product->id}">{$product->categoria}</option>
        {{/foreach}}
    </select>
    <input type="hidden" name="id" value="{$product->id}"> <!-- le paso el id oculto -->

    <button type="submit" class="btn">Editar</button>

</form>

{include file="footer.tpl"}