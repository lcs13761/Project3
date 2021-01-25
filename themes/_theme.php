<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="<?= theme("/assets/css/main.css");?>"/>
		<script src="/Project3/ckeditor/ckeditor.js"></script>
		<title><?= $head;?></title>
		
	</head>
		
		<?= $v->section("subpage");?>
		<!-- Header -->
		<?= $v->section("header");?>
				<div class="logo"><a href="<?= url("");?>">Hielo</a></div>
				<a href="#menu">Menu</a>
			</header>
			
		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="<?= url("");?>">Home</a></li>
					<li><a href="<?= url("/generic");?>">Generic</a></li>
					<li><a href="<?= url("/terms");?>">Terms</a></li>
				</ul>
			</nav>

		
     <?= $v->section("content");?> 

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a target="_blank" href="http://www.twitter.com/" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a target="_blank" href="http://www.facebook.com/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a target="_blank" href="http://www.instagram.com/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a target="_blank" href="http://www.gmail.com/" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
				</div>
				<div class="copyright">
					&copy; Untitled. All rights reserved.
				</div>
			</footer>

		<!-- Scripts -->
			<script src="<?= theme("/assets/js/jquery.min.js");?>"></script>
			<script src="<?= theme("/assets/js/jquery.scrollex.min.js");?>"></script>
			<script src="<?= theme("/assets/js/skel.min.js");?>"></script>
			<script src="<?= theme("/assets/js/util.js");?>"></script>
			<script src="<?= theme("/assets/js/main.js");?>"></script>
			

	</body>
</html>