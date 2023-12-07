<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="https://i.pinimg.com/originals/b2/57/81/b2578191becd55a7ebbc3aa9cfda9a7a.jpg" type = "image/x-icon">
        <title>Mixi...</title>
        {{-- add font-awesome --}}
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        {{-- add bootstrap --}}
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
        {{-- add slick --}}
        <link
            rel="stylesheet"
            type="text/css"
            href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
        />
        <link rel="stylesheet" href="{{ url('client') }}/assets/css/global.css" />
        <link rel="stylesheet" href="{{ asset('client/assets/css/main.css') }}" />
        <link rel="stylesheet" href="{{ asset('client/assets/css/detail.css') }}" />
         {{-- Add Select2 --}}
         <link rel="stylesheet" href="{{ asset('libs/select2/css/select2.min.css') }}">
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    </head>
    <body>

        <div class="app">
            <!-- Header -->
            @include('client.components.header')
            <!-- End header -->

             <!-- Main -->
            <div class="content main-content">
                <!-- Popular Products -->
                <div class="container popular-product category">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="product-grid row g-3" id="list-product">
                                @include('client.components.product_cart_item', ['itemsPerRow' =>'1-5','products'=>$products])
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Popular Products -->
            
            </div>

            <!-- Footer -->
            <div class="footer">
            @include('client.components.footer')
            </div>
 
        </div>
                      {{-- thêm jquery --}}
        <script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script
            type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
        ></script>

        <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"
        ></script>

        <script src="{{ url('client') }}/assets/js/main.js"></script>
        <script src="{{ url('client') }}/assets/js/toast_msg.js"></script>
        <script src="{{ url('client') }}/assets/js/loadmore.js"></script>
        {{-- <script src="{{ url('client') }}/assets/js/search.js"></script> --}}
        
        {{-- thêm select2 --}}
        <script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>

        <script src="{{ url('client') }}/assets/js/add_cart.js"></script>
        @stack('custom-script')
    </body>
</html>

{{-- php artisan key:

php artisan cache: --}}