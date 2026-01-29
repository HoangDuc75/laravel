<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgeController extends Controller
{
    public function showAgeForm()
    {
        return view('age.form');
    }

    public function checkAge(Request $request)
    {
        // Validate dữ liệu nhập vào
        $validated = $request->validate([
            'age' => ['required', 'numeric', 'min:0', 'max:150']
        ], [
            'age.required' => 'Vui lòng nhập tuổi',
            'age.numeric' => 'Tuổi phải là số',
            'age.min' => 'Tuổi phải lớn hơn 0',
            'age.max' => 'Tuổi không hợp lệ'
        ]);

        $age = (int) $validated['age'];

        // Lưu tuổi vào session
        session(['age' => $age]);

        return redirect()->route('age.success')->with('success', 'Tuổi đã được lưu vào session. Tuổi của bạn: ' . $age);
    }
    
    public function successAge()
    {
        return view('age.success');
    }
}
