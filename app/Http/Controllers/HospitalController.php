<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Hospital;
use App\Models\Stock;
use App\Models\Bloodbag;
use App\Models\Stocktrace;

class HospitalController extends Controller
{
    //

    public function viewhospitallogin(){
        try {
            //code...
            return view("hospital.hospitallogin");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function connect(Request $request){

        try {
            //code...
            $this->validate($request, [
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
    
    
            $hospital = Hospital::where('hospital_email',$request->input('email'))->where('hospital_password',$request->input('password'))->first();
    
            if(!$hospital){
                return back()->with("error", "Mauvais email ou mot de passe");
            }
    
            Session::put("hospital", $hospital);
            return redirect('hospital/hospitaldashboard');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function hospitallogout(){
        try {
            //code...
            Session::forget("hospital");
            return redirect("hospital/hospitallogin");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function hospitaldashboard(){
        try {
            //code...
            return view("hospital.hospitaldashboard");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function viewstocks(){
        try {
            //code...
            $stocks = Stock::where("hospital",Session::get('hospital')->hospital_name)->get();
            $increment = 1;
            return view('hospital.stock')->with('stocks', $stocks)->with('increment', $increment);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function viewstocktrace(){
        try {
            //code...
            $stocktraces = Stocktrace::where("hospital",Session::get('hospital')->hospital_name)->get();
            $increment = 1;
            return view('hospital.stocktrace')->with('stocktraces', $stocktraces)->with('increment', $increment);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function addstock(){
        try {
            //code...
            $bloodbags = Bloodbag::get();
            return view("hospital.addstock")->with("bloodbags", $bloodbags);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function savestock(Request $request){

        try {
            //code...
            $this->validate($request, [
                'designation' => 'required|string',
                'bloodsquantity' => 'required|integer'
            ]);
    
            $bloodbag = Bloodbag::where("designation",$request->input('designation'))
            ->first();
    
            $stocktrace = new Stocktrace();
            $stocktrace->designation = $request->input('designation');
            $stocktrace->bloodsquantity = $request->input('bloodsquantity');
            $stocktrace->bloodsprice = $bloodbag->price;
            $stocktrace->hospital = Session::get("hospital")->hospital_name;
    
            $stock = Stock::where("designation",$request->input('designation'))
                          ->where("hospital", Session::get("hospital")->hospital_name)
                          ->first();
    
            if (!$stock) {
        
                $stock = new Stock();
                $stock->designation = $request->input('designation');
                $stock->bloodsquantity = $request->input('bloodsquantity');
                $stock->bloodsprice = $bloodbag->price;
                $stock->hospital = Session::get("hospital")->hospital_name;
                
                $stock->save();
                $stocktrace->save();

        
                return back()->with("status", "Le stock de sang a été ajouté avec succès !!! ");
    
            }
    
            $stocktrace->save();
            $stock->bloodsquantity = $stock->bloodsquantity + $request->input('bloodsquantity');
            $stock->update();
    
            return back()->with("status", "Le stock de sang a été mis à jour ajouté avec succès !!! ");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function editquantity($id){
        try {
            //code...
            $stocktrace = Stocktrace::find($id);
    
            if($stocktrace && ($stocktrace->hospital == Session::get('hospital')->hospital_name)){
                return view("hospital.editquantity")->with("stocktrace",$stocktrace);
            }
    
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function updatestockquantity(Request $request, $id){
        try {
            //code...
            $this->validate($request, [
                'designation' => 'required|string',
                'bloodsquantity' => 'required|integer'
            ]);
    
            $stocktrace = Stocktrace::find($id);
            $stock = Stock::where('designation', $stocktrace->designation)->first();
    
            $stock->bloodsquantity = ($stock->bloodsquantity - $stocktrace->bloodsquantity) + $request->input('bloodsquantity');
            $stocktrace->bloodsquantity = $request->input('bloodsquantity');
    
            $stock->update();
            $stocktrace->update();
    
            return back()->with("status", "La quantité de stock de sang a été mise à jour ajouté avec succès !!! ");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function deletequantity($id){
        try {
            //code...
            $stocktrace = Stocktrace::find($id);
            $stock = Stock::where('designation', $stocktrace->designation)->first();
    
            if($stock->bloodsquantity >= $stocktrace->bloodsquantity){
    
                $stock->bloodsquantity = $stock->bloodsquantity - $stocktrace->bloodsquantity;
                $stock->update();
                $stocktrace->delete();
    
                return back()->with("status", "La quantité de stock de sang a été supprimée avec succès !!! ");
    
            }
    
            return back()->with("error", "La quantité que vous essayez de supprimer est supérieur au stock");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }
}


// https://onlinecode.org/laravel-how-to-prevent-browser-back-button-after-user-logout-2/
// https://larainfo.com/blogs/laravel-9-rest-api-image-upload-with-validation-example