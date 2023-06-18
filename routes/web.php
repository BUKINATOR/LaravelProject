<?php


use App\Models\Employee;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/list', function () {
    $data = Employee::all();
    return view('employees/list', ['employees' => $data]);
})->middleware('auth')->name('employees.list');

Route::get('/view/{employee}', function (Employee $employee) {
    return view('employees/view', ['employee' => $employee]);
})->middleware('auth')->name('employees.view');

Route::get('/edit/{employee}', function (Employee $employee) {
    return view('employees/edit', ['employee' => $employee]);
})->middleware('auth')->name('employees.edit');

Route::post('/edit/{employee}', function (Request $request, Employee $employee) {
    $employee->name = $request->name;
    $employee->email = $request->email;
    $employee->save();
    return redirect()->route('employees.list');
})->middleware('auth')->name('employees.edit');

Route::delete('/delete/{employee}', function (Employee $employee) {
    $employee->delete();
    return redirect()->route('employees.list');
})->middleware('auth')->name('employees.delete');

Route::get('/new', function () {

    return view('employees/new');
})->middleware('auth')->name('employees.new');

Route::post('/new', function (Request $request) {
    $newEmployee = new Employee();
    $newEmployee->name = $request->name;
    $newEmployee->email = $request->email;
    $newEmployee->save();
    return redirect()->route('employees.list');
})->middleware('auth')->name('employees.new');
