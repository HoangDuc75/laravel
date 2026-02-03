@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Chi tiết sản phẩm</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <h3>{{ $product->name }}</h3>
          <p><strong>Giá:</strong> {{ number_format($product->price,0,',','.') }}</p>
          <p><strong>Kho:</strong> {{ $product->stock }}</p>
        </div>
        <div class="card-footer">
          <a href="{{ route('product.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
      </div>
    </div>
  </section>
@endsection
