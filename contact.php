
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Pizzeria Lastoria Miejsce Piastowe, Haczów</title>
		<link rel="stylesheet" type="text/css" href="layout.css" />
		<link rel="stylesheet" href="js/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="js/jquery.cycle.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</head>


	<body>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

		<!--
		<div id="like-box">
			<div class="outside">
				<div class="inside">
					<div class="fb-like-box" data-href="https://www.facebook.com/pages/MadDesigns/295185563927926?ref=hl" data-width="292" border_color="#3E5543" data-show-faces="true" data-stream="false" data-header="true"></div>
			</div>
		</div>
		<div class="belt"></div>
		</div>
		-->

		<div id="alert">
			<header>
				<a id="close" href="#">[X]</a>
			</header>
			<p></p>
		</div>

		<div id="overlay"></div>

		<div id="wrapper">

		<header id="page_header">

		<div id="logo">
			<a href="index.php"><img src="img/logo.png" alt="Pizzeria Lastoria" /></a>
		</div>
		<div id="logo_small">
			<a href="index.php"><img src="img/logo_small.png" alt="Pizzeria Lastoria" /></a>
		</div>

		<nav id="main_menu">
			<ul>
				<li><a id="category_1" href="index.php">Home</a></li>
				<li><a id="category_2" href="#">Menu</a>
					<ul>
						<li><a href="menu_mp.php">Miejsce Piastowe</a></li>
						<li><a href="menu_hacz.php">Haczów</a></li>
					</ul>
				</li>
				<li><a id="category_3" href="entertaitment.php">Rozrywka</a></li>
				<li><a id="category_4" href="gallery.php">Galeria</a></li>
				<li><a id="category_5" href="news.php">Aktualności</a></li>
				<li><a id="category_6" href="contact.php">Kontakt</a></li>

			</ul>
		</nav>

		</header>


		<main>

<div class="youarehere">Strona Główna > Kontakt</div>

<div class="container">
	<header>
		<h1>Pizzeria Lastoria</h1>
		<h2>Marek Domaradzki</h2>
	</header>

	<div id="info">

	<div id="maps">
		<h2>Haczów</h2>

		<p>
		Haczów 585<br/>
		36-213 Haczów<br/>
		tel: (13) 33 350 07<br/>
		kom: 601 463 446
		</p>

		<img alt="Mapka Haczów" src="img/map_h.png" />

		<div class="clear"></div>


		<h2 style="color:#9d221f;">Miejsce Piastowe</h2>

		<p>
		ul. Krośnieńska 1<br/>
		38-430 Miejsce Piastowe<br/>
		tel: (13) 43 393 34<br/> 
		tel: (13) 43 347 45<br/> 
		kom: 727 598 727
		</p>

		<img alt="Mapka Miejsce Piastowe" src="img/map_mp.png" />

		<div class="clear"></div>

	</div>


	<div id="form">

				<figure>
					<img src="img/contact.png" />
				</figure>

				<aside>
				<h3>Godziny dowozu</h3>
				<strong>Miejsce Piastowe</strong>
				<ul>
				<li>Poniedziałek - Piątek: 11-22</li>
				<li>Soboty, Niedziele, Święta: 16-22</li>
				<br/>
				<strong>Haczów</strong><br/>
				<li>Poniedziałek - Piątek: 12-22</li>
				<li>Soboty, Niedziele, Święta: 16-22</li>
				</aside>

				<h3>Napisz do nas</h3>
				<div class="form_wrapper">
				<form id="ajax-form" action="message.php" method="post">
				<table>
				<tr><td>Imię</td></tr>
				<tr><td><input type="text" name="imie" /></td></tr>
				<tr><td>Nazwisko</td></tr>
				<tr><td><input type="text" name="nazwisko" /></td></tr>
				<tr><td>Adres e-mail</td></tr>
				<tr><td><input type="text" name="email" /></td></tr>
				<tr><td>Treść</td></tr>
				<tr><td><textarea name="tresc"></textarea></td></tr>
				</table>
				<button id="send_btn" type="submit">Wyślij</button>

				</form>
				</div>

				<div class="facebook">
					<h3>Dołącz do nas na Facebooku</h3>
					<!--<img alt="Facebook" src="img/fb1.png" />-->
					<a class="fb" target="_blank" href="http://www.facebook.com/marek.lastoria?ref=ts&fref=ts" ></a>
				</div>

	</div>

	</div>

</div>




		</main>

		<footer id="page_footer">

				<div class="foot_row">
				<nav id="foot_menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="menu_mp.php">Men&#252;</a></li>
						<li><a href="entertaitment.php">Rozrywka</a></li>
						<li><a href="gallery.php">Galeria</a></li>
						<li><a href="news.php">Aktualności</a></li>
						<li><a href="contact.php">Kontakt</a></li>
					</ul>
				</nav>

<div id="foot_info">
				<div class="foot_col">
					<strong>Haczów</strong><br/>
					Haczów 585<br/>
					tel: (13) 33 350 07<br/>
					kom: 601 463 446
				</div>

				<div class="foot_col">
					<strong>Miejsce Piastowe</strong><br/>
					tel: (13) 43 393 34<br />
					tel: (13) 43 347 45<br/>
					kom: 727 598 727
				</div>
</div>
			<div id="foot_logo">
				<a href="index.php">
				<img src="img/logo_small.png" alt="Pizzeria Lastoria" />
			</a>
			</div>

			</div>

			<div class="foot_row">
				<div id="copy">&copy; Copyright 2018 Pizzeria Lastoria</div>
				<div id="powered">Created by <a href="http://www.maddesigns.pl">MadDesigns</a></div>
			</div>

		</footer>

	</div>

	</body>


</html>
