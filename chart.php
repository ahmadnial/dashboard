<!DOCTYPE html>
<html lang="en">

<?php
include "conn.php";
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
    <div class="container-xxl">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bar chart</h4>
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>


<?php
$sql = "SELECT fs_kd_layanan,count (fs_kd_reg) from ta_registrasi where fs_kd_layanan='IGD01' and fd_tgl_masuk between '2021-01-01' and '2021-01-31' and fd_tgl_void='3000-01-01'
Group by fs_kd_layanan";
$jumlah = sqlsrv_query($conn, $jumlah) or die(sqlsrv_errors());
?>
<script>
    $(function() {
                /* ChartJS
                 * -------
                 * Data and config for chartjs
                 */
                'use strict';
                var data = {
                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli"],
                    datasets: [{
                        label: '# of Votes',
                        data: [10, 90, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: false
                    }]
                };
                var multiLineData = {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                            label: 'Dataset 1',
                            data: [12, 19, 3, 5, 2, 3],
                            borderColor: [
                                '#587ce4'
                            ],
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: 'Dataset 2',
                            data: [5, 23, 7, 12, 42, 23],
                            borderColor: [
                                '#ede190'
                            ],
                            borderWidth: 2,
                            fill: false
                        },
                        {
                            label: 'Dataset 3',
                            data: [15, 10, 21, 32, 12, 33],
                            borderColor: [
                                '#f44252'
                            ],
                            borderWidth: 2,
                            fill: false
                        }
                    ]
                };
                var options = {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    },
                    legend: {
                        display: false
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    }

                };
                var doughnutPieData = {
                    datasets: [{
                        data: [30, 40, 30],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)',
                            'rgba(255, 159, 64, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }],

                    // These labels appear in the legend and in the tooltips when hovering different arcs
                    labels: [
                        'Pink',
                        'Blue',
                        'Yellow',
                    ]
                };
                var doughnutPieOptions = {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    }
                };
                var areaData = {
                    labels: ["2013", "2014", "2015", "2016", "2017"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1,
                        fill: true, // 3: no fill
                    }]
                };

                var areaOptions = {
                    plugins: {
                        filler: {
                            propagate: true
                        }
                    }
                }

                var multiAreaData = {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                            label: 'Facebook',
                            data: [8, 11, 13, 15, 12, 13, 16, 15, 13, 19, 11, 14],
                            borderColor: ['rgba(255, 99, 132, 0.5)'],
                            backgroundColor: ['rgba(255, 99, 132, 0.5)'],
                            borderWidth: 1,
                            fill: true
                        },
                        {
                            label: 'Twitter',
                            data: [7, 17, 12, 16, 14, 18, 16, 12, 15, 11, 13, 9],
                            borderColor: ['rgba(54, 162, 235, 0.5)'],
                            backgroundColor: ['rgba(54, 162, 235, 0.5)'],
                            borderWidth: 1,
                            fill: true
                        },
                        {
                            label: 'Linkedin',
                            data: [6, 14, 16, 20, 12, 18, 15, 12, 17, 19, 15, 11],
                            borderColor: ['rgba(255, 206, 86, 0.5)'],
                            backgroundColor: ['rgba(255, 206, 86, 0.5)'],
                            borderWidth: 1,
                            fill: true
                        }
                    ]
                };

                var multiAreaOptions = {
                    plugins: {
                        filler: {
                            propagate: true
                        }
                    },
                    elements: {
                        point: {
                            radius: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                display: false
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                display: false
                            }
                        }]
                    }
                }

                var scatterChartData = {
                    datasets: [{
                            label: 'First Dataset',
                            data: [{
                                    x: -10,
                                    y: 0
                                },
                                {
                                    x: 0,
                                    y: 3
                                },
                                {
                                    x: -25,
                                    y: 5
                                },
                                {
                                    x: 40,
                                    y: 5
                                }
                            ],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)'
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Second Dataset',
                            data: [{
                                    x: 10,
                                    y: 5
                                },
                                {
                                    x: 20,
                                    y: -30
                                },
                                {
                                    x: -25,
                                    y: 15
                                },
                                {
                                    x: -10,
                                    y: 5
                                }
                            ],
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.2)',
                            ],
                            borderColor: [
                                'rgba(54, 162, 235, 1)',
                            ],
                            borderWidth: 1
                        }
                    ]
                }

                var scatterChartOptions = {
                    scales: {
                        xAxes: [{
                            type: 'linear',
                            position: 'bottom'
                        }]
                    }
                }
                // Get context with jQuery - using jQuery's .get() method.
                if ($("#barChart").length) {
                    var barChartCanvas = $("#barChart").get(0).getContext("2d");
                    var barChart = new Chart(barChartCanvas, {
                        type: 'line',
                        data: data,
                        options: options
                    });
                }
</script>
<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="vendors/chart.js/Chart.min.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/"></script>
<script src="js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->

</html>