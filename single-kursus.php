<?php


get_header();
?>

<style>
    
/* .kortbeskrivelse {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
    padding-left: 20px;
    
}
.langbeskrivelse {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
    padding-left: 20px;
    
} */

.infoboks {
    display: grid; 
    grid-template-columns: 1fr, 1fr;
}



.navn {
    padding-left: 20px;

}

img {
    width: 100%;
    height: 100%; 
    padding-left: 20px;

}


.pris {
    padding-left: 20px;  
}

.laengde {
    padding-left: 20px;  
}


.antal_deltagere {
    padding-left: 20px; 
}

.underoverskrift1 {
    padding-left: 20px;

}
.yderligereinfo_1 {
    padding-left: 20px;
}

.underoverskrift2 {
    padding-left: 20px;
}

.yderligereinfo_2 {
    padding-left: 20px;
}

.klassetrin {
    padding-left: 20px;
}

.infoboks {

}



    </style>




<section id="primary" class="content-area">
<main id="main" class="site-main"> 

 <article class="kurset">
            
            <div>
			
            <div class="infoboks"> 
                  <h2 class="navn"></h2>
            <p class="kortbeskrivelse"></p>
            <p class="langbeskrivelse"></p>
 
			
            <p class="pris"></p>
            <p class="laengde"></p>
            <p class="antal_deltagere"></p>
            <p class="klassetrin"></p> 
        
        </div>
            <img class="billede" src="" alt="">
            <h3 class="underoverskrift1"></h3>
            <p class="yderligereinfo_1"></p>
            <h4 class="underoverskrift2"></h4>
            <p class="yderligereinfo_2"></p>
            </div>
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



