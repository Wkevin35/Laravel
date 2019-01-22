<?php
namespace App\Http\Controllers\transaction;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shop\Entity\Transaction;

class TransactionController extends Controller{

	public function transactionListPage(){
		// 取得會員資料
		$user_id = session()->get($this->USER.'.0.'.$this->USER_ID);

		//每頁資料量
		$row_per_page = 10;
		//撈取分頁資料
		$TransactionPaginate = Transaction::where('user_id',$user_id)
											->OrderBy('created_at','desc')
											->with('Merchandise')
											->paginate($row_per_page);

		//設定商品圖片網址
		foreach ($TransactionPaginate as $Transaction) {
			if (!is_null($Transaction->Merchandise->photo)){
				$Transaction->Merchandise->photo = url($Transaction->Merchandise->photo);
			}
		}

		$binding=[
			'title'=>trans('shop.transaction.list'),
			'TransactionPaginate'=>$TransactionPaginate,
		];

		return view('transaction.listUserTransaction',$binding);
	}
}
