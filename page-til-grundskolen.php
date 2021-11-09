<?php











get_header();



?>



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



	<section id="section" class="content-area">



		<main id="main" class="site-main">

<<<<<<< HEAD
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





=======
>>>>>>> 0e0d10f5db6ff21967fcac8659637b0552213d89
        <div class="filter_section">

        <div id="alle" class="buttonContainer">

        <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">

                <button id="filterknap" class="valgt" data-kategori="alle">Alle kurser</button>

            </div>

            <div id="tema1" class="buttonContainer">

            <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">

                <button id="filterknap" class="" data-kategori="Konflikthåndtering">Konflikthåndtering</button>

            </div>

            <div id="tema2" class="buttonContainer">

            <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">

                <button id="filterknap" class="" data-kategori="Fn's 17 verdensmål">Fn's 17 verdensmål</button>

            </div>

            <div id="tema3" class="buttonContainer">

            <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/oekonomi.png" alt="">

                <button id="filterknap" class="" data-kategori="Økonomi">Økonomi</button>

            </div>

            <div id="tema3" class="buttonContainer">

            <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">

                <button id="filterknap" class="" data-kategori="Demokrati og Medborgerskab">Demokrati og medborgerskab</button>

            </div>

			</div>

            <h2 id="overskrift">Kurser til grundskolenr</h2>

</section>

<section id="oversigt"></section>



		</main><!-- #main -->

		



        </section><!-- #section -->



<script>let kurser;

 let filter = "alle";

let nyOverskrift = document.querySelector("#overskrift");









      

	  //url til wp restapi db - læg mærke til den her kun indhenter data med kategori 3 (numreringen på til grundskole kategorien)

	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=3&per_page=100";

	 

     //const for destination af indhold og template

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

		  nyOverskrift.textContent = this.textContent + " til grundskolen";

		 





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