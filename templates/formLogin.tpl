{include 'header.tpl'}

<div>
    <form class="form-login" method="POST" action="validate">

            <label for="nameUser">Nombre de usuario</label>
            <input type="text" required id="nameUser" name="nameUser">

            <label for="email">Email</label>
            <input type="email" required id="email" name="email">
        
            <label for="password">Password</label>
            <input type="password" required id="password" name="password">

        {if $error}
            <div>
                {$error}
            </div>
        {/if}
        <button type="submit" class="btn">Entrar</button>
    </form>
</div>

{include file='footer.tpl'}