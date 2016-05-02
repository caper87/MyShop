<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Cart;
use DB;
use Flash;
use Response;
use Session;
class CartController extends Controller
{
    protected $order;
    protected $item;
    protected $user;

    public function __construct(Order $order, Item $item,User $user) {

        $this->order = $order;
        $this->item = $item;
        $this->user = $user;

    }

    public function cart(Request $request)
    {
        if ($request->isMethod('post')) {
            $item_id = $request->get('item_id');
            $item = $this->item->find($item_id);
            Cart::add(array('id' => $item_id, 'name' => $item->title, 'qty' => 1, 'price' => $item->price));
        }

        $cart = Cart::content();

        return view('cart.cart', array('cart' => $cart, 'title' => 'Welcome'));
    }

    public function cartIncr(Request $request)
    {
        //print_r(Session::get('main'));
        //$wer = Session::get('cart');
        //$wer = $wer['main']['a775bac9cff7dec2b984e023b95206aa'];

        //increment the quantity
        if ($request->get('item_id')){
            $rowId = Cart::search(array('id' => $request->get('item_id')));
            $item = Cart::get($rowId[0]);
            Cart::update($rowId[0], $item->qty + 1);
            //$cart = Cart::content();

            return ['qty'=>$item->qty,'subtotal'=>$item->subtotal];
        }
    }

    public function cartDecr(Request $request)
    {
        if ($request->get('item_id')){
            $rowId = Cart::search(array('id' => $request->get('item_id')));
            $item = Cart::get($rowId[0]);
            Cart::update($rowId[0], $item->qty - 1);
            //$cart = Cart::content();

            return ['qty'=>$item->qty,'subtotal'=>$item->subtotal];
        }

    }

    public function cartRem(Request $request)
    {
        $rowId = Cart::search(array('id' => $request->get('item_id')));
        Flash::message('Товар удален');
        Cart::remove($rowId[0]);
        return redirect('cart');
    }

    public function cartDel()
    {
        Cart::destroy();
        Flash::message('Ваша корзина пуста');
        $cart = Cart::content();
        return redirect('cart');
    }
}
