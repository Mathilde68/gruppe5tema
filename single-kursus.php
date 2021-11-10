



<?php

 


get_header();
?>

<style>

.kurset_section {
    display: grid; 
    grid-template-columns: 1fr 1fr;
    padding: 20px;
    
}

.infoboks1 {
    grid-column: 1/2;
}

.infoboks2 {
    grid-column: 3/4;
    
    margin-top: 20px;
}

#farveboks {
    background-color: lightblue;

}
.pris {
    padding: 10px;
}

.laengde {
    padding: 10px;
}


.antal_deltagere {
    padding: 10px;
}


.klassetrin {
    padding: 10px;
}





</style>



<section id="primary" class="content-area">
<main id="main" class="site-main"> 

 <article class="kurset">
            
       <section class="kurset_section">   
			
            <div class="infoboks1"> 
                  <h2 class="navn"></h2>
            <p class="kortbeskrivelse"></p>
            <p class="langbeskrivelse"></p>
 
			</div>

            <div class="infoboks2">
                <div id="farveboks">
            <p class="pris"></p>
            <p class="laengde"></p>
            <p class="antal_deltagere"></p>
            <p class="klassetrin"></p> </div>
            </div> </section> 
        
            <img class="billede" src="" alt="">
            <h3 class="underoverskrift1"></h3>
            <p class="yderligereinfo_1"></p>
            <h4 class="underoverskrift2"></h4>
            <p class="yderligereinfo_2"></p>
           
        </article>




</main>






<script>
        
        let kursus;
		const dbUrl = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;
        

        async function getJson() { 
			const data = await fetch(dbUrl);
			kursus = await data.json();
			visKurser();
		
		}

      //Vis data om kurset 

        function visKurser() {
                document.querySelector("h2").textContent = kursus.navn;
                document.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
                document.querySelector(".langbeskrivelse").textContent = kursus.lang_beskrivelse;
                document.querySelector(".pris").textContent = kursus.pris;
                document.querySelector(".laengde").textContent = kursus.laengde;
                document.querySelector(".antal_deltagere").textContent = kursus.antal_deltagere;
                document.querySelector(".klassetrin").textContent = kursus.klassetrin;

                
                document.querySelector(".billede").src = kursus.billede.guid;

                document.querySelector("h3").textContent = kursus.underoverskrift1;
                document.querySelector(".yderligereinfo_1").textContent = kursus.yderligere_information1;
                document.querySelector("h4").textContent = kursus.underoverskrift2;
                document.querySelector(".yderligereinfo_2").textContent = kursus.yderligere_information_2;
            }

			// document.querySelector(".luk").addEventListener("click", () => {
				
			// 	history.back();
		
    

        getJson();

    </script>

	</section>

<?php

get_footer();



