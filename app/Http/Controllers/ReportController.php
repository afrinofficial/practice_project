<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function purchaseReport(Request $request){
        $purchaseReports = Purchase::query()
            ->whereBetween('purchase_date', [$request->input('fromdate'), $request->input('todate')])
            ->get();
        return view('backEnd.report.purchase_report',compact('purchaseReports'));
    }

    public function purchaseReportOrder(Request $request){
        $purchaseReports = PurchaseOrder::query()
            ->whereBetween('date', [$request->input('fromdate'), $request->input('todate')])
            ->get();
        return view('backEnd.report.purchase_order_report',compact('purchaseReports'));
    }
}
