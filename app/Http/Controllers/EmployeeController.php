<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

    

        $data= Employee::paginate(5);
        return view('employee')->with('mains',$data);
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
        $task=new Employee;
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'company' => 'required',
            'email' => 'required|unique:employees',
            'phone' => 'required',
            

        ]);

        
        $task->fname =$request->fname;
        $task->lname =$request->lname;
        $task->company =$request->company;
        $task->email =$request->email;
        $task->phone =$request->phone;

        
        $task->save();
        $request->session()->flash('alert-success', 'employee successful added!');
         return redirect()->route("emp.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task=Employee::find($id);
        
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
    {   $data2= Company::all();
        $data= Employee::find($id);
       
        return view('editemp')->with('mains',$data)->with('mains2',$data2);
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
            'fname' => 'required',
            'lname' => 'required',
            'company' => 'required',
            'email' => 'required',
            'phone' => 'required',
            

        ]);


        $data=Employee::find($id);

        $data->fname =$request->fname;
        $data->lname =$request->lname;
        $data->company =$request->company;
        $data->email =$request->email;
        $data->phone =$request->phone;
        $data->save();
        $request->session()->flash('alert-success', 'employee successful updated!');
        return redirect()->route("emp.index");
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Employee::find($id);
        
        $task->delete();
        return redirect()->back();
    }


  




}
