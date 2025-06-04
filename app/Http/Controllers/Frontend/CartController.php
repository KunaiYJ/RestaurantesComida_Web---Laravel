<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use Carbon\Carbon;

class CartController extends Controller
{
    use HasFactory;


    public function AddToCart($id)
    {
        $products = Product::find($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $priceToShow = isset($products->discount_price) 
                        ? $products->discount_price 
                        : $products->price;
            $cart[$id] = [
                'id' => $id,
                'name' => $products->name,
                'image' => $products->image,
                'price' => $priceToShow,
                'client_id' => $products->client_id,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);

        // return response()->json($cart);
        $notification = array(
            'message' => '¡Agregado al carrito Correctamente!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }

    public function UpdateCartQuantity(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return response()->json([
            'message' => 'Cantidad actualizada',
            'alert-type' => 'success'
        ]);
    }

    public function CartRemove(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        return response()->json([
            'message' => 'Producto removido del Carrito',
            'alert-type' => 'success'
        ]);
    }
}
