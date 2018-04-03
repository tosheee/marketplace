<?php

namespace App\Http\Controllers;

use Image;
use App\Order;
use App\Admin\Country;
use App\Admin\Seller;

use App\Admin\SubCategory;
use App\Admin\Category;
use App\Admin\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class AccountsController extends Controller
{

    //public function __construct()
    //{
      // $this->middleware('auth');
    //}

    public function index($id){
        $ordersIntoSeller = Order::where('user_id', $id)->orderBy('created_at', 'desc')->get();

        return view('accounts.index')->with('ordersIntoSeller', $ordersIntoSeller);
    }

    // show users orders
    public function viewUserOrders($id)
    {
        if (Auth::check() && Auth::user()->id == $id)
        {

            $userOrders = Order::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(18);

            return view('accounts.view-user-orders')->with('user_orders', $userOrders);
        }
        else
        {
            return view('errors.404');
        }
    }

    public function orders()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);

        return view('accounts.index')->with('orders', $orders)->with('title', 'Orders');
    }


}
