<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function getEmployee(){

        return response()->json(Employee::all(), 200);
    }

    public function getEmployeeById($id){

        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee not found'], 404);
        }
        return response()->json($employee::find($id), 200);
    }

    public function addEmployee(Request $request){

        $employee = Employee::create($request->all());
        return response()->json($employee, 201);
    }

    public function updateEmployee(Request $request, $id){

        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee not found'], 404);
        }
        $employee -> update($request->all());
        return response()->json($employee, 200);
    }

    public function deleteEmployee(Request $request, $id){
        $employee = Employee::find($id);
        if(is_null($employee)){
            return response()->json(['message' => 'Employee not found'], 404);
        }
        $employee->delete();
        return response()->json(['message' => 'Employee Deleted successfully!'], 200);
    }
}
