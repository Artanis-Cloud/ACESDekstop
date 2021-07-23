@extends('layouts.app-index-admin-dashboard')

@section('content')

    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            @if ($message = Session::get('success'))
                <div id=alert>
                    <div class="alert alert-card  alert-success" role="alert">
                        <strong>Operation Successful! </strong>
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
            <div class="card" style="padding: 10px;">



                <!-- <div style="padding: 5px;"></div> -->
                <h2 class="card-header" style="text-align: center;"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp
                    Feedback List</h2>
                <div class="card-body p-0">
                    <div style="padding: 5px;"></div>


                    <div class="table-responsive">
                        <table id="table_data" class="table table-striped table-bordered second" style="width:100%">
                            <thead style="text-align: center;">
                                <tr>
                                    <th>Bil</th>
                                    <th>User Name</th>
                                    <th>Data & Time</th>
                                    <th>Subject</th>
                                    <th>Feedback</th>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                @foreach ($feedback as $data)
                                    <tr>
                                        <td>{{ $data->id }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->created_at }}</td>
                                        <td>{{ $data->subject }}</td>
                                        <td>{{ $data->feedback }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function pass_id_delete(id) {
            $(".modal-footer #announcement_id").val(id);
        }
    </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").remove();
            }, 5000); // 5 secs

        });
    </script>
@endsection
