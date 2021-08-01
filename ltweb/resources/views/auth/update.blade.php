@extends('admin.layout')

@section('content')
    <div class="right">
        <div class="right__content">
            <div class="right__formWrapper">
                <form action="{{ url('admin/'.Auth::id()) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="right__inputWrapper">
                        <label for="avtar">Avatar</label>
                        <input name="avatar" type="file" style="padding-top: 8px">
                    </div>
                    <input type="submit" value="Submit" class="btn">
                </form>
            </div>
        </div>
    </div>
@endsection
