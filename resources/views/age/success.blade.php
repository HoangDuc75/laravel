<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thành công</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        
        h2 {
            color: #27ae60;
            margin-bottom: 20px;
        }
        
        p {
            color: #666;
            line-height: 1.6;
            margin: 20px 0;
        }
        
        .info {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            border-left: 4px solid #27ae60;
        }
        
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        a:hover {
            background: #764ba2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Xác nhận thành công!</h2>
        
        @if (session('success'))
            <div class="info">
                {{ session('success') }}
            </div>
        @endif
        
        <p>Tuổi đã được lưu trong session.</p>
        <p>Có thể truy cập các nội dung dành cho người lớn.</p>
        
        <a href="{{ route('home') }}">Quay lại trang chủ</a>
    </div>
</body>
</html>
