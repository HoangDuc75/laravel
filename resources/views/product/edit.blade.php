@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Sửa sản phẩm</h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="name">Tên</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="form-group">
              <label for="price">Giá</label>
              <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>
            <div class="form-group">
              <label for="stock">Kho</label>
              <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            </div>
            <button class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Hủy</a>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
