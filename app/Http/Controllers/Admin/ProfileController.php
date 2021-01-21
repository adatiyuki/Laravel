<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\profile;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }

    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();

        unset($form['_token']);


        $profile->fill($form);
        $profile->save();

        return redirect('admin/profile/create');
    }
    
    public function index(Request $request)
    {
        $cond_title =$request->cond_title;
        if ($cond_title !=''){
            //検索されたら検索結果を所得する
            $posts =Profile::where('title',$cond_title)->get();
        }else{
            //それ以外所得
            $posts = Profile::all();
        }
        return view('admin.profile.index',['posts' => $posts, 'cond_title' => $cond_title]);
    }


    public function edit(REquest $request)
    {
        $profile =Profile::find($request->id);
        if (empty($profile)){
            abort(404);
        }
        return view('admin.profile.edit',['profile_form' => $profile]);
    }

    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = Profile::find($request->id);
        $profile_form = $request->all();
        unset($profile_form['_token']);
        $profile->fill($profile_form)->save();
        return redirect('admin/profile/');
    }
    //以下を追加
    public function delete(Request $request)
    {
        //該当するNews Modelを所得
        $profile = Profile::find($request->id);
        //削除する
        $profile->delete();
        return redirect('admin/profile/');
    }
}

