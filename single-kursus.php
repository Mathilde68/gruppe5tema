<?php


get_header();
?>

<section id="primary" class="content-area"></section>
<main id="main" class="site-main"> 

 <article class="kurset">
            <img src="" alt="">
            <div>
			<p class="billede"></p>
            <h2 class="navn"></h2>
            <p class="kortbeskrivelse"></p>
            <p class="langbeskrivelse"></p>
			
            </div>
        </article>




</main>






<script>
        
        let kursus;
		const dbUrl = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>');
        

        async function getJson() { 
			const data = await fetch(dbUrl);
			kursus = await data.json();
			visKurser();

		
		
		}

      //Vis data om kurset 

        function visKursus() {
                document.querySelector("h2").textContent = kursus.navn;
                document.querySelector("img").src = kursus.billede.guid;
                document.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
                document.querySelector(".langbeskrivelse").textContent = kursus.lang_beskrivelse;
                document.querySelector(".pris").textContent += kursus.pris+".- kr";
            }

			document.querySelector(".luk").addEventListener("click", () => {
				//Link tilbage til den foregående "luk" knappen
				history.back();
			}
			
			
			)
    

        getJson();

    </script>

	</section>

<?php>

get_footer();



















<?php
get_footer();
