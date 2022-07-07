<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use function Ramsey\Uuid\v1;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.all_customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.add_customer');
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
            "shopname" => 'required|max:50',
            "address" => 'required|max:255|min:3',
            "bank_name" => 'required|max:255|min:3',
            "branch_name" => 'required|max:255|min:3',
            "bank_account" => 'required|max:255|min:3',
            "city" => 'required|max:255|min:3',
            "photo" => 'required|mimes:jpg,png',
        ]);

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->national_id = $request->national_id;
        $customer->phone =  $request->phone;
        $customer->email = $request->email;
        $customer->shopname = $request->shopname;
        $customer->address = $request->address;
        $customer->bank_name = $request->bank_name;
        $customer->branch_name = $request->branch_name;
        $customer->bank_account = $request->bank_account;
        $customer->city = $request->city;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $extension =  $request->file('photo')->getClientOriginalExtension();
            $random_name = time() . "_" . Str::snake($request->name, '_') . '.' . $extension;
            $path = 'assets/img/customer';
            $image->move($path, Str::lower($random_name));
            $customer->photo = $random_name;
        }

        $save = $customer->save();

        if ($save) {
            return redirect()->back()->with('success', 'Successfully added new customer!');
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
    public function show($id)
    {
        $customer = Customer::find($id);
        return view('admin.customer.profile_customer', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Customer::find($id);
        return view('admin.customer.edit_customer', compact('edit'));
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
            "email" => 'required|email',
            "shopname" => 'required|max:50',
            "address" => 'required|max:255|min:3',
            "bank_name" => 'required|max:255|min:3',
            "branch_name" => 'required|max:255|min:3',
            "bank_account" => 'required|max:255|min:3',
            "city" => 'required|max:255|min:3',
            "photo" => 'mimes:jpg,png',
        ]);

        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->national_id = $request->national_id;
        $customer->phone =  $request->phone;
        $customer->email = $request->email;
        $customer->shopname = $request->shopname;
        $customer->address = $request->address;
        $customer->bank_name = $request->bank_name;
        $customer->branch_name = $request->branch_name;
        $customer->bank_account = $request->bank_account;
        $customer->city = $request->city;

        if ($request->hasFile('photo')) {

            $destinations = 'assets/img/customer/' . $customer->photo;

            if (File::exists($destinations)) {
                File::delete($destinations);
            }

            $image = $request->file('photo');
            $extension =  $request->file('photo')->getClientOriginalExtension();
            $random_name = time() . "_" . Str::snake($request->name, '_') . '.' . $extension;
            $path = 'assets/img/customer';
            $image->move($path, Str::lower($random_name));
            $customer->photo = $random_name;
        }

        $update = $customer->update();

        if ($update) {
            return redirect()->route('admin.customer.index')->with('success', 'Successfully updated customer!');
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
        $delete = Customer::find($id);
        $destinations = 'assets/img/customer/' . $delete->photo;

        if (File::exists($destinations)) {
            File::delete($destinations);
        }
        $delete->delete();

        if ($delete) {
            return redirect()->back()->with('success', 'Successfully delete customer!');
        } else {
            return redirect()->back()->with('error', 'somethings went wrong!');
        }
    }
}
