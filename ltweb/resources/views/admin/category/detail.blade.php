@extends('admin.layout')

@section('content')
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $category->id }}</td>
        </tr>
        <tr>
            <th>Category name</th>
            <td>{{ $category->name }}</td>
        </tr>
        <tr>
            <th>Type</th>
            <td>{{ $category->type }}</td>
        </tr>
        <tr>
            <th>Avatar</th>
            <td>
                @if(isset($category->avatar))
                <img height="80" src="{{ url('backend/upload/'. $category->avatar) }}"/>
                @endif
            </td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{ $category->description }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $category->status }}</td>
        </tr>
        <tr>
            <th>Created at</th>
            <td>{{ $category->created_at }}</td>
        </tr>
        <tr>
            <th>Updated at</th>
            @if($category->created_at!= $category->updated_at)
            <td>{{ $category->updated_at }}</td>
            @else <td>Chưa update</td>
            @endif
        </tr>
    </table>
    <a class="btn" href="{{ url('category') }}">Back</a>
@endsection
