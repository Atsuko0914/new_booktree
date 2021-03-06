@extends('layouts.app')
@section('title','マイページ')
@section('content')
<div class="container">
  @if(Auth::id() == 2)
  <p class="text-danger">ゲストユーザーは、変更することができません</p>
  @endif
  <table class="table table-striped">
  <thead>
  <tr>
    <th></th>
    <th>名前</th>
    <th>メールアドレス</th>
    <th></th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div>
        @if(!empty($authUser->user_image_path))
        <img src="/storage/image/{{ $authUser->user_image_path }}" class="image">
        @else
        画像なし
        @endif
        </div>
      </td>
      <td>{{ $authUser->name }}</td>
      <td>{{ $authUser->email }}</td>
      <td>
      @if(Auth::id() != 2)
      <a href="{{ route('user.userEdit',['authUser' => $authUser->id]) }}" class="btn_edit btn-sm">編集</a>
      @endif
      </td>
    </tr>
  </tbody>
  </table>
</div>  
@endsection