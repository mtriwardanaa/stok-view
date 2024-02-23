<div class="card-header border-0 pt-6">
    <!--begin::Card title-->
    <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                    <path
                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <input type="text" data-kt-user-table-filter="search"
                class="form-control form-control-solid w-250px ps-14" placeholder="Cari pegawai" />
        </div>
        <!--end::Search-->
    </div>
    <!--begin::Card title-->
    <!--begin::Card toolbar-->
    <div class="card-toolbar">
        <!--begin::Toolbar-->
        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
            <!--begin::Filter-->
            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Saring</button>
            <!--begin::Menu 1-->
            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                <!--begin::Header-->
                <div class="px-7 py-5">
                    <div class="fs-5 text-dark fw-bolder">Saring Opsi</div>
                </div>
                <!--end::Header-->
                <!--begin::Separator-->
                <div class="separator border-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Content-->
                <div class="px-7 py-5" data-kt-user-table-filter="form">
                    <!--begin::Input group-->
                    <div class="mb-10">
                        <label class="form-label fs-6 fw-bold">Jabatan:</label>
                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                            data-placeholder="Pilih jabatan" data-allow-clear="true" data-kt-user-table-filter="role"
                            data-hide-search="true">
                            <option></option>
                            @if (!empty($positions))
                                @foreach ($positions as $position)
                                    <option value="{{ ucwords($position) }}">{{ ucwords($position) }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                            data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                        <button type="submit" class="btn btn-primary fw-bold px-6" data-kt-menu-dismiss="true"
                            data-kt-user-table-filter="filter">Terapkan</button>
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Menu 1-->
            <!--end::Filter-->
            <!--begin::Export-->
            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                data-bs-target="#kt_modal_export_users">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1"
                            transform="rotate(90 12.75 4.25)" fill="currentColor" />
                        <path
                            d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                            fill="currentColor" />
                        <path
                            d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                            fill="#C4C4C4" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Ekspor</button>
            <!--end::Export-->
            <!--begin::Add user-->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                            transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Tambah Pegawai</button>
            <!--end::Add user-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Group actions-->
        <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
            <div class="fw-bolder me-5">
                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
            </div>
            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                Selected</button>
        </div>
        <!--end::Group actions-->
        <!--begin::Modal - Adjust Balance-->
        @include('pegawai.modals.export')
        <!--end::Modal - New Card-->
        <!--begin::Modal - Add task-->
        @include('pegawai.modals.add')
        <!--end::Modal - Add task-->
    </div>
    <!--end::Card toolbar-->
</div>
