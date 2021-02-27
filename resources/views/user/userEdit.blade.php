@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="container">
    <div class="top_wrapper">
        @if(!empty($authUser->user_image_path))
            <img src="/storage/image/{{ $authUser->user_image_path }}" class="edit_image">
        @else
        画像なし
        @endif
    </div>
    @include('error_card_list')
    <form method="post" action="{{ route('user.userUpdate') }}" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        <input type="hidden" name="user_id" value="{{ $authUser->id }}">

        <label class="label_title" for="name">name</label>
        <input type="text" class="user_form" name="name" id="name" required value="{{ $authUser->name }}">
        <label class="label_title" for="picture">picture</label>
        <input type="file" name="user_image_path" id="picture">
        
        <div class="button_set">
            <input type="submit" name="send" value="ユーザー変更" class="btn_done">
        </div>
    </form>
</div>
@endsection