<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Department;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::with('department')->latest()->paginate(10);

        return view('customer', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * 2);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('customercreate', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'departmentId' => 'digits_between: 1,5'
        ];

        $messages = [
            'required' => 'The :attribute field is required',
            'departmentId.digits_between' => 'Select department'
        ];

        $this->validate($request, $rules, $messages);

        $customer = Customer::create($request->all());


        $department = Department::where('id' , '=' , $request->departmentId )->get();

        $customer->department()->attach($department);


        return redirect()->route('customer')->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $departments = Department::all();
         return view('customerupdate', compact('customer', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required',
            'departmentId' => 'required'
        ]);

        $customer->department()->detach();


        $department = Department::where('id' , '=' , $request->departmentId )->get();
        $customer->department()->attach($department);

        $customer->update($request->all());

        return redirect()->route('customer')
            ->with('success', 'Customer updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {

        $customer->department()->detach();
        $customer->delete();

        return redirect()->route('customer')
            ->with('success', 'Customer deleted successfully');
    }
}
