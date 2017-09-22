<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;

class EmployeeController extends Controller
{
    //Get all employees list
    public function index(){
        echo "inside get all records";
        return;
    }

    //Store employee details
    public function store(){
        $input = Input::all();
        print_r($input);
        echo "inside create";
        return;
    }

    //Get employee details
    public function edit(){
        echo "inside edit";
        return;
    }

    //Update employee details
    public function update(){
        echo "inside update";
        return;
    }

    //Destroy employee details
    public function destroy(){
        echo "inside Delete";
        return;
    }
}
