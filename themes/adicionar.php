<?php $v->layout("pnl");?>
<?php $v->start("tbcont"); ?>
<td><a href="<?= url("/admin/painel");?>">Painel</a></td> 
<?php $v->end();?>

<article class="auth">
            <div class="inner">
            
                <div class="auth_content container content">
                    <header class="auth_header align-center">
                       
                        <h1>Incluir Dados do produto</h1>
                    </header>

                    <form class="auth_form" action="<?= url("/admin/painel/adicionar"); ?>" method="post" enctype="multipart/form-data">
                        <label>
                            <div><span>Title:</span></div>
                            <input type="text" name="title" required />
                        </label>

                        <label>
                            <div>
                                <span>Subtitle:</span>
                            </div>
                            <input type="text" name="subtitle" required />
                        </label>
                        <label>
                            <div>
                                <span>Description:</span>
                            </div>
                            <input type="text" name="subconteudo" required />
                        </label>
                        <label>
                            <div>
                                <span>Body</span>
                            </div>
                            <textarea id="editor1" class="mce" name="body"></textarea>
                            <script>
                                CKEDITOR.replace('editor1');
                            </script>
                        </label>
                        <label>
                            <div>
                                <span>Imagem:</span>
                            </div>
                            <input type="file" name="imagem" multiple="multiple" required />
                        </label>
                        <label>
                            <input class = "url" type="text" name="url" value = "url" required />
                        </label>
                        <label>
                            <button class="auth_form_btn">Salvar</button>
                    </form>
                </div>
            </div>
        </article>
     