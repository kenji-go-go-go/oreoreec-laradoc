@extends('layouts.app')

@section('title')
商品一覧
@endsection

@section('content')

<script language="javascript" type="text/javascript">
  function ToCart(productid, count) {
    $(".quantity").each(function (i, elem) {
      if (count == i) {
        window.location.href = '/cart/' + productid + '/' + $(elem).val();
      }
      console.log('i=' + i);
      console.log('elem=' + elem);
      console.log('count=' + count);
    });
  }

  function ToCartFromDetail(productid, count) {
    $(".quantityfromdetail").each(function (i, elem) {
      if (count == i) {
        window.location.href = '/cart/' + productid + '/' + $(elem).val();
      }
    });
  }
</script>
<script>
  /*
  いつまでに注文するといつまでに届くのかを表示する
  12:00:00:000 ~ 23:59:59:999 の注文の場合は、明日の午前中
  03:00:00:000 ~ 11:59:59:999 の注文の場合は、今日の午後
  00:00:00:000 ~ 02:59:59:999 の注文の場合は、今日の午前中
  */
  function showCountdown() {
    const now = new Date();
    const nowHour = now.getHours();
    var targetDate, targetMessage;

    if (12 <= nowHour && nowHour < 24) {
      targetDate = (new Date()).setHours(23, 59, 59, 999);
      targetMessage = "明日の午前中";
    } else if (3 <= nowHour && nowHour < 12) {
      targetDate = (new Date()).setHours(11, 59, 59, 999);
      targetMessage = "今日の午後";
    } else {
      targetDate = (new Date()).setHours(2, 59, 59, 999);
      targetMessage = "今日の午前中";
    }

    remainTime = targetDate - now.getTime();

    const remainHour = Math.floor(remainTime / (1000 * 60 * 60));
    const remainMinute = Math.floor((remainTime / (1000 * 60)) - (remainHour * 60));
    const remainSeconds = Math.floor(remainTime / 1000) - (remainHour * 60 * 60) - (remainMinute * 60);
    document.getElementById("hour").innerHTML = remainHour < 10 ? '0' + remainHour : remainHour;
    document.getElementById("minute").innerHTML = remainMinute < 10 ? '0' + remainMinute : remainMinute;
    document.getElementById("seconds").innerHTML = remainSeconds < 10 ? '0' + remainSeconds : remainSeconds;
    document.getElementById("targetMessage").innerHTML = targetMessage;
  };

  // 1秒ごとに実行
  setInterval('showCountdown()', 1000);
</script>
<div class="container">
  <div class="product-index">
    <div class="text-center py-3">
      <div>あと<span class="hour" id="hour"></span>時間<span class="minute" id="minute"></span>分<span class="seconds"
          id="seconds"></span>秒以内に
      </div>
      <div>ご注文いただくと<span id="targetMessage"></span>に届きます！</div>
    </div>

    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">『新鮮な野菜を市場から素早く配達』</h1>
        <p class="lead text-muted">
          食事をするとき、その食材を誰がどこでどのように作ったか、意識することは少ないと思います。しかし、そんなストーリーが見えれば、食事をするときにまた違った思いを感じるかもしれません。</p>
      </div>
    </section>

    <!-- <div class="container"> -->
    <div class="py-5 bg-light">
      <div class="container">
        <div class="row">
          @foreach ($products as $product)
          <!-- <a href="{{ route('product.show', $product->id) }}" class="col-lg-4 col-md-6"> -->
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <!-- <img src="{{ asset($product->image) }}" class="card-img" /> -->
              <img class="card-img-top btn fly" src="{{asset('assets/images/' . $product->image_path)}}" ;
                alt="{{$product->name}}" style="height: 225px; width: 100%; display: block;" data-toggle="modal"
                data-target="#productModal{{$loop->iteration}}" data-whatever="productTomato">
              <!-- <div class="card-body">
                <p class="card-title">{{ $product->name }}</p>
                <p class="card-text">¥{{ number_format($product->price) }}</p>
              </div> -->
              <div class="card-body">
                <p class="card-text">{{$product->name}}</p>
                <div class="text-right">
                  <small class="text-muted">¥{{$product->unit_price}}</small>
                </div>
                <!-- <div class="d-flex justify-content-between align-items-center"> -->
                <!-- <div class="input-group col-sm-5">
                    <input type="text" class="form-control quantity"
                      aria-label="Dollar amount (with dot and two decimal places)">
                    <div class="input-group-append">
                      <span class="input-group-text">個</span>
                    </div>
                  </div>
                  <button type="button" class="btn col-sm-5 btn-sm btn-outline-danger"
                    onclick="ToCart({{$product->id}}, {{$loop->index}} );">カートに追加
                  </button> -->

                <form method="POST" action="{{ route('line_item.create') }}">
                  @csrf
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="input-group col-sm-5">
                      <input type="hidden" name="id" value="{{ $product->id }}" />
                      <!-- <div class="product__quantity"> -->
                      <input type="number" class="form-control quantity" name="quantity" min="1" value="1" require />
                      <div class="input-group-append">
                        <span class="input-group-text">個</span>
                      </div>
                      <!-- </div> -->
                    </div>
                    <button type="submit" class="btn col-sm-5 btn-sm btn-outline-danger">カートに追加</button>
                  </div>
                </form>
                <!-- </div> -->
              </div>
            </div>
          </div>

          <!-- Modal -->
          <div class="modal fade" id="productModal{{$loop->iteration}}" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel">
            <!-- //モーダルウィンドウの縦表示位置を調整・画像を大きく見せる -->
            <div class="modal-dialog modal-lg modal-middle">
              <div class="modal-content">
                <div class="modal-body">
                  <!-- <img src="{{asset(" assets/images/" . $product->image_path)}}"
                  alt="{{$product->name}}"
                  style=" width: 100%;"
                  class="aligncenter size-full wp-image-425" /> -->
                  <img class="card-img-top btn fly" src="{{asset('assets/images/' . $product->image_path)}}" ;
                alt="{{$product->name}}" style="height: 225px; width: 100%; display: block;" data-toggle="modal"
                data-target="#productModal{{$loop->iteration}}" data-whatever="productTomato">
                </div>
                
                <form method="POST" action="{{ route('line_item.create') }}">
                  @csrf
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-md-4">{{$product->description}}</div>
                      <div class="col-md-4 ml-auto text-right">1箱{{$product->box_number}}個入り</div>
                    </div>
                    <div class="row mb-2">
                      <div class="input-group">
                        <!-- <input type="text" class="form-control col-md-4 quantityfromdetail"
                          aria-label="Dollar amount (with dot and two decimal places)">
                        <div class="input-group-append">
                          <span class="input-group-text">個</span>
                        </div> -->
                        <input type="hidden" name="id" value="{{ $product->id }}" />
                        <!-- <div class="product__quantity"> -->
                        <input type="number" class="form-control col-md-4 quantityfromdetail" name="quantity" min="1" value="1" require />
                        <div class="input-group-append">
                          <span class="input-group-text">個</span>
                        </div>
                        <!-- </div> -->
                        
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-ash" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">カートに追加</button>
                    <!-- <button type="button" class="btn btn-danger"
                      onclick="ToCartFromDetail({{$product->id}}, {{$loop->index}} );">カートに追加
                    </button> -->
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- </a> -->
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
