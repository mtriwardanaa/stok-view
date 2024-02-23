@extends('base.base')

@section('title', 'Role')
@section('subtitle', 'Role')
@section('role', 'active')

@section('css')
@endsection

@section('script')
@endsection

@section('content')
    <div id="kt_content_container" class="container-xxl">
        <!--begin::Card-->
        @include('partials.notif')
        <div class="card">
            <div class="card-header border-0 pt-0" style="background-color: #d1d1d1">
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        Create Role
                    </div>
                    <!--end::Search-->
                </div>
            </div>

            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <form id="kt_modal_new_ticket_form" class="form" action="{{ url('role') }}" method="post">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-5 text-center">
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column col-md-4 mb-5 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nama</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Masukkan nama"
                            name="name" required />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-15 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Label</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Masukkan label"
                            name="label" required />
                    </div>
                    <div class="d-flex flex-column col-md-4 mb-15 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-4">
                            <span class="required">Permission</span>
                        </label>
                        @php
                            $permissions = [];

                            foreach ($data as $key => $permission) {
                                $permissions[$permission['label']][$key] = $permission;
                            }
                        @endphp

                        @foreach ($permissions as $key => $permission)
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span>{{ $key }}</span>
                            </label>
                            <div class="d-flex">
                                @foreach ($permission as $item)
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                        <input class="form-check-input" type="checkbox" value="{{ $item['id'] }}"
                                            name="permission_ids[]" />
                                        <span class="form-check-label">{{ $item['description'] }}</span>
                                    </label>
                                @endforeach
                            </div>
                        @endforeach

                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-left">
                        <button type="submit" id="kt_modal_new_ticket_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
