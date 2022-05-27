<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies=Company::all();
        return view('admin.company.list',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'mimes:jpeg,jpg,png,gif|required|max:1000',
        ]);

        $file = $request->file('logo') ;
        $fileName = $file->getClientOriginalName() ;
        $destinationPath = public_path().'/images' ;
        $file->move($destinationPath,$fileName);
//        if($check){
//            dd($fileName);
//        }else{
//            dd('not worked');
//        }
        $company =  new Company();
        $company->name= $request->name;
        $company->email= $request->email;
        $company->logo= $fileName;
        $save=$company->save();
        if ($save) {
            return redirect()->back()->with('success', 'Company Created');
        } else {
            return redirect()->back()->with('fail', 'Something went wrong,Try Again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
