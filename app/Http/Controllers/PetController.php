<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Pet;
use Illuminate\Http\Request;
use App\DataTables\PetDataTable;
use Yajra\Datatables\Datatables;
use Yajra\DataTables\Html\Builder;
use View;
use Redirect;
use App\Imports\PetImport;
use Excel;


class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('pet.index') ;
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
        $input = $request->all();

        // dd($input);

        $pet = new Pet();
        $pet -> pet_name = $input['pet_name'];
        $pet -> age = $input['age'];
        $pet -> customer_id = $input['owner'];
        $customer = Customer::find($input['owner']);
        
        $fileName = time().$request->file('img_path')->getClientOriginalName();
        $path = $request->file('img_path')->storeAs('images', $fileName, 'public');
        $requestData["img_path"] = '/storage/'.$path;
        $pet->img_path = $requestData["img_path"];
        $pet -> customer()->associate($customer);

        $pet->save();

        // return Redirect::route('getPet')->with('success','Pet successfully created!');
        return redirect()->back()->with('success', 'Pet successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pet  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = Pet::get()->where('id',$id)->first();
        $custo = Customer::pluck('customer_name','id');
        return View::make('pet.edit',compact('pet','custo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::find($request->customer_id);

        $pet = Pet::find($id);

        $pet->pet_name = $request->pet_name;
        $pet->age = $request->age;
        $pet->customer_id = $request->customer_id;
        $pet->customer()->associate($customer);

        if($request->img_path != ''){        
            $path = public_path();
  
            //code for remove old file
            if($pet->img_path != ''  && $pet->img_path != null){
                 $file_old = $path.$pet->img_path;
                 unlink($file_old);
            }
  
            //upload new file
            $fileName = time().$request->file('img_path')->getClientOriginalName();
            $npath = $request->file('img_path')->storeAs('images', $fileName, 'public');
            $newimage = '/storage/'.$npath;
  
            //for update in tables
            $pet->update(['img_path' => $newimage]);
       }

        $pet->save();

        return Redirect::route('getPet')->with('success','Pet information updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $customer
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $pet = Pet::find($id);
        // $customer->user()->detach();
        // $user->delete();
        $pet->delete();


        
        return Redirect::route('getPet')->with('success','Pet deleted!');
    }

    public function getPet(PetDataTable $dataTable)
    {   
        // $customers =  Customer::all();
        // dd(Customer::all());'
        // dd($dataTable);
        
        // dd($customers);
        $custo = Customer::pluck('customer_name','id');
        //dd($custo);
        return $dataTable->render('pet.index', compact('custo'));
    }

    public function import(Request $request) {
        Excel::import(new PetImport, request()->file('pet_upload'));
        return redirect()->back()->with('success', 'Excel file Imported Successfully');

    }
}
