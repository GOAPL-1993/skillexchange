@extends('layouts.base')

@section('title')
mytitle
@endsection
@section('content')
@csrf
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<meta name='csrf-token' content='{{csrf_token()}}'>
<form>
  @forelse ($searchposts as $searchpost )
  <div class='content' style='margin-left:20% ; height:85% '>
    <div class="card" style="width: 18rem;float:left" id="postCard">
      <div class="card-body">
        <h5 class="card-title">{{$searchpost -> post_username}}</h5>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$searchpost -> sort}}</li>
          <li class="list-group-item">{{$searchpost -> area}}</li>
          <li class="list-group-item">擅長科目<br> {{$searchpost -> wanna_teach}}</li>
          <li class="list-group-item">想學科目<br> {{$searchpost -> wanna_learn}}</li>
          <hr>
        </ul>
        <p class="card-text">{{$searchpost -> body}}</p>
        <button type="button" class="btn btn-outline-danger btn-sm">按讚!</button>
        <button type="button" class="btn btn-outline-info btn-sm">收藏</button>
        <button type="button" class="btn btn-dark btn-sm">發訊息</button>
      </div>
    </div>
  </div>
  @empty
  <h2>no post</h2>
  @endforelse
</form>

<script>
  $('#postForm').submit(function(e) {
    e.preventDfault();

    let post_username = $('#post_username').val();
    let sort = $('#sort').val();
    let area = $('#area').val();
    let wanna_teach = $('#wanna_teach').val();
    let wanna_learn = $('#wanna_learn').val();
    let body = $('#body').val();
    let _token = $("input[name=_token]").val();

    $.ajax({
      url: '/addPost',
      type: "POST",
      data: {
        post_username: post_username,
        sort: sort,
        area: area,
        wanna_teach: wanna_teach,
        wanna_learn: wanna_learn,
        body: body,
        _token: _token
      },
      success: function(response) {
        if (response) {
          $("#postCard").prepend('<ul><li>' + response.post_username + '</li><li>' + response.sort + '</li><li>' + response.wanna_teach + '</li><li>' + response.wanna_learn + '</li></ul><p>' + response.body + '</p>');
          $("#postForm")[0].reset();
          $("#postModal").modal('hide');
        }
      }

    })

  })
</script>
@endsection