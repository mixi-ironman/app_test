@extends('admin.layouts.layout')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products</h4>
            </div>
            <div class="card-body">
                <a class="btn btn-outline-primary" href="{{ route('products.create') }}"><i class="fa-brands fa-openid"></i> Add product</a>

                <table class="table" id="myTable_">
                    <thead>
                    <tr>
                        <th scope="col"style="text-align: center;vertical-align:middle;">#</th>
                        <th scope="col"style="max-width:200px;text-align: center;vertical-align:middle;">Tên sản phẩm</th>
                        <th scope="col"style="max-width:200px;text-align: center;vertical-align:middle;">Hình ảnh</th>
                        <th scope="col"style="text-align: center;vertical-align:middle;">Giá bán</th>
                        <th scope="col"style="text-align: center;vertical-align:middle;">Mô tả</th>
                        <th scope="col"style="text-align: center;vertical-align:middle;">Created At</th>
                        <td style="text-align: center;vertical-align:middle;">Action</td>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $key => $product)
                        <tr>
                            <td scope="row" style="text-align: center;vertical-align:middle;max-width:200px;white-space: wrap;overflow: hidden; text-overflow: ellipsis;">{{ $product->id }}</td>
                            <td style="max-width:200px; text-align: center;vertical-align:middle;max-width:150;white-space: wrap;overflow: hidden; text-overflow: ellipsis;">{{ $product->product_name }}</td>
                            <td style="text-align: center;vertical-align:middle;max-width:200px;white-space: wrap;overflow: hidden; text-overflow: ellipsis;">
                                {{-- <img style="width:180px;height:120px;line-height:120px;object-fit: cover;border-radius:5px;border:1px solid rgb(247, 181, 181);box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);object-position: center;" src="{{ asset('uploads/') }}/{{ $product->image }}" > --}}
                                <img style="width:130px;object-fit: contain;height:130px;line-height:130px;border-radius:5px;border:1px solid rgb(247, 181, 181);box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);" src="{{ asset('uploads/') }}/{{ $product->product_image }}" >
                                
                            </td>
                            <td style="text-align: center;vertical-align:middle;max-width:200px;white-space: wrap;overflow: hidden; text-overflow: ellipsis;">{{ number_format($product->product_price) }}đ</td>
                            <td style="text-align: center;vertical-align:middle;max-width:350;white-space: wrap;overflow: hidden; text-overflow: ellipsis;">{!! $product->product_description !!}</td>
                            <td style="text-align: center;vertical-align:middle;max-width:200px;white-space: wrap;overflow: hidden; text-overflow: ellipsis;">{{ $product->created_at->format('d/m/Y h:i:s') }}</td>
                            <td style="text-align:center;vertical-align:middle">
                                <form action="{{ route('products.destroy',['id'=>$product->id]) }}" method="post" style="display:block;padding:10px">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('products.edit',['id'=>$product->id]) }}" style="margin:0 5px 0 0;"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-info" style="margin:0;"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
            </div>
            <div class="card-footer" style="display:none">
                {{-- {{ $products->links() }} --}}
            </div>
        </div>
    </div>
@endsection

@push('custom-script')
    <script>
        $(document).ready(function () {
          
        });
    </script>
@endpush

