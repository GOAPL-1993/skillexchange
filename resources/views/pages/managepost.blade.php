<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>學習交換平台-管理文章</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>

<body>
  @include('includes.menu')
  @include('includes.usercatalog')
  <div class="row">
    @forelse ($manageposts as $managepost)
    <div class="col-sm-6">

      @csrf

      <div class='content' style='height:85% ; padding-top:70px ; font-weight:bold'>
        <div class="card" style="width: 20rem ; float:right ; margin-right:25%">
          <div class="card-body">
            <h5 class="card-title">{{$managepost -> post_username}}</h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">{{$managepost -> sort}}</li>
              <li class="list-group-item">{{$managepost -> area}}</li>
              <li class="list-group-item">擅長科目<br> {{$managepost -> wanna_teach}}</li>
              <li class="list-group-item">想學科目<br> {{$managepost -> wanna_learn}}</li>
              <hr>
            </ul>
            <p class="card-text">{{$managepost -> body}}</p>
            <!-- <button type="button" class="btn btn-outline-danger btn-sm">按讚!</button> -->
            <div style="float: right">
              <button type="button" class="btn btn-outline-info btn-sm" onclick="self.location.href='/updatepost/{{ $managepost->id }}/'">修改</button>
              <input type="button" class="btn btn-warning btn-sm" id="evaluateScoreButton" onclick="self.location.href='/postdetail/{{$managepost -> id}}'" value="詳細內容">
              <button type="button" class="btn btn-dark btn-sm" onclick="self.location.href='/delete/{{ $managepost->id }}/'">刪除</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @empty
    <h2>no post</h2>
    @endforelse
  </div>
  <br>
</body>

</html>