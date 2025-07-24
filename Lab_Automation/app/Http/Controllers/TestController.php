<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller {
    public function index() {
        $tests = Test::with('product')->get();
        return view('tests.dashboard', compact('tests'));
    }

    public function createTest() {
        $products = Product::all();
        return view('tests.create', compact('products'));
    }

    public function store(Request $request) {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'test_type' => 'required|string',
            'criteria' => 'required|string',
            'tested_by' => 'required|string',
        ]);

        $testId = strtoupper(substr($request->product_id, 0, 4)) . time(); // Auto-generate Test ID

        Test::create([
            'test_id' => $testId,
            'product_id' => $request->product_id,
            'test_type' => $request->test_type,
            'criteria' => $request->criteria,
            'tested_by' => $request->tested_by,
            'assigned_by' => Auth::id(), // Automatically store who assigned the test
            'status' => 'Pending', // Default status when a test is created
        ]);

        return redirect()->route('tests.index')->with('success', 'Test Created Successfully!');
    }

    public function edit($test_id) {
        $test = Test::where('test_id', $test_id)->firstOrFail();
        return view('tests.edit', compact('test'));
    }

    public function updateTest(Request $request, $test_id) {
        $test = Test::where('test_id', $test_id)->firstOrFail(); // Find by `test_id`
        
        $request->validate([
            'test_type' => 'required|string',
            'criteria' => 'required|string',
            'status' => 'required|in:Pending,In Progress,Completed', // Ensure valid status values
        ]);

        $test->update([
            'test_type' => $request->test_type,
            'criteria' => $request->criteria,
            'status' => $request->status,
            'result' => $request->result,
        ]);

        return redirect()->route('tests.index')->with('success', 'Test Updated Successfully!');
    }

    public function destroy($id) {
        $test = Test::findOrFail($id);
        $test->delete();

        return redirect()->route('tests.index')->with('success', 'Test Deleted Successfully!');
    }
}
