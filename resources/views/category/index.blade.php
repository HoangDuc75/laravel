@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh sách danh mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Categories</li>
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
              <h3 class="card-title">Categories</h3>
              <a href="{{ route('category.create') }}" class="btn btn-primary">Thêm danh mục</a>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover table-striped table-bordered text-nowrap">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Danh mục cha</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($categories as $category)
                    <tr>
                      <td>{{ $category->id }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->parent?->name ?? '---' }}</td>
                      <td>
                        @if($category->is_active)
                          <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-secondary">Inactive</span>
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                      </td>
                    </tr>
                  @empty
                    <tr><td colspan="5">Không có danh mục</td></tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="card-footer clearfix">
              {{ $categories->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
