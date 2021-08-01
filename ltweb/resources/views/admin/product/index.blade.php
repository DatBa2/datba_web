@extends('admin.layout')

@section('content')
    <div class="right__content">
            <p class="right__title">Đơn hàng mới</p>
            <div class="input-group mb-3" style="margin-left: 200px">
                <form action="{{ url('product-search') }}" method="get">
                    @csrf
                    @method('GET')
                    <div class="row">
                        <input type="text" name="search" class="form-control" placeholder="Tìm kiếm" >
                        <select name="search_select" class="custom-select">
                            <option selected value="0"> --Chọn danh mục-- </option>
                            @foreach(\App\Models\Category::get() as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn">Search</button>
                </form>
            </div>
            <div style="margin: 10px 0px">
                <a class="a-add" href="{{ url('product/create') }}">Thêm sản phẩm</a>
            </div>
            <div class="right__tableWrapper" style="padding-top: 10px;" >
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Danh mục</th>
                        <th>Title</th>
                        <th>Images sản phẩm</th>
                        <th>Giá</th>
                        <th>Số Lượng</th>
                        <th>Trạng Thái</th>
                        <th>Sửa | Chi tiết | Xóa</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td data-label="ID">{{ $product->id }}</td>
                        <td data-label="danh muc">{{ \App\Models\Category::find($product->category_id)->name }}</td>
                        <td data-label="title">{{ $product->title }}</td>
                        <td data-label="images"><img src="{{ asset('backend/upload/'. $product->avatar) }}" alt=""></td>
                        <td data-label="gia">{{ $product->price }}</td>
                        <td data-label="so luong">{{ $product->amount }}</td>
                        @if($product->status==1)
                            <td>Active</td>
                        @else
                            <td>Disable</td>
                        @endif
                        <td data-label="" class="right__iconTable">
                            <form method="post" action="{{ url('product/delete/'.$product->id) }}" onsubmit="return alert( 'Bạn chắc chắn muốn xóa ?' )">
                                @method('DELETE')
                                @csrf
                                <a href="{{ url('product/edit/'.$product->id) }}"><img src="{{ asset('backend/assets/icon-edit.svg') }}" alt=""></a>
                                <a href="{{ url('product/show/'.$product->id) }}"><img src="{{ asset('backend/assets/bookmark-star.svg') }}" alt=""></a>
                                <button type="submit"><img src="{{ asset('backend/assets/icon-trash-black.svg') }}" alt=""></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                {{ $products->links() }}
        </div>
@endsection
