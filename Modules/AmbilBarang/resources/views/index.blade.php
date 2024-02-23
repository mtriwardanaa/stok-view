@extends('base.base')

@section('title', 'Pengambilan Barang')
@section('subtitle', 'Pengambilan Barang')
@section('ambil-barang', 'active')

@section('css')
    <link href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>

    <script>
        new DataTable('#example');

        $(document).on('click', '.btn-delete', function() {
            if (confirm('Are you sure you want to save this thing into the database?')) {
                var id = $(this).data('id');
                window.location.href = "{{ url('ambil-barang/delete') }}" + '/' + id;
            }
        });
    </script>
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        @include('partials.notif')
        <div class="card">
            @include('ambilbarang::header')
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Dibuat Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data))
                            @foreach ($data as $form)
                                <tr>
                                    <td>{{ $form['taking_number'] }}</td>
                                    <td>{{ date('d-m-Y', strtotime($form['date'])) }}</td>
                                    <td>{{ $form['user_create']['name'] }}</td>
                                    <td>
                                        <a href="#"><button class="btn btn-sm btn-warning">Edit</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Dibuat Oleh</th>
                            <th>Aksi</th>
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
