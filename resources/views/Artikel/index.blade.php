@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Artikel</h1>

    </div>

    <div class="container">
        <table class="table table-striped table-bordered table-hover" id="Artikel">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">address</th>
                <th scope="col">ingredients</th>
                <th scope="col">fat</th>
                <th scope="col">fattyacids</th>
                <th scope="col">carbs</th>
                <th scope="col">sugar</th>
                <th scope="col">protein</th>
                <th scope="col">salt</th>
                <th scope="col">traces</th>
                <th scope="col">article_id</th>
                <th scope="col">partner_id</th>
                <th scope="col">store_id</th>
                <th scope="col">burn_kj</th>
                <th scope="col">burn_ckal</th>
                <th scope="col">weight</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
            </tr>
            </thead>
        </table>
        <a href="#" class="btn btn-primary btn-lg">
            <i class="bi-cloud-arrow-up"></i> OneDrive
        </a>
    </div>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready( function () {
            $('#Artikel').DataTable({
                'processing': 'false',
                'serverSide': 'false',
                'ajax': '../artikel/ajax',
                'columns': [
                    { 'data': 'id' },
                    { 'data': 'address' },
                    { 'data': 'ingredients' },
                    { 'data': 'fat' },
                    { 'data': 'fattyacids' },
                    { 'data': 'carbs' },
                    { 'data': 'sugar' },
                    { 'data': 'protein' },
                    { 'data': 'salt' },
                    { 'data': 'traces' },
                    { 'data': 'article_id' },
                    { 'data': 'partner_id' },
                    { 'data': 'store_id' },
                    { 'data': 'burn_kj' },
                    { 'data': 'burn_ckal' },
                    { 'data': 'weight' },
                    { 'data': 'created_at' },
                    { 'data': 'updated_at' },
                ],




            });

        });
    </script>

@endsection
