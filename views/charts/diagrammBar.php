<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <div class="container">
        <div class="row">

            <div class="col-lg-6 centered">
                <canvas id="chart" width="600" height="600"></canvas>
            </div>
            <script type="text/javascript">
            var ctx = document.getElementById("chart");
            var data = {
                datasets: [{
                    data: [
                        <?php
                            foreach ($data as $row) 
                            {
                                echo $row['count'].',';
                            }
                            ?>
                        ],
                    backgroundColor: [
                        <?php
                            foreach ($data as $row) 
                            {
                                echo '"#'.Utils::random_color().'",';
                            }
                            ?>
                        ]
                }],
                // These labels appear in the legend and in the tooltips when hovering different arcs
                labels: [
                    <?php
                        foreach ($data as $row) 
                        {
                            echo '"'.$row['name'].'",';
                        }
                        ?>
                ]
            };
            var options = {
                legend: {
                    display :false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                     }]
                }
            };
            var myPieChart = new Chart(ctx,{
                type: 'bar',
                data: data
                option: option
            });
            </script>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>