<?php  
	namespace App\Http\Controllers;
	use View; //必要的，才能使用view();
	use Illuminate\Support\Facades\DB;  //引用 資料庫語法
	use App\Http\Controllers\Controller;

	class Home extends Controller {

	    public function index() {
	        return View::make('home')
	            ->with('title', '首頁')
	            ->with('hello', '大家好～～');
		}

		public function show($id) {
			if($id != "db") {
			    return View::make('home')
			        ->with('title', '首頁')
			        ->with('hello', '大家好～～'.$id);
		    }
		    else {
		    	//$users = DB::select('select * from userdata where id = ?', [1]); //原生寫法(PDO)
		    	//最後的->get()=>取全部，若只需要一筆則可以換成->first()=>不需要迴圈解開，直接取值
		    	$users = DB::table('userdata')->where('id',1)->first();
		    	$id = DB::table('userdata')->where('id',1)->value('id'); //直接取某個欄位的值
		    	$titles = DB::table('userdata')->pluck('name'); //取某個欄所有的值
		    	$counts = DB::table('userdata')->count(); //數量
		    	$max = DB::table('userdata')->max('id');
		    	$ids = DB::table('userdata')->orderBy('id','desc')->get();
		    	//view("要連結的view",["在test2裡PHP的變數"=>變數])
		        return view('test2', ['users' => $users], ['id' => $id]) //這裡的參數只能放兩個
		        	->with('title', 'DB首頁')  //連結的view檔名加上.blade 即可以傳變數名為title，值為DB首頁
		        	->with('hello','取得資料表id為1的資料')
		        	->with('titles',$titles)
		        	->with('count',$counts)
		        	->with('max',$max)
		        	->with('ids',$ids);
		 	}
		}		
	}
?>