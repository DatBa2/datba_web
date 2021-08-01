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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
