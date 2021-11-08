<?php





get_header();

?>



	<section id="section" class="content-area">

	<main id="main" class="site-main">
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

		
<script>let kurser;
      
	  //url til wp restapi db - læg mærke til den her kun indhenter data med kategori 7 (numreringen på til undervisere og ledere kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=7";
	 
 	//const for destinationen af indholdet og templaten
			 const destination = document.querySelector("#oversigt");
            let template = document.querySelector("template");


	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }

	  function visKurser(){
		  console.log(kurser);

		  kurser.forEach(kursus => {
               
        
			   const klon = template.cloneNode(true).content;

			   klon.querySelector(".navn").textContent = kursus.navn;
                klon.querySelector("img").src = kursus.billede.guid;
                klon.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
                klon.querySelector(".pris").textContent = kursus.pris;


			   destination.appendChild(klon);
		   });
	  }

	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();