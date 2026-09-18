window.addEventListener("load",()=>{
	let slownik_pol, slownik_ang;
	
	const xhttp = new XMLHttpRequest();
	xhttp.addEventListener("load",()=>{
		const dane = xhttp.responseXML;
		slownik_pol = Array.from(dane.getElementsByTagName("pol"));
		slownik_ang = Array.from(dane.getElementsByTagName("ang"));
	});
	xhttp.open("GET","./xml_jezyk/slownik",true);
	xhttp.send();


	const wymien = document.getElementsByClassName("wymiana");

	const slowo = document.getElementsByName("wartosc1");
	slowo[0].addEventListener("input",()=>{
		document.getElementById("lista1").remove();
		const dodaj = document.createElement("datalist");
		dodaj.setAttribute("id","lista1");
		wymien[0].appendChild(dodaj);
		const szukam = slowo[0].value.toLowerCase();

		if(szukam !== ""){
			slownik_pol.forEach((element)=>{
				const wyraz = element.childNodes[0].nodeValue;
				
				if(wyraz.startsWith(szukam)){
					const opcje = document.createElement("option");
					opcje.value = wyraz;
					dodaj.appendChild(opcje);
				}
			});
		}
	});

	const slowo2 = document.getElementsByName("wartosc2");
	slowo2[0].addEventListener("input",()=>{
		document.getElementById("lista2").remove();
		const dodaj = document.createElement("datalist");
		dodaj.setAttribute("id","lista2");
		wymien[1].appendChild(dodaj);
		const szukam = slowo2[0].value.toLowerCase();

		if(szukam !== ""){
			slownik_ang.forEach((element)=>{
				const wyraz = element.childNodes[0].nodeValue;

				if(wyraz.startsWith(szukam)){
					const opcje = document.createElement("option");
					opcje.value = wyraz;
					dodaj.appendChild(opcje);
				}
			});
		}
	});
});