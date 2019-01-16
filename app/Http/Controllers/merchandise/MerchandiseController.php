<?php
namespace App\Http\Controllers\merchandise;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Entity\Merchandise;
use Validator; //驗證器
use Image;
/**
 * 
 */
class MerchandiseController extends Controller{

	//商品資料新增
	public function merchandiseCreateProcess(){
		//建立商品基本資訊
		$merchandise_data = [
			"status" => 'C',			//建立中
			"name" => '',				//商品名稱
			"name_en" => '',			//商品英文名稱
			"introduction" => '',		//介紹
			"introduction_en" => '',	//英文介紹
			"photo" => null,			//商品照片
			"price" => 0,				//價格
			"remain_count" => 0 		//商品剩餘數量
		];

		$Merchandise = Merchandise::create($merchandise_data);

		return redirect('/merchandise/'.$Merchandise->id.'/edit');
	}

	//商品單品編輯頁面檢視
	public function merchandiseItemEditPage($merchandise_id){
		//撈取商品資料
		$Merchandise = Merchandise::findOrFail($merchandise_id);

		if (!is_null($Merchandise->photo)){
			//設定商品照片網址
			$Merchandise->photo = url($Merchandise->photo);
		}

		$binding = [
			'title' => '編輯商品',
			'Merchandise' => $Merchandise
		];

		return view('merchandise.editMerchandise',$binding);
	}

	//商品單品資料修改
	public function merchandiseItemUpdateProcess($merchandise_id){
		//撈取商品資料
		$Merchandise = Merchandise::findOrFail($merchandise_id);
		//接收輸入資料
		$input = request()->all();

		//驗證規則
		$rules = [
			//商品狀態
			"status"=>[
				'required',
				'in:C,S'
			],
			//商品名稱
			"name"=>[
				'required',
				'max:80'
			],
			//商品英文名稱
			"name_en"=>[
				'required',
				'max:80'
			],
			//商品介紹
			"introduction"=>[
				'required',
				'max:2000'
			],
			//商品英文介紹
			"introduction_en"=>[
				'required',
				'max:2000'
			],
			//商品相片
			"photo"=>[
				'file',
				'image',
				'max:10240'
			],
			//商品價格
			"price"=>[
				'required',
				'integer',
				'min:0'
			],
			//商品剩餘數量
			"remain_count"=>[
				'required',
				'integer',
				'min:0'
			]
		];

		//驗證資料
		$validator = Validator::make($input,$rules);

		if ($validator->fails()){
			//資料驗證錯誤
			return redirect('/merchandise'.$Merchandise->id.'/edit')
				   ->withErrors($validator)
				   ->withInput();
		}

		if (isset($input['photo'])){
			//有上傳圖片
			$photo = $input['photo'];
			//檔案副檔名
			$file_extension = $photo->getClientOriginalExtension();
			//產生自訂隨機檔案名稱
			$file_name = uniqid().'.'.$file_extension;
			//檔案相對路徑
			$file_relative_path = 'images/merchandise/'.$file_name;
			//檔案存放目錄為對外公開 public 目錄下的相對位置
			$file_path = public_path($file_relative_path);
			//裁切圖片
			$image = image::make($photo)->resize(450,300)->save($file_path);
			//設定圖片檔案相對位置
			$input['photo'] = $file_relative_path;
		}

		$Merchandise->update($input);

		//重新導到商品編輯頁
		return redirect('/merchandise/'.$Merchandise->id.'/edit');
	}

	//商品管理清單檢視
	public function merchandiseManageListPage(){
		//每頁資料量
		$row_per_page = 10;
		//撈取商品分頁資料
		$MerchandisePaginate = Merchandise::OrderBy('created_at','desc')
		                       ->paginate($row_per_page);

		//設定商品圖片網址
		foreach ($MerchandisePaginate as $Merchandise) {
		   if (!is_null($Merchandise->photo)){
		   		//設定商品照片網址
		   		$Merchandise->photo = 'http://laravel.local/'.$Merchandise->photo;
				echo $Merchandise->photo;

		   }
		}                  

		$binding = [
			'title'=>'管理商品',
			'MerchandisePaginate'=>$MerchandisePaginate
		];

		return view('merchandise.manageMerchandise',$binding);
	}

	//商品清單檢視
	public function merchandiseListPage(){

	}
	//商品單品檢視
	public function merchandiseItemPage($Merchandise_id){

	}

	//購買商品
	public function merchandiseItemBuyProcess($Merchandise_id){

	}
}