<form action="admin" method="POST" enctype="multipart/form-data">  <!-- ...Envia los datos al servidor -->

    <label for="">Modelo: </label>
    <input type="text" name="modelo">

    <label for="">Marca: </label>
    <input type="text" name="marca">

    <label for="">Precio: </label>
    <input type="number" name="precio">

    <label for="">Imagen</label>
    <input type="file" name="imagen">

    <label >Categoria</label>
    <select name="categoria">
        {foreach from=$categories item=$category}
        <option value="{$category->id}">{$category->categoria}</option>
        {{/foreach}}
    </select>

    <button type="submit" class="btn">Enviar</button>

</form>

<form action="add-category" method="POST">

    <label for="">Agregar una categoria: </label>
    <input type="text" name="categoriaNueva">
    <button type="submit" class="btn">Enviar</button>

</form>



