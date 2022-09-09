@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Artikel</h1>

    </div>

    <div class="container">
        <table class="table table-striped table-bordered table-hover" id="#Artikel">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">email</th>
                <th scope="col">Funktionen</th>
            </tr>
            </thead>
        </table>
        <a href="{{ route('artikel/') }}" class="btn btn-primary btn-lg">
            <span class="glyphicon glyphicon-cloud-upload"></span> Auf mein OneDrive hochladen
        </a>
    </div>
    <script>
        $(document).ready( function () {
            $('#Artikel').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/artikel/ajax',
                    method: 'GET',
                    error: function (jqXHR, testStatus, errorThrown){
                        $('#Artikel').Datatable().clear().draw();
                    }
                },
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>

@endsection
