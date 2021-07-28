@extends('layouts.app-index-admin-dashboard')

@section('content')

    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            @if ($message = Session::get('success'))
                <div id=alert>
                    <div class="alert alert-card alert-success" role="alert">
                        <strong>Operasi Berjaya! </strong>
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @elseif ($message = Session::get('error'))
                <div id="alert">
                    <div class="alert alert-card alert-danger" role="alert">
                        <strong>Ralat! </strong>
                        {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="card" style="padding: 10px;">

                <div style="padding: 5px;"></div>
                <h2 class="card-header" style="text-align: center;"><i class="fa fa-users" aria-hidden="true"></i>Users Game
                    Progress List
                </h2>
                <div class="p-0 card-body">
                    <div style="padding: 10px;"></div>
                    <div class="table-responsive">
                        <table id="table_data_list_progress" class="table table-striped table-bordered second"
                            style="width:100%">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>BIL</th>
                                    <th>NAME</th>
                                    <th>IDENTIFICATION NUMBER</th>
                                    <th>SCHOOL</th>
                                    <th>STATE</th>
                                    <th>DISTRICT</th>
                                    <th>GAME PROGRESS (%)</th>
                                    <th>GAME ID</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                @foreach ($users as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
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
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

@endsection
