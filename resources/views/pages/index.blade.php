@extends('layouts.base')

@section('title')
學習交換平台
@endsection
@section('content')
@csrf
<div class="row">
  @forelse ($posts as $post)
  @csrf
  <div class="col-sm-6">
    <div class='content' style='height:85% ; padding-top:77px ; position:sticky ; font-weight:bold'>
      <div class="card" style="width: 20rem ; float:right ; margin-right:25%">
        <div class="card-body">
          <form method="GET" action="/message/">
            <div style="display:none">
              <label for="wannaTalk"></label>
              <textarea id="wannaTalk" rows="1" name='wannaTalk' value='wannaTalk'>{{$post -> post_user_id}}</textarea>
            </div>
            <h5 class="card-title">{{$post -> post_username}}</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{$post -> sort}}</li>
              <li class="list-group-item">{{$post -> area}}</li>
              <li class="list-group-item">擅長科目:<br> {{$post -> wanna_teach}}</li>
              <li class="list-group-item">想學科目:<br> {{$post -> wanna_learn}}</li>
              <hr>
            </ul>
            <p class="card-text">{{$post -> body}}</p>
            <div style="float: right">
              @auth
              @if( Auth::user()->name !== $post -> post_username)
              <input type="button" class="btn btn-warning btn-sm" id="evaluateScoreButton" onclick="self.location.href='/postdetail/{{$post -> id}}'" value="詳細內容">
              <button type="button" class="btn btn-outline-danger btn-sm">按讚!</button>
              <button type="submit" class="btn btn-dark btn-sm" value="submit">發訊息</button>
              @endif
              @endauth
              @guest
              <input type="button" class="btn btn-warning btn-sm" id="evaluateScoreButton" onclick="self.location.href='/postdetail/{{$post -> id}}'" value="詳細內容">
              <button type="button" class="btn btn-outline-danger btn-sm">按讚!</button>
              <button type="submit" class="btn btn-dark btn-sm" value="submit">發訊息</button>
              @endguest
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  @empty
  <h2>no post</h2>
  @endforelse
</div>
<br>
@endsection