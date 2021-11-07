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
      
	  //url til restdb 
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?per_page=100";

	 //const for destination og template
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

                    klon.querySelector(".kurset").addEventListener("click", () => visDetaljer(kursus));
                


                    destination.appendChild(klon);
				});
	  }

	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();