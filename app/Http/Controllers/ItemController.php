<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Item;
use Cart;
use DB;
use Flash;

class ItemController extends Controller
{
	protected $item;
	
	public function __construct(Item $item)
	{
		$this->item = $item;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->item->all();
		return view('items.index',['items' => $items]);
    }  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $items = $this->item->query()->where('item_id','=',$id)->get();
		return view('items.show',['items' => $items]);
    }


    
	
	
	
	
	
	
	
	
	
	
}
