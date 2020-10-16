<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use App\Admin;
use Hash;
use Image;


class AdminController extends Controller
{
	public function dashboard(){
		Session::put('page','dashboard');
		return view('admin.admin_dashboard');
	}

	public function settings(){
		Session::put('page','settings');
		//echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
		$admindetails = Admin::where('email',Auth::guard('admin')->user()->email)->first();
		return view('admin.admin_settings')->with(compact('admindetails'));
	}

	public function login(Request $request){
		if($request->isMethod('post')){
		$data = $request->all();
		//echo "<pre>";print_r($data); die;


			$rules =[
			'email' => 'required|email|max:255',
			'password' => 'required',
			];

			 $CustomMessage = [
			 	'email.required' =>'Campo de correo es requerido',
			 	'email.email' => 'Por Favor colocar un correo valido',
			 	'password.required' => 'Campo de contraseña es requerido'
			];

			$this->validate($request,$rules,$CustomMessage);

		if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){

			return redirect('admin/dashboard');
		} else{
				Session::flash('error_message','Datos incorrectos');
				return redirect()->back();
		}
		}
		return view('admin.admin_login');
	}

	public function register(){

		return view('admin.admin_registe');
	}

	public function logout(){
		Auth::guard('admin')->logout();
		return redirect('/admin');
	}

	public function chkCurrentPassword(Request $request){
		$data = $request->all();
		//echo "<pre>"; print_r($data);
		if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){
			echo "true";
		}else{
			echo "false";
		}
	}

	public function updateCurrentPassword(Request $request){
		if($request->ismethod('post')){
			$data = $request->all();
			//echo "<pre>"; print_r($data); die;
			if(Hash::check($data['current_pwd'],Auth::guard('admin')->user()->password)){

				if($data['new_pwd']==$data['confirm_pwd']){
					Admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
					Session::flash('success_message','Contraseña actualizada correctamente');
				}else{
					Session::flash('error_message','Las contraseñas no coinciden');
				}
		}else{
			Session::flash('error_message','Tu contraseña actual es incorrecta');
		}
			return redirect()->back();
		}
	}

	public function updateAdminDetails(Request $request){
		Session::put('page','update-admin-details');
		if($request->isMethod('post')){
			$data = $request->all();
			//echo "<pre>"; print_r($data); die;
			$rules = [
				'admin_name' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
				'admin_image' => 'Image'
			];
			$CustomMessage = [
				'admin_name.required' => 'Nombre es Requerido',
				'admin_name.alpha' => 'Ingrese un nombre Valido',
				'admin_image.image' => 'Valida tu Imagen'
			];
			$this->validate($request,$rules,$CustomMessage);

			if($request->hasfile('admin_image')){
				$image_tmp = $request->file('admin_image');
				if($image_tmp->isValid()){
					$extension = $image_tmp->getClientOriginalExtension();
					$imageName = rand(111,99999).'.'.$extension;
					$imagePath = 'images/admin_images/admin_photos/'.$imageName;
					Image::make($image_tmp)->resize(160,160)->save($imagePath);
				}else if(!empty($data['current_admin_image'])){
					$imageName = $data['current_admin_image'];
				}else{
					$imageName = "";
				}
			}

			Admin::where('email',Auth::guard('admin')->user()->email)->update(['name'=>$data['admin_name'],'image'=>$imageName]);
			session::flash('success_message','Detalles actualizados correctamente');
			return redirect()->back();
		}
			return view('admin.update_admin_details');
	}
}
