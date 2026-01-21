<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin sinh viên</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            max-width: 600px;
            width: 100%;
            margin: 50px auto;
        }
        .info-section {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: 600;
            color: #555;
            font-size: 1.1em;
        }
        .info-value {
            color: #333;
            font-size: 1.1em;
            text-align: right;
        }
        .back-link {
            display: inline-block;
            padding: 12px 30px;
            background: black;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: transform 0.3s;
            text-align: center;
            width: 100%;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="info-section">
            <div class="info-row">
                <span class="info-label">Họ và tên:</span>
                <span class="info-value">{{ $name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Mã số sinh viên:</span>
                <span class="info-value">{{ $mssv }}</span>
            </div>
        </div>
        
        <a href="{{ url('/') }}" class="back-link">Quay về trang chủ</a>
    </div>
</body>
</html>
