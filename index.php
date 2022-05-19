<!DOCTYPE html>
<html>
    <head>
        <?php require 'required-files/head.php' ?>
    </head>
    <body onload='loadMap();'>
        <?php require 'required-files/header.php' ?>
        <h1 class='hero-title'>Liikuntamatkat</h1>
                <p>Hyvinvointia ja elämyksiä Euroopan kohteissa. 
Olen järjestänyt patikointi- ja hyvinvointimatkoja jo 10 vuoden ajan vuosittain eri Euroopan kohteisiin mm. Italiaan, Itävaltaan, Skotlantiin, Kroatiaan, Irlantiin ja Sloveniaan. 
Matkat ovat kokonaisvaltaista hyvinvointia tukevia. Upeat nähtävyydet koetaan patikoiden ja paikallinen gastronomia tulee myös tutuksi. 
Tutustu kohteisiin kartasta ja lue asiakkaitteni kokemuksia liikuntamatkoista!</p>
                <p id='read-more' onclick="smoothScroll(document.getElementById('map-function'))">Tilaa matka ↓</p>
            </div>
            <section>
                <!-- Palvelusta -->
                <article class='first'>
                    <div class='right'>
                        <div class='content'>
                            <h1>Anne Setälä</h1>
                            <ul>
                                <li>Fysioterapeutin tutkinto 1986</li>
                                <li>Yrittäjänä vuodesta 1998</li>
                                <li>FISAF-Personal Trainer 2006</li>
                            </ul>
                        </div>
                        <img src='media/Anne_1.jpg' >
                    </div>
                </article>
                <article class='second'>
                    <div class='left'>
                        <div class='content'>
                            <p>Olen järjestänyt liikunta ja hyvinvointimatkoja jo vuodesta 2012. Pitkäaikainen kumppanini on matkatoimisto Kontiki. 
        Kon-Tiki Tours tarjoaa hyvinvointimatkoja yhteistyössä alan huippuammattilaisten kanssa. 
        Hyvinvointimatkojeni ohjelma koostuu esimerkiksi vesijumpasta, joogasta, mindfulnessista, retriitistä, vaelluksesta ja patikoinnista hyvää ruokaa ja viihtyisää majoitusta unohtamatta.
        Jokainen hyvinvointimatka on tarkkaan suunniteltu, sinun ei tarvitse kuin hypätä kyytiin! Lue myös tyytyväisten asiakkaitteni kommentit ja kokemukset matkoista referenssit - osiosta.</p>
                            <p>Ota yhteyttä ja jutellaan lisää seuraavasta matkastamme!</p>
                            <p class='signature'>Anne</p>
                        </div>
                        <img src='media/Anne_2.jpeg'>
                    </div>
                </article>
                <!-- Karttatoiminto -->
                <article class='map-article' id='map-function'>
                    <h1>Tulevat ja menneet matkat</h1>
                    <div id='map'>
                        
                    </div>
                    <div id='dashboard'>
                        <div class='nav-btn'>
                            <button onclick='updateView(-1)' id='decrement'><</button>
                            <button onclick='updateView(1)' id='increment'>></button>
                        </div>
                        <?php
                            require 'required-files/connection.php';

                            $sql = "SELECT id, longitudi, latitudi, otsikko, kuvausteksti, alku, loppu, kuva, pdf FROM liikuntamatkat";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) >= 0) {
                                $total =  mysqli_num_rows($result);
                                for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                                    $row = mysqli_fetch_assoc($result);
                                    
                                    $title = $row['otsikko'];
                                    $longitude = $row['longitudi'];
                                    $latitude = $row['latitudi'];
                                    $startDate = $row['alku'];
                                    $endDate = $row['loppu'];
                                    $desc = $row['kuvausteksti'];
                                    $imagePath = $row['kuva'];

                                    $j = $i + 1;

                                    echo "
                                        <div id='location_$i' class='location' style='display: none'>
                                            <a href='enroll.php?title=$title' target='_blank'>Ilmoittaudu</a>
                                            <h2 id='title_$i'>$title</h2>
                                            <p class='cord' id='cord_$i'>($longitude, $latitude)</p>
                                            <p class='date' id='date_$i'>$startDate - $endDate</p>
                                            <p>$desc</p>
                                            <img src='$imagePath' alt='matkakuva'>
                                            <p id='current'>$j / $total</p>
                                        </div>
                                    ";
                                }
                            }
                        ?>
                        
                    </div>
                </article>
                <!-- Referenssit -->
                <article class='references'>
                    <h1>Tyytyväisiä asiakkaita</h1>
                    <div class='slideshow-container'>
                        <div class='reference'>
                            <div class='content'>
                                <h2>Taloushallinnon ammattilainen Anja Kirjuri, 45-vuotta.</h2>
                                <p>Parasta Annen liikuntamatkoissa on ehdottomasti työhyvinvoinnin kasvu. Liikuntamatkat tuovat erinomaisen tasapainon toimisto ja näyttöpäätteellä tehtävään työhön. Näyttöpäätetyöskentelyssä minulle tulee helposti erilaisia hartia tai niskavaivoja. Annen matkoihin on helppo heittäytyä mukaan ja elimistö voi hyvin liikuntamatkan jälkeen. Työhön tulee uutta puhtia, kun ihminen voi hyvin! </p>
                                <p class='country'>Itävalta 19. – 26.5.2018</p>
                            </div>
                            <img src='media/references/Referenssi1.jpg' alt='Anja Kirjuri'>
                        </div>
                        <div class='reference'>
                            <div class='content'>
                                <h2>Ohjelmoija Kalle Koodari, 38-vuotta.</h2>
                                <p>Löysin Annen liikuntamatkat tyttöystäväni kanssa. Matkoissa parasta on helppous ja hyvin toimiva kokonaisuus. Olemme käyttäneet Annen fysioterapiapalveluita aikaisemmin, liikuntamatkoilla kaikki on järjestetty ja stressi helpottuu! </p>
                                <p class='country'>Slovenia 2. – 9.10.2019</p>
                            </div>
                            <img src='media/references/Referenssi2.jpg' alt='Kalle Koodari'>
                        </div>
                        <div class='reference'>
                            <div class='content'>
                                <h2>Lääkäri Lenni Lekuri, 58-vuotta.</h2>
                                <p>Lääkärinä tiedän, että ihmisen terveyteen tarvitaan kokonaisvaltaista hyvinvointia. Suosittelen Anne Setälän liikuntamatkoja kaikille, jotka haluavat lisätä hyvinvointiaan!</p>
                                <p class='country'>Itävalta 19. – 26.5.2018 ja Slovenia 2. – 9.10.2019</p>
                            </div>
                            <img src='media/references/Referenssi3.jpg' alt='Lenni Leikuri'>
                        </div>
                        <div class='reference'>
                            <div class='content'>
                                <h2>Puutarhuri Kalle Kukkanen, 45-vuotta.</h2>
                                <p>Annen liikuntamatkojen kohteet ovat aina hyvin valittuja ja kohteissa saa hyviä ideoita myös omaan työhön. Puutarhurina teen työtä käsilläni ja fysiikka on aina kovilla. Työni ajoittuvat puutarhan aina kevät, kesä ja syystoimiin. Liikuntamatkoista onkin tullut minulle jo tapa päättää kesän sesonkikausi oman hyvinvoinnin äärelle.  </p>
                                <p class='country'>Itävalta 19. – 26.5.2018 </p>
                            </div>
                            <img src='media/references/Referenssi4.jpg' alt='Kalle Kukkanen'>
                        </div>
                        <div class='reference'>
                            <div class='content'>
                                <h2>Taksiyrittäjä Timo Taksi, 50-vuotta.</h2>
                                <p>Ostin itselleni ensimmäisen liikuntamatkan 50vuotislahjaksi. Taksiyrittäjänä teen pitkää päivää ja auton ratissa istuminen vaatii tasapainoksi liikuntaa ja hyvinvointia. Hyvinvointimatkan jälkeen huomasin olevani paljon virkeämpi ja työhyvinvointi lisääntyi selvästi. Lähden varmasti Annen matkaan uudestaan!</p>
                                <p class='country'>Islanti 19. - 25.5.2020</p>
                            </div>
                            <img src='media/references/Referenssi5.jpg' alt='Timo Taksi'>
                        </div>
                        <!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a> -->
                    </div>
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                        <span class="dot" onclick="currentSlide(4)"></span>
                        <span class="dot" onclick="currentSlide(5)"></span>
                    </div>
                </article>
                <!-- Yhteydenottolomake -->
                <article class='contact-article'>
                    <div class='contact-us'>
                        <form action="" method="POST">
                            <h1>Ota yhteyttä!</h1>
                            <div class='floating-label-group'>
                                <input type='text' name='name' class='form-control' required />
                                <label class='floating-label'>Nimi</label>
                            </div>
                            <div class='floating-label-group'>
                                <input type='text' name='email' class='form-control' required />
                                <label class='floating-label'>S-posti</label>
                            </div>
                            <div class='floating-label-group'>
                                <input type='text' name='phone' class='form-control' required />
                                <label class='floating-label'>Puhelinnumero</label>
                            </div>
                            <div class='center'>
                                <label>Viesti</label><br>
                                <textarea name='more'>

                                </textarea>
                            </div>
                            <br>
                            <input type='submit' value='Lähetä' class='send-btn' name='new-user'>
                        </form>
                    </div>
                </article>
            </section>
        <?php require 'required-files/footer.php' ?>
    </body>
</html>