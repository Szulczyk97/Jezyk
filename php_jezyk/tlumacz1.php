<?php
	session_start();

	if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST["wartosc1"], $_SESSION["decyzja1"])){
		header("Location: ./../jezyk"); exit();
	}

	$jakie_slowo = trim($_POST["wartosc1"]);
	$jakie_slowo = htmlspecialchars($jakie_slowo, ENT_QUOTES, "UTF-8");

	$xml = simplexml_load_file("../xml_jezyk/slownik.xml");
	foreach($xml->slowo as $slowo){
		if($jakie_slowo === (string)$slowo->pol){
			$_SESSION["wypisz1"] = $slowo->pol." - ".$slowo->ang;
			if($_SESSION["decyzja1"] === 0){
				$_SESSION["decyzja1"] = 1;
				$_SESSION["sugestia1"] = $_SESSION["wypisz1"];
			}elseif($_SESSION["decyzja1"] === 1){
				$_SESSION["decyzja1"] = 2;
				$_SESSION["sugestia2"] = $_SESSION["wypisz1"];
				$_SESSION["wyswietl1"] = $_SESSION["sugestia1"];
			}elseif($_SESSION["decyzja1"] === 2){
				$_SESSION["decyzja1"] = 3;
				$_SESSION["sugestia3"] = $_SESSION["wypisz1"];
				$_SESSION["wyswietl2"] = $_SESSION["sugestia2"];
			}elseif($_SESSION["decyzja1"] === 3){
				$_SESSION["decyzja1"] = 1;
				$_SESSION["sugestia1"] = $_SESSION["wypisz1"];
				$_SESSION["wyswietl3"] = $_SESSION["sugestia3"];
			}

			header("Location: ./../jezyk"); exit();
		}
	}

	if($_SESSION["decyzja1"] === 1){
		$_SESSION["wyswietl1"] = $_SESSION["sugestia1"];
	}elseif($_SESSION["decyzja1"] === 2){
		$_SESSION["wyswietl2"] = $_SESSION["sugestia2"];
	}elseif($_SESSION["decyzja1"] === 3){
		$_SESSION["wyswietl3"] = $_SESSION["sugestia3"];
	}
	$_SESSION["wypisz1"] = "Brak takiego słowa!";
	header("Location: ./../jezyk"); exit();
?>