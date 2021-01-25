<?php $v->layout("_theme"); ?>


<?php $v->start("subpage");?>
<body class="subpage">
<header id="header">
<?php $v->end();?>

<article class="auth">
    <div class="inner">
        <div class="auth_content container content">
        <header class="auth_header align-center">
            <h1>Fazer Login</h1>
            
        </header>

        <form class="auth_form" action="<?= url("/admin"); ?>" method="post" enctype="multipart/form-data">
            <label>
                <div><span>Usuario:</span></div>
                <input type="text" name="name" placeholder="Informe o Usuario" required/>
            </label>

            <label>
                <div>
                    <span>Senha:</span>
                </div>
                <input type="password" name="password" placeholder="Informe sua senha:" required/>
            </label>
            <button class="auth_form_btn transition gradient gradient-green gradient-hover">Entrar</button>
        </form>
    </div>
    </div>
</article>