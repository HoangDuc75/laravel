<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .form-container { max-width: 600px; margin: 20px auto; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        textarea { height: 100px; resize: vertical; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; margin-right: 10px; }
        .btn-primary { background: #3490dc; color: white; }
        .btn-primary:hover { background: #2779bd; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-secondary:hover { background: #5a6268; }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Thêm sản phẩm mới</h1>
        
        <form action="{{ route('product.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Tên sản phẩm:</label>
                <input type="text" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="price">Giá:</label>
                <input type="number" id="price" name="price" required>
            </div>
            
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea id="description" name="description"></textarea>
            </div>
            
            <div class="form-group">
                <label for="image">Hình ảnh URL:</label>
                <input type="text" id="image" name="image">
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                <a href="{{ route('product.index') }}" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const product = {
                id: Date.now(),
                name: document.getElementById('name').value,
                price: document.getElementById('price').value,
                description: document.getElementById('description').value,
                image: document.getElementById('image').value || 'https://via.placeholder.com/300x200?text=No+Image',
                created_at: new Date().toISOString()
            };
            
            window.location.href = "{{ route('product.index') }}";
        });
    </script>
</body>
</html>
