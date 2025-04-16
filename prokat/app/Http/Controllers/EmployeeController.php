<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{
    public function index()
    {
        return view('employees.index', ['employees' => Employee::paginate()]);
    }

    public function create()
    {
        return view('employees.create', ['employee' => new Employee()]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create([
            'comment' => $request['comment'],
            'name' => $request['name'],
            'phone1' => $request['phone1'],
            'phone2' => $request['phone2'],
            'phone3' => $request['phone3'],
            'login' => $request['login'],
            'password' => $request['password'],
            'status' => $request['status'],
        ]);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, StoreEmployeeRequest $request)
    {
        $employee['comment'] = $request['comment'];
        $employee['name'] = $request['name'];
        $employee['phone1'] = $request['phone1'];
        $employee['phone2'] = $request['phone2'];
        $employee['phone3'] = $request['phone3'];
        $employee['login'] = $request['login'];
        $employee['password'] = $request['password'];
        $employee['status'] = $request['status'];

        $employee->save();

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index');
    }
}
