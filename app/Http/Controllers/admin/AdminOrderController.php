<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminOrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 
       $today=Carbon::now()->format('Y-m-d');
       $orders=Order::when($request->date !=null,function($q) use ($request){
                              return $q->wheredate('created_at',$request->date);
                              },
                              function($q) use ($today){
                                    return $q->wheredate('created_at',$today);
                              })
                      ->when($request->status !=null,function($q) use($request){
                        return $q->where('status_message',$request->status);
                      })->paginate(2);

        return view('admin.orders.index',compact('orders'));
    }


    public function show($id) {
        $order=Order::find($id);
        if($order){
            return view('admin.orders.show',compact('order'));
        }else{
            return redirect()->back()->with('message',"No Order Found");
        }

    }
    public function update(Request $request, $id){
        $order=Order::find($id);
        if($order){
            $order->update([
                'status_message'=>$request->status_message
            ]);
            return redirect('admin/order/'.$order->id)->with('message','Order status message updated ');
        }else{
            return redirect()->back()->with('message',"No Order Found");
        }
    }


public function showInvoice( $id ) {
    $order=Order::find($id);
    if($order){
        // return view('pdf',compact('order'));
        return view('admin.invoice.invoice',compact('order'));
    }else{
        return redirect()->back()->with('message',"No Order Found");
    }
}

public function invoiceGenerate($id){
    // set_time_limit(300);

    $order=Order::find($id);
    $data=['order'=>$order];
    $pdf=Pdf::loadView("admin.invoice.invoice",$data);
    $today=Carbon::now()->format('d-m-Y');



    // $pdf = App::make('dompdf.wrapper');
    // $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->download('invoice-'.$order->id.'-'.$today.'pdf');

}


}
