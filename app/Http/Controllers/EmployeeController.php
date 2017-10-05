<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Contracts\Validation\Validator;
use App\Employee;

use App\Http\Requests;

class EmployeeController extends Controller
{
    //Get all employees list
    public function index(){

       $employess = Employee::all()->toArray();
       return response($employess, 200);
    }

    //Store employee details
    public function store(Request $request){
        $createUser = Employee::create([
            'name' => $request->input('name'),
            'age' => $request->input('age'),
            'gender'=> $request->input('gender')
        ]);

        return response( 200)
            ->header('Content-Type', 'application/json');
    }

    //Get employee details
    public function edit($id){
        $employee = Employee::where('id', '=', $id);
            $obj = ($employee)? $employee->first() :'';

            return response($obj, 200)
                ->header('Content-Type', 'application/json');
        }


    //Update employee details
    public function update(Request $request, $id){

        if($id){
            $employee = Employee::where('id', '=', $id)->first();
            $employee->name = $request->input('name');
            $employee->age = $request->input('age');
            $employee->gender = $request->input('gender');
            $employee->update();

            return response(200)
                ->header('Content-Type', 'application/json');
        } else{
            return response('Record not found.', 404)
                ->header('Content-Type', 'application/json');
        }
    }

    //Destroy employee details
    public function destroy($id){
        if($id){
            $employee = Employee::find($id);
            $employee->delete();

            return response( 200)
                ->header('Content-Type', 'application/json');
        } else{
            return response('Record not found.', 404)
                ->header('Content-Type', 'application/json');
        }

    }
}
