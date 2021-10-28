<?php

namespace App\Http\Controllers;

use App\Models\CarData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cars = CarData::latest()->paginate(10);

        return view('bbs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
                ['image' => 'required',
            ]);

            $fileName = null;

            if($request->hasFile('image')){
                $fileName = time().'_'.
                    $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('public/images', $fileName);
            }

            $input = array_merge($request->all(),
                                        ['user_id'=>Auth::user()->id]);

            if($fileName){
                $input = array_merge($input, ['image'=>$fileName]);
            };

            CarData::create($input);

            return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cars.show');
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
