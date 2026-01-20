<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
        .container { max-width: 900px; margin: 0 auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; border-bottom: 2px solid #3490dc; padding-bottom: 10px; }
        .product-detail { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 20px; }
        .product-image { background: #e9ecef; height: 300px; display: flex; align-items: center; justify-content: center; border-radius: 8px; color: #666; }
        .product-info h2 { color: #2c3e50; margin-top: 0; }
        .info-item { margin-bottom: 15px; }
        .info-item label { font-weight: bold; color: #555; display: block; margin-bottom: 5px; }
        .info-item p { margin: 0; color: #333; }
        .price { font-size: 24px; color: #e74c3c; font-weight: bold; }
        .btn { padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block; margin-right: 10px; }
        .btn-primary { background: #3490dc; color: white; }
        .btn-primary:hover { background: #2779bd; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-secondary:hover { background: #5a6268; }
        .actions { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; }
    </style>
</head>
<body>
    <div class="container" id="productDetail">
        <p style="text-align: center; color: #999;">Đang tải...</p>
    </div>

    <script>
        // Load chi tiết sản phẩm từ localStorage
        function loadProductDetail() {
            const productId = "{{ $id }}";
            const products = JSON.parse(localStorage.getItem('products') || '[]');
            const product = products.find(p => p.id == productId);
            
            const container = document.getElementById('productDetail');
            
            if (!product) {
                container.innerHTML = `
                    <h1>Không tìm thấy sản phẩm</h1>
                    <p>Sản phẩm #${productId} không tồn tại.</p>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">← Quay lại danh sách</a>
                `;
                return;
            }
            
            container.innerHTML = `
                <h1>Chi tiết sản phẩm #${product.id}</h1>
                
                <div class="product-detail">
                    <div class="product-image">
                        <img src="${product.image}" alt="${product.name}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                    </div>
                    
                    <div class="product-info">
                        <h2>${product.name}</h2>
                        
                        <div class="info-item">
                            <label>Mã sản phẩm:</label>
                            <p>SP${String(product.id).padStart(6, '0')}</p>
                        </div>
                        
                        <div class="info-item">
                            <label>Giá:</label>
                            <p class="price">${Number(product.price).toLocaleString('vi-VN')} VNĐ</p>
                        </div>
                        
                        <div class="info-item">
                            <label>Mô tả:</label>
                            <p>${product.description || 'Không có mô tả'}</p>
                        </div>
                        
                        <div class="info-item">
                            <label>Tình trạng:</label>
                            <p><span style="color: #38c172;">✓ Còn hàng</span></p>
                        </div>
                        
                        <div class="info-item">
                            <label>Ngày tạo:</label>
                            <p>${new Date(product.created_at).toLocaleString('vi-VN')}</p>
                        </div>
                    </div>
                </div>
                
                <div class="actions">
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">← Quay lại danh sách</a>
                    <button class="btn btn-primary" onclick="alert('Đã thêm vào giỏ hàng!')">Thêm vào giỏ hàng</button>
                </div>
            `;
        }
        
        // Load khi trang được tải
        loadProductDetail();
    </script>
</body>
</html>
