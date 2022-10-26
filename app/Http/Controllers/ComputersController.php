<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
use Symfony\Contracts\Service\Attribute\Required;

class ComputersController extends Controller
{

    //Array of static data
    /*private function getData(){
        return [
            ['id'=> 1, 'name'=>'LG', 'origin'=>'Korea'],
            ['id'=> 2, 'name'=>'HP', 'origin'=>'USA'],
            ['id'=> 3, 'name'=>'Siemens', 'origin'=>'Germany'],
            ['id'=> 4, 'name'=>'Lenovo', 'origin'=>'China'],
        ];
    }*/
   
    public function index()
    {
        return view ('computers.index', [

            'computers' => Computer::all()
        ]);
    }

    
    public function create()
    {
        return view ('computers.create');
    }

   
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required',
            'origin' => 'required',
            'price' => 'required | integer' 
        ]);

        $computer = new Computer();
        $computer-> name = strip_tags($request->name);
        $computer-> origin = strip_tags($request->origin);
        $computer-> price = strip_tags($request->price);
        $computer->save();

        return redirect()->route('computers.index');
    }

    
    public function show($computer)
    {        
        return view ('computers.show',[
            'computer'=> Computer::findorFail($computer)
        ]);
    }

    
    public function edit($computer)
    {
        return view ('computers.edit',[
            'computer'=> Computer::findorFail($computer)
        ]);
    }

    
    public function update(Request $request, $computer)
    {
        $request -> validate([
            'name' => 'required',
            'origin' => 'required',
            'price' => 'required | integer' 
        ]);

        $to_update = Computer::find($computer);
        $to_update-> name = strip_tags($request->name);
        $to_update-> origin = strip_tags($request->origin);
        $to_update-> price = strip_tags($request->price);
        $to_update->save();

        return redirect()->route('computers.show', $computer);
    }

    public function destroy($computer)
    {
        $to_delete = Computer::find($computer);
        $to_delete->delete();
        return redirect()->route('computers.index');
    }
}
