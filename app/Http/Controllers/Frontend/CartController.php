<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Coupon;
use Carbon\Carbon;

class CartController extends Controller
{
    use HasFactory;


    public function AddToCart($id)
    {
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

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

    public function ApplyCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)
            ->where('validity', '>=', Carbon::now()->format('Y-m-d'))->first();

        $cart = session()->get('cart', []);
        $totalAmount = 0;
        $clientIds = [];
        
        foreach ($cart as $car) {
            $totalAmount += ($car['price'] * $car['quantity']);
            $pd = Product::find($car['id']);
            $cid = $pd->client_id;
            array_push($clientIds, $cid);
        }

        if ($coupon) {
            if (count(array_unique($clientIds)) === 1) {
                $cvendorId = $coupon->client_id;

                if ($cvendorId == $clientIds[0]) {
                    Session::put('coupon', [
                        'coupon_name' => $coupon->coupon_name,
                        'discount' => $coupon->discount,
                        'discount_amount' => $totalAmount - ($totalAmount * $coupon->discount/100),
                    ]);
                    $couponData = Session()->get('coupon');

                    return response()->json(array(
                        'validity' => true,
                        'success' => '¡Cupón Aplicado Correctamente!',
                        'couponData' => $couponData,
                    ));
                }else{
                    return response()->json(['error' => 'Este cupón no es valido para este Restaurante']);
                }
            }else{
                return response()->json(['error' => 'Este cupón es para uno de los restaurantes seleccionados']);
            }
        }else{
            return response()->json(['error' => 'Cupón Invalido']);
        }
    }

    public function RemoveCoupon()
    {
        Session::forget('coupon');
        return response()->json(['success' => 'Cupón removido Correctamente']);
    }

    public function ShopCheckout()
    {
        if (Auth::check()) {
            
            $cart = session()->get('cart', []);
            $totalAmount = 0;
            
            foreach ($cart as $car) {
                $totalAmount += $car['price'];
            }

            if ($totalAmount > 0) {
                return view('frontend.checkout.view_checkout', compact('cart'));
            } else {
                
                $notification = array(
                    'message' => '¡Compre un producto de la lista!',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
                
            }
            
        }else{
            
            $notification = array(
                'message' => '¡Por favor, inicie sesión primero!',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);

        }
    }
}
