<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::all();
        return view('admin.employee.all_employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.employee.add_employee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required|max:20|min:3',
            "national_id" => 'required|digits:11',
            "phone" => 'required|digits:11',
            "email" => 'required|email|unique:employees,email',
            "address" => 'required|max:255|min:3',
            "sallery" => 'required|max:255|min:3',
            "city" => 'required|max:255|min:3',
            "photo" => 'required|mimes:jpg,png',
        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->national_id = $request->national_id;
        $employee->phone =  $request->phone;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->sallery = $request->sallery;
        $employee->city = $request->city;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension =  $request->file('photo')->getClientOriginalExtension();
            $random_name = time() . "_" . Str::snake($request->name, '_') . '.' . $extension;
            $path = 'assets/img/employee';
            $image->move($path, Str::lower($random_name));
            $employee->photo = $random_name;
        }

        $save = $employee->save();

        if ($save) {
            return redirect()->back()->with('success', 'Successfully added new employee!');
        } else {
            return redirect()->back()->with('error', 'somethings went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $employee = Employee::find($id);
        return view('admin.employee.single_employee_view', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Employee::find($id);
        return view('admin.employee.edit_employee', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => 'required|max:20|min:3',
            "national_id" => 'required|digits:11',
            "phone" => 'required|digits:11',
            "email" => 'required|email|exists:employees,email',
            "address" => 'required|max:255|min:3',
            "sallery" => 'required|max:255|min:3',
            "city" => 'required|max:255|min:3',
            "photo" => 'mimes:jpg,png',
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->national_id = $request->national_id;
        $employee->phone =  $request->phone;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->sallery = $request->sallery;
        $employee->city = $request->city;

        if ($request->hasFile('photo')) {

            $destination = 'assets/img/employee/' . $employee->photo;
            // dd($destination);

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $image = $request->file('photo');
            $extension =  $request->file('photo')->getClientOriginalExtension();
            $random_name = time() . "_" . Str::snake($request->name, '_') . '.' . $extension;
            $path = 'assets/img/employee';
            $image->move($path, Str::lower($random_name));
            $employee->photo = $random_name;
        }

        $save = $employee->update();

        if ($save) {
            return redirect()->route('admin.employee.index')->with('success', 'Successfully Update employee!');
        } else {
            return redirect()->back()->with('error', 'somethings went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $delete = Employee::find($id);
        $destination = 'assets/img/employee/' . $delete->photo;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $delete->delete();

        if ($delete) {
            return redirect()->back()->with('success', 'Successfully delete employee');
        } else {
            return redirect()->back()->with('error', 'Somethings went wrong!');
        }
    }
}
