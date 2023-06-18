<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.list', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        // Create a new employee using the validated data
        $employee = Employee::create($validatedData);

        // Redirect to the employee list with a success message
        return redirect()->route('employees.list')->with('success', 'Employee created successfully.');
    }

    // Add other methods like edit, update, destroy as needed
}
