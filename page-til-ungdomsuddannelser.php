<?php





get_header();

?>



	<section id="section" class="content-area">

	<main id="main" class="site-main">
		<div class="introboks"><p class="intro">Ungdomsbyens kurser til ungdomsuddannelser understøtter uddannelsernes fag. Se forneden vores udbudte kurser med fokus på at styrke elevernes globale udsyn, demokratiske forståelse, retorik, økonomiforståelse og konflikthåndteringsevner.</p>
		</div>
	<section class="filter_section">
	<div id="alle">
                <img src="" alt="">
                <button id="filterknap" class="valgt" data-kategori="alle">Alle temaer</button>
            </div>
            <div id="tema1">
                <img src="" alt="">
                <button id="filterknap" class="" data-kategori="Konflikthåndtering">Konflikthåndtering</button>
            </div>
            <div id="tema2">
                <img src="" alt="">
                <button id="filterknap" class="" data-kategori="FN">Fn's 17 verdensmål</button>
            </div>
            <div id="tema3">
                <img src="" alt="">
                <button id="filterknap" class="" data-kategori="Økonomi">Økonomi</button>
            </div>

</section>
			<section id="oversigt">
				<h2 class="overskrift"> <span id="filterNavn">Kurser</span> til ungdomsuddanelser</h2>
			</section>
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

		
<script>let kurser;
let filter = "alle";
const aktivFilter = document.querySelector("#filterNavn");
      
	  //url til wp restapi db - læg mærke til den her kunindhenter data med kategori 4 (numreringen på til ungdomsuddanelser kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=4";
	 
	   //const for destinationen af indholdet og templaten
 			const destination = document.querySelector("#oversigt");
            let template = document.querySelector("template");



	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }



	  const filterKnapper = document.querySelectorAll("#filterknap");
            filterKnapper.forEach(knap => knap.addEventListener("click", filtrerMenu));

	  function filtrerMenu() {
		console.log(this.textContent);
		 //  //sætter filters værdi lig med værdien fra data af den knap der førte ind i funktionen
		  filter= this.dataset.kategori;


		     //ændrer overskriften
		  aktivFilter=this.textContent;


		   //fjerner oog tilføjer valgt class til den rigtige knap
		   document.querySelector(".valgt").classList.remove("valgt");
            this.classList.add("valgt");

			
		  //kalder function vis kurser efter det nye filter er sat
		  visKurser();
        }

	  function visKurser(){
		  console.log(kurser);
		  destination.textContent = "";

		  kurser.forEach(kursus => {
               
			if (filter == kursus.tema || filter == "alle") {
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