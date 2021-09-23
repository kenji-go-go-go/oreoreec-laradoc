@extends('layouts.app')

@section('title')
カート
@endsection

@section('content')
<div class="container">
  @if(count($line_items) > 0)
  <div class="head">
    このまま買い物を続けますか？
  </div>
  <div class="text-center">
    <button type="button" class="btn btn-ash" onclick="location.href='{{ url('/') }}'">
      製品一覧に戻る
    </button>
    <button type="button" class="btn btn-danger"
      onclick="location.href='https://ichiichiban.anti-pattern.co.jp/delivery-address'">
      注文する
    </button>
    <button type="button" class="btn btn-danger"
      onclick="location.href='{{url('/delivery-address')}}'">
      注文する
    </button>
  </div>
  <div class="cart-wrapper">
    @foreach ($line_items as $item)
    <div class="container border-top border-bottom my-3">
      <div class="row justify-content-sm-center my-1">
        <div class="col-4">
          <img src="{{ asset('assets/images/' . $item->image_path) }}" alt="{{ $item->name }}"
            class="product-cart-img" style="height: 150px; width: 100%; display: block;" />
        </div>
          <div class="col-3">
            {{ $item->name }}
          </div>
          <div class="col-2 text-right">
            {{ $item->pivot->quantity }}個
          </div>
          <div class="col-3 text-right">
            ￥{{ number_format($item->unit_price * $item->pivot->quantity) }}
            <form method="post" action="{{ route('line_item.delete') }}">
              @csrf
              <div class="card__btn-trash w-100 text-left">
                <input type="hidden" name="id" value="{{ $item->pivot->id }}" />
                <button type="submit" class="fas fa-trash-alt btn"><i
                    class="material-icons md-light cartColor">delete</i>削除</button>
              </div>
            </form>
          </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="cart__sub-total text-right">
    小計：￥{{ number_format($total_price) }} 円
  </div>
  <div class="text-center">
    <button type="button" class="btn btn-danger"
      onclick="location.href='https://ichiichiban.anti-pattern.co.jp/delivery-address'">
      注文する
    </button>
  </div>
  @else
  <!-- <div class="cart__empty">
    カートに商品が入っていません。
  </div> -->
  <div class="head">
    カートが空です
  </div>
  <div class="text-center">
    <button type="button" class="btn btn-ash" onclick="location.href='{{ url('/') }}'">
      製品一覧に戻る
    </button>
  </div>
  @endif

</div>
@endsection
