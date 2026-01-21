<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        .container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            text-align: center;
            max-width: 800px;
        }
        .nav-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="nav-links">
            <a href="{{ route('product.index') }}" >Quản lý Sản phẩm</a>
            <a href="{{ route('sinhvien', ['name' => 'Hoàng Văn Đức', 'mssv' => '0005067']) }}">Thông tin Sinh viên</a>
            <a href="{{ route('banco', ['n' => 8]) }}">Bàn cờ vua</a>
        </div>
    </div>
</body>
</html>
