@extends('base.base')

@section('title', 'Form Keluar')
@section('subtitle', 'Form Keluar')
@section('form-keluar', 'active')

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
                        Create Form Keluar
                    </div>
                    <!--end::Search-->
                </div>
            </div>

            <!--begin::Card body-->
            <div class="card-body py-4">
                <!--begin::Table-->
                <form id="formWithPrice" class="form" action="{{ url('form-keluar') }}" method="post">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-5 text-center">
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column col-md-4 mb-5 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">No Pengambilan Barang</span>
                        </label>
                        <select name="taking_good_id" aria-label="Select a Timezone" data-control="select2"
                            data-placeholder="Pilih no pengambilan"
                            class="form-select form-select-md form-select-solid taking-good" required>
                            @foreach ($takingGoods as $takingGood)
                                <option value=""></option>
                                <option value="{{ $takingGood['id'] }}">{{ $takingGood['taking_number'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" class="taking-goods" value="{{ json_encode($takingGoods) }}">

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
                                    </tr>
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="body-add">

                                </tbody>
                            </table>
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('change', '.taking-good', function() {
                var taking = JSON.parse($('.taking-goods').val());
                var id = $(this).val();

                var filter = taking.filter((take) => {
                    return take.id == id;
                });

                var html = '';
                $.each((filter[0].taking_good_details), function(key, value) {
                    html += '<tr class="border-bottom border-bottom-dashed" data-kt-element="item">\
                            <td class="pe-7">\
                                <select name="good_ids[]" aria-label="Select a Timezone" data-control="select2"\
                                    data-placeholder="date_period"\
                                    class="form-select form-select-md form-select-solid" required>\
                                    <option value="' + value.good.id + '">' + value.good.name + '</option>\
                                </select>\
                            </td>\
                            <td class="ps-0">\
                                <input class="form-control form-control-solid" type="number" min="1"\
                                    name="qtys[]" placeholder="1" value="' + value.qty + '" data-kt-element="quantity"\
                                    required />\
                            </td>\
                            <td>\
                                <input type="text" class="price form-control form-control-solid text-end"\
                                    name="prices[]" placeholder="0.00" data-kt-element="price" value="' + value
                        .good.price + '" required />\
                            </td>\
                            <input type="hidden" name="taking_good_detail_ids[]" value="' + value.id + '">\
                        </tr>';
                });

                $(".body-add").html(html)
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
