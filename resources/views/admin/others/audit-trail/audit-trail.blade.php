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

                <div style="padding: 5px;"></div>
                <h2 class="card-header" style="text-align: center;"><i class="fas fa-signal" aria-hidden="true"></i> Audit
                    Trail</h2>
                <div class="card-body p-0">
                    <div style="padding: 10px;"></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="table_data_audit" style="width: 100%;">
                            <!-- Table head -->
                            <thead>
                                <tr>
                                    <th class="all">No</th>
                                    <th class="all">User Name</th>
                                    <th class="all">IC Number</th>
                                    <th class="all">Email</th>
                                    <th class="all">Phone</th>
                                    <th class="all">School</th>
                                    <th class="all">District</th>
                                    <th class="all">IP Address</th>
                                    <th class="all">Time</th>
                                    <th class="all">Database</th>
                                    <th class="all">Event</th>
                                    <th class="all">Previous Data</th>
                                    <th class="all">New Data</th>

                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

    <script type="text/javascript">
        $("document").ready(function() {
            setTimeout(function() {
                $("div.alert").remove();
            }, 5000); // 5 secs

        });
    </script>
    <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#table_data_audit').DataTable({
         processing: true,
         serverSide: true,
         buttons: [
                'excel', 'pdf', 'print'
         ],
         scrollX : true,
         ajax: "{{route('admin.others.audit-trail.audit-trail-get')}}",
         columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'ic_number' },
            { data: 'email' },
            { data: 'phone' },
            { data: 'school' },
            { data: 'district' },
            { data: 'ip_address' },
            { data: 'created_at' },
            { data: 'auditable_type' },
            { data: 'event' },
            { data: 'old_values' },
            { data: 'new_values' },
            // { data: 'updated_at' },
         ]
      });

    });
    </script>
@endsection
