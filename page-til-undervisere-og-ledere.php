<?php





get_header();

?>



	<section id="section" class="content-area">

	<main id="main" class="site-main">

	<section class="beskrivelse"> 
		<div class="beskrivelse_one"> 
	<h2>Kursus til undervisere og ledere</h2>

	<h3>Undervisning i bæredygtighed og ligestilling</h3>

	<p>Hvornår indgår Verdensmålene i lærerens, pædagogens og TAP’ernes professionelle arbejde?
Hvor er elevrådene inkluderet i skolens demokrati? Hvad er strategien for antiradikalisering?
Hvordan håndterer skolen inklusion af minoriteter, herunder LGBT-elever, -medarbejdere og -familier i skole-hjem-samarbejdet?

Alle disse spørgsmål har Ungdomsbyen faglige bud på. I takt med samfundets udvikling tilbyder vi en tidssvarende kapacitetsopbygning, som styrker elevernes demokratiske dannelse, og lader skolens normer, udsyn og kultur fremstå vidende og åben for omverdenen.</p>
</div>

<div class="beskrivelse_two"> 

<p>Ungdomsbyens kurser henvender sig til uddannelsessektorens ledere, fagfolk og undervisere, der vægter elevernes dannelse og forståelse af, hvad et globalt medborgerskab indebærer.

Gennem samarbejdet med lærere og skoleledere i hele uddannelsessektoren har vi fingeren på pulsen og mange års erfaring med kurser og udviklingsforløb, der understøtter en fælles og bæredygtig fremtid.</p>

<p> <span><button class="kontaktOs">Kontakt os</button></span> og bliv en del af Ungdomsbyens netværk </p>

</div>
</section>
	<nav class="filter_section">
        <button data-kategori= "alle" class="valgt">Alle</button>
        <button data-kategori= "tema2">FN´s 17 verdensmål</button>
        <button data-kategori = "tema3">LGBTQ+ og normer</button>
        <button data-kategori= "tema4">Demokrati og medborgerskab</button>
    </nav>
	<section id="oversigt"></section>		

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

<style>
	 

.beskrivelser { 
display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  row-gap: 20px;
  column-gap: 40px;
  padding: 2rem;
  margin: auto;
  max-width: 1700px;
}	


</style>



<script>

let kurser;
      
	  //url til wp restapi db - læg mærke til den her kun indhenter data med kategori 7 (numreringen på til undervisere og ledere kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=7";
	 
//filtrer knap, her defineres der filtreringsknapper og laver click event
let filter = "alle";
let filterKnapper = document.querySelectorAll("nav button");

filterKnapper.forEach(knap => knap.addEventListener("click", filtrerKurser));

function filtrerKurser (){
	filter = this.dataset.kategori;
	document.querySelector(".valgt").classList.remove("valgt");
    this.classList.add("valgt");
	visKurser();
}

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }

	  function visKurser(){
		  console.log(kurser);
		   	//const for destinationen af indholdet og templaten
			   const destination = document.querySelector("#oversigt");
            let kursusTemplate = document.querySelector("template");
			destination.textContent = "";
		  kurser.forEach(kursus => {
			  if(filter == kursus.tema || filter == "alle"){ 
			   const klon = kursusTemplate.cloneNode(true).content;
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