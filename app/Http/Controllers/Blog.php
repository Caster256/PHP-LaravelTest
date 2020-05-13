<?php  
	namespace App\Http\Controllers;
	use View; //必要的，才能使用view();
	use Illuminate\Support\Facades\DB;  //引用 資料庫語法
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Http\Requests\StoreBlogPost;
	use App\Repositories\postRepo as p_r;
	use KS\Line\LineNotify;

    class Blog extends Controller {

		public function index() {
			$posts = DB::table('post')->get();
	        return View::make('site.blog')
	            ->with('title', 'My~Blog1')
	            ->with('posts',$posts);
		}

		public function view($id) {
			$posts = DB::table('post')->where('id',$id)->first();
			return View::make('site.view')
				->with('title', 'My~Blog')
				->with('posts',$posts);
		}

		public function edit($id) {
			$posts = DB::table('post')->where('id',$id)->first();
			return View::make('site.edit')
				->with('title', 'My~Blog')
				->with('posts',$posts);
		}

		public function insert(StoreBlogPost $request) {
			//unique:post(資料表名稱)
			/*$validatedData = $request->validate([	//驗證
		        'title' => 'required|unique:post|max:10'	//第一個參數是參照欄位的name
		    ]);*/
			$input = $request->all();
			//echo $input["posts_title"];
    		DB::table('post')->insert(
			    ['title' => $input["title"], 'content' => $input["content"]]
			);
			return redirect('post');	//重導路由
		}

		public function insertAjax(StoreBlogPost $request, p_r $p_r)
		{
			$input = $_POST['values'];
			/*$input = $request->all();
			//echo $input["posts_title"];*/
			$affect = $p_r->storeData($input);
    		/*$id = DB::table('post')->insertGetId(
			    ['title' => $input["title"], 'content' => $input["content"]]
			);*/
			$ret['title'] = $input['title'];
			//$ret['id'] = $id;
            $ret['affect'] = $affect;
			$ret['status'] = 'success';
            return response()->json($ret);
//			echo json_encode($ret);
		}

		public function update(Request $request, $id) {
		 	$input = $request->all();
		 	DB::table('post')
		 		->where('id',$id)
		 		->update(
		 			['title' => $input["title"], 'content' => $input["content"]]
		 		);
		 	//echo $id;
		 	return redirect('post');	//重導路由
		}

		public function delete($id) {
			DB::table('post')->where('id', $id)->delete();
			return redirect('post');	//重導路由
		}

		public function lineNotify()
        {
            $token = 'SoeFZlZH0EtFEEvbwOwyK9tDBzsrswHYTTyam2CWXNe';
            $ln = new LineNotify($token);

            $text = PHP_EOL.'Hello Line Notify';
            $ln->send($text);
        }

        public function sqlsrv()
        {
            $lists = DB::connection('sqlsrv')
                ->table('appuser_collection_view')
                ->select(DB::raw("DISTINCT(mobile) AS mobile"))
                ->where('hospId','23752100');

            $bindings = $lists->getBindings();
            $sql = str_replace('?', '%s', $lists->toSql());
            $sql = sprintf($sql, ...$bindings);

            echo '<pre>';
            print_r($sql);
            echo '</pre>';
        }
	}
