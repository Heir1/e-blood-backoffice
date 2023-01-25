<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class AdminController extends Controller
{
    //

    public function viewadmin(){
        return view("admin.dashboard");
    }

    public function viewhospital(){

        $hospitals = Hospital::get();
        $increment = 1;

        return view("admin.hospitals")->with("hospitals", $hospitals)->with("increment", $increment);

    }

    public function addhospital(){
        return view("admin.addhospital");
    }

    public function ajouterhopital(Request $request){

        $this->validate($request, [
            'hospital_name' => 'required|string',
            'hospital_address' => 'required|string',
            'hospital_email' => 'required|string|unique:hospitals,hospital_email',
            'hospital_phone' => 'required|string',
            'hospital_password' => 'required|string'
        ]);

        $hospital = new Hospital();

        $hospital->hospital_name = $request->input('hospital_name');
        $hospital->hospital_address = $request->input('hospital_address');
        $hospital->hospital_email = $request->input('hospital_email');
        $hospital->hospital_phone = $request->input('hospital_phone');
        $hospital->hospital_password = $request->input('hospital_password');

        $hospital->save();

        return back()->with("status", "L'hopital a été créé avec succès !!!");

    }

    public function edithospital($id){

        $hospital = Hospital::find($id);
        return view("admin.edithospital")->with("hospital",$hospital);

    }

    public function updatehospital(Request $request, $id){
        
        $this->validate($request, [
            'hospital_name' => 'required|string',
            'hospital_address' => 'required|string',
            'hospital_email' => 'required|string',
            'hospital_phone' => 'required|string',
            'hospital_password' => 'required|string'
        ]);

        $hospital = Hospital::find($id);
        $hospital->update($request->all());

        return back()->with("status", "L'hopital a été mis à jour avec succès !!!");
    }

    public function deletehospital($id){

        $hospital = Hospital::find($id);
        $hospitalname = $hospital->hospital_name;
        $hospital->delete();

        return back()->with("status", "L'hopital ".$hospitalname." a été supprimé à jour avec succès !!!");
    }
}
