<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    // ①（M)Product Modelを呼び出す
    // ②（C)ContorollerからBladeに渡す
    // ③（V)Bladeで表示する
    /**
     * 商品一覧を表示する
     * 
     * @return view
     */
    public function showList(Request $request)
    {
        $company_name = \DB::table('companies')->get();
        $products = Product::all();

        return view('product.list', compact('products','company_name'));
    }
    /**
     * 商品詳細画面を表示する
     * @param int $id
     * @return view
     */
    public function showDetail($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            \Session::flash('err_msg','データがありません。');
            return redirect(route('products'));
        }

        return view('product.detail',['product' => $product]);
    }

    /**
     * 商品登録画面を表示する
     * 
     * @return view
     */
    public function showCreate() 
    {
        $company_name = \DB::table('companies')->get();
        return view('product.form', compact('company_name'));
    }

    /**
     * 商品を登録する
     * 
     * @return view
     */
    public function exeStore(ProductRequest $request) 
    {
        //商品のデータを受け取る
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            //商品を登録
            product::create($inputs);
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            throw new \Exception($e -> getMessage());
        }
        \Session::flash('err_msg','商品を登録しました');
        return redirect(route('products'));
    }

    /**
     * 商品編集画面を表示する
     * @param int $id
     * @return view
     */
    public function showEdit($id)
    {
        $company_name = \DB::table('companies')->get();
        $product = Product::find($id);

        if (is_null($product)) {
            \Session::flash('err_msg','データがありません。');
            return redirect(route('products'));
        }

        return view('product.edit',compact('product','company_name'));
    }
    /**
     * 商品を更新する
     * 
     * @return view
     */
    public function exeUpdate(ProductRequest $request) 
    {
        //商品のデータを受け取る
        $inputs = $request->all();
        // $img = $request->file('image');
        // if(empty($img)){
        //     $img = $request->file('image')->getPathname();
            
        // }
    
        \DB::beginTransaction();
        try {
            //商品を更新
            $product = Product::find($inputs);
            // $product->fill([
            //     'product_name' => $inputs['product_name'],
            //     'company_id' => $inputs['company_id'],
            //     'price' => $inputs['price'],
            //     'stock' => $inputs['stock'],
            //     'comment' => $inputs['comment'],
            //     'image' => $inputs['img_path']
            // ]);
            $product = save();
            \DB::commit();
        } catch(\Throwable $e) {
            \DB::rollback();
            throw new \Exception($e -> getMessage());
        }
       
        \Session::flash('err_msg','商品を更新しました');
        return redirect(route('products'));
    }

    

    /**
     * 商品削除
     * 
     * @param int $id
     * @return view
     */

     public function exeDelete($id)
     {
         if (empty($id)){
             return false;
         }
         try {
             //商品を削除
             Product::destroy($id);
         } catch(\Throwable $e) {
            throw new \Exception($e -> getMessage());
         }

         \Session::flash('err_msg','商品を削除しました');
         return redirect(route('products'));
     }
}