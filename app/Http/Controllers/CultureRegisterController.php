<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests;

class CultureRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "ddd";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo "dddd";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        printf("dddddddddddddddddd");
//        $a = $request -> get("formData");
//        console_log("hhhhhhhhhhhhhhhhhhh");
//        $validator = Validator::make($request->all(),
//        [
//            'file' => 'image',
//        ],
//        [
//            'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
//        ]);
//        $validator = Validator::make($request,
//            [
//                'file' => 'image',
//            ],
//            [
//                'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
//            ]);

         /*$extension = $request->file('file')->getClientOriginalExtension(); // getting image extension*/
 //         $dir = 'D:\SmartDocent\public\upload';
  //        $filename = uniqid() . '_' . time() . '.' .'jpg';
 //         $request->file('file')->move($dir, $filename);
        return response()->json('$request');
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
