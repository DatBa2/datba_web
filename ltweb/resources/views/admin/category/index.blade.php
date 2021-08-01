@extends('admin.layout')

@section('content')
    <div class="right">
        <div class="right__content">
            <p class="right__title">Xem danh mục</p>
            <div style="margin: 10px 0px">
                <a class="a-add" href="{{ url('category/create') }}">Thêm danh mục</a>
            </div>
            <div class="right__table">
                @if (count($errors) > 0)
                    <div class="error-message">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="right__tableWrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Avatar</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Sửa | Chi tiết | Xóa</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td data-label="ID">{{ $category->id }}</td>
                            <td data-label="Name">{{ $category->name }}</td>
                            <td data-label="Type">{{ $category->type }}</td>
                            <td data-label="Avatar"><img src="{{ asset('backend/upload/'.$category->avatar) }}" alt=""></td>
                            <td data-label="Description">{{ $category->description }}</td>
                            <td data-label="Starus">{{ $category->status }}</td>
                            <td data-label="Created_at">{{ $category->created_at }}</td>
                            <td data-label="Updated_at">{{ $category->updated_at }}</td>
                            <td data-label="" class="right__iconTable">
                                <form method="post" action="{{ url('category/delete/'.$category->id) }}" onsubmit="return alert( 'Bạn chắc chắn muốn xóa ?' )">
                                    @method('DELETE')
                                    @csrf
                                    <a href="{{ url('category/edit/'.$category->id) }}"><img src="{{ asset('backend/assets/icon-edit.svg') }}" alt=""></a>
                                    <a href="{{ url('category/show/'.$category->id) }}"><img src="{{ asset('backend/assets/bookmark-star.svg') }}" alt=""></a>
                                    <button type="submit"><img src="{{ asset('backend/assets/icon-trash-black.svg') }}" alt=""></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                    {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
