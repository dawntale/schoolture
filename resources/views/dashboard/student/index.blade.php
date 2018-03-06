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
                <h1 class="h2">Student Data</h1><a class="btn btn-primary" href="{{ route('dashboard.student.create') }}">Create Student</a>
            </div>
            <section class="table-responsive">
                <table id="students" class="table table-striped" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Email</th>
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
    $('#students').DataTable({
        processing : true,
        serverSide : true,
        ajax       : "{{ route('dashboard.student.data') }}",
        columns    : [
            {data: 'student_id', name: 'student_id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'}
        ],
        order : [
            [0, 'DESC']
        ]
    });
</script>
@stop