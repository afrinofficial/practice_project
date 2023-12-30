<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ProductController extends Controller
{

    public function index(){
        $products = Product::latest()->get();
        return view('backEnd.product.index',compact('products'));
    }

    public function create(){
        $categories = Category::latest()->where('status',1)->get();
        return view('backEnd.product.create',compact('categories'));
    }

    public function edit($id){
        $product = Product::find($id);
        return view('backEnd.product.edit',compact('product'));
    }

    public function save(Request $request){
        // Validation rules
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'barcode' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'location' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'name.required' => 'Name is required.',
            'category_id.required' => 'Category is required.',
            'barcode.required' => 'Barcode is required.',
            'price.required' => 'Price is required.',
            'location.required' => 'Location is required.',
            'stock_quantity.required' => 'Mention quantity of the product',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->barcode = $request->barcode;
        $product->stock_quantity = $request->stock_quantity;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->weight = $request->weight;
        $product->location = $request->location;
        $product->description = $request->description;
        $product->expiry_date = $request->expiry_date;
        $product->status = $request->status;
        if ($request->file('image')) {
            $product->image = $this->saveImage($request);
        }
        $product->save();
        return redirect()->route('product.list')->with('success','Product Created Successfully');
    }

    public $image, $imageName, $imageUrl, $directory;
    public function saveImage($request)
    {
        $this->image = $request->file('image');
        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory = 'uploads/product/';
        $this->imageUrl = $this->directory . $this->imageName;
        $this->image->move($this->directory, $this->imageName);
        return $this->imageUrl;
    }

    public function delete($id){
        $student = Product::find($id);

        if (!$student) {
            return redirect()->back()->with('error', 'product not found');
        }

        $student->delete();

        return redirect()->back()->with('success', 'product deleted successfully');
    }

    public function update(Request $request, $id)
    {
        // Validation rules
        $rules = [
            'crs_name' => [
                'required',
                Rule::unique('suppliers', 'crs_name')->ignore($id),
            ],
            'crs_code' => 'required',
            'crs_fee' => 'required',
            'status' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'crs_name.required' => 'supplier is required.',
            'crs_name.unique' => 'The supplier is already available.',
            'crs_code.required' => 'supplier Code is required.',
            'crs_fee.required' => 'supplier Fee is required.',
            'status.required' => 'Status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, update the student
        $supplier = Supplier::find($id);
        $supplier->crs_name = $request->crs_name;
        $supplier->slug = Str::slug($request->crs_name, '-');
        $supplier->crs_code = $request->crs_code;
        $supplier->crs_fee = $request->crs_fee;
        $supplier->crs_description = $request->crs_description;
        $supplier->status = $request->status;

        if ($request->file('crs_image')) {
            if (file_exists($supplier->crs_image)) {
                unlink($supplier->crs_image);
            }
            $supplier->crs_image = $this->saveImage($request);
        }

        $supplier->save();

        return redirect()->route('supplier.list')->with('success', 'Update Successfully');
    }
}
