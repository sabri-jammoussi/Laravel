<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;
class ComputerController extends Controller
{   
    //array of static data 
    // private static function getData(){
    //     return [
    //         ['id'=> 1, 'name' => 'LG','origin'=>'Koria'],
    //         ['id'=> 2, 'name' => 'Wallys','origin'=>'Tunisia'],
    //         ['id'=> 3, 'name' => 'Asus','origin'=>'France'],
    //     ];
    // }




  //--------------------------------------------------------------
    public function index()
    {
        return view('computers/index',['computers'=> Computer::all ()  ]);
    }

    //-------------------------------------------------------------
    public function create()
    {
        return view('computers/create');
    }

   //-------------------------------------------------------------
    public function store(Request $request)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required','integer'],
        ]);
        
       $computer= new Computer(); //tisna3 new instance men models/computer 
        $computer->name = strip_tags($request->input('computer-name'));//computer-name jibneha men create.php name mta3 el input 
        $computer->origin = strip_tags($request->input('computer-origin'));
        $computer->price = strip_tags($request->input('computer-price'));
        $computer->save();
        //strip_tags bech tokbel ken el chaine de caractère 

        return redirect()->route('computers.index'); //bech treja3ni lil page index
    }

   //-------------------------------------------------------------
    public function show($computer) 
    // $computer hiya el id
    {
        $index=Computer::findOrFail($computer);
//$index = array_search($computer, array_column($computers, 'id'));
        // if($index === false ){
        //     abort(404);
        // }
        return view('computers/show', [
            'computer' =>$index
        ]);
    }

   //-------------------------------------------------------------
    public function edit($computer)
    {
        return view('computers/edit',[
            'computer' => Computer::findOrFail($computer)
        ]);
    }

 //-------------------------------------------------------------
    public function update(Request $request, $computer)
    {
        $request->validate([
            'computer-name' => 'required',
            'computer-origin' => 'required',
            'computer-price' => ['required','integer'],
        ]);
        $to_update = Computer::findOrFail($computer);
        // $to_update = new Computer(); //tisna3 new instance men models/computer 
        $to_update ->name = strip_tags($request->input('computer-name'));//computer-name jibneha men create.php name mta3 el input 
        $to_update ->origin = strip_tags($request->input('computer-origin'));
        $to_update ->price = strip_tags($request->input('computer-price'));
        $to_update ->save();
        //strip_tags bech tokbel ken el chaine de caractère 

        return redirect()->route('computers.show',$computer); //bech treja3ni lil page index
    }

 //-------------------------------------------------------------
    public function destroy($computer)
    {
        $to_delete = Computer::findOrFail($computer);
        $to_delete->delete();
        return redirect()->route('computers.index');
    }
}
