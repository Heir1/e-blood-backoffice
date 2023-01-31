<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Hospital;
use App\Models\Bloodbag;
use App\Models\Stock;
use App\Models\Stocktrace;
use App\Models\Giftprogram;

class AdminController extends Controller
{
    //

    public function viewloginpage(){
        try {
            //code...
            return view("admin.login");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function connect(Request $request){

        try{
            $this->validate($request, [
                'email' => 'required|string',
                'password' => 'required|string',
            ]);
    
    
            $user = User::where('email',$request->input('email'))->where('password',$request->input('password'))->first();
    
            if(!$user){
                return back()->with("error", "Mauvais email ou mot de passe");
            }
    
            Session::put("user", $user);
            return redirect('admin/dashboard');
    
        }
        catch(\Throwable $th){
            return back()->with("error", $th->getMessage());
        }

    }

    public function adminlogout(){
        try {
            //code...
            Session::forget("user");
            return redirect("admin/login");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function viewadmindashboard(){
        try {
            //code...
            return view("admin.dashboard");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function viewhospitals(){
        try {
            //code...
            $hospitals = Hospital::get();
            $increment = 1;
    
            return view("admin.hospitals")->with("hospitals", $hospitals)->with("increment", $increment);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function addhospital(){
        try {
            //code...
            return view("admin.addhospital");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function savehospital(Request $request){

        try {
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
    
        } catch (\Throwable $th) {
            return back()->with("error", $th->getMessage());
        }

    }

    public function edithospital($id){
        try {
            //code...
            $hospital = Hospital::find($id);
            return view("admin.edithospital")->with("hospital",$hospital);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function updatehospital(Request $request, $id){
        
        try {
            //code...
            $this->validate($request, [
                'hospital_name' => 'required|string',
                'hospital_address' => 'required|string',
                'hospital_email' => 'required|string',
                'hospital_phone' => 'required|string',
                'hospital_password' => 'required|string'
            ]);

            $hospital = Hospital::find($id);
            
            $stock = Stock::where("hospital",$hospital->hospital_name)->first();
            $stocktrace = Stocktrace::where("hospital",$hospital->hospital_name)->first();
            
            if($stock){
                $stock->hospital = $request->input("hospital_name");
                $stocktrace->hospital = $request->input("hospital_name");
                $stock->update();
                $stocktrace->update();
            }

            
            $hospital->update($request->all());

            return back()->with("status", "L'hopital a été mis à jour avec succès !!!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function deletehospital($id){
        
        try {
            //code...
            $hospital = Hospital::find($id);
            $hospitalname = $hospital->hospital_name;
            $hospital->delete();
    
            return back()->with("status", "L'hopital ".$hospitalname." a été supprimé à jour avec succès !!!");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function bloodbags(){

        try {
            //code...
            $bloodbags = Bloodbag::get();
            $increment = 1;
            return view("admin.bloodbags")->with("bloodbags",$bloodbags)->with("increment",$increment);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function addbloodbag(){
        try {
            //code...
            return view("admin.addbloodbag");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function createbloodsbag(Request $request){
        try {
            //code...
            $this->validate($request, [
                'designation' => 'required|string|unique:bloodbags,designation',
                'bloodsprice' => 'required|integer',
            ]);
    
            $bloodbag = new Bloodbag();
            $bloodbag->designation = $request->input('designation');
            $bloodbag->price = $request->input('bloodsprice');
    
            $bloodbag->save();
    
            return back()->with("status", "La poche de sang a été créée avec succès !!!");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function editbloodbag($id){
        try {
            //code...
            $bloodbag = Bloodbag::find($id);
    
            return view("admin.editbloodbag")->with("bloodbag", $bloodbag);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function updatebloodsbag(Request $request, $id){
        try {
            //code...
            $this->validate($request, [
                'designation' => 'required|string',
                'price' => 'required|integer',
            ]);
    
            $bloodbag = Bloodbag::find($id);
            $stocks = Stock::where('designation',$bloodbag->designation)->get();
    
            foreach($stocks as $stock){
                $stock->designation = $request->input('designation');
                $stock->bloodsprice = $request->input('price');
                $stock->update();
            }
    
            $bloodbag->update($request->all());
    
            return back()->with("status", "La poche de sang a été modifiée avec succès !!!");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function deletebloodbag($id){
        try {
            //code...
            $bloodbag = Bloodbag::find($id);
            $bloodbag->delete();
    
            return back()->with("status", "La poche de sang a été supprimée avec succès !!!");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function viewstocks(){
        try {
            //code...
            $stocks = Stock::get();
            $increment = 1;
            return view('admin.stock')->with('stocks', $stocks)->with('increment', $increment);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function viewstocktrace(){
        try {
            //code...
            $stocktraces = Stocktrace::get();
            $increment = 1;
            return view('admin.stocktrace')->with('stocktraces', $stocktraces)->with('increment', $increment);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function bloodgiftprogram(){
        try {
            //code...
            $increment = 1;
            $giftprograms = Giftprogram::get();

            return view('admin.bloodgiftprogram')->with("giftprograms", $giftprograms)->with("increment", $increment);

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function addbloodgift(){
        try {
            //code...
            return view("admin.addbloodgiftprogram");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function savebloodgiftprogram(Request $request){
        
        try {

            //code...
            $fields = $request->validate([
                'dateandhour' => 'required|string',
                'campname' => 'required|string'
            ]);
    
            $giftprogram = Giftprogram::create([
                'dateandhour' => $fields['dateandhour'],
                'campname' => $fields['campname'],
            ]);

            return back()->with("status", "Le programme de don de sangs a été ajouté avec succès !!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
        
    }

    public function editbloodgiftprogram($id){
        try {
            //code...
            $giftprogram = Giftprogram::find($id);
            return view("admin.editbloodgiftprogram")->with("giftprogram", $giftprogram);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function updatebloodgiftprogram(Request $request, $id){
        try {
            //code...
            $fields = $request->validate([
                'dateandhour' => 'required|string',
                'campname' => 'required|string'
            ]);

            $giftprogram = Giftprogram::find($id);
            $giftprogram->update($request->all());

            return back()->with("status", "Le programme de don de sangs a été mis à jour avec succès !!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function deletebloodgiftprogram($id){
        try {
            //code...
            $giftprogram = Giftprogram::find($id);
            $giftprogram->delete();

            return back()->with("status", "Le programme de don de sangs a été supprimé avec succès !!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }
}
