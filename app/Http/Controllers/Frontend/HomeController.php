<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Menu;
use App\Models\Galery;
use App\Models\Wishlist;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function RestaurantDetails($id)
    {
        $client = Client::find($id);
        $menus = Menu::where('client_id', $client->id)->get()->filter(function($menu){
            return $menu->products->isNotEmpty();
        });
        $gallerys = Galery::where('client_id', $id)->get();
        return view('frontend.details_page', compact('client', 'menus','gallerys'));
    }

    public function AddWishList(Request $request, $id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('client_id', $id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'client_id' => $id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => '¡Se Agrego a su lista de Favoritos correctamente!']);
            } else {
                return response()->json(['error' => 'Este producto ya está en tu lista de Favoritos']);
            }
            
        }else{
            return response()->json(['error' => 'Primero inicie sesión en su cuenta']);
        }
    }

    public function AllWishlist()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.dashboard.all_wishlist', compact('wishlist'));
    }

    public function RemoveWishlist($id)
    {
        Wishlist::find($id)->delete();

        $notification = array(
            'message' => '¡Favorito eliminado Correctamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
