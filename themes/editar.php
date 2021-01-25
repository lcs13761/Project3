<?php $v->layout("pnl"); ?>
<?php $v->start("tbcont"); ?>
<td><a href="<?= url("/admin/painel"); ?>">Painel</a></td>
<td><a href="<?= url("/admin/painel/adicionar"); ?>">Adicionar</a></td>
<?php $v->end(); ?>

<?php if (!empty($editar)) : ?>
    <article class="auth">
        <div class="inner">

            <div class="auth_content container content">
                <header class="auth_header align-center">

                    <h1>Incluir Dados do produto</h1>
                </header>
                <?php foreach ($editar as $editar) : ?>
                    <form class="auth_form" action="<?= url("/admin/painel/editar/$editar->id"); ?>" method="post" enctype="multipart/form-data">
                        <label>
                            <div><span>Title:</span></div>
                            <input type="text" name="title" value="<?= $editar->title; ?>" required />
                        </label>

                        <label>
                            <div>
                                <span>Subtitle:</span>
                            </div>
                            <input type="text" name="subtitle" value="<?= $editar->subtitle; ?>" required />
                        </label>
                        <label>
                            <div>
                                <span>Description:</span>
                            </div>
                            <input type="text" name="subconteudo" value="<?= $editar->subconteudo; ?>" required />
                        </label>
                        <label>
                            <div>
                                <span>Body</span>
                            </div>
                            <textarea id="editor1" class="mce" name="body"></textarea>
                            <script>
                                CKEDITOR.replace('editor1');
                                CKEDITOR.instances.editor1.setData("<?= $editar->body; ?>");
                            </script>
                        </label>
                        <label>
                            <div>
                                <span>Imagem:</span>
                            </div>
                            <input type="file" name="imagem" />
                        </label>
                        <label>
                            <div>
                                <span>Url:</span>
                            </div>
                            <input type="text" name="url" value="<?= $editar->url; ?>" required />
                        </label>

                        <label>
                            <button class="auth_form_btn" value="<?= $editar->id; ?>">Salvar</button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </article>
<?php else : ?>
    <div class="content content cont">
        <div class="empty_content">
            <h3 class="empty_content_title">Nenhum dado Listado!</h3>
            <p class="empty_content_desc">Adicione dados ao seu site</p>
        </div>
    </div>
<?php endif; ?>