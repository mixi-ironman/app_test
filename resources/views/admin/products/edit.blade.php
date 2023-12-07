@extends('admin.layouts.layout')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update',['id' => $product->id]) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label  class="form-label">Tên sản phẩm</label>
                        {{-- {{ old('name_product') }} --}}
                        <input type="text" class="form-control" value="{{ $product->product_name }}" name="product_name" aria-describedby="emailHelp">
                        {{-- @error('name_product')
                            <p class="error">{{ $message }}</p>
                        @enderror --}}
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Mô tả chi tiết</label>
                        <textarea name="product_description" id="product_descrition_" rows="10" cols="80">{{ $product->product_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Giá</label>
                        <input type="text" class="form-control" value="{{ $product->product_price }}" name="product_price" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="image"  class="form-label">Ảnh</label>
                        <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
            
        </div>
    </div>
@endsection

@push('custom-script')

    <script>
        CKEDITOR.replace( 'product_descrition_' );
    </script>
@endpush
