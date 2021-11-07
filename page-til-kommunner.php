<?php





get_header();

?>



	<section id="section" class="content-area">

		<main id="main" class="site-main">
		</main><!-- #main -->
		
<script>let kurser;
      
	  //url til wp restapi db - læg mærke til den her kunindhenter data med kategori 4 (numreringen på til ungdomsuudannelser kategorien)
	  const url = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus?categories=4";
	 

	  // asynkron function som afventer og indhenter json data fra restdb
	  async function hentData() {
		  const jsonData = await fetch(url);
		  kurser = await jsonData.json();
		  visKurser();
	  }

	  function visKurser(){
		  console.log(kurser);
	  }

	  hentData();

</script>

	</section><!-- #section -->


<?php

get_footer();