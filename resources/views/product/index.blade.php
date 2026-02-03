@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách sản phẩm</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="card-title">Products</h3>
          <a href="{{ route('product.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
        </div>
        <div class="card-body table-responsive p-0">
          <table class="table table-hover table-striped table-bordered text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Kho</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              @forelse($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                  <td>{{ $product->stock }}</td>
                  <td>
                    <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-info">Xem</a>
                    <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline-block">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr><td colspan="5">Không có sản phẩm</td></tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <div class="card-footer clearfix">
          {{ $products->links() }}
        </div>
      </div>
      </div>
      </div>
  </section>
@endsection
