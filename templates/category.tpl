{include file="header.tpl"}

<h1>Lista de categorias:</h1>
<div class="tabla-categorias">
<table>
<thead>
            <tr>
                <th>Categoria</th>
            </tr>
        </thead>
    {foreach from=$categories item=$category}
        <tr>
            <td>{$category->categoria} </td>
            <td><a href='detailCategory/{$category->id}' type='button' class="btn">Ver productos</a></td>
        </tr>
    {/foreach}
</table>
</div>


{include file="footer.tpl"}