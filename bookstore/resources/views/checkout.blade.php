<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="flexbox">
<head>
    <link rel="shortcut icon" href="//theme.hstatic.net/200000845405/1001223012/14/favicon.png?v=17" type="image/png"/>
    <title>book - Thanh toán đơn hàng</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="book - Thanh to&#225;n đơn h&#224;ng"/>
    <link href='//theme.hstatic.net/200000845405/1001223012/14/check_out.css?v=17' rel='stylesheet' type='text/css'
          media='all'/>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/checkout.css')}}">
    <script src='{{ asset('assets/frontend/js/jquery.min.js') }}' type='text/javascript'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no">
    <link rel="stylesheet" href="{{ asset("assets/css/toastr.min.css") }}">
    <script type="text/javascript">
        var parseQueryString = function (url) {

            var str = url;
            var objURL = {};

            str.replace(
                new RegExp("([^?=&]+)(=([^&]*))?", "g"),
                function ($0, $1, $2, $3) {

                    if ($3 != undefined && $3 != null)
                        objURL[$1] = decodeURIComponent($3);
                    else
                        objURL[$1] = $3;
                });

            return objURL;
        };
    </script>
    <style>
        a.logo {
            display: block;
        }

        .logo-cus {
            width: 100%;
            padding: 15px 0;
            text-align: left;
        }

        .logo-cus img {
            max-height: 4.2857142857em
        }

        @media (max-width: 767px) {
            .banner a {
                display: block;
            }
        }
    </style>
</head>
<body>

<div class="banner">
    <div class="wrap">
        <a href="/" class="logo">
            <div class="logo-cus">
                <img src="{{asset('assets/images/logo.png')}}"/>
            </div>
        </a>
    </div>
</div>

<button class="order-summary-toggle order-summary-toggle-hide">
    <div class="wrap">
        <div class="order-summary-toggle-inner">
            <div class="order-summary-toggle-icon-wrapper">
                <svg width="20" height="19" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-icon">
                    <path
                        d="M17.178 13.088H5.453c-.454 0-.91-.364-.91-.818L3.727 1.818H0V0h4.544c.455 0 .91.364.91.818l.09 1.272h13.45c.274 0 .547.09.73.364.18.182.27.454.18.727l-1.817 9.18c-.09.455-.455.728-.91.728zM6.27 11.27h10.09l1.454-7.362H5.634l.637 7.362zm.092 7.715c1.004 0 1.818-.813 1.818-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817zm9.18 0c1.004 0 1.817-.813 1.817-1.817s-.814-1.818-1.818-1.818-1.818.814-1.818 1.818.814 1.817 1.818 1.817z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle-text order-summary-toggle-text-show">
                <span>Hiển thị thông tin đơn hàng</span>
                <svg width="11" height="6" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown"
                     fill="#000">
                    <path
                        d="M.504 1.813l4.358 3.845.496.438.496-.438 4.642-4.096L9.504.438 4.862 4.534h.992L1.496.69.504 1.812z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle-text order-summary-toggle-text-hide">
                <span>Ẩn thông tin đơn hàng</span>
                <svg width="11" height="7" xmlns="http://www.w3.org/2000/svg" class="order-summary-toggle-dropdown"
                     fill="#000">
                    <path
                        d="M6.138.876L5.642.438l-.496.438L.504 4.972l.992 1.124L6.138 2l-.496.436 3.862 3.408.992-1.122L6.138.876z"></path>
                </svg>
            </div>
            <div class="order-summary-toggle-total-recap" data-checkout-payment-due-target="146340000">
                <span class="total-recap-final-price" id="total-recap-final-price"></span>
            </div>
        </div>
    </div>
</button>
<div class="content content-second">
    <div class="wrap">
        <div class="sidebar sidebar-second">
            <div class="sidebar-content">
                <div class="order-summary">
                    <div class="order-summary-sections">
                        <div class="order-summary-section order-summary-section-discount"
                             data-order-summary-section="discount">
                            <div class="fieldset">
                                <div class="field  ">
                                    <div class="field-input-btn-wrapper">
                                        <div class="field-input-wrapper">
                                            <label class="field-label" for="code">Mã giảm giá</label>
                                            <input placeholder="Mã giảm giá" class="field-input"
                                                   data-discount-field="true" autocomplete="false"
                                                   autocapitalize="off" spellcheck="false" size="30" type="text"
                                                   id="code1" name="code" value=""/>
                                        </div>
                                        <button class="field-input-btn btn btn-default btn-disabled"
                                                onclick="discount()">
                                            <span class="btn-content">Sử dụng</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <form action="{{route('checkout.order')}}" id="form_next_step" accept-charset="UTF-8" method="POST">
        @csrf
        <div class="wrap">
            <div class="sidebar">
                <div class="sidebar-content">
                    <div class="order-summary order-summary-is-collapsed">
                        <h2 class="visually-hidden">Thông tin đơn hàng</h2>
                        <div class="order-summary-sections">
                            <div id="data-checkout" class="order-summary-section order-summary-section-product-list"
                                 data-order-summary-section="line-items">
                                <table class="product-table">
                                    <thead>
                                    <tr>
                                        <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                        <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="order-summary-section order-summary-section-discount"
                                 data-order-summary-section="discount">
                                <div class="fieldset">
                                    <div class="field  ">
                                        <div class="field-input-btn-wrapper">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="code">Mã giảm giá</label>
                                                <input placeholder="Mã giảm giá" class="field-input"
                                                       data-discount-field="true" autocomplete="false"
                                                       autocapitalize="off" spellcheck="false" size="30" type="text"
                                                       id="code2" name="code" value="{{old('code')}}"/>
                                                <span id="msg-code" style="color: red;"></span>
                                            </div>
                                            <a class="field-input-btn btn btn-default btn-disabled"
                                               style="padding: 12px"
                                               onclick="discount()">
                                                <span class="btn-content" style="display: inline-block">Sử dụng</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-summary-section order-summary-section-total-lines payment-lines"
                                 data-order-summary-section="payment-lines">
                                <table class="total-line-table">
                                    <thead>
                                    <tr>
                                        <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                        <th scope="col"><span class="visually-hidden">Giá</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="total-line total-line-subtotal">
                                        <td class="total-line-name">Tạm tính</td>
                                        <td class="total-line-price">
                                        <span class="order-summary-emphasis" id="order-summary-emphasis"
                                              data-checkout-subtotal-price-target="146340000">

                                        </span>
                                        </td>
                                    </tr>
                                    <tr class="total-line total-line-shipping">
                                        <td class="total-line-name">Phí vận chuyển</td>
                                        <td class="total-line-price">
                                        <span class="order-summary-emphasis" id="order-summary"
                                              data-checkout-total-shipping-target="0">
                                                —
                                        </span>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="total-line-table-footer">
                                    <tr class="total-line">
                                        <td class="total-line-name payment-due-label">
                                            <span class="payment-due-label-total">Tổng cộng</span>
                                        </td>
                                        <td class="total-line-name payment-due">
                                        <span class="payment-due-price" id="payment-due-price"
                                              data-checkout-payment-due-target="146340000">
										</span>
                                            <span class="checkout_version"
                                                  data_checkout_version="4"></span>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="main-header">
                    <a href="/" class="logo">
                        <div class="logo-cus">
                            <img src="{{asset('assets/images/logo.png')}}"/>
                        </div>
                    </a>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/cart">Giỏ hàng</a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-item-current">
                            Thông tin giao hàng
                        </li>
                    </ul>
                </div>
                <div class="main-content">
                    <div id="checkout_order_information_changed_error_message" class="hidden"
                         style="margin-bottom:15px">
                        <p class="field-message field-message-error alert alert-danger">
                            <svg x="0px" y="0px" viewBox="0 0 286.054 286.054"
                                 style="enable-background:new 0 0 286.054 286.054;" xml:space="preserve"> <g>
                                    <path style="fill:#E2574C;"
                                          d="M143.027,0C64.04,0,0,64.04,0,143.027c0,78.996,64.04,143.027,143.027,143.027 c78.996,0,143.027-64.022,143.027-143.027C286.054,64.04,222.022,0,143.027,0z M143.027,259.236 c-64.183,0-116.209-52.026-116.209-116.209S78.844,26.818,143.027,26.818s116.209,52.026,116.209,116.209 S207.21,259.236,143.027,259.236z M143.036,62.726c-10.244,0-17.995,5.346-17.995,13.981v79.201c0,8.644,7.75,13.972,17.995,13.972 c9.994,0,17.995-5.551,17.995-13.972V76.707C161.03,68.277,153.03,62.726,143.036,62.726z M143.036,187.723 c-9.842,0-17.852,8.01-17.852,17.86c0,9.833,8.01,17.843,17.852,17.843s17.843-8.01,17.843-17.843 C160.878,195.732,152.878,187.723,143.036,187.723z"/>
                                </g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g>
                                <g></g> </svg>
                            <span></span>
                        </p>
                    </div>
                    <script>
                        $("html, body").animate({scrollTop: 0}, "slow");
                    </script>

                    <div class="step">
                        <div class="step-sections steps-onepage" step="1">
                            <div class="section">
                                <div class="section-header">
                                    <h2 class="section-title">Thông tin giao hàng</h2>
                                </div>
                                @php
                                    $user = auth()->user();
                                @endphp
                                <div class="section-content section-customer-information no-mb">
                                    <div class="fieldset">
                                        <div class="field   ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_full_name">Họ và
                                                    tên</label>
                                                <input placeholder="Họ và tên" autocapitalize="off" spellcheck="false"
                                                       class="field-input" size="30" type="text"
                                                       id="billing_address_full_name" name="name"
                                                       value="{{$user->email ?? old('name')}}" autocomplete="false"/>
                                                @error('name')
                                                <span style="color:red;">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="field  field-two-thirds  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="checkout_user_email">Email</label>
                                                <input autocomplete="false" placeholder="Email" disabled
                                                       autocapitalize="off"
                                                       spellcheck="false" class="field-input" size="30" type="email"
                                                       id="checkout_user_email" name="email"
                                                       value="{{old('email') ?? $user->email}}"/>
                                            </div>
                                        </div>

                                        <div class="field field-required field-third  ">
                                            <div class="field-input-wrapper">
                                                <label class="field-label" for="billing_address_phone">Số điện
                                                    thoại</label>
                                                <input autocomplete="false" placeholder="Số điện thoại"
                                                       autocapitalize="off"
                                                       spellcheck="false" class="field-input" size="30" maxlength="15"
                                                       type="tel" id="phone" name="phone"
                                                       value="{{old('phone') ?? $user->phone}}"/>
                                                @error('phone')
                                                <span style="color:red;">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section-content">
                                    <div class="fieldset">
                                        <div class="content-box mt0">
                                            <div id="form_update_location_customer_shipping"
                                                 class="order-checkout__loading radio-wrapper content-box-row content-box-row-padding content-box-row-secondary "
                                                 for="customer_pick_at_location_false">
                                                <div class="order-checkout__loading--box">
                                                    <div class="order-checkout__loading--circle"></div>
                                                </div>
                                                <div class="field   ">
                                                    <div class="field-input-wrapper">
                                                        <label class="field-label" for="billing_address_address1">Địa
                                                            chỉ</label>
                                                        <input placeholder="Địa chỉ" autocapitalize="off"
                                                               spellcheck="false" class="field-input" size="30"
                                                               type="text"
                                                               id="from" name="address"
                                                               value="{{$user->address ?? old('address')}}"/>
                                                        @if($errors->has('address') | $errors->has('lat_from') | $errors->has('long_from'))
                                                            <span style="color:red;">Địa chỉ giao hàng không hợp lệ hoặc chúng tôi chưa có phương án giao hàng tại địa chỉ trên?</span>
                                                        @endif
                                                        <input type="hidden" placeholder="Latitude" id="lat_from"
                                                               name="lat_from" value="{{old('lat_from')}}">
                                                        <input type="hidden" placeholder="Longitude" id="long_from"
                                                               name="long_from" {{old('long_from')}}>
                                                        <div class="error" id="address_map">
                                                            @if($errors->has('from') || $errors->has('ward_id'))
                                                                <p>Bạn chưa chọn địa chỉ nhận hàng</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="field field-show-floating-label  field-third ">
                                                    <div class="field-input-wrapper field-input-wrapper-select">
                                                        <label class="field-label" for="customer_shipping_province">
                                                            Tỉnh / thành </label>
                                                        <select class="field-input" id="province_id">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="field field-show-floating-label  field-third ">
                                                    <div class="field-input-wrapper field-input-wrapper-select">
                                                        <label class="field-label" for="customer_shipping_district">Quận
                                                            / huyện</label>
                                                        <select class="field-input" id="district_id">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="field field-show-floating-label   field-third  ">
                                                    <div class="field-input-wrapper field-input-wrapper-select">
                                                        <label class="field-label" for="customer_shipping_ward">Phường /
                                                            xã</label>
                                                        <select class="field-input" id="ward_id">
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="change_pick_location_or_shipping">
                                    <div id="section-shipping-rate">
                                        <div class="order-checkout__loading--box">
                                            <div class="order-checkout__loading--circle"></div>
                                        </div>
                                    </div>
                                    <div id="section-payment-method" class="section">
                                        <div class="order-checkout__loading--box">
                                            <div class="order-checkout__loading--circle"></div>
                                        </div>
                                        <div class="section-header">
                                            <h2 class="section-title">Phương thức thanh toán</h2>
                                        </div>
                                        <div class="section-content">
                                            <div class="content-box">
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="radio-label" for="payment_method_id_1003892266">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input id="payment_method_id_1003892266"
                                                                   class="input-radio" name="payment_type"
                                                                   type="radio"
                                                                   value="0" checked/>
                                                        </div>
                                                        <div class='radio-content-input'>
                                                            <img class='main-img'
                                                                 src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=6"/>
                                                            <div>
                                                                <span class="radio-label-primary">Thanh toán khi giao hàng (COD)</span>
                                                                <span class='quick-tagline hidden'></span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="radio-wrapper content-box-row">
                                                    <label class="radio-label" for="payment_method_id_1003892269">
                                                        <div class="radio-input payment-method-checkbox">
                                                            <input id="payment_method_id_1003892269"
                                                                   class="input-radio" name="payment_type"
                                                                   type="radio"
                                                                   value="1"/>
                                                        </div>
                                                        <div class='radio-content-input'>
                                                            <img class='main-img'
                                                                 src="https://hstatic.net/0/0/global/design/seller/image/payment/other.svg?v=6"/>
                                                            <div>
                                                            <span
                                                                class="radio-label-primary">Chuyển khoản qua ngân hàng</span>
                                                                <span class='quick-tagline hidden'></span>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="step-footer" id="step-footer-checkout">
                            <button type="submit" class="step-footer-continue-btn btn">
                                <span class="btn-content">Hoàn tất đơn hàng</span>
                            </button>

                            <a class="step-footer-previous-link" href="/cart">
                                Giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
                <div class="hrv-coupons-popup">
                    <div class="hrv-title-coupons-popup">
                        <p>Chọn giảm giá <span class="count-coupons"></span></p>
                        <div class="hrv-coupons-close-popup">
                            <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.1663 2.4785L15.5213 0.833496L8.99968 7.35516L2.47801 0.833496L0.833008 2.4785L7.35468 9.00016L0.833008 15.5218L2.47801 17.1668L8.99968 10.6452L15.5213 17.1668L17.1663 15.5218L10.6447 9.00016L17.1663 2.4785Z"
                                    fill="#424242"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="hrv-content-coupons-code">
                        <h3 class="coupon_heading">Mã giảm giá của shop</h3>
                        <div class="hrv-discount-code-web">
                        </div>
                        <div class="hrv-discount-code-external">

                        </div>
                    </div>
                </div>
                <div class="hrv-coupons-popup-site-overlay"></div>
                <div class="main-footer footer-powered-by">Powered by TRUONGSON</div>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset("assets/js/toastr.min.js") }}"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key={{config('constants.api_key_google_map_v1')}}&libraries=places"></script>
<script type="text/javascript">

    $('input').on('keydown', function (event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        handleUpdateData()
        let fee = sessionStorage.getItem('fee')
        let discountF = sessionStorage.getItem('discount')
        if (fee !== null && fee !== 'undefined' && typeof fee !== Object) {
            fee = JSON.parse(fee)
            $("#from").val(fee.name);
            $("#lat_from").val(fee.lat_from);
            $("#long_from").val(fee.long_from);
            $('#payment-due-price').text(fee.amount + 'đ');
        } else {
            let url_fee = '{{ route('remove_fee') }}';
            deleteS(url_fee);
        }

        if (discountF !== null && discountF !== 'undefined' && typeof discountF !== Object) {
            discountF = JSON.parse(discountF)
            $("#code2").val(discountF.code);
            $('#payment-due-price').text(discountF.amount + 'đ');
            // $("#code2").prop('disabled', true);
        } else {
            let url_discount = '{{ route('remove_coupon') }}';
            deleteS(url_discount);
        }
    })
    window.addEventListener('beforeunload', function (event) {
        sessionStorage.removeItem('discount')
        sessionStorage.removeItem('fee')
    });

    async function deleteS(url) {
        try {
            let response = await fetch(url, {
                method: 'POST', headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            });
            if (response.ok) {
                sessionStorage.removeItem('discount')
                sessionStorage.removeItem('fee')
            }
        } catch (e) {
            console.log(e)
        }
    }

    handleUpdateData()

    function handleUpdateData() {
        jQuery.getJSON('/cart-list', function (cart) {
            let count = cart?.number ?? 0
            let html = ''
            if (count !== 0) {
                jQuery.each(cart?.items, function (i, item) {
                    html += `
                            <tr class="product" data-product-id="1053900346" data-variant-id="1121246627">
                                <td class="product-image">
                                    <div class="product-thumbnail">
                                        <div class="product-thumbnail-wrapper">
                                            <img class="product-thumbnail-image" alt="${item?.name}" src="${item?.image_url}" />
                                        </div>
                                        <span class="product-thumbnail-quantity" aria-hidden="true">${item?.qty}</span>
                                    </div>
                                </td>
                                <td class="product-description">
                                    <span class="product-description-name order-summary-emphasis">${item?.name}</span>
                                </td>
                                <td class="product-quantity visually-hidden">${item?.qty}</td>
                                <td class="product-price">
                                    <span class="order-summary-emphasis">${item?.price}₫</span>
                                </td>
                            </tr>
                         `
                });

                let total_money = cart.total_money + '₫'
                $('#data-checkout table tbody').html(html);
                $('#order-summary-emphasis').html(total_money);
                $('#payment-due-price').html(total_money);
            }
        })
    }

    var autocomplete_from;
    var from = 'from';
    autocomplete_from = new google.maps.places.Autocomplete((document.getElementById(from)), {
        types: ['geocode'],
    })
    google.maps.event.addListener(autocomplete_from, 'place_changed', function () {
        try {
            var place = autocomplete_from.getPlace();
            var str = place.formatted_address;
            console.log(place)
            console.log(place.formatted_address)
            jQuery("#lat_from").val(place.geometry.location.lat());
            jQuery("#long_from").val(place.geometry.location.lng());
            $('#address_map').html('');
            if (str.includes('Việt Nam')) {
                transport(place.geometry.location.lat(), place.geometry.location.lng());
            }else {
                $('#address_map').html(`<p style="color: red;">Vị trí nhận hàng hiện tại cửa hàng không hỗ trợ giao hàng.</p>`);
            }
        } catch (e) {
            $('#address_map').html(`<p style="color: red;">Vị trí bạn nhập không tồn tại.</p>`);
        }

    })

    function transport(lat, lng) {
        $('#address_map').html('');
        let address = $('#from').val()
        $.ajax({
            url: '{{ route('google_map') }}',
            type: 'POST',
            dataType: 'json',
            data: {lat_from: lat, long_from: lng},
        }).always(function (response) {
            if (response.code === 200) {
                sessionStorage.setItem('fee', JSON.stringify({
                    name: address,
                    lat_from: lat,
                    long_from: lng,
                    amount: response.items.amount
                }))
                $('#order-summary').text(response.items.price_ship != 0 ? response.items.price_ship + 'đ' : 'miễn phí')
                $('#payment-due-price').text(response.items.amount + 'đ');
            } else {
                $("#price_ship").html('');
                $('#address_map').html(`<p style="color: red;">Vị trí bạn chọn không tồn tại hoặc đơn vị giao hàng của chúng tôi không hỗ trợ.</p>`);
            }
        });
    }

    $(document).ready(function () {
        $("#info-order").keydown(function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
            }
        });
    });

    function discount() {
        var code = $("#code2").val();
        var strurl = "{{ route('apply_coupon') }}";
        if (code !== 'undefined') {
            jQuery.ajax({
                url: strurl,
                type: 'POST',
                dataType: 'json',
                data: {code: code},
            }).always(function (response) {
                if (response.code === 200) {
                    sessionStorage.setItem('discount', JSON.stringify({code: code, amount: response.items.amount}))
                    $("#code2").prop('disabled', true);
                    $('#payment-due-price').text(response.items.amount + 'đ');
                } else if (response.code === 404) {
                    $('#msg-code').html(response.items.message);
                } else {
                    notification = `<p>${response.msg.errors.code}</p>`;
                    $('#msg-code').html(response.items.message);
                }
            });
        }
    }

    function removeCoupon() {
        var strurl = "{{ route('remove_coupon') }}";
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            success: function (data) {
                $('#result_coupon').html(data);
                document.location.reload(true);
            }
        });
    }

    var baseService = '/checkout/json';
    var provinceUrl = baseService + "/provinces";
    var districtUrl = baseService + "/districts";
    var wardUrl = baseService + "/wards";
    let addressT = '';
    let inputF = document.getElementById('from');

    $(document).ready(function () {
        _getProvince();

        $("#province_id").on('change', function () {
            var id = $(this).val();
            if (id != undefined && id != '') {
                $("#district_id").html('<option>-- {{ __('Chọn quận huyện') }}--</option>');
                _getDistrict(id);
                $('#district_id').prop('disabled', false);

                var provinceText = $("#province_id option:selected").text();
                $('#from').val(provinceText);
            }
        });
        $("#district_id").on('change', function () {
            var id = $(this).val();
            if (id != undefined && id != '') {
                $("#ward_id").html('<option>-- {{ __('Chọn xã phường') }} --</option>');
                _getWard(id);
                $('#ward_id').prop('disabled', false);
                var provinceText = $("#province_id option:selected").text();
                var districtText = $("#district_id option:selected").text();
                $('#from').val(districtText + ', ' + provinceText);
            }
        });
        $("#ward_id").on('change', function () {
            var provinceText = $("#province_id option:selected").text();
            var districtText = $("#district_id option:selected").text();
            var wardText = $("#ward_id option:selected").text();
            let addressT = wardText + ', ' + districtText + ', ' + provinceText;
            $('#from').val(addressT);

        });
    });

    function _getProvince() {
        $.get(provinceUrl, function (data) {
            if (data != null && data != undefined) {
                var html = '';
                html += '<option>-- {{ __('Chọn tỉnh thành') }} --</option>';
                $.each(data.items, function (key, item) {
                    html += '<option value=' + item.id + '>' + item.name + '</option>';
                });
                $("#province_id").html(html);
                inputF.focus()
            }
        });
        $("#district_id").html('');
        $("#ward_id").html('');
    }

    function _getDistrict(id) {
        $.get(districtUrl + "/" + id, function (data) {
            if (data != null && data != undefined) {
                var html = '';
                html += '<option>-- {{ __('Chọn quận huyện') }} --</option>';
                $.each(data.items, function (key, item) {
                    html += '<option value=' + item.id + '>' + item.prefix + ' ' + item.name + '</option>';
                });
                $("#district_id").html(html);
                inputF.focus()
            }
        });
        $("#ward_id").html('');
    }

    function _getWard(id) {
        $.get(wardUrl + "/" + id, function (data) {
            if (data != null && data != undefined) {
                var html = '';
                html += '<option>-- {{ __('Chọn xã phường') }} --</option>';
                $.each(data.items, function (key, item) {
                    html += '<option value=' + item.id + '>' + item.prefix + ' ' + item.name + '</option>';
                });
                $("#ward_id").html(html);
                inputF.focus()
            }
        });
    }
</script>
</body>
</html>


