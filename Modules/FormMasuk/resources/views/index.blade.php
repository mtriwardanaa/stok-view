@extends('base.base')

@section('title', 'Form Masuk')
@section('subtitle', 'Form Masuk')
@section('form-masuk', 'active')

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
                window.location.href = "{{ url('form-masuk/delete') }}" + '/' + id;
            }
        });
    </script>
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        @include('partials.notif')
        <div class="card">
            @include('formmasuk::header')
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Dibuat Oleh</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data))
                            @foreach ($data as $form)
                                <tr>
                                    <td>{{ $form['incoming_number'] }}</td>
                                    <td>{{ date('d-m-Y', strtotime($form['date'])) }}</td>
                                    <td>{{ $form['supplier'] }}</td>
                                    <td>{{ $form['user']['name'] }}</td>
                                    <td>
                                        <a href="{{ url('form-masuk/' . $form['id'] . '/edit') }}"><button
                                                class="btn btn-sm btn-warning">Edit</button>
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
                            <th>Supplier</th>
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
