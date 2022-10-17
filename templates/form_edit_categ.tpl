{include file="header.tpl"}

<form action="editCategory" method="POST">
    <label for="">Editar categoria: </label>
    <input type="text" name="categoriaNueva" value="{$category->categoria}">
    <button type="submit" class="btn">Editar</button>

    <input type="hidden" name="id" value="{$category->id}"> <!-- le paso el id oculto. No olvidar pasarle el id -->
</form>

{include file="footer.tpl"}