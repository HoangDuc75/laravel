<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm #{{ $id }}</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .product-info h2 { color: #2c3e50; margin-top: 0; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; margin-right: 10px; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-secondary:hover { background: #5a6268; }
        .actions { margin-top: 30px; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="product-info">
            <h2>Sản phẩm mã {{ $id }}</h2>
        </div>
        
        <div class="actions">
            <a href="{{ route('product.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
        </div>
    </div>
</body>
</html>
