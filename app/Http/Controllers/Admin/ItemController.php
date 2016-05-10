<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Cat;
use App\Models\Subcat;
use Input;
use File;
use Flash;
use DB;
use Session;
use Slug;

class ItemController extends Controller
{
	protected $item;
	protected $cat;
	protected $subcat;
	
	public function __construct(Item $item,Cat $cat,Subcat $subcat)
	{
		$this->item = $item;
		$this->cat = $cat;
		$this->subcat = $subcat;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->item->all();
		return view('admin.items.index',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$post_id = $postModel->max('id')+1;
    	$cat_list = $this->cat->allCat();		
        return view('admin.items.create',['cats'=>$cat_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
	        'title' => 'required|max:255',
	        'price' => 'required',
    	]);
    	
    	$input = $request->all();
    	
    	if(!empty(Input::get('slug'))){
			$slug = Slug::make(Input::get('slug', ''));
		}else{
			$slug = Slug::make(Input::get('title', ''));
		}
		
    	$input['slug'] = $slug;
    	
    	$this->item->create($input);

		Flash::message('Товар успешно добавлен!');
		return redirect()->route('admin.items.index');
    }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	
    	$item = $this->item->query()->where('item_id','=',$id)->get();
    	
		$cat_list = $this->cat->allCat();
		$current_cat = $item[0]->cat_id;
		$subcat_list = $this->subcat->getSubCat($current_cat);
		
        return view('admin.items.edit',['item'=>$item,'cats' => $cat_list,'subcats'=>$subcat_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$this->validate($request, [
	        'title' => 'required|max:255',
	        'price' => 'required',
    	]);
    	
    	if(!empty(Input::get('slug'))){
			$slug = Slug::make(Input::get('slug', ''));
		}else{
			$slug = Slug::make(Input::get('title', ''));
		}
		
		Flash::message('Изменения сохранены!');
		$this->item->where('item_id',$id)->update($request->except('_token','_method','item_id'));
		$this->item->where('item_id',$id)->update(['slug'=>$slug]);
		return redirect()->route('admin.items.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $this->item->where('item_id',$id)->delete();
		Flash::message('Товар удален!');
		return redirect()->route('admin.items.index');
    }
}
