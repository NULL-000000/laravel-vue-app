<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['articles.user', 'articles.likes', 'articles.tags']);
        $articles = $user->articles->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    //プロフィール編集画面
    public function edit(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.edit', ['user' => $user]);
    }

    //プロフィール編集処理
    public function update(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();
        $all_request = $request->all();

        if (isset($all_request['image'])) {
            $profile_image = $request->file('image');
            $upload_info = Storage::disk('s3')->putFile('image', $profile_image, 'public');
            $all_request['image'] = Storage::disk('s3')->url($upload_info);
        }

        Validator::make($request->all(), [
            'name' => 'required|string|unique:users|min:3|max:15',
        ])->validate();

        $user->fill($all_request)->save();

        return redirect()->route('users.show', ["name" => $user->name]);
    }

    //メールアドレス編集画面表示
    public function editEmail(string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->password === null) {
            return
                redirect()->route('users.password.create', ["name" => $user->name])
                ->with('status', 'SNSログインをご利用の方はパスワード未設定のため、パスワードの設定をお願いします。');
        }

        return view('users.email_edit', ['user' => $user]);
    }

    //メールアドレス編集処理
    public function updateEmail(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->email !== $request->email) {
            $user->email_verified_at = null;
            $user->email = $request->email;
        }

        Validator::make($request->all(), [
            'email' => 'required|string|unique:users|max:255',
        ])->validate();

        $user->save();

        return redirect()->route('users.edit', ["name" => $user->name])->with('status', 'メールアドレスを変更しました。');
    }

    //パスワード設定画面
    public function createPassword(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.password_create', ['user' => $user]);
    }

    public function storePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.edit', ["name" => $user->name])->with('status', 'パスワードを設定しました。');
    }

    //パスワード編集画面
    public function editPassword(string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->password === null) {
            return
                redirect()->route('users.password.create', ["name" => $user->name])
                ->with('status', 'SNSログインをご利用の方はパスワード未設定のため、パスワードの設定をお願いします。');
        }

        return view('users.password_edit', ['user' => $user]);
    }

    //パスワード編集処理
    public function updatePassword(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        //現在のパスワードが合っているかチェック
        if(!(Hash::check($request->current_password, $user->password)))
        {
            return redirect()->back()
                ->withInput()->withErrors(['current_password' => '現在のパスワードが違います']);
        }

        //現在のパスワードと新しいパスワードが違うかチェック
        if($request->current_password === $request->password)
        {
            return redirect()->back()
                ->withInput()->withErrors(['password' => '現在のパスワードと新しいパスワードが変わっていません']);
        }

        // $this->passwordValidator($request->all())->validate();

        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.show', ["name" => $user->name]);
    }

    public function likes(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load(['likes.user', 'likes.likes', 'likes.tags']);

        $articles = $user->likes->sortByDesc('created_at');

        return view('users.likes', [
            'user' => $user,
            'articles' => $articles,
        ]);
    }

    public function followings(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followings.followers');

        $followings = $user->followings->sortByDesc('created_at');

        return view('users.followings', [
            'user' => $user,
            'followings' => $followings,
        ]);
    }

    public function followers(string $name)
    {
        $user = User::where('name', $name)->first()
            ->load('followers.followers');

        $followers = $user->followers->sortByDesc('created_at');

        return view('users.followers', [
            'user' => $user,
            'followers' => $followers,
        ]);
    }

    public function follow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);
        $request->user()->followings()->attach($user);

        return ['name' => $name];
    }

    public function unfollow(Request $request, string $name)
    {
        $user = User::where('name', $name)->first();

        if ($user->id === $request->user()->id)
        {
            return abort('404', 'Cannot follow yourself.');
        }

        $request->user()->followings()->detach($user);

        return ['name' => $name];
    }

    //ユーザーアカウント退会画面表示
    public function resign(string $name)
    {
        $user = User::where('name', $name)->first();

        return view('users.resign', ['user' => $user]);
    }

    //ユーザーアカウント削除する
    public function deleteData(Request $request)
    {
        $user = User::find($request->id);

        if (Auth::id() === $user->id) {
            $user->delete();
        }

        return $this->resigned($request, $user)
            ?: redirect($this->redirectPath());
    }

    //ユーザーアカウント退会完了画面表示
    protected function resigned()
    {
        return  view('users.resigned');
    }
}
