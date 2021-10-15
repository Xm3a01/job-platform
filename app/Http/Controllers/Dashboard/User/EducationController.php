<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Special;
use App\Education;
use App\SubSpecial;
use App\Helper\Translate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashbaord\EductionRequest;

class EducationController extends Controller
{

    public function store(EductionRequest $request)
    {
          $education = Education::create([
              'user_id' => $request->user_id,
              'grade_date' => $request->grade_date,
              'grade' => $request->grade,
              'ar_university' =>$request->ar_university,
              'university' => ['en' => $request->university , 'ar' => $request->ar_university],
              'special_id' => $request->special_id,
              'ar_qualification' => Translate::qualification[$request->qualification],
              'qualification' => ['en' => $request->qualification ,
              'ar' => Translate::qualification[$request->qualification]],
          ]);

          if($education->save()) {
               \Session::flash('success' , __('Data saved successfully'));
              }
              return redirect()->route('web.mycv',app()->getLocale());
      }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Education $education)
    {
        $sub_specials = SubSpecial::all();
        $specials = Special::all();

        return view('dashboard.users.education_edit', compact(['education','sub_specials','specials']));
    }

    public function update(Request $request, Education $eduction)
    {

    if($request->has('qualification') && $request->qualification !='') {
        $eduction->qualification = $request->qualification;
        $eduction->ar_qualification = Translate::qualification[$request->qualification];
    }
    if($request->has('university')) {
        $eduction->university = $request->university;
    }

    if($request->has('ar_university')) {
        $eduction->ar_university = $request->ar_university;
    }

    if($request->has('grade_date')) {
        $eduction->grade_date = $request->grade_date;
    }

    if($request->has('grade')) {
        return $eduction->grade;
    }

        if($request->has('special_id')){
            $eduction->special_id = $request->sub_special;
        }

     if($eduction->save()){
          \Session::flash('success' , __('Data saved successfully'));
         }

         return redirect()->route('web.mycv');
      }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $eduction)
    {
        $eduction->delete();
        \Session::flash('success' , __('Deleted successfully'));
        return redirect()->route('web.mycv');
    }
}
