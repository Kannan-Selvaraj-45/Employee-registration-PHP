<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $employees = Employee::all();
        // $employees = Employee::orderBy('id','desc')->get();
        // dd($employees->implode('id'));
        // return view('index',['employee'=> $employees]);-->similar way
        // return view('index',compact('employees'));

        $employees = Employee::orderBy('id','desc')->paginate(5);
        return view('index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:employees,email|email',
            'joining_date'=>'required',
            'joining_salary'=>'required|numeric|unique:employees,email',
            
        ],[
            'email.unique'=> 'Email already exists',
        ]);
        // dd($request->all());
        $data = $request->except('_token');
        // Mass assigment
        Employee::create($data);

        return redirect(route('index'))->with('success','Seccessfully created a new Employee');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        
        // dd($employee);

        return view('show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee=Employee::find($id);
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {

        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:employees,email,'.$employee->id.'|email',
            'joining_date'=>'required',
            'joining_salary'=>'required|numeric|unique:employees,email',
            
        ]);


        // dd($request->all());
        // dd($employee);-->>>>route model binding method same reuslt 
        //$data=$request->all();
        $data= [...$request->all(), 'is_active' => $request->is_active ?? 0];
        // dd($data);
        // $employee=Employee::find($id);-->>>>this method for getting id as parameter and processing 
        $employee->update($data);

        return redirect(route('index'))->with('success','Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        // dd($employee->delete());
        $employee->delete();
        return redirect(route('index'))->with('success','SuccessFully deleted');
    }
}
