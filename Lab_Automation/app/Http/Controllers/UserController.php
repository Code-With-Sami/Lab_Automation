<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test; // Import Test Model
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }

    public function about()
    {
        return view('about-us');
    }

    public function contact()
    {
        return view('contact-us');
    }

    public function submitTest(Request $request)
    {
        // $request->validate([
        //     'product_id' => 'required|exists:products,id',
        // ]);

        $testId = strtoupper(substr($request->product_id, 0, 4)) . time(); // Auto-generate Test ID

        Test::create([
            'test_id' => $testId,
            'product_id' => $request->product_id,
            'test_type' => $request->product_name,
            'criteria' => $request->product_description,
            'tested_by' => $request->product_name,
            'assigned_by' => Auth::id(), // Automatically store who assigned the test
            'status' => 'Pending', // Default status when a test is created
        ]);

        return redirect()->back()->with('success', 'Test request submitted successfully!');
    }

    public function myTests()
    {
        $tests = Test::where('assigned_by', Auth::id())->get();
        return view('test', compact('tests'));
    }
}
