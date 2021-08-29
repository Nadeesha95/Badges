<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            
            $data= Company::paginate(5);
            return view('companies')->with('mains',$data);
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $task=new Company;
        $request->validate([
            'name' => 'required|max:50|min:2|unique:companies',
            'email' => 'required|email|unique:companies',
            'logo' => 'required',
            'website' => 'required|unique:companies'
            

        ]);
     
        $input = $request->all();
  
        if ($image = $request->file('logo')) {
            //$destinationPath = 'images';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            //$image->move(public_path($destinationPath), $profileImage);
           
         
          
            $input['logo'] = "$profileImage";
        }

        Company::create($input);

        $request->session()->flash('alert-success', 'Company successful added!');
         return redirect()->route("main.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=Company::find($id);
        
        $task->delete();
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data= Company::find($id);
       
        return view('editdash')->with('mains',$data);
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
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            
            'website' => 'required'
            

        ]);
        
        $data=Company::find($id);

        $data->name =$request->name;
        $data->email =$request->email;



        if ($request->logo) {

           
            $logo = $request->logo;
               
            if ($image = $request->file('logo')) {
                $destinationPath = '/images';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $profileImage);
               
             
              
                $input['logo'] = "$profileImage";
            }

            $data->logo =$logo;
        }
         

        $data->website =$request->website;
        
        $data->save();
        $request->session()->flash('alert-success', 'company successful updated!');
        return redirect()->route("main.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $task=Company::find($id);
        
        $task->delete();
        return redirect()->back();
    }
}
