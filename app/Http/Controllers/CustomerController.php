<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customer::latest()->get();
        return view('backEnd.customer.index',compact('customer'));
    }

    public function create(){
        return view('backEnd.customer.create');
    }

    public function edit($id){
        $customer = Customer::find($id);
        return view('backEnd.customer.edit',compact('customer'));
    }

    public function save(Request $request){
        // Validation rules
        $rules = [
            'name' => 'required',
            'mobile' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Name is required.',
            'mobile.required' => 'Mobile Number is required.',
        ];
        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->status = $request->status;
        // $customer->image = $this->saveImage($request);
        if ($request->file('image')) {
            $customer->image = $this->saveImage($request);
        }
        $customer->save();
        return redirect()->route('customer.list')->with('success','Customer Created Successfully');
    }

    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/customer/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    public function delete($id){
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found');
        }
        if ($customer->image) {
            if (file_exists($customer->image)) {
                unlink($customer->image);
            }
        }
        $customer->delete();

        return redirect()->back()->with('success', 'Customer deleted successfully');
    }

    public function update(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'name' => 'required',
            'mobile' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Name is required.',
            'mobile.required' => 'Mobile Number is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, update the student
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->mobile = $request->mobile;
        $customer->address = $request->address;
        $customer->status = $request->status;

        if ($request->file('image')) {
            if (file_exists($customer->image)) {
                unlink($customer->image);
            }
            $customer->image = $this->saveImage($request);
        }
        $customer->save();
        return redirect()->route('customer.list')->with('success', 'Update Successfully');
    }
}
