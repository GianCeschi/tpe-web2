{include file="header.tpl"}

<div class="cinta-productos">
    {foreach from=$products item=$product}
        <div>
            <p> Modelo: {$product->modelo} </p>
            <p> Marca: {$product->marca} </p>
            <p> Precio: ${$product->precio}</p>
            <a href='detailProduct/{$product->id}'type='button' class="btn">Detalle</a>    
        </div> 
            <div>
            {if isset($product->imagen)}
                <img class="img-input" src="{$product->imagen}"/>
            {/if}  
            </div>
            
    {/foreach}
</div> 
{include file="footer.tpl"}