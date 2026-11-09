<?php
	session_name("PROJEKT_JEZYK");
	session_start();

	if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["wartosc2"], $_SESSION["decyzja2"])){
		header("Location: ./../jezyk"); exit();
	}

	$jakie_slowo = trim($_POST["wartosc2"]);
	$jakie_slowo = htmlspecialchars($jakie_slowo, ENT_QUOTES, "UTF-8");

	$xml = simplexml_load_file("../xml_jezyk/slownik.xml");
	foreach($xml->slowo as $slowo){
		if($jakie_slowo === (string)$slowo->ang){
			$_SESSION["wypisz2"] = $slowo->ang." - ".$slowo->pol;
			if($_SESSION["decyzja2"] === 0){
				$_SESSION["decyzja2"] = 1;
				$_SESSION["sugestia4"] = $_SESSION["wypisz2"];
			}elseif($_SESSION["decyzja2"] === 1){
				$_SESSION["decyzja2"] = 2;
				$_SESSION["sugestia5"] = $_SESSION["wypisz2"];
				$_SESSION["wyswietl4"] = $_SESSION["sugestia4"];
			}elseif($_SESSION["decyzja2"] === 2){
				$_SESSION["decyzja2"] = 3;
				$_SESSION["sugestia6"] = $_SESSION["wypisz2"];
				$_SESSION["wyswietl5"] = $_SESSION["sugestia5"];
			}elseif($_SESSION["decyzja2"] === 3){
				$_SESSION["decyzja2"] = 1;
				$_SESSION["sugestia4"] = $_SESSION["wypisz2"];
				$_SESSION["wyswietl6"] = $_SESSION["sugestia6"];
			}

			header("Location: ./../jezyk"); exit();
		}
	}

	if($_SESSION["decyzja2"] === 1){
		$_SESSION["wyswietl4"] = $_SESSION["sugestia4"];
	}elseif($_SESSION["decyzja2"] === 2){
		$_SESSION["wyswietl5"] = $_SESSION["sugestia5"];
	}elseif($_SESSION["decyzja2"] === 3){
		$_SESSION["wyswietl6"] = $_SESSION["sugestia6"];
	}
	$_SESSION["wypisz2"] = "Brak takiego słowa!";
	header("Location: ./../jezyk"); exit();
?>