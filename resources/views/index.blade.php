<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Datatable CSS CDN LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <!-- Datatable JS CDN LINK -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    {{-- Links --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/datatables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.11.3/css/dataTables.bootstrap4.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.11.3/css/dataTables.bootstrap4.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.11.3/css/dataTables.dataTables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.11.3/css/dataTables.dataTables.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.11.3/css/jquery.dataTables.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('DataTables/DataTables-1.11.3/css/jquery.dataTables.min.css') }}"/>
    <!-- Datatable JS CDN LINK -->
    <script type="text/javascript" src="{{ asset('DataTables/datatables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.11.3/js/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.11.3/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.11.3/js/dataTables.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.11.3/js/dataTables.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.11.3/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js') }}"></script>
</head>
<style>
    .input {
        border-radius: 4px;
        background: #fbfbfb;
        box-shadow: 0px 0px 4px rgb(0 0 0 / 10%), inset 1px 1px 2px rgb(0 0 0 / 10%);
        padding: 4px 2px;
        border-color: #92a8d1;
    }
</style>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="row">
            <div class="col-md-12" style="padding: 20px;">
                <div class="pull-left" style="float: left;">
                    <button class="btn btn-success" onclick="myFunction()">Add CSV</button>
                </div>
                <div class="pull-right" style="float: right;">
                    <a class="btn btn-warning" href="{{ route('export') }}">Export</a>
                </div>
            </div>
        </div>
        <div class="card-body" id="add_csv" style="display: none;">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-grpup py-2">
                    <label class="pr-3" style="font-weight: 500;">Title</label>
                    <input type="text" name="title" Placeholder="Enter Title" class="input form-control">
                </div>
                <div class="form-grpup py-2" style="display: none;">
                    <label class="pr-3" style="font-weight: 500;">Quote Number</label>
                    <input type="hidden" name="quote_no" Placeholder="Enter Quote Number" value="quote" class="input form-control">
                </div>
                <div class="form-grpup py-2">
                    <label class="pr-3" style="font-weight: 500;">Select File</label>
                    <input type="file" name="import_file" class="input form-control">
                </div>
                <br>
                <input type='submit' name='submit' value='Import'>
            </form>
        </div>
    </div>

    <div class="card-body table-responive bg-light mt-3">
        @yield('csv_data')
    </div>
</div>
   <script>
       function myFunction() {
            var x = document.getElementById("add_csv");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
   </script>
</body>
</html>