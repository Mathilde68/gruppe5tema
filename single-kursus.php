<?php

 


get_header();
?>



<section id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="container">
            <div id="info-section">
                <a id="go-to" class="tilbage">Tilbage til forløb</a>
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
                                <li class="laengde">Varighed: </li>
                                <li class="antal_deltagere">Antal deltagere: </li>
                                <li class="klassetrin">Målrettet: </li>
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
                <h4>Udfyld formularen og book dit næste forløb</h4>
                <div id="formular">
                    <form class="input-boks" action="">
                        <div class="formsdel1">
                            <label for="name">Navn:</label><br>
                            <input type="text" id="name" name="name"><br><br>
                            <label for="email">Email:</label><br>
                            <input type="email" id="email" name="email"><br><br>
                            <label for="tlf">Telefonnummer:</label><br>
                            <input type="tel" id="tlf" name="tlf" placeholder="00-00-00-00"><br><br>

                        </div>

                        <div class="formsdel2">
                            <label for="aElever">Antal elever:</label><br>
                            <input type="number" id="aElever" name="aElever" step="1"><br><br>
                            <label for="aLaere">Antal Lærere:</label><br>
                            <input type="number" id="aLaere" name="aLaere" step="1"><br><br>
                            <label for="dato">Dato:</label><br>
                            <input type="date" id="dato" name="dato"><br><br>
                        </div>
                    </form>
                    <button id="booknu">BOOK NU</button>
                </div>
            </div>
            <div id="go-to-top-container">
                <p id="go-to" class="go-top">Til toppen</p>
            </div>
            <div class="spoergsmål">
                <div class="tekst">
                    <h3>Har du nogle spørgsmål?</h3>
                    <p>Så skriv eller ring til os. Vi besvarer alle dine spørgsmål både om det enkelte forløb, booking,
                        eller andre eventuelle spørgsmål</p>
                    <button id="kontakt" onclick="window.location.href='/kea/ungdomsbyen/index.php/kontakt-os/'">Kontakt
                        os</button>
                </div>
            </div>
            </div>
        </section>

        <section id="popup">
            <article class="popupboks">
                <div id="top-boks">
                    <h4></h4>
                    <div id="luk"> &#9587; </div>
                </div>
                <p>Du vil snarest modtage en kvittering for din booking pr mail, samt yderligere informationer om
                    forløbet. <br>
                    Kontakt os endelig hvis du ikke modtager en mail indenfor en time.</p>
            </article>
        </section>

    </main>






    <script>
    let popup = document.querySelector("#popup");
    let kursus;
    // db url, med + indhenter Id for det påklikkede kursus
    const dbUrl = "https://xn--mflingo-q1a.dk/kea/ungdomsbyen/wp-json/wp/v2/kursus/" + <?php echo get_the_ID() ?>;

    // asynkron function, fetcher vores data som json
    async function getJson() {
        const data = await fetch(dbUrl);
        kursus = await data.json();
        visKurser();
    }

    //click eventlistener og function der scroller fra info delen ned til booking, gennem tryk på den farvede boks
    document.querySelector(".farveboks").addEventListener("click", scrollBooking);
    function scrollBooking() {
        document.querySelector(".booking").scrollIntoView({
            behavior: 'smooth'
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


    //Viser data om kurset 
    function visKurser() {
        document.querySelector(".navn").textContent = kursus.navn;
        document.querySelector(".langbeskrivelse").textContent = kursus.lang_beskrivelse;
        document.querySelector(".pris").textContent += kursus.pris;
        document.querySelector(".laengde").textContent += kursus.laengde;
        document.querySelector(".antal_deltagere").textContent += kursus.antal_deltagere;
        document.querySelector(".klassetrin").textContent += kursus.klassetrin;
        document.querySelector(".billede").src = kursus.billede.guid;

        document.querySelector(".tilbage").addEventListener("click", tilbage);

    }

    document.querySelector("#booknu").addEventListener("click", sePopUp);
    // gør pop up boks synlig ved klik på book nu knap + tilføjer navnet fra det pågældende kursus
    function sePopUp() {
        popup.querySelector("h4").textContent = "";
        popup.style.display = "block";
        popup.querySelector("h4").textContent += "Tak for din tilmelding til  " + kursus.navn;
    }

    //går tilbage til tidligere side, gennem history.
    document.querySelector("#luk").addEventListener("click", () => popup.style.display = "none");

    function tilbage() {
        window.history.back(2)
    }

    //kalder getJson functionen
    getJson();
    
    </script>




</section>

<?php

get_footer();