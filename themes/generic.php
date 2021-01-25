<?php $v->layout("_theme");?>

<?php $v->start("subpage");?>
<body class="subpage">
<header id="header">
<?php $v->end();?>
		<!-- One -->
			<section id="One" class="wrapper style3">
				<div class="inner">
					<header class="align-center">
						<p>Eleifend vitae urna</p>
						<h2>Generic Page Template</h2>
					</header>
				</div>
			</section>

		<!-- Two -->
		<?php foreach ($conteudo as $conteudo):?>
			<section id="two" class="wrapper style2">
				<div class="inner">
					<div class="box">
						<div class="content">
							<header class="align-center">
								<p><?= $conteudo->subtitle;?></p>
								<h2><?= $conteudo->title;?></h2>
							</header>
							<?= $conteudo->body;?>
								
						</div>
					</div>
				</div>
			</section>
			<?php endforeach;?>