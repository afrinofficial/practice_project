<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;
use Carbon\Carbon;
use App\Models\PurchaseOrder;

class PurchaseController extends Controller
{
    public function index(){
        $purchases = Purchase::latest()->get();
        return view('backEnd.purchase.index',compact('purchases'));
    }

    public function  edit($id){
        $purchase = Purchase::find($id);
        $suppliers = Supplier::latest()->where('status',1)->get();
        $products = PurchaseOrder::where('purchase_id',$id)->get();
        return view('backEnd.purchase.edit',compact('purchase','suppliers','products'));
    }

    public function getProductsForPurchase($id)
    {
        $purchase = Purchase::find($id);

        // Assuming you have a relationship named 'products' on your Purchase model
        $products = $purchase->products;

        return response()->json($products);
    }

//    public function edit($id)
//    {
//        $purchase = Purchase::find($id);
//        $suppliers = Supplier::latest()->where('status', 1)->get();
//        // Assuming you have a relationship named 'products' on your Purchase model
//        $products = $purchase->products;
//
//        return view('backEnd.purchase.edit', compact('purchase', 'suppliers', 'products'));
//    }



    public function invoice($id){
        $purchases = Purchase::findOrfail($id);
        $purchaseOrder = PurchaseOrder::where('purchase_id',$id)->get();
        return view('backEnd.purchase.invoice',compact('purchases','purchaseOrder'));
    }

    public function create(Request $request){
        $categories = Category::latest()->where('status',1)->get();
        $suppliers = Supplier::latest()->where('status',1)->get();
        return view('backEnd.purchase.create',compact('categories','suppliers'));
    }

    public function add(){

        $categories = Category::latest()->where('status',1)->get();
        $suppliers = Supplier::latest()->where('status',1)->get();
        $products = Product::all();

        return view('backEnd.purchase.add',compact('categories','suppliers','products'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('barcode', 'like', "%$query%")
            ->Where('status', 0)
            ->get();

        return response()->json($products);
    }



    public function save(Request $request){
        // Validation rules
        $rules = [
            'title' => 'required',
            'supplier_id' => 'required',
            'purchase_date' => 'required',
            'status' => 'required',
        ];

        // Validation messages (customize these as needed)
        $messages = [
            'title.required' => 'Title is required.',
            'supplier_id.required' => 'Supplier is required.',
            'purchase_date.required' => 'purchase date is required.',
            'status.required' => 'status is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $purchase = new Purchase();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->title = $request->title;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->reference = $request->reference;
        $purchase->total_amount = $request->total_amount;
        $purchase->payment_type = $request->payment_type;
        $purchase->status = $request->status;
        $purchase->description = $request->description;
        $purchase->save();


        $totalQuantities = $request->input('total_quantity');
        $productIds = $request->input('product_id');
        $prices = $request->input('price');
        $date = $request->purchase_date;
        $supplier_id = $request->supplier_id;


     //   $totalPrices = $request->input('total_price');

        foreach ($totalQuantities as $key => $quantity) {
            $purchaseOrder = new PurchaseOrder([
                'purchase_id' => $purchase->id,
                'product_id' => $productIds[$key],
                'price' => $prices[$key],
                'total_quantity' => $quantity,
                'supplier_id' => $supplier_id,
                'date' => $date,
             //   'total_price' => $totalPrices[$key],
            ]);

            $purchaseOrder->save();
        }

        return redirect()->route('purchase.list')->with('success','Purchased Successful');
    }




//    public $image, $imageName, $imageUrl, $directory;
//    public function saveImage($request)
//    {
//        $this->image = $request->file('image');
//        $this->imageName = rand().'.'.$this->image->getClientOriginalExtension();
//        $this->directory = 'uploads/product/';
//        $this->imageUrl = $this->directory . $this->imageName;
//        $this->image->move($this->directory, $this->imageName);
//        return $this->imageUrl;
//    }

    public function delete($id){

        $purchaseOrders = PurchaseOrder::where('purchase_id', $id)->get();

        foreach ($purchaseOrders as $purchaseOrder) {
            $purchaseOrder->delete();
        }

        // Find and delete the Purchase
        $purchase = Purchase::find($id);

        if ($purchase) {
            $purchase->delete();
            return redirect()->back()->with('success', 'Deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Purchase not found');
        }
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
