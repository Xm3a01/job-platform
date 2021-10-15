<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Language;
use App\Helper\Translate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbaord\User\LanguageRequest;

class LanguageController extends Controller
{


    public function store(LanguageRequest $request)
    {
        $lang =  Language::create([
            'user_id' => \Auth::user()->id,
            'language'=>[
                'en' => $request->language ,
                'ar' => Translate::language[$request->language]
            ],
            // 'ar_language' => $request->ar_language,
            'language_level' => [
                'en' => $request->language_level ,
                'ar' => Translate::language_level[$request->language_level]
            ],
            // 'ar_language_level' => Translate::language_level[$request->language_level],


        ]);

        if($lang->save()) {
            \Session::flash('success' , __('Data saved successfully'));
           }
           return redirect()->route('web.mycv',app()->getLocale());
    }


    public function edit(Language $lang)
    {
        return view('dashboard.users.language_edit', compact('lang'));
    }


    public function update(Request $request,  Language $lang)
    {

        if($request->has('language') && $request->language !='') {
            $lang->language = [
                'en' => $request->language ,
                'ar' => Translate::language[$request->language]
            ];
        }

        if($request->has('language_level') && $request->language_level !='' ) {
            $lang->language_level = [
                'en' => $request->language_level ,
                'ar' => Translate::language_level[$request->language_level]
            ];
        }

        if($lang->save()){
            \Session::flash('success' , __('Data saved successfully'));
        }
        return redirect()->route('web.mycv',app()->getLocale());
    }

    public function destroy(Language $lang)
    {
        $lang->delete();
        \Session::flash('success' , __('Deleted successfully'));
        return redirect()->route('web.mycv');
    }
}
