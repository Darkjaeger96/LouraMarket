<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Barryvdh\DomPDF\Facade as PDF;


class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('status', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function view($id){
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }

    public function updateOrder(Request $request, $id){
        $orders = Order::find($id);
        $orders->status = $request->input('orderStatus');
        $orders->update();
        return redirect('orders')->with('status', "Pedido Actualizado con éxito");
    }

    public function orderHistory(){
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.history', compact('orders'));
    }

    public function downloadPDF(Request $request, $id){
        $orders = Order::find($id);
        //'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true
        $pdf = PDF::loadView('frontend.orders.viewPDF', compact('orders'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->download('Detalles del Pedido.pdf');
    }
}
