<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        h1 { color: #333; margin: 0; }
        .button-group { display: flex; justify-content: space-between; gap: 15px; margin-bottom: 20px; }
        .product-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
        .product-card { border: 1px solid #ddd; padding: 15px; border-radius: 8px; }
        .product-card h3 { margin-top: 0; color: #2c3e50; }
        .btn { padding: 10px 20px; max-width: 200px; background: #3490dc; color: white; text-decoration: none; border-radius: 4px; display: inline-block; border: none; cursor: pointer; font-size: 1em; }
        .btn:hover { background: #2779bd; }
        .btn-add { background: #38c172; flex: 1; text-align: center; }
        .btn-add:hover { background: #2d995b; }
        .btn-home { background: #6c757d; flex: 1; text-align: center; }
        .btn-home:hover { background: #5a6268; }
    </style>
</head>
<body>
    <div class="header">
        <h1>{{ $title }}</h1>
    </div>
    
    <div class="button-group">
        <a href="{{ route('product.add') }}" class="btn btn-add">+ Thêm sản phẩm</a>
        <a href="{{ route('home') }}" class="btn btn-home">Trở về trang home</a>
    </div>
    
    <div class="product-list" id="productList">
        @foreach($products as $product)
            <div class="product-card">

                <img src="{{ $product['image'] }}"
                    alt="{{ $product['name'] }}"
                    style="width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;">

                <h3>{{ $product['name'] }}</h3>

                <p>{{ $product['content'] }}</p>

                <p>
                    <strong>Giá:</strong> {{ $product['price'] }}
                </p>

                <a href="{{ route('product.detail', $product['id']) }}" class="btn">
                    Xem chi tiết
                </a>

            </div>
        @endforeach
    </div>
</body>
</html>