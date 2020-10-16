<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CasagriLara;
use App\Casagribarinas;
use App\Casagriquibor;
use App\monitor;

use Session;

class InventarioController extends Controller
{
   public function casagrilaras(Request $request){
   		Session::put('page','CasagriLaras');
    	$casagrilara = Casagrilara::get();
    	/*$categories = json_decode(json_encode($categories));
    	echo "<pre>"; print_r($categories); die;*/

    	return view('admin.categories.CasagriLara')->with(compact('CasagriLaras'));
   }

    public function addEditCasagriL(Request $request, $id=null){

        if($id==""){
          $title = "Agregar Inventario";

          $monitor = new monitor;
        }
        else{
          $title = "Editar Inventario";
        }

        if($request->ismethod('post')){
          $data = $request->all();

         /* $rules =[
          'monitor_marca' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
          'monitor_modelo' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
          'monitor_serial' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
        ];

        $CustomMessage = [
          'monitor_marca.required' =>'Campo de marca es requerido',
          'monitor_marca.regex' => 'Por Favor colocar una marca valida',
           'monitor_modelo.required' =>'Campo de modelo es requerido',
          'monitor_modelo.regex' => 'Por Favor colocar un modelo valido',
           'monitor_serial.required' =>'Campo de serial es requerido',
           'monitor_serial.regex' =>'Por Favor colocar un serial valido',
        ];

      $this->validate($request,$rules,$CustomMessage);*/

      if(empty($data['monitor_marca'])){
        $data['monitor_marca']="";
      }
      if(empty($data['monitor_modelo'])){
        $data['monitor_modelo']="";
      }
      if(empty($data['monitor_serial'])){
        $data['monitor_serial']="";
      }

          $monitor->monitor_marca = $data['monitor_marca'];
          $monitor->monitor_modelo = $data['monitor_modelo'];
          $monitor->monitor_serial = $data['monitor_serial'];
          $monitor->status = 1;
          $monitor->save();

          Session::flash('success_message','Monitor agregado exitosamente');
          return redirect('admin/casagrilara');
}
        $getmonitor = monitor::get();

        return view('admin.categories.add_edit_casagriL')->with(compact('title','getmonitor'));
     }

     public function Casagribarinas(Request $request){
   		Session::put('page','Casagribarinas');
    	$casagribarinas = Casagribarinas::get();
    	return view('admin.categories.Casagribarinas')->with(compact('Casagribarinas'));
   }

     public function Casagriquibor(Request $request){
   		Session::put('page','Casagriquibor');
    	$casagriquibor = Casagriquibor::get();
    	return view('admin.categories.Casagriquibor')->with(compact('Casagriquibor'));
   }

    public function Monitor(Request $request){
      Session::put('page','monitor');
      $monitor = monitor::get();
      /*$categories = json_decode(json_encode($categories));
      echo "<pre>"; print_r($categories); die;*/
      return view('admin.categories.Monitor')->with(compact('monitor'));
   }

    public function updateMonitorStatus(Request $request){
      if($request->ajax()){
        $data = $request->all();
        if($data['status']=="Activo"){
          $status = 0;
      }else{
        $status = 1;
      }
      monitor::where('id',$data['monitor_id'])->update(['status'=>$status]);
      return response()->json(['status'=>$status,'monitor_id'=>$data['monitor_id']]);
      }
    }

      public function addEditMonitor(Request $request,$id=null){

        if($id==""){
          $title = "Agregar Monitor";

          $monitor = new monitor;
        }
        else{
          $title = "Editar Monitor";
        }

        if($request->ismethod('post')){
          $data = $request->all();

          $rules =[
          'monitor_marca' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
          'monitor_modelo' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
          'monitor_serial' => 'required|regex:/(^([a-zA-Z]+)(\d+)?$)/u',
        ];

        $CustomMessage = [
          'monitor_marca.required' =>'Campo de marca es requerido',
          'monitor_marca.regex' => 'Por Favor colocar una marca valida',
           'monitor_modelo.required' =>'Campo de modelo es requerido',
          'monitor_modelo.regex' => 'Por Favor colocar un modelo valido',
           'monitor_serial.required' =>'Campo de serial es requerido',
           'monitor_serial.regex' =>'Por Favor colocar un serial valido',
        ];

      $this->validate($request,$rules,$CustomMessage);

      if(empty($data['monitor_marca'])){
        $data['monitor_marca']="";
      }
      if(empty($data['monitor_modelo'])){
        $data['monitor_modelo']="";
      }
      if(empty($data['monitor_serial'])){
        $data['monitor_serial']="";
      }

          $monitor->monitor_marca = $data['monitor_marca'];
          $monitor->monitor_modelo = $data['monitor_modelo'];
          $monitor->monitor_serial = $data['monitor_serial'];
          $monitor->status = 1;
          $monitor->save();

          Session::flash('success_message','Monitor agregado exitosamente');
          return redirect('admin/Monitor');
}

        return view('admin.categories.add_edit_monitor');
      }

}
