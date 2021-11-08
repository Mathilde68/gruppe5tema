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
        <section class="filter_section">
            <div id="tema1">
                <img src="" alt="">
                <button>Konflikthåndtering</button>
            </div>
            <div id="tema2">
                <img src="" alt="">
                <button>Fn's 17 verdensmål</button>
            </div>
            <div id="tema3">
                <img src="" alt="">
                <button>Økonomi</button>
            </div>
            <div id="tema4">
                <img src="" alt="">
                <button >Demokrati og Medborgerskab</button>
            </div>
</section>
<section id="oversigt"></section>

		</main><!-- #main -->
		

        </section><!-- #section -->

<script>let kurser;
 




      
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



	  function visKurser() {
           
            kurser.forEach(kursus => {
                let klon = template.cloneNode(true).content;
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




<?php

get_footer();