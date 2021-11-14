<?php





get_header();

?>



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
	
	<section id="oversigt"></section>
	<div id="go-to-top-container">
<a  id="go-to" href="#main">Til toppen</a>
</div>

	</main><!-- #main -->

	</section><!-- #section -->	



<script>let kurser;
      
	  //url til wp restapi db - læg mærke til den her kunindhenter data med kategori 6 (numreringen på til efterskolen kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=6";
	 
 
	  const destination = document.querySelector("#oversigt");
    let template = document.querySelector("template"); 

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }

	  function visKurser() {
            //const for destination af indhold og template

		 
			kurser.forEach(kursus => {
               
        
			   const klon = template.cloneNode(true).content;

			   klon.querySelector(".navn").textContent = kursus.navn;
		   klon.querySelector("img").src = kursus.billede.guid;
		   klon.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
		   klon.querySelector(".pris").textContent = kursus.pris;
		   klon.querySelector(".seMere").addEventListener("click", () => location.href=kursus.link);

			   destination.appendChild(klon);
		   });
		   
	   }
	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();