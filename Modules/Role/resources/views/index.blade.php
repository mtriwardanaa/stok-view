@extends('base.base')

@section('title', 'Role')
@section('subtitle', 'Role')
@section('role', 'active')

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
                window.location.href = "{{ url('role/delete') }}" + '/' + id;
            }
        });
    </script>
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        @include('partials.notif')
        <div class="card">
            @include('role::header')
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Label</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data))
                            @foreach ($data as $role)
                                <tr>
                                    <td>{{ $role['name'] }}</td>
                                    <td>{{ $role['label'] }}</td>
                                    <td>
                                        <a href="{{ url('role/' . $role['id'] . '/edit') }}"><button
                                                class="btn btn-sm btn-warning">Edit</button>
                                        </a>
                                        <button class="btn btn-sm btn-danger btn-delete"
                                            data-id="{{ $role['id'] }}">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Label</th>
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
