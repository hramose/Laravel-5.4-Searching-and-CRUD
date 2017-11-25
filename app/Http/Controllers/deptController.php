<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Dept;
class DeptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $depts=Dept::paginate(3);
        return view('depts.index')->withDepts($depts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       // 
        return view('depts.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validate the data
        $this->validate($request ,[
          'departmentId' => 'required | max:6 | min:3',
          'departmentName' => 'required | max:50  | min:5',
          'description' => 'required | max:150 | min: 10',
         
            ]);

        //store data to the database
        $dept =new Dept;
        $dept->departmentId=$request->departmentId;
        $dept->departmentName=$request->departmentName;
        $dept->description=$request->description;
        $dept->save();

         //session for success msg
       session()->flash('addmessage','Successfully Added');



        //redirect to another page
        return redirect('depts');
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
        $dept=Dept::find($id);
        return view('depts.edit',compact('dept'));
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
        //validate the data
        $this->validate($request ,[
          'departmentId' => 'required | max:6 | min:5',
          'departmentName' => 'required | max:50  | min:5',
          'description' => 'required | max:150 | min: 10',
         
            ]);

        //store data to the database
        $dept =Dept::find($id);
        $dept->departmentId=$request->departmentId;
        $dept->departmentName=$request->departmentName;
        $dept->description=$request->description;
        $dept->save();

         //session for success msg
       session()->flash('addmessage','Successfully updated');



        //redirect to another page
        return redirect('depts');
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
        $dept=Dept::find($id);
        $dept->delete();

        //session for success msg
       session()->flash('addmessage','Successfully deleted');

         return redirect('depts');
    }


    //Searching functionality

    public function search () {

    $q = Input::get ( 'q' );

    if($q != ""){

    $depts = Dept::where ( 'departmentId', 'LIKE', '%' . $q . '%' )->orWhere('departmentName', 'LIKE', '%' . $q . '%' )->paginate (3)->setPath ( '' );


    $pagination = $depts->appends (array(
                'q' => Input::get ( 'q' ) 
        ));


    if ( count ( $depts ) > 0)
        return view ( 'depts.search' )->withDetails ( $depts )->withQuery ( $q );
                }
        return view ( 'depts.search' )->withMessage ( 'No Records found.Please try again' );
                          

          }




}
