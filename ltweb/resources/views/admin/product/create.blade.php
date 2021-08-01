@extends('admin.layout')

@section('content')
    <div class="right">
        <div class="right__content">
            <div class="right__title">Thêm sản phẩm</div>
            <div class="right__formWrapper">
                <form action="{{ url('product/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="right__inputWrapper">
                        <label for="category">Danh mục</label>
                        <select name="category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="title">Tiêu đề</label>
                        <input name="title" type="text" placeholder="Tiêu đề">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="avtar">Avatar</label>
                        <input name="avatar" type="file" style="padding-top: 8px">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="price">Giá sản phẩm</label>
                        <input name="price" type="number" placeholder="Giá sản phẩm">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="amount">Số lượng</label>
                        <input name="amount" type="number" placeholder="Số lượng">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="summary">Mô tả</label>
                        <input name="summary" type="text" placeholder="Mô tả">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="content">Mô tả chi tiết</label>
                        <textarea name="content" id="" cols="30" rows="10" placeholder="Mô tả chi tiết"></textarea>
                    </div>
                    <div class="right__inputWrapper">
                        <label for="status">Status</label>
                        <select name="status">
                            <option value="1">Active</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                    <input type="submit" value="Submit" class="btn">
                </form>
            </div>
        </div>
    </div>
@endsection
