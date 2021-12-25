@extends('index2')

@section('title')
   Employee List 
@endsection

@section('csv_data')
<div>
    <h4>Employee List</h4>
</div>
<table id="loadData" class="table table-striped display" style="width:100%">
    <thead>
        <tr>
            <th>Title</th>
            <th>Quote No.</th>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Email</th>
            <th>Mobile No.</th>
            <th>Relation</th>
            <th>DOJ</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Age</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
    <tfoot>
        <tr>
            <th>Title</th>
            <th>Quote No.</th>
            <th>Employee ID</th>
            <th>Employee Name</th>
            <th>Email</th>
            <th>Mobile No.</th>
            <th>Relation</th>
            <th>DOJ</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Age</th>
        </tr>
    </tfoot>
</table>

<script>
    $(document).ready(function() {
        var versionNo = $.fn.dataTable.version;
        //alert(versionNo);
        // console.log('{{url('/')}}');
        $('#loadData').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{url('/')}}',
            },
            buttons: false,
            searching: true,
            scrollY: 500,
            scrollX: true,
            scrollCollapse: true,
            columns: [
                {data: 'title', className: 'title'},
                {data: 'quote_no', name: 'quote_no'},
                {data: 'employee_id', name: 'employee_id'},
                {data: 'employee_name', name: 'employee_name'},
                {data: 'email_id', name: 'email_id'},
                {data: 'mobile_no', name: 'mobile_no'},
                {data: 'relation', name: 'relation'},
                {data: 'doj', name: 'doj'},
                {data: 'dob', name: 'dob'},
                {data: 'gender', name: 'gender'},
                {data: 'age', name: 'age'}
            ]
        });
    });
</script>
@endsection