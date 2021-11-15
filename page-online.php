<?php





get_header();

?>




<section id="section" class="content-area">


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

        <nav id="filter-oversigt" class="filter_section2">
            <div id="alle" class="buttonContainer2">
                <button id="filterknap" class="valgt onk" data-kategori="alle">Alle tilbud</button>
                <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/alle.png" alt="">

            </div>

            <div id="tema1" class="buttonContainer2">
                <button id="filterknap" class="onk" data-kategori="Konflikthåndtering">Konflikthåndtering</button>
                <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/konflikt.png" alt="">

            </div>

            <div id="tema2" class="buttonContainer2">
                <button id="filterknap" class="onk" data-kategori="Fn's 17 verdensmål">Fn's 17 verdensmål</button>
                <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/FN.png" alt="">

            </div>

            <div id="tema3" class="buttonContainer2">
                <button id="filterknap" class="onk" data-kategori="LGBTQ+ og normer">LGBTQ+ og normer</button>
                <img src="https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-content/uploads/2021/11/LGBTQ-og-normer.png"
                    alt="">

            </div>

        </nav>
</section>
<div class="overskrift-container">
    <h3 id="overskrift" class="">Online kurser</h3>
</div>
<section id="oversigt"></section>

<div id="go-to-top-container">
    <p id="go-to" class="go-top">Til toppen</p>
</div>

</main><!-- #main -->

<template>
    <article class="kurset">
        <h4 class="navn"></h4>
        <img src="" alt="">
        <div>
            <p class="kortbeskrivelse"></p>
            <p class="pris"></p>
        </div>
        <button class="seMere">Læs mere</button>
    </article>
</template>
</section><!-- #section -->



<script>
let kurser;
let filter = "alle";
let nyOverskrift = document.querySelector("#overskrift");

//url til wp  db - læg mærke til den her kun indhenter data med kategori 5 (numreringen på online kategorien)
const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=5";

//const for destinationen af indholdet og templaten
const destination = document.querySelector("#oversigt");
let template = document.querySelector("template");

// asynkron function som afventer og indhenter json data fra restdb
async function hentData() {
    const jsonData = await fetch(url);
    kurser = await jsonData.json();
    visKurser();
}

// definerer filtrer knapper og sætter click eventlistener på Alle.
const filterKnapper = document.querySelectorAll("#filterknap");
filterKnapper.forEach(knap => knap.addEventListener("click", filtrerMenu));

function filtrerMenu() {
    console.log(this.textContent);
    //sætter filters værdi lig med værdien fra data af den knap der førte ind i funktionen
    filter = this.dataset.kategori;

    //ændrer overskriften
    nyOverskrift.textContent = this.textContent + " online";

    //fjerner oog tilføjer valgt class til den rigtige knap
    document.querySelector(".valgt").classList.remove("valgt");
    this.classList.add("valgt");

    //kalder function vis kurser efter det nye filter er sat
    visKurser();

    //scroller ned til indholdet efter tryk
    document.querySelector(".overskrift-container").scrollIntoView({
        behavior: 'smooth'
    });
}


// viser vores indhold indhentet fra wp db, ved at indsætte det i template klon, og append til dne definerede destination
function visKurser() {
    console.log(kurser);

    // // rydder indholdet af sektionen så der er plads til KUN det nye indhold (efter filtrering)
    destination.textContent = "";
    //for each loop looper igennem alle kurserne i json
    kurser.forEach(kursus => {
        if (filter == kursus.tema || filter == "alle") {

            const klon = template.cloneNode(true).content;
            klon.querySelector(".navn").textContent = kursus.navn;
            klon.querySelector("img").src = kursus.billede.guid;
            klon.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
            klon.querySelector(".seMere").addEventListener("click", () => location.href = kursus.link);

            destination.appendChild(klon);
        }
    });
}


//click eventlistener og function der scroller fra "til toppen" knap i bunden - til toppen af siden.
document.querySelector(".go-top").addEventListener("click", scrollUp);

function scrollUp() {
    console.log("i work");
    document.querySelector(".content-area").scrollIntoView({
        behavior: 'smooth'
    });
}

//kald på hentData function
hentData();
</script>




<?php

get_footer();