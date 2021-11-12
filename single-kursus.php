



<?php

 


get_header();
?>

<style>

 .container{
     max-width:1200px;
     margin:0 auto;
 }   

.kurset_section {
    display: grid; 
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    padding: 20px;
    row-gap: 8px;
    column-gap: 80px;
    margin-top: 1.5rem;
    margin-left:1rem;
    max-width: 1100px;
    
}

.infoboks1 {
    margin-top:1rem;
}

.infoboks2 {
    display:flex;
  flex-direction: column;
  align-content: space-between;
  padding: 10px 20px 15px 20px;
  margin-top:1.5rem;
  margin-bottom:1.5rem;
  border-radius: 15px;
  background-color: #75c0c7;
   /* grid-column: 3/4;
    
    margin-top: 20px; */
}
.infoboks3 {
    display: grid;
  grid-auto-columns: minmax(350px, auto);
  grid-gap: 80px;
    margin-top: 1rem;
    max-width: 1100px;
   /* grid-column: 3/4;
    
    margin-top: 20px; */
}

.pris, .laengde , .antal_deltagere, .klassetrin {
    font-size: 0.9rem;
    font-weight:400;
}
#bold{
    font-weight:600;
}





</style>



<section id="primary" class="content-area">
<main id="main" class="site-main"> 
<section class="container">
 <article class="kurset">
 <h2 class="navn"></h2>   
       <section class="kurset_section">  

            <div class="infoboks1"> 
            <p class="kortbeskrivelse"></p>
            <p class="langbeskrivelse"></p>
            </div>

            <div class="infoboks2">
            <h4>Informationer om kurset</h4>
            <p class="pris"><span id="bold">Pris:  </span></p>
            <p class="laengde"><span id="bold">Varighed:  </span></p>
            <p class="antal_deltagere"><span id="bold">Antal deltagere:  </span></p>
            <p class="klassetrin"><span id="bold">Klassetrin:  </span></p>
            </div> </section> 

           
            <img class="billede" src="" alt="">
            <h3>Yderligere informationer om kurset:</h3>
            <div class="infoboks3">
                <div> <h4 class="underoverskrift1"></h4>
            <p class="yderligereinfo_1"></p>
            </div>
           <div>
            <h4 class="underoverskrift2"></h4>
            <p class="yderligereinfo_2"></p>
            </div>
            </div>
           
        </article>
        </section>



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
                document.querySelector(".navn").textContent = kursus.navn;
                document.querySelector(".kortbeskrivelse").textContent = kursus.kort_beskrivelse;
                document.querySelector(".langbeskrivelse").textContent = kursus.lang_beskrivelse;
                document.querySelector(".pris").textContent += kursus.pris;
                document.querySelector(".laengde").textContent += kursus.laengde;
                document.querySelector(".antal_deltagere").textContent += kursus.antal_deltagere;
                document.querySelector(".klassetrin").textContent += kursus.klassetrin;

                
                document.querySelector(".billede").src = kursus.billede.guid;

                document.querySelector(".underoverskrift1").textContent = kursus.underoverskrift1;
                document.querySelector(".yderligereinfo_1").textContent = kursus.yderligere_information1;
                document.querySelector(".underoverskrift2").textContent = kursus.underoverskrift2;
                document.querySelector(".yderligereinfo_2").textContent = kursus.yderligere_information_2;
            }

			// document.querySelector(".luk").addEventListener("click", () => {
				
			// 	history.back();
		
    

        getJson();

    </script>

	</section>

<?php

get_footer();



