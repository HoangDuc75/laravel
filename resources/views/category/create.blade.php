@extends('layouts.admin')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Thêm danh mục</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
            <li class="breadcrumb-item active">Create</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          @if ($errors->any())
            <div class="alert alert-danger">
              {{ $errors->first() }}
            </div>
          @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tạo mới danh mục</h3>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Tên danh mục</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                  <label for="description">Mô tả</label>
                  <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                  <label for="image">Hình ảnh (URL)</label>
                  <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
                </div>

                <div class="form-group">
                  <label for="parent_id">Danh mục cha</label>
                  <select class="form-control" id="parent_id" name="parent_id">
                    <option value="">-- Không chọn --</option>
                    @foreach($parentOptions as $option)
                      <option value="{{ $option['id'] }}" {{ old('parent_id') == $option['id'] ? 'selected' : '' }}>
                        {{ $option['label'] }}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                    <label class="custom-control-label" for="is_active">Kích hoạt</label>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Lưu</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Hủy</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
