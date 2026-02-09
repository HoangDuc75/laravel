<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
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
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .register-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
            margin-top: 10px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .link-login {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }

        .link-login a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s;
        }

        .link-login a:hover {
            color: #764ba2;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-weight: 500;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Đăng Ký</h1>

        @if ($message = Session::get('success'))
            <div class="message success">
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="message error">
                {{ $message }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('register.submit') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    placeholder="Nhập họ và tên"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Nhập email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Nhập mật khẩu"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password_confirmation">Nhập lại mật khẩu</label>
                <input 
                    type="password" 
                    id="password_confirmation" 
                    name="password_confirmation" 
                    placeholder="Nhập lại mật khẩu"
                    required
                >
            </div>

            <button type="submit" class="btn-register">Đăng Ký</button>
        </form>

        <div class="link-login">
            Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập tại đây</a>
        </div>
    </div>
</body>
</html>
