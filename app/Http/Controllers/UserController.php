
<?php

// namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * ユーザー登録画面を表示する
     * 
     * @return view
     */
    public function getSignup()
    {
        return View('user.signup');
    }

    public function postSignup(Request $request){
        // バリデーション
        $this->validate($request,[
          'user_name' => 'required',
          'email' => 'email|required|unique:users',
          'password' => 'required|min:4',
        ]);
       
        // DBインサート
        $user = new User([
          'user_name' => $request->input('name'),
          'email' => $request->input('email'),
          'password' => bcrypt($request->input('password')),
        ]);
       
        // 保存
        $user->save();
       
        // リダイレクト
        return redirect()->route('user.');
      }
}
