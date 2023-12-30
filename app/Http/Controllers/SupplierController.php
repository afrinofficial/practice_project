<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;


class SupplierController extends Controller
{

    public function index(){
        $supplier = Supplier::latest()->get();
        return view('backEnd.supplier.index',compact('supplier'));
    }

    public function create(){
        return view('backEnd.supplier.create');
    }

    public function edit($id){
        $supplier = Supplier::find($id);
        return view('backEnd.supplier.edit',compact('supplier'));
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

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->company_name = $request->company_name;
        $supplier->status = $request->status;
       // $supplier->image = $this->saveImage($request);
        if ($request->file('image')) {
            $supplier->image = $this->saveImage($request);
        }
        $supplier->save();
        return redirect()->route('supplier.list')->with('success','supplier Created Successfully');
    }

    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/supplier/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    public function delete($id){
        $student = Supplier::find($id);

        if (!$student) {
            return redirect()->back()->with('error', 'supplier not found');
        }
        $student->delete();
        return redirect()->back()->with('success', 'supplier deleted successfully');
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
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->mobile = $request->mobile;
        $supplier->address = $request->address;
        $supplier->company_name = $request->company_name;
        $supplier->status = $request->status;
        if ($request->file('image')) {
            if (file_exists($supplier->image)) {
                unlink($supplier->image);
            }
            $supplier->image = $this->saveImage($request);
        }

        $supplier->save();

        return redirect()->route('supplier.list')->with('success', 'Update Successfully');
    }

}
