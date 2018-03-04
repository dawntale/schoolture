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
                <h1 class="h2">Department Data</h1><a class="btn btn-primary" href="{{ route('dashboard.department.create') }}">Create Department</a>
            </div>
            <section class="table-responsive">
                <table id="departments" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
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
    $('#departments').DataTable({
        processing : true,
        serverSide : true,
        ajax       : "{{ route('dashboard.department.data') }}",
        columns    : [
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'description', name: 'description'},
            {data: 'status', name: 'status'}
        ]
    });
</script>
@stop