<!DOCTYPE html>
<html>
    <head>
        <title>Infinite Mesure</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <header>
        <?php include("menu_nav.php");?>
    </header>
    
    <body>
                <h1>Vos Données</h1>     

            <section class="section_principale">

                <section class="boutons">

                    <div class="boutons_tests">
                        <p>
                            <a onclick="load_result_freq_car()">Fréquence cardiaque</a>
                        </p>
                    </div>


                    <div class="boutons_tests">
                        <p>
                            <a onclick="load_result_temp()">Température</a>
                        </p>
                    </div>

                    <div class="boutons_tests">
                        <p>
                            <a onclick="load_result_reac()">Temps de réaction</a>
                        </p>
                    </div>

                    <div class="boutons_tests">
                        <p>
                            <a onclick="load_result_son()">Reconnaissance du son</a>
                        </p>
                    </div>

                    <div class="boutons_tests">
                        <p>
                            <a onclick="load_result_rythm()">Rythme</a>
                        </p>
                    </div>

                </section>

                <section id="affichage_resultats">
        
                    <h2 class="titre_resultats"> Résultats de tests </h2>
        
                    <div class="container_resultats">
                        <p>
                            Cliquez sur un bouton pour obtenir vos résultats.
                        </p>
                      </div>

                </section>


            </section>

            <script>
                    function load_result_freq_car() {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("affichage_resultats").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "result_freq_car.php", true);
                        xhttp.send();
                    }

            </script>

            <script>
                    function load_result_temp() {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("affichage_resultats").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "result_temp.php", true);
                        xhttp.send();
                    }

            </script>

            <script>
                    function load_result_reac() {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("affichage_resultats").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "result_reac.php", true);
                        xhttp.send();
                    }

            </script>

            <script>
                    function load_result_son() {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("affichage_resultats").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "result_son.php", true);
                        xhttp.send();
                    }

            </script>

            <script>
                    function load_result_rythm() {
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("affichage_resultats").innerHTML = this.responseText;
                            }
                        };
                        xhttp.open("GET", "result_rythm.php", true);
                        xhttp.send();
                    }

            </script>
            

    </body>

</html>






