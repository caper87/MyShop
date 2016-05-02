<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Subcat;
use App\Models\Cat;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class SubcatController extends Controller
{
    protected $subcat;
	
	public function __construct(Subcat $subcat) {

        $this->subcat = $subcat;
       
    }
    
	public function getSubCatAjax(Cat $cat,Subcat $subcat)
	{
		
		$action = Input::get('action');
		$cat_id = Input::get('cat');
		//$cat = $cat->where('cat_id',$categ )->get();
		if (isset($action) && $action == 'getSubCat'){ // проверка параметров
		    if (isset($cat_id)) {// если ключ найден
		    	$subcat =  $this->subcat->getSubCat($cat_id);
		        return json_encode($subcat); // возвращаем массив с данными
		    }else{ // иначе
		    	
		        return json_encode(array('Выберите категорию'));
		    	
			}
		}
	}
	
	public function addSubCatAjax(Request $request)
	{
		
		$this->subcat->create($request->all());

		$subcat = Subcat::max('subcat_id');
		
		return $subcat;
	}
	
	public function delSubCatAjax()
	{
		$id = Input::get('subcat_id');
		$this->subcat->where('subcat_id',$id)->delete();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subcat->where('subcat_id',$id)->delete();
		//Session::flash('message', 'Successfully deleted the nerd!');
		return redirect()->route('admin.cat.index');
    }
}
