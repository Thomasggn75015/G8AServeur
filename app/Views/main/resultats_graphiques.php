        <h1 style="text-align: center; font-size: 50px;">Résultats des tests</h1>
	    <div class="container_all_graph">
            <div class=	"container_graph">
                <h1 class = "titre_graph">Test lumière inattendue</h1>       
                <canvas id="chart" style="width: 100%; height: 65vh; background: #afcae8; border: 1px solid #555652; margin-top: 10px;"></canvas>
            </div>
            <div class=	"container_graph">
                <h1 class = "titre_graph">Test rythme</h1>
                <canvas id="chart2" style="width: 100%; height: 65vh; background: #afcae8; border: 1px solid #555652; margin-top: 10px;"></canvas>
            </div>
            <div class=	"container_graph">
                <h1 class = "titre_graph">Test frequence cardiaque</h1>
                <canvas id="chart3" style="width: 100%; height: 65vh; background: #afcae8; border: 1px solid #555652; margin-top: 10px;"></canvas>
            </div>
            <div class=	"container_graph">
                <h1 class = "titre_graph">Test température cutanée</h1>
                <canvas id="chart4" style="width: 100%; height: 65vh; background: #afcae8; border: 1px solid #555652; margin-top: 10px;"></canvas>
            </div>
            <div class=	"container_graph">
                <h1 class = "titre_graph">Test reconnaissance sonore</h1>
                <canvas id="chart5" style="width: 100%; height: 65vh; background: #afcae8; border: 1px solid #555652; margin-top: 10px;"></canvas>
            </div>
		</div>
			<script>
				var ctx = document.getElementById("chart").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            //labels: [...Array(<?php echo $data_lumina[1];?>).keys()],
                    labels : [<?php echo $data_lumina[1];?>],
		            datasets: 
		            [{
		                label: 'temps de reaction(en s)',
		                data: [<?php echo $data_lumina[0]; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: '#222', fontSize: 16}}
		        }
		    });
			</script>

            <script>
				var ctx = document.getElementById("chart3").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $data_frecar[1];?>],
		            datasets: 
		            [{
		                label: 'fréquence cardiaque(en bpm)',
		                data: [<?php echo $data_frecar[0]; ?>],
		                backgroundColor: '#afcae8',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: '#222', fontSize: 16}}
		        }
		    });
			</script>

            <script>            
            var ctx = document.getElementById('chart2').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    
                    datasets: [{
                        label: 'test_reussi',
                        data: [<?php echo $data_rythme[0]; ?>],
                        backgroundColor: [
                            'rgba(0, 255, 0, 0.3)',
                        ],
                        borderColor: [
                            'rgba(0, 255, 0)',
                        ],
                        borderWidth: 1
                    },{
                        label: 'test rate',
                        data: [<?php echo $data_rythme[1]; ?>],
                        backgroundColor: [
                            'rgba(255, 0, 0, 0.3)',
                        ],
                        borderColor: [
                            'rgba(255, 0, 0)',
                        ],
                        borderWidth: 1
                    }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks:{
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

			</script>

            <script>
				var ctx = document.getElementById("chart4").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $data_temper[1];?>],
		            datasets: 
		            [{
		                label: 'température(en°C)',
		                data: [<?php echo $data_temper[0]; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicketsLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: '#222', fontSize: 16}}
		        }
		    });
			</script>

            <script>
				var ctx = document.getElementById("chart5").getContext('2d');
    			var myChart = new Chart(ctx, {
        		type: 'line',
		        data: {
		            labels: [<?php echo $data_recson[1];?>],
		            datasets: 
		            [{
		                label: 'score sur 10',
		                data: [<?php echo $data_recson[0]; ?>],
		                backgroundColor: 'transparent',
		                borderColor:'rgba(255,99,132)',
		                borderWidth: 3
		            }]
		        },
		     
		        options: {
		            scales: {scales:{yAxes: [{beginAtZero: false}], xAxes: [{autoskip: true, maxTicksLimit: 20}]}},
		            tooltips:{mode: 'index'},
		            legend:{display: true, position: 'top', labels: {fontColor: '#222', fontSize: 16}}
		        }
		    });
			</script>