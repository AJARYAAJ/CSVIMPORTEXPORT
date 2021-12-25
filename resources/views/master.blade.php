<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
    
  <!-- Datatable CSS CDN LINK -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" >
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" >
  <!-- Datatable JS CDN LINK -->
  <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper"> 
    
<div class="container">
    <div class="card bg-light mt-3">
        <div class="row">
            <div class="col-md-12" style="padding-left: 25px; padding-right: 25px; padding-top: 5px;">
                <div class="pull-left" style="float: left;">
                    <h4>Employee List</h4>
                </div>
                <div class="pull-right" style="float: right;">
                    <button class="btn btn-success" onclick="myFunction()">Add CSV</button>
                    <a class="btn btn-warning" href="{{ route('export') }}">Export</a>
                </div>
            </div>
        </div>
        <div class="card-body" id="add_csv" style="display: none;">
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- <div class="form-grpup py-2">
                    <label class="pr-3" style="font-weight: 500;">Title</label>
                    <input type="text" name="title[]" Placeholder="Enter Title" class="input form-control">
                </div>
                <div class="form-grpup py-2">
                    <label class="pr-3" style="font-weight: 500;">Quote Number</label>
                    <input type="text" name="quote_no[]" Placeholder="Enter Quote Number" class="input form-control">
                </div> --}}
                <div class="form-grpup py-2">
                    <label class="pr-3" style="font-weight: 500;">Select File</label>
                    <input type="file" name="import_file" class="input form-control" accept=".csv">
                </div>
                <br>
                <button class="btn btn-success">Import</button>
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
</div>
<!-- ./wrapper -->
</body>
</html>
