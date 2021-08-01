@extends('admin.layout')

@section('content')
    <div class="right">
        <div class="right__content">
            <p class="right__title">Thêm danh mục</p>
            <div class="right__formWrapper">
                <form action="{{ url('category/update/'.$edit->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="right__inputWrapper">
                        <label for="name">Name</label>
                        <input name="name" value="{{ $edit->name }}" type="text" placeholder="Name">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="type">Type</label>
                        <input name="type" value="{{ $edit->type }}" type="number" placeholder="Type">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="avatar">Avatar</label>
                        <input name="avatar" type="file" style="padding-top: 8px">
                        <img height="200px" width="50%" src="{{ asset('backend/upload/'.$edit->avatar) }}" alt="">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="description">Description</label>
                        <input name="description" value="{{ $edit->description }}" type="text" placeholder="Description">
                    </div>
                    <div class="right__inputWrapper">
                        <label for="status">Status</label>
                        <select name="status">
                            <option value="0">Disabled</option>
                            <option value="1">Active</option>
                        </select>
                    </div>
                    <input type="submit" value="Submit" class="btn">
                </form>
            </div>
        </div>
    </div>
@endsection
