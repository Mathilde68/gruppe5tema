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
		 <img src="" alt="" class="billede">
		 <p class="beskrivelse"></p>
        </article>
    </template>

		
<script>let kurser;
      
	  //url til wp restapi db - læg mærke til den her kunindhenter data med kategori 8 (numreringen på til kommunen kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=8";
	 
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

			   klon.querySelector(".navn").textContent = kursus.title.rendered;
			   klon.querySelector("img").src = kursus.billede.guid;
			   klon.querySelector(".beskrivelse").textContent = kursus.kort_beskrivelse;

		   


			   destination.appendChild(klon);
		   });
	  }

	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();