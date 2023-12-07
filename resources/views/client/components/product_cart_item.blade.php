@if($products->isNotEmpty())
@foreach($products as $product)
<div class="col-lg-{{ $itemsPerRow }} col-md-{{ $itemsPerRow }} scroll-animation">
    <div class="product-cart ">
        <div class="product-img-action">
            <div class="product-cart-img">
                <a href="#">
                    <img
                        class="default-img"
                        src="{{ asset('uploads/') }}/{{ $product->product_image }}"
                        alt=""
                    />
                    {{-- <img class="hover-img" src="{{ url('client') }}/assets/img/product-mg.jpg" alt="" /> --}}
                </a>
                <div class="product-action">
                    <a href="#" class="product-action-icon">
                        <img
                            width="35"
                            height="35"
                            class="translatex" 
                            src="https://img.icons8.com/external-ddara-fill-ddara/64/external-eye-eye-ddara-fill-ddara.png"
                            alt="external-eye-eye-ddara-fill-ddara"
                        />
                    </a> 
                    {{-- <a href="#" class="product-action-icon btn_add_to_favorites btn_add_to_favorites-quick" data-url="{{ route('add-to-favorites',['id' => $product->id]) }}">
                        <i class="fa-solid fa-heart-circle-plus"></i>
                    </a> --}}
                    <a href="#" class="product-action-icon btn_add_to_cart btn_add_to_cart-quick">
                        <img
                            class="translatex"
                            width="35"
                            height="35"
                            src="https://img.icons8.com/doodle/48/shopping-cart--v1.png"
                            alt="shopping-cart--v1"
                        />
                    </a>
                </div>
            </div>
            
            <!-- button hiển thị giá trị gảim giá của 1 cart là bao nhiêu -->
            <div class="product-badges"></div>
        </div>
        <div class="product-content">
            <h2 class="product-name">
                <a href="#">{{ $product->product_name }}</a>

            </h2>
            
            <div class="product-cart-bottom">
                {{-- <p>1000$</p>
                <p class="old-price">2000đ</p> --}}
                <div class="product-price">
                    @if(Auth::check())
                    {{ $product->product_price }}
                    @else
                    <p style="color:red">Liên hệ</p>
                    @endif
                </div>
                <div class="add-cart">
                    <a href="#">
                        <i class="me-2 fa-solid fa-cart-shopping"></i><span>Add</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@else
<div class="col-md-12">
    <h3 style="text-align:center">Không có sản phẩm...</h3>
</div>
@endif

{{-- @push('custom-script')
<!-- Khai báo HTML -->
<script>
    // Khai báo headers cho AJAX request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        // Sử dụng event delegation để xử lý sự kiện click cho nút "btn-load_product"
        $(document).on("click", "#btn-load_product", function () {
            const url = $(this).data('url');
            console.log('load')
            // loadMore(url);
        });
@endpush --}}

