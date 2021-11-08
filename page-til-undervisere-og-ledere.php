<?php





get_header();

?>



	<section id="section" class="content-area">

	<main id="main" class="site-main">

	<h2>Kursus til undervisere og ledere</h2>

	<section id="oversigt"></section>

	<nav class="filter_section">
        <button data-kategori= "alle" class="valgt">Alle</button>
        <button data-kategori= "tema2">FN´s 17 verdensmål</button>
        <button data-kategori = "tema3">LGBTQ+ og normer</button>
        <button data-kategori= "tema4">Demokrati og medborgerskab</button>
    </nav>
			
		</main><!-- #main -->
		
		<template>

		<article class="kurset">
		<h3 class="navn"></h3>
            <img src="" alt="">
            <div>
            <p class="kortbeskrivelse"></p>
            <p class="pris"></p>
			<button class="seMere">Læs mere</button>
            </div>
        </article>
    </template>

		
<script>

let kurser;
      
	  //url til wp restapi db - læg mærke til den her kun indhenter data med kategori 7 (numreringen på til undervisere og ledere kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=7";
	 
//filtrer knap, her defineres der filtreringsknapper og laver click event
let filter = "alle";

const filterKnapper = document.querySelectorAll("nav button");
filterKnapper.forEach(knap => knap.addEventListener("click", filtrerKurser));

function filtrerKurser (){
	filter = this.dataset.tema;
	document.querySelector(".valgt").classList.remove("valgt");
    this.classList.add("valgt");
	visKurser();
}

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url, option);
		  kurser = await jsonData.json();
		  visKurser();
	  }

	  function visKurser(){
		  console.log(kurser);
		   	//const for destinationen af indholdet og templaten
			   const destination = document.querySelector("#oversigt");
            let template = document.querySelector("template");
          destination.textContent = "";
		  kurser.forEach(kursus => {
			  if(filter == kursus.tema || filter == "alle"){ 
			   const klon = template.cloneNode(true).content;
			   klon.querySelector(".navn").textContent = kursus.navn;
                klon.querySelector("img").src = kursus.billede.guid;
                klon.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
                klon.querySelector(".pris").textContent = kursus.pris;

				klon.querySelector(".seMere").addEventListener("click", () => location.href=kursus.link);
			   destination.appendChild(klon);
		   }
		});
	  
	}
	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();