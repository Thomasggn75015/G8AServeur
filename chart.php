<!DOCTYPE html>
<html>
        <head> 
                <meta charset="utf-8" />
                <title>Chart Test</title>
                <script src='https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js'></script>
        </head>
    <body>
        <h1>Coucou ça marche de dingo</h1>
        <?php 
        try{
            $connexion = new PDO('localhost', 'Percutech', 'Boxe_BDD_G8A', 'percutech');
            }
            // Catch error
            catch(Exception $e){
                die("Connection failed: " . $e->getMessage());
            }
            $result_tests = $connexion->prepare('SELECT ID, Heart_rate, Temperature, Reaction_time FROM Test WHERE user_id = ?');
            $result_tests->execute($_SESSION['user_id']);
        ?>
        <div>
            <canvas id="chart" width="400" height="400"></canvas>
        </div>


        <script>
            var heart_rate = <?php echo json_encode($result_tests['Heart_rate']) ?>
            var temperature = <?php echo json_encode($result_tests['Temperature']) ?>
            var reaction_time = <?php echo json_encode($result_tests['Reaction_time']) ?>
            var ID_test = <?php echo json_encode($result_tests['ID']) ?>

            //console.log(heart_rate);

            const ctx = document.getElementById('chart').getContext('2d');
            const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ID_test,
                datasets: [{
                label: 'Résultats BPM',
                data: heart_rate,
                backgroundColor: [
                    'blue'
                ],
                borderColor: [
                    'blue'
                ],
                borderWidth: 1
                }]
            },
            options: {
                scales: {
                yAxes: [{
                    ticks: {
                    beginAtZero: true
                    }
                }]
                }
            }
            });
        </script>

    </body>
</html>