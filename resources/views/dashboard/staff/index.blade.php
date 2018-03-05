@extends('layouts.app')

@section('navbar')
    @include('layouts.app-dashboard-navbar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.app-dashboard-sidebar')
        
        <main role="main" class="col-md-9 ml-sm-auto pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Staff Data</h1><a class="btn btn-primary" href="{{ route('dashboard.staff.create') }}">Create Staff</a>
            </div>
            <section class="table-responsive">
                <table id="staff" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Staff ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                        </tr>
                    </thead>
                </table>
            </section>
        </main>
    </div>
</div>
@endsection

@section('dashboard-scripts')
<script src="{{ asset('js/datatables.min.js') }}"></script>
<script type="text/javascript">
    $('#staff').DataTable({
        processing : true,
        serverSide : true,
        ajax       : "{{ route('dashboard.staff.data') }}",
        columns    : [
            {data: 'staff_id', name: 'staff_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'position', name: 'position'}
        ],
        order : [
            [0, 'DESC']
        ]
    });
</script>
@stop