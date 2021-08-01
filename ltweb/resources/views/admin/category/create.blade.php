@extends('admin.layout')

@section('content')
    <div class="right">
        <div class="right__content">
            <p class="right__title">Thêm danh mục</p>
            <div class="right__formWrapper">
                <form action="{{ url('category/store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="right__inputWrapper">
                        <label for="name">Name</label>
                        <input name="name" type="text" placeholder="Name">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="type">Type</label>
                        <input name="type" type="number" placeholder="Type">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="avatar">Avatar</label>
                        <input name="avatar" type="file" style="padding-top: 8px">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="description">Description</label>
                        <input name="description" type="text" placeholder="Description">
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
