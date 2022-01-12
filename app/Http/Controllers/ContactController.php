<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactSendmail;

class ContactController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::id())->first();

        $data = [
            'user' => $user,
        ];

        return view('contact.index', $data);
    }

    // public function confirm(Request $request)
    public function confirm(ContactRequest $request)
    {
        //フォームから受け取ったすべてのinputの値を取得
        $inputs = $request->all();
        $user = User::where('id', Auth::id())->first();

        //入力内容確認ページのviewに変数を渡して表示
        return view('contact.confirm', [
            'inputs' => $inputs,
            'user' => $user,
        ]);
    }

    public function send(ContactRequest $request)
    {
        $user = User::where('id', Auth::id())->first();

        $data = [
            'user' => $user,
        ];

        //フォームから受け取ったactionの値を取得
        $action = $request->input('action');

        //フォームから受け取ったactionを除いたinputの値を取得
        $inputs = $request->except('action');

        //actionの値で分岐
        if($action !== 'submit'){
            return redirect()
                ->route('contact.index')
                ->withInput($inputs);

        } else {
            //入力されたメールアドレスにメールを送信
            \Mail::to('to.do.sengen@gmail.com')->send(new ContactSendmail($inputs));

            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            //送信完了ページのviewを表示
            return view('contact.thanks', $data);
        }
    }

}
