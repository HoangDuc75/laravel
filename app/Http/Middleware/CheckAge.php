<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy tuổi từ session
        $age = $request->session()->get('age');

        // Kiểm tra dữ liệu
        if (is_numeric($age) && (int)$age >= 18) {
            return $next($request);
        } else {
            // Sinh viên có thể chủ động chọn cách trả về: JSON, Text, View
            // VD1: Trả về JSON
            return response()->json([
                'message' => 'Không được phép truy cập!'
            ], 403);
            
            // VD2: Trả về Text
            // return response('Không được phép truy cập!', 403);
            
            // VD3: Trả về View
            // return response(view('error.age-restricted'), 403);
            
            // VD4: Redirect về form nhập tuổi
            // return redirect()->route('age.form')->with('error', 'Bạn chưa đủ 18 tuổi!');
        }
    }
}