<style>
  .sidebar-left {
    position: relative;
    left: 30px;
    top: 75px;
    z-index: 10;
  }
</style>
<div class="container">
  <div class="list-group sidebar-left" style="text-align:center;width:25%;float:left">


    <div style="width:60%">
      <a href="{{ url('/user/profile') }}" class="list-group-item list-group-item-action list-group-item-light"><img src="/images/inf1.png" style="position:absolute;left:10px">個人資料</a>
      <a href="{{ url('/mypost') }}" class="list-group-item list-group-item-action list-group-item-light"><img src="/images/pos1.png" style="position:absolute;left:10px">我的貼文</a>
      <a href="#" class="list-group-item list-group-item-action list-group-item-light"><img src="/images/lik1.png" style="position:absolute;left:10px">讚過的文章</a>
    </div>
  </div>
</div>