@extends('base.base')

@section('title', 'User')
@section('subtitle', 'User')
@section('user', 'active')

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
        <div class="card">
            @include('user::header')
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($data))
                            @foreach ($data as $user)
                                <tr>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['email'] }}</td>
                                    <td>{{ $user['role']['name'] ?? '-' }}</td>
                                    <td>{{ $user['role']['name'] ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
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
