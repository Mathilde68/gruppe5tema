<?php





get_header();

?>

<section id="section" class="content-area">

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




	</main><!-- #main -->

<nav>
        <button data-kategori= "alle" class="valgt">Alle</button>
        <button data-kategori="Fn's 17 verdensmål">Fn's 17 verdensmål</button>
        <button data-kategori = "LGBTQ+ og normer">LGBTQ+ og normer</button>
        <button data-kategori= "Demokrati og medborgerskab">Demokrati og medborgerskab</button>
    </nav>
	
</section><!-- #section -->	

	
	<section id="oversigt">	</section>

<script>

let kurser;
//filtrer knap, her defineres der filtreringsknapper og laver click event
let filter = "alle";

 
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

let filterKnapper = document.querySelectorAll("nav button");
filterKnapper.forEach(knap => knap.addEventListener("click", filtrerKurser));

function filtrerKurser (){
	filter = this.dataset.kategori;
	document.querySelector(".valgt").classList.remove("valgt");
    this.classList.add("valgt");
	visKurser();
}

	  function visKurser(){
		  console.log(kurser);
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


<?php

get_footer();