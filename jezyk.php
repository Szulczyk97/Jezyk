<?php
	session_start();

	if(!isset($_SESSION["decyzja1"])){
		$_SESSION["decyzja1"] = 0;
	}

	if(!isset($_SESSION["decyzja2"])){
		$_SESSION["decyzja2"] = 0;
	}
?>
<!doctype html>
	<html lang="pl">
		<head>
			<meta charset="UTF-8"/>
			<meta name="author" content="Przemysław Szułczyński"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<meta name="robots" content="index, follow"/>
			<meta name="description" content="Projekt Język - prosty słownik języka angielskiego."/>

			<meta property="og:type" content="website"/>
      		<meta property="og:url" content="https://szulczyk.pl/projekt-21/jezyk"/>
      		<meta property="og:title" content="Szulczyk.pl | Projekt 21"/>
      		<meta property="og:description" content="Prosty Słownik Języka Angielskiego"/>
      		<meta property="og:image" content="../favicon-512x512.webp"/>

			<title>Prosty Słownik Języka Angielskiego</title>
			<link rel="stylesheet" media="(width >= 1100px)" href="./css_jezyk/jezyk_domyslne.css"/>
			<link rel="stylesheet" media="(640px <= width < 1100px)" href="./css_jezyk/jezyk_tablet.css"/>
			<link rel="stylesheet" media="(width < 640px)" href="./css_jezyk/jezyk_telefon.css"/>
			<link rel="apple-touch-icon" sizes="180x180" href="../favicon-touch-icon.webp"/>
      		<link rel="icon" type="image/webp" sizes="32x32" href="../favicon-32x32.webp"/>
      		<link rel="icon" type="image/webp" sizes="16x16" href="../favicon-16x16.webp"/>
			<link rel="shortcut icon" href="../favicon.ico"/>
			<script type="text/javascript" src="./skrypty_jezyk/jezyk.js" defer></script>
		</head>
			<body>
				<div id="kontener">
					<div id="naglowek">Prosty Słownik Języka Angielskiego</div>

					<div id="pola">
						<div id="pole1">
							<div class="tlumaczenie">
								<i><b>Język Polski</b> &rarr; <b>Język Angielski</b></i><br/>
								<form action="./php_jezyk/tlumacz1" method="post">
									<input type="text" name="wartosc1" list="lista1" placeholder="Np.: apteka" autocomplete="off" required/>
									<span class="wymiana"><datalist id="lista1"></datalist></span>
									<div><input type="submit" value="Tłumacz"/></div>
								</form>

								<div class="wynik">
									<?php
										if(isset($_SESSION["wypisz1"])){
											echo "<b>Tłumaczenie:</b><br/><i>".$_SESSION["wypisz1"]."</i><picture><source srcset='./obrazki_jezyk/linia.webp' media='(width < 640px)' width='95%' height='45px'/><source srcset='./obrazki_jezyk/linia.webp' media='(width < 1100px)' width='90%' height='45px'/><img src='./obrazki_jezyk/linia.webp' width='85%' height='45px' loading='eager' alt='Linia ozdobna'/></picture>";
										}

										if(isset($_SESSION["wyswietl1"])){
											echo "<b>Ostatnio tłumaczone:</b><br/><i>".$_SESSION["wyswietl1"]."</i><br/>";
										}

										if(isset($_SESSION["wyswietl2"])){
											echo "<i>".$_SESSION["wyswietl2"]."</i><br/>";
										}

										if(isset($_SESSION["wyswietl3"])){
											echo "<i>".$_SESSION["wyswietl3"]."</i><br/>";
										}
									?>
								</div>
							</div>
						</div>

						<div id="pole2">
							<div class="tlumaczenie">
								<i><b>Język Angielski</b> &rarr; <b>Język Polski</b></i><br/>
								<form action="./php_jezyk/tlumacz2" method="post">
									<input type="text" name="wartosc2" list="lista2" placeholder="Np.: read" autocomplete="off" required/>
									<span class="wymiana"><datalist id="lista2"></datalist></span>
									<div><input type="submit" value="Tłumacz"/></div>
								</form>

								<div class="wynik">
									<?php
										if(isset($_SESSION["wypisz2"])){
											echo "<b>Tłumaczenie:</b><br/><i>".$_SESSION["wypisz2"]."</i><picture><source srcset='./obrazki_jezyk/linia.webp' media='(width < 640px)' width='95%' height='45px'/><source srcset='./obrazki_jezyk/linia.webp' media='(width < 1100px)' width='90%' height='45px'/><img src='./obrazki_jezyk/linia.webp' width='85%' height='45px' loading='eager' alt='Linia ozdobna'/></picture>";
										}

										if(isset($_SESSION["wyswietl4"])){
											echo "<b>Ostatnio tłumaczone:</b><br/><i>".$_SESSION["wyswietl4"]."</i><br/>";
										}

										if(isset($_SESSION["wyswietl5"])){
											echo "<i>".$_SESSION["wyswietl5"]."</i><br/>";
										}

										if(isset($_SESSION["wyswietl6"])){
											echo "<i>".$_SESSION["wyswietl6"]."</i><br/>";
										}
									?>
								</div>
							</div>
						</div>
					</div>

					<div id="stopka">&copy; 2026 Szulczyk - Przemysław Szułczyński</div>
				</div>
			</body>
	</html>