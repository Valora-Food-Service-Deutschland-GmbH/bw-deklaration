@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>User</h1>

    </div>

    <div class="container">
        <table class="table table-striped table-bordered table-hover" id="#Artikel">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Artikelbezeichnung BW</th>
                <th scope="col">Funktionen</th>
            </tr>
            </thead>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#User').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('user-list') }}",
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
                        data: 'mobile',
                        name: 'mobile'
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
