@extends('base.base')

@section('title', 'Form Masuk')
@section('subtitle', 'Form Masuk')
@section('form-masuk', 'active')

@section('css')
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
                        Create Form Masuk
                    </div>
                    <!--end::Search-->
                </div>
            </div>

            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <form id="formWithPrice" class="form" action="{{ url('form-masuk') }}" method="post">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-5 text-center">
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column col-md-4 mb-5 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Supplier</span>
                        </label>
                        <input type="text" class="form-control form-control-solid" placeholder="Masukkan supplier"
                            name="supplier" required />
                    </div>

                    <div class="d-flex flex-column col-md-10 mb-1 fv-row">
                        <div class="table-responsive mb-5">
                            <!--begin::Table-->
                            <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700" data-kt-element="items">
                                <!--begin::Table head-->
                                <thead>
                                    <tr class="border-bottom fs-7 fw-bolder text-gray-700 text-uppercase">
                                        <th class="min-w-100px w-150px">Barang</th>
                                        <th class="min-w-100px w-50px">QTY</th>
                                        <th class="min-w-150px w-100px">Price</th>
                                        <th class="min-w-10px w-10px">Action</th>
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="body-add">
                                    <tr class="border-bottom border-bottom-dashed" data-kt-element="item">
                                        <td class="pe-7">
                                            <select name="good_ids[]" aria-label="Select a Timezone" data-control="select2"
                                                data-placeholder="date_period"
                                                class="form-select form-select-md form-select-solid" required>
                                                @foreach ($goods as $good)
                                                    <option value="{{ $good['id'] }}">{{ $good['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="ps-0">
                                            <input class="form-control form-control-solid" type="number" min="1"
                                                name="qtys[]" placeholder="1" value="1" data-kt-element="quantity"
                                                required />
                                        </td>
                                        <td>
                                            <input type="text" class="price form-control form-control-solid text-end"
                                                name="prices[]" placeholder="0.00" data-kt-element="price" required />
                                        </td>
                                        <td class="pt-5">
                                            <button type="button" class="btn btn-sm btn-icon btn-active-color-primary"
                                                data-kt-element="remove-item">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.5"
                                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                                            fill="currentColor" />
                                                        <path opacity="0.5"
                                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="text-center">
                                <button type="button" class="add-item btn btn-sm btn-warning">add item</button>
                            </div>
                        </div>
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
    <input type="hidden" class="goods" value="{{ json_encode($goods) }}">
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.add-item', function() {
                var goods = JSON.parse($('.goods').val());

                var htmlGoods = '';

                $.each(goods, function(key, value) {
                    htmlGoods += '<option value="' + value.id + '">' + value.name + '</option>';
                });

                var html = '<tr class="border-bottom border-bottom-dashed" data-kt-element="item">\
                        <td class="pe-7">\
                            <select name="good_ids[]" aria-label="Select a Timezone" data-control="select2"\
                                data-placeholder="date_period"\
                                class="form-select form-select-md form-select-solid" required>\
                                ' + htmlGoods + '\
                            </select>\
                        </td>\
                        <td class="ps-0">\
                            <input class="form-control form-control-solid" type="number" min="1"\
                                name="qtys[]" placeholder="1" value="1" data-kt-element="quantity" required />\
                        </td>\
                        <td>\
                            <input type="text" class="price form-control form-control-solid text-end"\
                                name="prices[]" placeholder="0.00" data-kt-element="price" required />\
                        </td>\
                        <td class="pt-5">\
                            <button type="button" class="btn btn-sm btn-icon btn-active-color-primary btn-delete"\
                                data-kt-element="remove-item">\
                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->\
                                <span class="svg-icon svg-icon-3">\
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"\
                                        viewBox="0 0 24 24" fill="none">\
                                        <path\
                                            d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"\
                                            fill="currentColor" />\
                                        <path opacity="0.5"\
                                            d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"\
                                            fill="currentColor" />\
                                        <path opacity="0.5"\
                                            d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"\
                                            fill="currentColor" />\
                                    </svg>\
                                </span>\
                                <!--end::Svg Icon-->\
                            </button>\
                        </td>\
                    </tr>';

                $(html).appendTo('.body-add');
                $('.form-select-solid').select2();
                $(".price").on("keyup", numberFormat);
                $(".price").on("blur", checkFormat);
            });
        });

        $(document).on('click', '.btn-delete', function() {
            $(this).parent().parent().remove();
        });
    </script>
@endsection
