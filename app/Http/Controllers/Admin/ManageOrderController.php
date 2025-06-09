<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Order;
use Carbon\Carbon;


class ManageOrderController extends Controller
{
    public function PendingOrder()
    {
        $allData = Order::where('status', 'Pendiente')->orderBy('id','desc')->get();
        return view('admin.backend.order.pending_order', compact('allData'));
    }

    public function ConfirmOrder()
    {
        $allData = Order::where('status', 'Confirmada')->orderBy('id','desc')->get();
        return view('admin.backend.order.confirm_order', compact('allData'));
    }

    public function ProcessingOrder()
    {
        $allData = Order::where('status', 'Proceso')->orderBy('id','desc')->get();
        return view('admin.backend.order.processing_order', compact('allData'));
    }
    
    public function DeliverdOrder()
    {
        $allData = Order::where('status', 'Entrega')->orderBy('id','desc')->get();
        return view('admin.backend.order.deliverd_order', compact('allData'));
    }

    public function AdminOrderDetails($id)
    {
        $order = Order::with('user')->where('id', $id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'desc')->get();

        $totalPrice = 0;
        foreach ($orderItem as $item) {
            $totalPrice += $item->price * $item->qty;
        }

        return view('admin.backend.order.admin_order_details', compact('order','orderItem','totalPrice'));
    }

    public function PendingToConfirm($id)
    {
        Order::find($id)->update(['status' => 'Confirmada']);
        $notification = array(
            'message' => 'Orden Confirmada Correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('confirm.order')->with($notification);
    }

    public function ConfirmToProcessing($id)
    {
        Order::find($id)->update(['status' => 'Proceso']);
        $notification = array(
            'message' => 'Orden Procesada Correctamente',
            'alert-type' => 'success'
        );

        return redirect()->route('processing.order')->with($notification);
    }

    public function ProcessingToDeliverd($id)
    {
        Order::find($id)->update(['status' => 'Entrega']);
        $notification = array(
            'message' => 'Orden Entregada',
            'alert-type' => 'success'
        );

        return redirect()->route('deliverd.order')->with($notification);
    }

    public function AllClientOrders()
    {
        $clientId = Auth::guard('client')->id();

        $orderItemGroup = OrderItem::with(['product','order'])
        ->where('client_id', $clientId)
        ->orderBy('order_id','desc')
        ->get()
        ->groupBy('order_id');

        return view('client.backend.order.all_orders', compact('orderItemGroup'));
    }

    public function ClientOrderDetails($id)
    {
        $cid = Auth::guard('client')->id();
        $order = Order::with('user')->where('id', $id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->where('client_id', $cid)->orderBy('id', 'desc')->get();

        $totalPrice = 0;
        foreach ($orderItem as $item) {
            $totalPrice += $item->price * $item->qty;
        }

        return view('client.backend.order.client_order_details', compact('order','orderItem','totalPrice'));
    }

    public function UserOrderList()
    {
        $userId = Auth::user()->id;
        $allUserOrder = Order::where('user_id', $userId)->orderBy('id', 'desc')->get();
        
        return view('frontend.dashboard.order.order_list', compact('allUserOrder'));
    }

    public function UserOrderDetails($id)
    {
        $order = Order::with('user')->where('id', $id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'desc')->get();

        $totalPrice = 0;
        foreach ($orderItem as $item) {
            $totalPrice += $item->price * $item->qty;
        }

        return view('frontend.dashboard.order.order_details', compact('order','orderItem','totalPrice'));
    }

    public function UserInvoiceDownload($id)
    {
        $order = Order::with('user')->where('id', $id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'desc')->get();

        $totalPrice = 0;
        foreach ($orderItem as $item) {
            $totalPrice += $item->price * $item->qty;
        }

        $pdf = Pdf::loadView('frontend.dashboard.order.invoice_download', compact('order','orderItem','totalPrice'))
        ->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);

        return $pdf->download('factura.pdf');
    }
}