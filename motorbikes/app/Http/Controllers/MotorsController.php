<?php

namespace App\Http\Controllers;

use App\Models\Motors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','store','edit','update','destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sort=$request->input('sort','created_at');
        $search=$request->input('search',null);

        if($search==null){

            return view('ware.index',[
                'motors' => Motors::orderBy($sort,'desc')->paginate(5),
                'sort'=>$sort,
                'search'=>null,
            ]);
        }else{

            return view('ware.index',[
                'motors' => Motors::where('color','like',"%{$search}%")->orderBy($sort,'desc')->paginate(5),
                'sort'=>$sort,
                'search'=>$search,
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ware.create');
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
            'company' => 'required',
            'kind' => 'required|min:3|max:50',
            'color' => 'required|min:3|max:50',
            'weight' => 'required',
            'price' => 'required',
            'image' => ['required','mimes:jpg,png,jpeg','max:5048'],
        ]);

        Motors::create([
            'company' => $request->company,
            'kind' => $request->kind,
            'color' => $request->color,
            'weight' => $request->weight,
            'price' => $request->price,
            'image' => $this->storeImage($request),
            'user_id'=> Auth::user()->id,
        ]);
        return redirect()->back()->with('message',["status"=>'success','msg'=>'Ware has Inserted']);
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
        return view('ware.show',[
            'motor' => Motors::findOrFail($id)
        ]);

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
        return view('ware.edit',[
            'motor' => Motors::where('id',$id)->first()
        ]);
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
        $request->validate([
            'company' => 'required',
            'kind' => 'required|min:3|max:50',
            'color' => 'required|min:3|max:50',
            'weight' => 'required',
            'price' => 'required',
            'image' => ['mimes:jpg,png,jpeg','max:5048'],
        ]);

        Motors::where('id',$id)->update([
            'company' => $request->company,
            'kind' => $request->kind,
            'color' => $request->color,
            'weight' => $request->weight,
            'price' => $request->price,
            'image' => ($request->image==null)?Motors::where('id',$id)->first()->image:$this->storeImage($request),
            'user_id'=> Auth::user()->id,
        ]);

        return redirect()->back()->with('message',["status"=>'success','msg'=>'Ware has updated']);

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
        Motors::destroy($id);

        return redirect()->back()->with('message',["status"=>'success','msg'=>'Ware has deleted']);
        //return redirect()->back()->with('success','Ware has deleted');
    }

    public function storeImage($request){
        $newImageName = uniqid().'-'.time().'.'.$request->image->extension();

        return $request->image->move(public_path('images'),$newImageName);
    }
}
