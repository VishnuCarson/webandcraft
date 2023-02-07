<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderStoreRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF; 

class OrderController extends Controller
{
    public function index(Request $request) {
        
        $orders = Order::with('items')->get();
    
        return view('orders.index', compact('orders'));
    }
    public function create()
    {

        $products = Product::where('status', 1)->get();
        return view('orders.create',compact('products'));
    }

    public function store(OrderStoreRequest $request)
    {
        $order =new Order();
        $order->customer_name = $request->cname;
        $order->phone_number =  $request->phone;
        $order->save();
        $amount = 0;
        
        foreach($request->product as $key => $values)
        {
            $products = Product::where('id', $values)->first();
            $orderItem = new OrderItem();
            $orderItem->quantity =  $request->qty[$key];
            $orderItem->order_id =  $order->id;
            $orderItem->product_id =  $values;
            $orderItem->save();
            $amount =  $amount + $request->qty[$key] * $products->price;
        }
        $udpateOrder =  Order::where('id',$order->id)->update(['total_amount'=>$amount]);
        
        return redirect()->route('orders.index')->with('success', 'Success, you Order have been created.');
    }
    public function invoice($oid){
       
        $order = Order::with('items')->where('id', $oid)->first()->toArray();
        // print_r($order);
        // die();
        
        $invoice_date = date('Y-m-d H:i:s');
        
    $pdf = PDF::loadView('orders.invoice_template',array('order'=>$order))->setOptions(['defaultFont' => 'sans-serif']);
    return $pdf->download('Invoice_'.config('app.name').'_Order_No # '.$oid.' Date_'.$invoice_date.'.pdf');
     } 

     public function edit($oid)
    {
        $order = Order::with('items')->where('id', $oid)->first();
        $products = Product::where('status', 1)->get();
        return view('orders.edit',compact("products",'order'));
    }
    public function update(OrderStoreRequest $request,$oid)
    {
        $order = Order::with('items')->where('id', $oid)->first();
        $order->customer_name = $request->cname;
        $order->phone_number =  $request->phone;
        $order->save();
        $amount = 0;
        $order_item = OrderItem::where('order_id', $oid)->delete();;
       
        foreach($request->product as $key => $values)
        {
            $products = Product::where('id', $values)->first();
            $orderItem = new OrderItem();
            $orderItem->quantity =  $request->qty[$key];
            $orderItem->order_id =  $order->id;
            $orderItem->product_id =  $values;
            $orderItem->save();
            $amount =  $amount + $request->qty[$key] * $products->price;
        }
        $udpateOrder =  Order::where('id',$order->id)->update(['total_amount'=>$amount]);
        
        return redirect()->route('orders.index')->with('success', 'Success, you Order have been updated.');
    }
    public function destory($oid)
    {
        $order = Order::where('id', $oid)->first();
        $order->delete();

        return redirect()->route('orders.index')
        ->withSuccess(__('Orders delete successfully.'));
    }

}
