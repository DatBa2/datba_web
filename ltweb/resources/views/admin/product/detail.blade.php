@extends('admin.layout')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $product->id }}</td>
        </tr>
        <tr>
            <th>Category name</th>
            <td>{{ \App\Models\Category::find($product->category_id)->name  }}</td>
        </tr>
        <tr>
            <th>Title</th>
            <td>{{ $product->title }}</td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td>
                @if(isset($product->avatar))
                    <img height="80" src="{{ url('backend/upload/'. $product->avatar) }}"/>
                @endif
            </td>
        </tr>
        <tr>
            <th>Giá</th>
            <td>{{ $product->price }}</td>
        </tr>
        <tr>
            <th>Số lượng</th>
            <td>{{ $product->amount }}</td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td>{{ $product->summary }}</td>
        </tr>
        <tr>
            <th>Mô tả chi tiết</th>
            <td>{{ $product->content }}</td>
        </tr>
        <tr>
            <th>Status</th>
            @if($product->status==1)
                <td>Active</td>
            @else
                <td>Disable</td>
            @endif
        </tr>
        <tr>
            <th>Created at</th>
            <td>{{ $product->created_at }}</td>
        </tr>
        <tr>
            <th>Updated at</th>
            @if($product->created_at!= $product->updated_at)
                <td>{{ $product->updated_at }}</td>
            @else <td>Chưa update</td>
            @endif
        </tr>
    </table>
    <a class="btn" href="{{ url('product') }}">Back</a>
@endsection
