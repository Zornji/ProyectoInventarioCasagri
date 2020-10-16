<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\Category;
use Session;
use Image;

class CategoryController extends Controller
{
    public function categories(){
    	Session::put('page','categories');
    	$categories = Category::get();
    	/*$categories = json_decode(json_encode($categories));
    	echo "<pre>"; print_r($categories); die;*/
    	return view('admin.categories.categories')->with(compact('categories'));
    }

      public function updateCategoryStatus(Request $request){
    	if($request->ajax()){
    		$data = $request->all();
    		if($data['status']=="Activo"){
    			$status = 0;
			}else{
				$status = 1;
			}
			Category::where('id',$data['category_id'])->update(['status'=>$status]);
			return response()->json(['status'=>$status,'category_id'=>$data['category_id']]);
    	}
    }

    	public function addEditCategory(Request $request,$id=null){

    		if($id==""){
    			$title = "Agregar Categoria";

    			$category = new Category;
    		}
    		else{
    			$title = "Editar Categoria";
    		}

    		if($request->ismethod('post')){
    			$data = $request->all();

    			$rules =[
					'category_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
					'section_id' => 'required',
					'url' => 'required',
					'category_image' => 'image',
					'category_discount' => 'numeric',
				];

			 	$CustomMessage = [
			 		'category_name.required' =>'Campo de nombre es requerido',
			 		'category_name.regex' => 'Por Favor colocar un nombre valido',
			 		'section_id.required' =>'Campo de seccion es requerido',
			 		'category_discount.numeric' => 'Campo Invalido, Solo numerico',
			 		'url.required' => 'Campo de Url es requerido',
			 		'category_image.image' => 'Imagen No valida',
				];

			$this->validate($request,$rules,$CustomMessage);


    			if($request->hasfile('category_image')){
				$image_tmp = $request->file('category_image');
				if($image_tmp->isValid()){
					$extension = $image_tmp->getClientOriginalExtension();
					$imageName = rand(111,99999).'.'.$extension;
					$imagePath = 'images/category_images/'.$imageName;
					Image::make($image_tmp)->resize(160,160)->save($imagePath);

					$category->category_image = $imageName;
				}
			}
			if(empty($data['category_discount'])){
				$data['category_discount']="";
			}
			if(empty($data['description'])){
				$data['description']="";
			}
			if(empty($data['meta_title'])){
				$data['meta_title']="";
			}
			if(empty($data['meta_description'])){
				$data['meta_description']="";
			}
			if(empty($data['meta_keywords'])){
				$data['meta_keywords']="";
			}

    			$category->parent_id = $data['parent_id'];
    			$category->section_id = $data['section_id'];
    			$category->category_name = $data['category_name'];
    			$category->category_discount = $data['category_discount'];
    			$category->description = $data['description'];
    			$category->url = $data['url'];
    			$category->meta_title = $data['meta_title'];
    			$category->meta_description = $data['meta_description'];
    			$category->meta_keywords = $data['meta_keywords'];
    			$category->status = 1;
    			$category->save();

    			Session::flash('success_message','Categoria agregada exitosamente');
    			return redirect('admin/categories');
    		}

    		$getSections = Section::get();

    		return view('admin.categories.add_edit_category')->with(compact('title','getSections'));
    	}

    	public function appendCategoryLevel(Request $request){
    		if($request->ajax()){
    			$data = $request->all();

    			$getCategories = Category::where(['section_id'=>$data['section_id'],'parent_id'=>0,'status'=>1])->get();
    			$getCategories = json_decode(json_encode($getCategories),true);
    			return view('admin.categories.append_categories_level')->with(compact('getCategories'));

    		}
    	}

}
