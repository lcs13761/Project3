<?php $v->layout("_theme"); ?>
<!-- Banner -->
<?php $v->start("subpage");?>
	<body>
	<header id="header" class="alt">
<?php $v->end();?>

<section class="banner full">
	<article>
		<img src="<?= theme("/assets/images/slide01.jpg");?>" alt="" />
		<div class="inner">
			<header>
				<p>A free responsive web site template by <a href="https://templated.co">TEMPLATED</a></p>
				<h2>Hielo</h2>
			</header>
		</div>
	</article>
	<article>
		<img src="<?= theme("/assets/images/slide02.jpg");?>" alt="" />
		<div class="inner">
			<header>
				<p>Lorem ipsum dolor sit amet nullam feugiat</p>
				<h2>Magna etiam</h2>
			</header>
		</div>
	</article>
	<article>
		<img src="<?= theme("/assets/images/slide03.jpg");?>" alt="" />
		<div class="inner">
			<header>
				<p>Sed cursus aliuam veroeros lorem ipsum nullam</p>
				<h2>Tempus dolor</h2>
			</header>
		</div>
	</article>
	<article>
		<img src="<?= theme("/assets/images/slide04.jpg");?>" alt="" />
		<div class="inner">
			<header>
				<p>Adipiscing lorem ipsum feugiat sed phasellus consequat</p>
				<h2>Etiam feugiat</h2>
			</header>
		</div>
	</article>
	<article>
		<img src="<?= theme("/assets/images/slide05.jpg");?>" alt="" />
		<div class="inner">
			<header>
				<p>Ipsum dolor sed magna veroeros lorem ipsum</p>
				<h2>Lorem adipiscing</h2>
			</header>
		</div>
	</article>
</section>

<!-- One -->
<?php if(!empty($conteudo)):?>

<section id="one" class="wrapper style2">
	<div class="inner">
		<div class="grid-style">
		<?php foreach($conteudo as $conteudo):?>	
			<div>
				<div class="box">
					<div class="image fit">
						<img src="<?= theme($conteudo->imagem);?>" alt="" />
					</div>
					<div class="content">
						<header class="align-center">
							<p>	<?= $conteudo->subtitle; ?></p>
							<h2><?= $conteudo->title; ?></h2>
						</header>
						<p class = "fort"><?= $conteudo->subconteudo; ?></p>
						<footer class="align-center">
							<a href="<?= url("/generic/{$conteudo->url}");?>" class="button alt">Learn More</a>
						</footer>
					</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>
		<?= $paginator; ?>
	</div>
</section>
<?php else:?>
	<div class="content content cont1">
        <div class="empty_content">
            <h3 class="empty_content_title">Ooops, não temos conteúdo aqui :/</h3>
            <p class="empty_content_desc">Ainda estamos trabalhando, em breve teremos novidades para você :)</p>
        </div>
    </div> 
<?php endif; ?>


