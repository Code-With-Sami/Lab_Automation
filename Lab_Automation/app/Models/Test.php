<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model {
    use HasFactory;

    protected $table = 'tests';
    protected $primaryKey = 'test_id'; // Set the correct primary key
    public $timestamps = true;

    // ✅ Allow mass assignment for these fields
    protected $fillable = [
        'test_id',
        'product_id',
        'test_type',
        'criteria',
        'tested_by',
        'assigned_by', // NEW: Stores who assigned the test
        'result', // NEW: Stores who assigned the test
        'status', // NEW: Stores test status (Pending, In Progress, Completed)
    ];

    // ✅ Define relationship with Product
    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // ✅ Define relationship with User (Who Assigned the Test)
    public function assignedBy() {
        return $this->belongsTo(User::class, 'assigned_by');
    }
}
