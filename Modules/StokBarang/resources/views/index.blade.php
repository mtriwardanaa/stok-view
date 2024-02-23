@extends('base.base')

@section('title', 'Stok Barang')
@section('subtitle', 'Stok Barang')
@section('stok-barang', 'active')

@section('css')
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>

    <script>
        new DataTable('#example');
    </script>
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        @include('partials.notif')
        <div class="card">
            @include('stokbarang::header')
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Kode</th>
                            <th>Unit</th>
                            <th>Jumlah</th>
                            <th>Minimal Stok</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data))
                            @foreach ($data as $stok)
                                <tr>
                                    <td>{{ $stok['name'] }}</td>
                                    <td>{{ $stok['code'] }}</td>
                                    <td>{{ $stok['unit']['name'] }}</td>
                                    <td>{{ $stok['qty'] }}</td>
                                    <td>{{ $stok['qty_warning'] }}</td>
                                    <td>Rp{{ number_format($stok['price']) }}</td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Kode</th>
                            <th>Unit</th>
                            <th>Jumlah</th>
                            <th>Minimal Stok</th>
                            <th>Price</th>
                        </tr>
                    </tfoot>
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
