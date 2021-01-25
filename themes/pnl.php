<?php $v->layout("_theme"); ?>

<?php $v->start("subpage"); ?>

<body class="subpage p">
    <header id="header">
        <?php $v->end(); ?>


    <div class  = "tab">
        <table  class = "table">
                            <tr>
                            <?= $v->section("tbcont");?>  
                            </tr>
                        </table>
    </div>
        <?= $v->section("content");