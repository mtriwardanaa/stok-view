@extends('base.base')

@section('title', 'Gaji')
@section('subtitle', 'Gaji')
@section('gaji', 'active')

@section('css')
    <link href="{{ url('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="{{ url('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ url('assets/js/custom/utilities/modals/create-account.js') }}"></script>
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
            <!--begin::Card body-->
            <div class="card-body">
                <!--begin::Stepper-->
                <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                    <!--begin::Form-->
                    <form id="formWithPrice" class="mx-auto mw-2000px w-100 pt-5 pb-5" method="post"
                        action="{{ url('gaji/simpan') }}">
                        @csrf
                        <!--end::Step 3-->
                        <!--begin::Step 4-->
                        <div class="current" data-kt-stepper-element="content">

                            <!--begin::Wrapper-->
                            <div class="w-1000">
                                <div class="row mb-1">
                                    <!--begin::Col-->
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Bulan</span>
                                        </label>

                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <select name="periode" class="form-select form-select-lg form-select-solid"
                                                data-control="select2" data-placeholder="Pilih bulan"
                                                data-allow-clear="true" data-hide-search="true" required>
                                                <option></option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span class="required">Tahun</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <select name="tahun" class="form-select form-select-lg form-select-solid"
                                                data-control="select2" data-placeholder="Pilih tahun"
                                                data-allow-clear="true" data-hide-search="true" required>
                                                <option></option>
                                                @for ($i = date('Y'); $i > date('Y') - 5; $i--)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Rekening Debet</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input name="rek_debet" class="form-control form-control-lg form-control-solid"
                                                value="1058095353" required />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <div class="col-md-3 fv-row">
                                        <!--begin::Label-->
                                        <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                            <span>Tanggal Dibuat</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input wrapper-->
                                        <div class="position-relative">
                                            <!--begin::Input-->
                                            <input name="tanggal_dibuat"
                                                class="form-control form-control-lg form-control-solid"
                                                value="{{ date('Y-m-d') }}" type="date" required />
                                            <!--end::Input-->
                                        </div>
                                        <!--end::Input wrapper-->
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <hr style="margin-top: 20px;margin-bottom:20px">
                                <!--begin::Input group-->
                                <!--begin::Input group-->
                                @if (!empty($employees))
                                    @foreach ($employees as $key => $employee)
                                        <input type="hidden" name="id[]" value="{{ $employee['id'] }}">
                                        <div class="row mb-3">
                                            <!--begin::Col-->
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                @if ($key == 0)
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Nama</span>
                                                    </label>
                                                @endif

                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="form-control form-control-solid"
                                                        placeholder="nama" name="name[]" value="{{ $employee['name'] }}"
                                                        required />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                @if ($key == 0)
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                        <span class="required">Gaji</span>
                                                    </label>
                                                @endif
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="price form-control form-control-solid"
                                                        placeholder="CVV" name="salary[]" value="{{ $employee['salary'] }}"
                                                        required />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                @if ($key == 0)
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                        <span>Tambahan</span>
                                                    </label>
                                                @endif
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="price form-control form-control-solid"
                                                        placeholder="Rp..." name="tambahan[]" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <div class="col-md-3 fv-row">
                                                <!--begin::Label-->
                                                @if ($key == 0)
                                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                        <span>Potongan</span>
                                                    </label>
                                                @endif
                                                <!--end::Label-->
                                                <!--begin::Input wrapper-->
                                                <div class="position-relative">
                                                    <!--begin::Input-->
                                                    <input type="text" class="price form-control form-control-solid"
                                                        placeholder="Rp..." name="potongan[]" />
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input wrapper-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                    @endforeach
                                @endif
                                <!--end::Input group-->
                            </div>
                            <!--end::Wrapper-->
                        </div><br>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Stepper-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Card-->
    </div>
@endsection
