<?php $v->layout("pnl"); ?>

<?php $v->start("tbcont"); ?>
<td><a href="<?= url("/admin/painel/adicionar");?>">Adicionar</a></td> 
<?php $v->end();?>

<?php if(!empty($editar)):?>
<form class = "form_ed" action="<?= url("/admin/painel"); ?>" method="post" enctype="multipart/form-data">
    <?php foreach ($editar as $editar) : ?>
        <section>
           <div class = "boxx">
                    <table >
                        <tr>
                            <td class = "image fit"><img src="<?= theme($editar->imagem); ?>" alt="" /></td>
                        </tr>
                </div>
                <div class = "tt">
                    <tr>
                        <td class = "top">
                            <p><?= $editar->subtitle; ?></p>
                            <h2><?= $editar->title; ?></h2>
                        </td>
                    </tr>
                    <tr>
                        <td class = "contd"> 
                        <div class = "fort">
                            <p><?= $editar->subconteudo; ?></p>
                        </div>
                        </td>
                    </tr>
                </div>
                <div >
                    <tr class = "bnt">
                        <td class="form_btn">
                        <a name="id" value="<?= $editar->id;?> " href = "<?= url("/admin/painel/editar/$editar->id");?>">Editar</a>
                        <button  name="id" value="<?= $editar->id;?>">Excluir</button>
                        </td>
                    </tr>
                </div>
                </table>
        </section>      
    <?php endforeach; ?>
</form>
    <?= $paginator; ?>
<?php else:?>
    <div class="content content cont">
            <div class="empty_content">
                <h3 class="empty_content_title">Nenhum dado Listado!</h3>
                <p class="empty_content_desc">Adicione dados ao seu site</p>
            </div>
        </div>
<?php endif; ?>

