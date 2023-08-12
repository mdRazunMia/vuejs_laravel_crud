<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getAllEmployees() {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function deleteEmployee($id){
        $employee = Employee::find($id);
        $employee->delete();
        return response()->json('Employee has been deleted successfully', 200);
    }
}
