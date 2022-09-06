@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Test Tabelle</h1>

    </div>

    <div class="container">
        <table class="table table-striped table-bordered table-hover" id="#Artikel">
            <thead>
            <tr>
                <th scope="col">Artikelbezeichnung</th>
                <th scope="col">Artikelnummer</th>
                <th scope="col">Artikelbezeichnung BW</th>
                <th scope="col">Funktionen</th>
            </tr>
            </thead>
        </table>
    </div>
    <script>
        $(document).ready( function () {
            $('#Artikel').DataTable();
        } );
    </script>

@endsection
