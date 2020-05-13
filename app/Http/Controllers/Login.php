<?php  
	namespace App\Http\Controllers;
	use View; //必要的，才能使用view();
	use Illuminate\Support\Facades\DB;  //引用 資料庫語法
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;

	class Login extends Controller {

	    public function show() {
	   		return View::make('admin.login')
	   			->with('title','Login');
	    }
	    public function login(Request $request) {
	    	$input = $request->all();
	    	

	    }
	    public function logout() {

	    }
	}
?>