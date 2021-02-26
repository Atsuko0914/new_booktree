@extends('layouts.app')
@section('title','ユーザー情報変更')

@section('content')
<div class="container">
    <!-- @if (session('success'))
    <div class="alert alert-danger">{{ session('success') }}</div>
    @endif -->

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

        <div class="label_title">name</div>
        <div>
            <input type="text" class="user_form" name="name" required value="{{ $authUser->name }}">
        </div>

        <div class="label_title">picture</div>

        <div>
            <input type="file" name="user_image_path">
        </div>

        <div class="button_set">
            <input type="submit" name="send" value="ユーザー変更" class="btn_done">
        </div>
    </form>
</div>
@endsection