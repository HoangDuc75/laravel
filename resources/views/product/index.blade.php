<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h1 { color: #333; }
        .product-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; margin-top: 20px; }
        .product-card { border: 1px solid #ddd; padding: 15px; border-radius: 8px; }
        .product-card h3 { margin-top: 0; color: #2c3e50; }
        .btn { padding: 8px 16px; background: #3490dc; color: white; text-decoration: none; border-radius: 4px; display: inline-block; margin-top: 10px; }
        .btn:hover { background: #2779bd; }
        .btn-add { background: #38c172; margin-bottom: 20px; }
        .btn-add:hover { background: #2d995b; }
    </style>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    
    <a href="{{ route('product.add') }}" class="btn btn-add">+ Thêm sản phẩm</a>
    
    <div class="product-list" id="productList">
        <p style="text-align: center; color: #999;">Chưa có sản phẩm nào. Hãy thêm sản phẩm mới!</p>
    </div>

    <script>
        // Lấy base URL từ Laravel
        const baseUrl = "{{ url('product') }}";
        
        // Load sản phẩm từ localStorage
        function loadProducts() {
            const products = JSON.parse(localStorage.getItem('products') || '[]');
            const productList = document.getElementById('productList');
            
            if (products.length === 0) {
                productList.innerHTML = '<p style="text-align: center; color: #999;">Chưa có sản phẩm nào. Hãy thêm sản phẩm mới!</p>';
                return;
            }
            
            productList.innerHTML = '';
            
            products.forEach(product => {
                const card = document.createElement('div');
                card.className = 'product-card';
                card.innerHTML = `
                    <img src="${product.image}" alt="${product.name}" style="width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;">
                    <h3>${product.name}</h3>
                    <p>${product.description || 'Không có mô tả'}</p>
                    <p><strong>Giá:</strong> ${Number(product.price).toLocaleString('vi-VN')} VNĐ</p>
                    <a href="${baseUrl}/${product.id}" class="btn">Xem chi tiết</a>
                `;
                productList.appendChild(card);
            });
        }
        
        loadProducts();
    </script>
</body>
</html>