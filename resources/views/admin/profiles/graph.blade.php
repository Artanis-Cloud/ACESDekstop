@extends('layouts.app-index-admin-dashboardstat')

@section('content')

<!DOCTYPE html>
<html>
    <head>

        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" rel="stylesheet" type="text/css">
        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
        <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/mapdata/countries/my/my-all.js"></script>

        <style>
            :root {
    --grey-d1: #585858;
    --grey-d2: #F4F4F4;
    --grey-d3: #000000;
    --red-1: #F2B8D1;
    --red-2: #F04B92;
    --red-3: #EB1E77;
    --red-4: #AD1257;
    --white: #FFFFFF;
    --blue: #329EF4;
    --grey: #eeeeee;
}
html, body {
    font-family: "Montserrat", "Helvetica Neue", Arial, sans-serif;
    height: 100%;
    background-color: var(--grey);
}
.card-1, .card-2, .card-3, .card-4 {
    background-color: white;
    border-radius: 20px;
    box-shadow: 2px 2px 5px 2px #D7D7D7;
}
.chart-lbl {
    margin-left: 5%;
    font-size: 12px;
    color: var(--grey-d3);
    opacity: 0.8;
}
.divider {
    background-color: var(--grey-d2);
    height: 2px;
    margin: auto;
    width: 98%;
}

/*  media queries */

@media only screen and (min-width: 320px) {
    .bar-chart-container, .line-chart-container {
        margin: 5% auto 5% auto;
        height: 80%;
        width: 90%;
    }
    .doughnut-chart-container, .pie-chart-container {
        margin: 5% auto 5% auto;
        margin-top: 5%;
    }
    .dashboard-container {
        display: grid;
        grid-template: 12% 12% 12% 12% 12% 12% 12% 12% 10% 10% 10% 10% 10% 10% 10% 10% / repeat(1, 1fr);
        grid-gap: 20px;
        padding: 5% 0 25% 0;
    }
    .card-1, .card-2, .card-3, .card-4 {
        border-radius: 10px;
    }
    /*doughnut chart*/
    .card-1 {
        grid-row: 1 / 3;
    }
    /*pie chart*/
    .card-2 {
        grid-row: 3 / 5;
    }
    /*line chart*/
    .card-3 {
        grid-row: 5 / 7;
    }
    /*bar chart*/
    .card-4 {
        grid-row: 7 / 9;
    }
}
@media only screen and (min-width: 400px) {
    .dashboard-container {
        margin: 0 5% 0 5%;
    }
}
@media only screen and (min-width: 800px) {
    .bar-chart-container {
        margin-top: 3%;
    }
    /*doughnut chart*/
    .card-1 {
        grid-column: 1 / 2;
        grid-row: 1 / 3;
    }
    /*pie chart*/
    .card-2 {
        grid-column: 2 / 3;
        grid-row: 1 / 3;
    }
    /*line chart*/
    .card-3 {
        grid-column: 1 / 3;
        grid-row: 3 / 6;
    }
    /*bar chart*/
    .card-4 {
        grid-column: 1 / 3;
        grid-row: 6 / 9;
    }
    .dashboard-container {
        display: grid;
        grid-template: repeat(8, 12%) / repeat(2, 1fr);
        grid-gap: 20px;
        margin: 0 10% 0 10%;
        padding: 5% 0 25% 0;
    }
}
@media only screen and (min-width: 1070px) {
    .bar-chart-container, .line-chart-container {
        margin: 2% auto 0 auto;
        height: 70%;
        width: 80%;
    }
    .content-center {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
    }
    .dashboard-container {
        grid-template: repeat(8, 12%) / repeat(12, 1fr);
        grid-gap: 10px;
        margin: 5% 5% 2% 5%;
        padding: 0;
        width: 100%;
    }
    .doughnut-chart-container, .pie-chart-container {
        width: 100%;
    }
    /*doughnut chart*/
    .card-1 {
        grid-column: 1 / 5;
        grid-row: 1 / 5;
    }
    /*pie chart*/
    .card-2 {
        grid-column: 1 / 5;
        grid-row: 5 / 9;
    }
    /*line chart*/
    .card-3 {
        grid-column: 5 / -1;
        grid-row: 1 / 5;
    }
    /*bar chart*/
    .card-4 {
        grid-column: 5 / -1;
        grid-row: 5 / 9;
    }
    /* main {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 90vh;
        width: 80vw;
        margin: -1vh 10vw 0 10vw;
    } */
}
@media only screen and (min-width: 1400px) {
    .container {
        max-width: 1400px;
    }
}

.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}

        </style>
    </head>
    <body>
        <div class="container" style="padding-bottom: 5%;padding-right: 10%;">
            <main>
                <div class="dashboard-container">
                    <div class="card-1">
                        <h4 class="chart-lbl">
                            Student Status
                        </h4>
                        <div class="divider">
                        </div>
                        <div class="content-center">
                            <div class="doughnut-chart-container">
                                <canvas class="doughnut-chart" id="doughnut">
                                </canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-2">
                        <h4 class="chart-lbl">
                            Student Quiz
                        </h4>
                        <div class="divider">
                        </div>
                        <div class="content-center">
                            <div class="pie-chart-container">
                                <canvas class="pie-chart" id="pie">
                                </canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-3">
                        <h4 class="chart-lbl">
                            Game Progress
                        </h4>
                        <div class="divider">
                        </div>
                        <div class="line-chart-container">
                            <canvas class="line-chart" id="line">
                            </canvas>
                        </div>
                    </div>
                    <div class="card-4">
                        <h4 class="chart-lbl">
                            Lesson Progress
                        </h4>
                        <div class="divider">
                        </div>
                        <div class="bar-chart-container">
                            <canvas class="bar-chart" id="bar">
                            </canvas>
                        </div>
                    </div>


                </div>

                <div class="container" style="margin-left: 5%;padding-top: 5%;">
                    <div class="card">
                        <h4 class="chart-lbl">
                            Malaysia Map
                        </h4>
                        <div class="divider">
                        </div>
                        <div id="container"></div>
                    </div>
                </div>



            </main>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js">
        </script>


<script>
    // Prepare demo data
    // Data is joined to map using value of 'hc-key' property by default.
    // See API docs for 'joinBy' for more info on linking data and map.
    var data = [
        ['my-sa', {{ $state13 }}],
        ['my-sk', {{ $state12 }}],
        ['my-pg', {{ $state3 }}],
        ['my-kh', {{ $state2 }}],
        ['my-sl', {{ $state5 }}],
        ['my-ph', {{ $state9 }}],
        ['my-kl', {{ $state14 }}],
        ['my-pj', {{ $state15 }}],
        ['my-pl', {{ $state1 }}],
        ['my-jh', {{ $state8 }}],
        ['my-pk', {{ $state4 }}],
        ['my-kn', {{ $state10 }}],
        ['my-me', {{ $state7 }}],
        ['my-ns', {{ $state6 }}],
        ['my-te', {{ $state11 }}]
    ];

    // Create the chart
    Highcharts.mapChart('container', {
        chart: {
            map: 'countries/my/my-all'
        },

        title: {
            text: ''
        },

        subtitle: {
            text: ''
        },

        mapNavigation: {
            enabled: true,
            buttonOptions: {
                verticalAlign: 'bottom'
            }
        },

        colorAxis: {
            min: 0
        },

        series: [{
            data: data,
            name: 'Number of User From Each States',
            states: {
                hover: {
                    color: '#F5FF40'
                }
            },
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }, {
            name: 'Separators',
            type: 'mapline',
            data: Highcharts.geojson(Highcharts.maps['countries/my/my-all'], 'mapline'),
            color: 'silver',
            nullColor: 'silver',
            showInLegend: false,
            enableMouseTracking: false
        }]
    });

</script>

        <script>




//bar chart
var bar = document.getElementById('bar');
var barConfig = new Chart(bar, {
  type: 'bar',

   data: {
        labels: ['Lesson 1', 'Lesson 2', 'Lesson 3',
                  'Lesson 4', 'Lesson 5', 'Lesson 6',
                  'Lesson 7', 'Lesson 8', 'Lesson 9', 'Lesson 10'],
        datasets: [{
            label: 'Number of Student',
            data: [{{ $lesson1 }},{{ $lesson2 }},{{ $lesson3 }},{{ $lesson4 }},{{ $lesson5 }},{{ $lesson6 }},{{ $lesson7 }},{{ $lesson8 }},{{ $lesson9 }},{{ $lesson10 }} ],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(225, 50, 64, 1)',
                'rgba(64, 159, 64, 1)',
                'rgba(45, 129, 100, 1)',
                'rgba(11, 19, 64, 1)',
                'rgba(99, 59, 64, 1)',
                'rgba(11, 19, 64, 1)',
                'rgba(11, 19, 64, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    precision:0

                }
            }]
        },
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
      legend:
                {
                    display: true
                }
    }
})

//doughnut chart
var doughnut = document.getElementById('doughnut');
var doughnutConfig = new Chart(doughnut, {
    type: 'doughnut',
    data: {
    labels: ['Active', 'Not Active'],
    datasets: [{
      label: 'Status',
      data: [{{ $student_active }}, {{ $student_inactive }}],
      backgroundColor: [
        'rgba(38, 84, 255, 1)',
        'rgba(255, 0, 23, 1)',
      ],
      borderWidth: 1
    }]
  },
  options: {
            responsive: true, // Instruct chart js to respond nicely.
            maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height
      }
});


//line chart
    var line = document.getElementById('line');

    var lineConfig = new Chart(line, {
     type: 'line',
    data: {
          labels: ['Game 1', 'Game 2', 'Game 3',
                    'Game 4', 'Game 5', 'Game 6', 'Game 7', 'Game 8', 'Game 9', 'Game 10'],
          datasets: [{
              label: 'Number of Student', // Name the series
              data: [{{ $game1 }},{{ $game2 }},{{ $game3 }},{{ $game4 }},{{ $game5 }},{{ $game6 }},{{ $game7 }},{{ $game8 }},{{ $game9 }},{{ $game10 }} ], // Specify the data values array
              fill: false,
              borderColor: '#2EFFF1', // Add custom color border (Line)
              backgroundColor: '#FF2E2E', // Add custom color background (Points and Fill)
              borderWidth: 1 // Specify bar border width
          }]},
          options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    precision:0

                }
            }]
        },
      responsive: true, // Instruct chart js to respond nicely.
      maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height
      legend:
                {
                    display: true
                }
    }

  })

//pie chart
var pie = document.getElementById('pie');
var doughnutConfig = new Chart(pie, {
    type: 'pie',
    data: {
    labels: ['Pass', 'Fail'],
    datasets: [{
      label: '# of data',
      data: [{{ $student_pass }}, {{ $student_fail }}],
      backgroundColor: [
        'rgba(81, 228, 223, 1)',
        'rgba(255, 224, 123, 1)'
      ],
      borderWidth: 1
    }]
  },
  options: {
            responsive: true, // Instruct chart js to respond nicely.
            maintainAspectRatio: true, // Add to prevent default behaviour of full-width/height
      }
});
        </script>
    </body>
</html>

@endsection
