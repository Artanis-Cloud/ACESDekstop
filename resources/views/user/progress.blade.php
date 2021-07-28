@extends('layouts.app-student-qbadminui')

@section('content')
    <!DOCTYPE html>
    <html lang="en" style="background-color: #000a11 !important;">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="target-densitydpi=device-dpi">


        <title>ACES I 4.0</title>



        <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
        <!-- <link href="css/style.css" rel="stylesheet"> -->
        <style media="screen">
            #warning-message {
                display: none;
            }

            @media only screen and (orientation:portrait) {
                #wrapper {
                    display: none;
                }

                #warning-message {
                    display: block;
                    background-color: #000c15;
                    text-align: center;
                    font-size: 150%;
                }
            }

            @media only screen and (orientation:landscape) {
                #warning-message {
                    display: none;
                }
            }

            .accordion {
                background-color: #011329;
                color: #fff;
                cursor: pointer;
                padding: 10px;
                width: 100%;
                border: none;
                text-align: left;
                outline: none;
                font-size: 100%;
                transition: 0.4s;
                font-size: 12px;
            }

            .active,
            .accordion:hover {
                background-color: #02142c;
            }

            .panel {
                padding-top: 5px;
                padding: 5px;
                /* padding: 0 18px; */
                display: none;
                background-color: #02142c4d;
                /* overflow: hidden; */
                color: white;
                font-size: 100%;
            }

        </style>
    </head>

    <body>

        <div id="wrapper">
            <div class="container-fluid">

                <h1
                    style="padding-top: 2%; text-align: center;font-size: 300%; color: #fff; font-weight: bold;; padding-bottom: 0%;padding-left: 3%;">
                    MY PROGRESS</h1>

                <div class="row">
                    <div class="col-md-12">



                        <div class="row" style="padding-top: 10px;">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md" style="overflow-y: auto; height: 350px;">

                                @if ($message = Session::get('success'))
                                    <div id=alert>
                                        <div class="alert alert-card  alert-success" role="alert">
                                            <strong>Operation Succesful! </strong>
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @elseif ($message = Session::get('error'))
                                    <div id="alert">
                                        <div class="alert alert-card  alert-danger" role="alert">
                                            <strong>Error! </strong>
                                            {{ $message }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                <button class="accordion">IMPORTANT NOTICE! (Please Read)</button>
                                <div class="panel">
                                    <p>This Progress are progress that have been captured by the system. If the chapter is
                                        not found in the progress,</p>
                                    <p>it means that you have not done the chapter yet.</p>
                                </div>

                                <button class="accordion">Lesson Progress</button>
                                <div class="panel">
                                    <div class="table-responsive">
                                        <table id="table_data_list_progress"
                                            class="table table-striped table-bordered second" style="width:100%">
                                            <thead style="text-align: center; color:white;">
                                                <tr>
                                                    <th>NAME</th>
                                                    <th>IDENTIFICATION NUMBER</th>
                                                    <th>SCHOOL</th>
                                                    <th>STATE</th>
                                                    <th>DISTRICT</th>
                                                    <th>LESSON PROGRESS (%)</th>
                                                    <th>LESSON CHAPTER</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center; color:white;">
                                                @foreach ($lesson_progress as $data)
                                                    <tr>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->ic_number }}</td>
                                                        <td>{{ $data->school }}</td>
                                                        <td>{{ $data->state }}</td>
                                                        <td>{{ $data->district }}</td>
                                                        <td>{{ $data->lesson_progress }}</td>
                                                        @if (!$data->lesson_id)
                                                            <td> - </td>
                                                        @elseif($data->lesson_id == '1')
                                                            <td>1. Introduction</td>
                                                        @elseif($data->lesson_id == '2')
                                                            <td>2. AR | VR</td>
                                                        @elseif($data->lesson_id == '4')
                                                            <td>4. IOT</td>
                                                        @elseif($data->lesson_id == '5')
                                                            <td>5. Big Data</td>
                                                        @elseif($data->lesson_id == '10')
                                                            <td>10. Cyber Security</td>
                                                        @elseif($data->lesson_id == '6')
                                                            <td>6. Cloud Computing</td>
                                                        @elseif($data->lesson_id == '3')
                                                            <td>3. Additive Manufacturing</td>
                                                        @elseif($data->lesson_id == '7')
                                                            <td>7. Advanced Simulation</td>
                                                        @elseif($data->lesson_id == '9')
                                                            <td>9. Universal Integration</td>
                                                        @elseif($data->lesson_id == '8')
                                                            <td>8. Autonamous Robot</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <button class="accordion">Quiz Progress</button>
                                <div class="panel">
                                    <div class="table-responsive">
                                        <table id="table_data_list_progress"
                                            class="table table-striped table-bordered second" style="width:100%">
                                            <thead style="text-align: center; color:white;">
                                                <tr>
                                                    <th>NAME</th>
                                                    <th>IDENTIFICATION NUMBER</th>
                                                    <th>SCHOOL</th>
                                                    <th>STATE</th>
                                                    <th>DISTRICT</th>
                                                    <th>QUIZ PROGRESS (%)</th>
                                                    <th>QUIZ CHAPTER</th>
                                                    <th>QUIZ RESULT</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center; color:white;">
                                                @foreach ($quiz_progress as $data)
                                                    <tr>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->ic_number }}</td>
                                                        <td>{{ $data->school }}</td>
                                                        <td>{{ $data->state }}</td>
                                                        <td>{{ $data->district }}</td>
                                                        <td>{{ $data->quiz_progress }}</td>
                                                        @if (!$data->quiz_id)
                                                            <td> - </td>
                                                        @elseif($data->quiz_id == '1')
                                                            <td>1. Introduction</td>
                                                        @elseif($data->quiz_id == '3')
                                                            <td>2. AR | VR</td>
                                                        @elseif($data->quiz_id == '4')
                                                            <td>4. IOT</td>
                                                        @elseif($data->quiz_id == '5')
                                                            <td>5. Big Data</td>
                                                        @elseif($data->quiz_id == '6')
                                                            <td>10. Cyber Security</td>
                                                        @elseif($data->quiz_id == '7')
                                                            <td>6. Cloud Computing</td>
                                                        @elseif($data->quiz_id == '8')
                                                            <td>3. Additive Manufacturing</td>
                                                        @elseif($data->quiz_id == '9')
                                                            <td>7. Advanced Simulation</td>
                                                        @elseif($data->quiz_id == '10')
                                                            <td>9. Universal Integration</td>
                                                        @elseif($data->quiz_id == '11')
                                                            <td>8. Autonamous Robot</td>
                                                        @endif
                                                        <td>{{ $data->result_status ?? '-' }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <button class="accordion">Game Progress</button>
                                <div class="panel">
                                    <div class="table-responsive">
                                        <table id="table_data_list_progress"
                                            class="table table-striped table-bordered second" style="width:100%">
                                            <thead style="text-align: center; color:white;">
                                                <tr>
                                                    <th>NAME</th>
                                                    <th>IDENTIFICATION NUMBER</th>
                                                    <th>SCHOOL</th>
                                                    <th>STATE</th>
                                                    <th>DISTRICT</th>
                                                    <th>GAME PROGRESS (%)</th>
                                                    <th>GAME CHAPTER</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center; color:white;">
                                                @foreach ($game_progress as $data)
                                                    <tr>
                                                        <td>{{ $data->name }}</td>
                                                        <td>{{ $data->ic_number }}</td>
                                                        <td>{{ $data->school }}</td>
                                                        <td>{{ $data->state }}</td>
                                                        <td>{{ $data->district }}</td>
                                                        <td>{{ $data->game_progress }}</td>
                                                        @if (!$data->game_id)
                                                            <td> - </td>
                                                        @elseif($data->game_id == '1')
                                                            <td>1. Introduction</td>
                                                        @elseif($data->game_id == '2')
                                                            <td>2. Circuit 2</td>
                                                        @elseif($data->game_id == '4')
                                                            <td>4. Circuit 4</td>
                                                        @elseif($data->game_id == '5')
                                                            <td>5. Circuit 5</td>
                                                        @elseif($data->game_id == '10')
                                                            <td>10. Circuit 10</td>
                                                        @elseif($data->game_id == '6')
                                                            <td>6. Circuit 6</td>
                                                        @elseif($data->game_id == '3')
                                                            <td>3. Circuit 3</td>
                                                        @elseif($data->game_id == '7')
                                                            <td>7. Circuit 7</td>
                                                        @elseif($data->game_id == '9')
                                                            <td>9. Circuit 9</td>
                                                        @elseif($data->game_id == '8')
                                                            <td>8. Circuit 8</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                        <div style="padding: 6%;"></div>

                    </div>
                </div>
            </div>

        </div>
        <div id="warning-message">
            <img class="logo-img" src="{{ asset('concept/images/StudentDashboard/Logo.png') }}" alt="logo"
                style="width: 100%;padding-top: 20%;padding-bottom: 20%;">
            <img src="{{ asset('concept/images/galaxy/mascot.gif') }}" width="100%" height="auto"
                style="margin-top: -10%;background-position: 100% 100%;background-repeat: no-repeat;background-size: cover;">


            <span style="color: #fff;text-transform: uppercase;">Best View is in Landscape Mode</span>
            <br><br>
            <span style="color: #fff;text-transform: uppercase;">Please rotate your device to view ACES WEB APP</span>
        </div>

        <script>
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.display === "block") {
                        panel.style.display = "none";
                    } else {
                        panel.style.display = "block";
                    }
                });
            }
        </script>
    </body>

    </html>


@endsection
