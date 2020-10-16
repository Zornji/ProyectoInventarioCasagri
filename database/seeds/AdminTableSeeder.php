<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('admins')->delete();
    	$adminrecords = [
    		[
    			'id'=>1,'name'=>'admin','type'=>'admin','email'=>'admin@admin.com','password'=>'$2y$10$V1WZZEzJyItsMuF2/sZ2RumwM5dIRJSJtGLoOZEmpmaliwAKXX7re','image'=>'','status'=>1
    		],
    		[
    			'id'=>2,'name'=>'Omar','type'=>'subadmin','email'=>'Omar@admin.com','password'=>'$2y$10$V1WZZEzJyItsMuF2/sZ2RumwM5dIRJSJtGLoOZEmpmaliwAKXX7re','image'=>'','status'=>1
    		],
    		[
    			'id'=>3,'name'=>'joel','type'=>'subadmin','email'=>'joel@admin.com','password'=>'$2y$10$V1WZZEzJyItsMuF2/sZ2RumwM5dIRJSJtGLoOZEmpmaliwAKXX7re','image'=>'','status'=>1
    		],
    		[
    			'id'=>4,'name'=>'Pepe','type'=>'admin','email'=>'Pepe@admin.com','password'=>'$2y$10$V1WZZEzJyItsMuF2/sZ2RumwM5dIRJSJtGLoOZEmpmaliwAKXX7re','image'=>'','status'=>1
    		],
    	];

    	DB::table('admins')->insert($adminrecords);

    	/*foreach ($adminrecords as $key => $record) {
    		\App\Admin::create($record);
    	}*/
    }
}
