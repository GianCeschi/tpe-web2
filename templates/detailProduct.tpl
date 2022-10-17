{include file="header.tpl"}
<h1> Producto seleccionado: </h1>
<div class="detalle-producto">
    <p> Modelo: {$product->modelo} </p>
    <p> Marca: {$product->marca} </p>
    <p> Precio: ${$product->precio} </p>
    <p> Categoria: {$product->categoria} </p>
    <div>
    {if isset($product->imagen)}
        <img class="img-input" src="{$product->imagen}"/>
    {/if}
    </div>
</div>
{include file="footer.tpl"}