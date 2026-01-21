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
        <h1>Danh sách sản phẩm</h1>
    </div>
    
    <div class="button-group">
        <a href="{{ route('product.add') }}" class="btn btn-add">+ Thêm sản phẩm</a>
        <a href="{{ route('home') }}" class="btn btn-home">Trở về trang home</a>
    </div>
    
    @if(session('success'))
        <div style="padding: 10px; background: #38c172; color: white; border-radius: 4px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="product-list" id="productList">
        <div class="product-card">
            <img src="data:image/avif;base64,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" alt="iPhone 15" style="width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;">
            <h3>iPhone 17 Pro Max</h3>
            <p>Điện thoại cao cấp với chip A17 Pro</p>
            <p><strong>Giá:</strong> 29,990,000 VNĐ</p>
            <a href="{{ route('product.detail', '1') }}" class="btn">Xem chi tiết</a>
        </div>
        
        <div class="product-card">
            <img src="https://surfacecity.vn/wp-content/uploads/L715BL-view-Elite.jpg" alt="MacBook Pro" style="width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;">
            <h3>MacBook Pro M3</h3>
            <p>Laptop chuyên nghiệp cho dân đồ họa</p>
            <p><strong>Giá:</strong> 45,000,000 VNĐ</p>
            <a href="{{ route('product.detail', '2') }}" class="btn">Xem chi tiết</a>
        </div>
        
        <div class="product-card">
            <img src="data:image/avif;base64,AAAAIGZ0eXBhdmlmAAAAAGF2aWZtaWYxbWlhZk1BMUIAAADrbWV0YQAAAAAAAAAhaGRscgAAAAAAAAAAcGljdAAAAAAAAAAAAAAAAAAAAAAOcGl0bQAAAAAAAQAAAB5pbG9jAAAAAEQAAAEAAQAAAAEAAAETAAAEHAAAAChpaW5mAAAAAAABAAAAGmluZmUCAAAAAAEAAGF2MDFDb2xvcgAAAABqaXBycAAAAEtpcGNvAAAAFGlzcGUAAAAAAAAAzwAAAJgAAAAQcGl4aQAAAAADCAgIAAAADGF2MUOBAAwAAAAAE2NvbHJuY2x4AAIAAgAGgAAAABdpcG1hAAAAAAAAAAEAAQQBAoMEAAAEJG1kYXQSAAoKGB3zpdggQEDQgDKLCESAAKKKKFC0gOqt1IqWjoHGfE5rW22fmCdMW6vJ3U5oVpKk6HcsW0+qVy+H6nPx9pYBJ9DLKtH4KU2rWKGtwdNBw5XuhxVQzMP5juZddzDkPyipffB0yplxfILRfzGc4fbiPya6uxHLxY3wJewOBBAlQoBbEx+9btrUk/EceLsQMVPhW0jYzoI9UKYjlZhyocCJRoOPqrGE+WSOwpXTtz+gC1M4ST4634C+Il7xLF/b/XdCcYRAuJgF4NnU2OIvlDVwgpFBziWZ17vkvHPI1WIsJaQoEy7EdhQDuzETGj78V0/Oh5iY3rTLgxb3CJNEupqVcx1dXmMrgBQkvxiYJ08SK7/RIBtO6MOAjrfmoFJqxGgqxZv9/Py7UWvkJxbjhGKs3sqIFQSFG40wjWPRoMHs8ZPZels3HQigzO/AfqWwj4yGJ87m4qm6sFyYieLY/LopFIkH+Ql9He2wilVocavTab815Y1DL5cM7OoO29GkRjc/hqzNgYWeV72LAuXz+eeUjppjvr6GjoTb5zHoNtrV9d8hdEl+RXmSdFburA6zKM5xA/QtSIi9N0YfddZVxse8CpPLwV494YcuEL2Mg+eviab6AenXHlHLOwi/B3MzT5a+wyXyLIqkpRA8WPpNBVTdlrb9SzOOnqTJ6/Z5y9x6gwzBacK2gMnPa48Q4MtjeawhrfLXz2cPc4YoyHOF8hsNVAyguS/+YaPYQdqCCsKdPBWfUW+2eWC0XEhgrS/aDnhcmtDEYS9Xg+tVNn4o51G25ZOkdu/o8b+TfMxJeCJc1bB0foCSTCWMqfApirr9XLnJXucMs5PSbjlViNXFkAbsMd/iBKYSkHqkyLkEAPREo426oJf33sUBXXEY694R4wCTEtCgf5jqSFnUd4v0cq/ecTU4KOfqZ3GC3NjBV7KA8VT38D74LoTpGtaHiuXyLL3PeOpq+tEJ746Jdn89c2N7+SdwAzLsgzokjgwbYuNZl0K2epvGYFZXfKt/lWlyzGlcDEiPSqb3WmLOMUfnhHuh7UKgeh2Kl7hhVn6T9nLj90Lf1EUZ9EW8ZfC9E6jmwVLLn/EyuRDuQCVdpCu0SZ9ke4rEsvo5iJTfpkk0UJfTCxRd/VjQqgjECVZYkdbP8rbnrJWLDJ2k72jxT+RtwMu7ZeFst1I5gEaCRzrJiCQ5XHe2ZbmnnsECg6aB11fi4DHDN/yjvemMjP0oONX816XsE2yZXUj6p3oUBTiN4dxpYPss1Y6ZmwXkqKwN2eX+miraDdLP6rsi1K4nwToDy8vkoVIZfP/DPIeSp8DFF6pxARHdHMZ2/uRGQHbqV1279DmyTNPh/0IT7zvzzRH5/wX25Y/BwZdsjItWxje4yakecaPEhIKz+dq2qA==" alt="AirPods Pro" style="width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px;">
            <h3>AirPods Pro Gen 2</h3>
            <p>Tai nghe không dây chống ồn chủ động</p>
            <p><strong>Giá:</strong> 5,990,000 VNĐ</p>
            <a href="{{ route('product.detail', '3') }}" class="btn">Xem chi tiết</a>
        </div>
    </div>

    <script>
        const baseUrl = "{{ url('product') }}";
        function loadProducts() {
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