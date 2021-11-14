



<?php

 


get_header();
?>

<style>

 .container{
     margin:0 auto;
 }  

 /*first section - info section*/
 .info-section{
     max-width:1200px;
     margin:0 auto;
 }

.info-grid {
    display: grid; 
    grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
    padding: 0px 10px 0px 0px;
    row-gap: 8px;
    column-gap: 80px;
    max-width: 1200px;
    margin:0 auto;
}

.infoboks1 {
    margin-top:1rem;
  
}

.infoboks2 {
    padding: 10px 20px 15px 20px;
    margin-bottom: 1.5rem;
    border-radius: 15px;
    background-color: #75c0c7;
    max-width:550px;
}

.pris, .laengde , .antal_deltagere, .klassetrin {
    font-size: 0.9rem;
    font-weight:400;
}

.info-overskrift{
    text-align: center;
}

.luk{
    padding:14px 0px 2px 0px;
}

/*section section - picture and button*/
.section2{
    margin: 0 auto;
    max-width: 1200px;
    grid-template-columns: 50% 50%;
    display: grid;
    justify-content: center;
}

.farveboks{
    display: flex;
    flex-direction: column;
    text-align: center;
    align-content: space-between;
    background-color: #C6EEEF;
    justify-content: center;
    align-self: center;
    padding: 2rem;
    width: 90vw;
    margin-left: calc(50% - 50vw);
    cursor:pointer;
}

.imgboks{
    max-width: 550px;
    margin-left: 2vw;
}

/* third section - booking -*/
.booking{
    padding-top:1.5rem;
    max-width:1200px;
     margin:0 auto;
    background-color: #d3f6f7;
    border-radius:5px;
}

#formular{
    display:grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    padding: 0px 10px 0px 0px;
    row-gap: 8px;
    column-gap: 80px;
    width:100%;
}

.deltagere-del{
    width:100%;
    display: flex;
    flex-direction:row;
    row-gap:5px;
}
input{
    width:100%;
}

/*fourth section - more information*/
/*
.infoboks3 {
    display: grid;
  grid-auto-columns: minmax(350px, auto);
  grid-gap: 80px;
    margin-top: 1rem;
    max-width: 1100px;
    
}
*/



</style>



<section id="primary" class="content-area">
<main id="main" class="site-main"> 

<section class="container">

 


<div class="info-section"> 
<a id="go-to" class="luk">Tilbage til forløb</a> 
<h2 class="navn"></h2> 
<div class="info-grid">
        <div class="col1"> 
                <div class="infoboks1">
                 <p class="langbeskrivelse"></p>
                 </div>
        </div>

        <div class="col2">
            <div class="infoboks2">
            <h4 class="info-overskrift">Informationer om forløbet</h4>
            <ul>
            <li class="pris">Pris: </li>
            <li class="laengde">Varighed:  </li>
            <li class="antal_deltagere">Antal deltagere:  </li>
            <li class="klassetrin">Klassetrin: </li>
            </ul>
            </div>  
           
        </div>
        </div>
</div>

<div class="section2">
                <div class="farveboks">
                     <h3>Book forløb nu</h3>
                     <i class="fas fa-chevron-down"></i>
                 </div>
                 <div class="imgboks">
                 <img class="billede" src="" alt="">
                 </div>
</div>


<div class="booking">
<form id= "formular" action="">
    <div class="formsdel1">
  <label for="name">Navn:</label><br>
  <input type="text" id="name" name="name"><br><br>

  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email"><br><br>

  <label for="tlf">Telefonnummer:</label><br>
  <input type="tel" id="tlf" name="tlf" placeholder="00-00-00-00" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required><br><br>

  </div>

<div class="formsdel2">
    <div class="deltagere-del">
        <div>
            <label for="aElever">Antal elever:</label><br>
            <input type="number" id="aElever" name="aElever" step="1">
        </div>
        <div>
            <label for="aLaere">Antal Lærere:</label><br>
            <input type="number" id="aLaere" name="aLaere" step="1">
        </div>

    </div><br>

  <label for="dato">Dato:</label><br>
  <input type="date" id="dato" name="dato"><br><br>
  
  <input type="submit" value="Submit">
  </div>
</form> 
</div>
           
      <div class="mere-info">  
            <h3>Yderligere informationer om kurset:</h3>
            <div class="infoboks3">
                <div> 
                <h4 class="underoverskrift1"></h4>
                <p class="yderligereinfo_1"></p>
                </div>
                 <div>
                 <h4 class="underoverskrift2"></h4>
                 <p class="yderligereinfo_2"></p>
                 </div>
            </div>
</div>     

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

        document.querySelector(".farveboks").addEventListener("click", scroll);

        function scroll(){
            document.querySelector(".billede").scrollIntoView({behavior: 'smooth'});
        }
       
      //Vis data om kurset 

        function visKurser() {
                document.querySelector(".navn").textContent = kursus.navn;
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

                document.querySelector(".luk").addEventListener("click", tilbage);
            }

		
		
            function tilbage() {
                window.history.back()
        }

        getJson();

    </script>

	</section>

<?php

get_footer();



