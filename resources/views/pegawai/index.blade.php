@extends('base.base')

@section('title', 'Pegawai')
@section('subtitle', 'Pegawai')
@section('pegawai', 'active')

@section('css')
    <link href="{{ url('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="{{ url('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
    <script src="{{ url('assets/js/custom/apps/user-management/users/list/export-users.js') }}"></script>
    <script src="{{ url('assets/js/custom/apps/user-management/users/list/add.js') }}"></script>
    <script src="{{ url('assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ url('assets/js/custom/widgets.js') }}"></script>
    <script src="{{ url('assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ url('assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ url('assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ url('assets/js/custom/utilities/modals/users-search.js') }}"></script>
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card header-->
            @include('pegawai.header')
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                    <!--begin::Table head-->
                    <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-20px">No</th>
                            <th class="min-w-125px">Nama</th>
                            <th class="min-w-125px">Jabatan</th>
                            <th class="min-w-125px">Tanggal Masuk</th>
                            <th class="min-w-125px">Gaji</th>
                            <th class="min-w-125px">Status</th>
                            <th class="min-w-125px">Aksi</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    <!--begin::Table body-->
                    <tbody class="text-gray-600 fw-bold">
                        @if (!empty($employees))
                            @foreach ($employees as $key => $employee)
                                <tr>
                                    <!--begin::Checkbox-->
                                    <td class="align-items-center">{{ $key + 1 }}</td>
                                    <!--end::Checkbox-->
                                    <!--begin::User=-->
                                    <td class="align-items-center">
                                        <!--begin::User details-->
                                        <div class="d-flex flex-column">
                                            <a href="{{ url('pegawai/detail', $employee['id']) }}"
                                                class="text-gray-800 text-hover-primary"
                                                data-name="{{ $employee['name'] }}"
                                                data-id="{{ $employee['id'] }}">{{ $employee['name'] }}</span>
                                        </div>
                                        <!--begin::User details-->
                                    </td>
                                    <!--end::User=-->
                                    <!--begin::Role=-->
                                    <td>{{ ucwords($employee['position']) }}</td>
                                    <!--end::Role=-->
                                    <!--begin::Last login=-->
                                    <td>
                                        <div class="badge badge-light fw-bolder">
                                            {{ date('d-m-Y', strtotime($employee['join_date'])) }}</div>
                                    </td>
                                    <!--end::Last login=-->
                                    <!--begin::Two step=-->
                                    <td>Rp{{ number_format($employee['salary']) }}</td>
                                    <!--end::Two step=-->
                                    <!--begin::Joined-->
                                    <td>{{ $employee['status'] }}</td>
                                    <!--begin::Joined-->
                                    <!--begin::Action=-->
                                    <td>
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Opsi
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ url('pegawai/detail', $employee['id']) }}"
                                                    class="menu-link px-3">Detail</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Ubah</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3"
                                                    data-kt-users-table-filter="delete_row">Hapus</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                            @endforeach
                        @endif
                        <!--begin::Table row-->
                    </tbody>
                    <!--end::Table body-->
                </table>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
