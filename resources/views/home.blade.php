<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            padding: 60px 50px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 900px;
            width: 100%;
        }
        
        h1 {
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }
        
        .subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 40px;
        }
        
        .header-actions {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
            gap: 10px;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .nav-links {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
        }
        
        .nav-links a {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 25px 20px;
            border-radius: 15px;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-actions">
            <a href="{{ route('login') }}" class="btn-login">Đăng nhập</a>
        </div>
        
        <div class="nav-links">
            <a href="{{ route('product.index') }}">Quản lý Sản phẩm</a>
            <a href="{{ route('sinhvien', ['name' => 'Hoàng Văn Đức', 'mssv' => '0005067']) }}">Thông tin Sinh viên</a>
            <a href="{{ route('banco', ['n' => 8]) }}">Bàn cờ vua</a>
        </div>
    </div>
</body>
</html>
