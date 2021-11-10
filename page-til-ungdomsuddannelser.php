<?php


get_header();



?>


<style>
	.uu{
		background-color: #B1DADE;
	}

	.overskrift_uu{
    color: #75C0C7;
}




</style>




	<section id="section" class="content-area">


	<template>

<article class="kurset">

<h4 class="navn"></h4>

	<img src="" alt="">

	<div>

	<p class="kortbeskrivelse"></p>

	<p class="pris"></p>

	<button class="seMere">Læs mere</button>

	</div>

</article>

</template>



	<main id="main" class="site-main">

	<?php

// Start the Loop.
while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }

endwhile; // End the loop.
?>


<nav class="filter_section2">

	<div id="alle" class="buttonContainer2">
		
	<button id="filterknap" class="valgt uu" data-kategori="alle">Alle kurser</button>
		<img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">
	
	</div>

	<div id="tema1" class="buttonContainer2">
	<button id="filterknap" class="uu" data-kategori="Konflikthåndtering">Konflikthåndtering</button>
		<img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">
	
	</div>

	<div id="tema2" class="buttonContainer2">
	<button id="filterknap" class="uu" data-kategori="Fn's 17 verdensmål">Fn's 17 verdensmål</button>
	<img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">
	</div>
		
		

	<div id="tema3" class="buttonContainer2">
	<button id="filterknap" class="uu" data-kategori="Økonomi">Økonomi</button>
		<img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/oekonomi.png" alt="">
		
	</div>

</nav>
			<h2 id="overskrift" class="overskrift_uu">Kurser til ungdomsuddanelser</h2>
			<section id="oversigt"></section>

		</main><!-- #main -->

		</section><!-- #section -->

<script>let kurser;

let filter = "alle";

let nyOverskrift = document.querySelector("#overskrift");

      

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

		  nyOverskrift.textContent = this.textContent + " til ungdomsuddannelser";

		 
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
                klon.querySelector(".pris").textContent = "Pris: "+ kursus.pris;
				klon.querySelector(".seMere").addEventListener("click", () => location.href=kursus.link);


			   destination.appendChild(klon);

			}

		   });

	  }



	  hentData();



</script>



	





<?php



get_footer();