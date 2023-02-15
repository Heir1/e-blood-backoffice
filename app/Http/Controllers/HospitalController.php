<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\Hospital;
use App\Models\Stock;
use App\Models\Bloodbag;
use App\Models\Stocktrace;
use App\Models\Productprice;
use App\Models\Cart;

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
    
    
            $hospital = Hospital::where('hospital_email',$request->input('email'))->first();
    
            if(!$hospital || !Hash::check($request->input("password"), $hospital->hospital_password)){
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

    public function editprofile($id){
        try {
            //code...
            $hospital = Hospital::find($id);
            return view("hospital.editprofile")->with("hospital",$hospital);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function updatepassword(Request $request, $id){
        try {
            //code...
            $this->validate($request, [
                'hospital_password' => 'required|string',
                'hospital_password1' => 'required|string'
            ]);

            $hospital = Hospital::find($id);
            
            $hospital->hospital_password = bcrypt($request->input("hospital_password"));
            $hospital->hospital_password1 = $request->input("hospital_password1");
            $hospital->password_status = 1;

            $hospital->update();

            return back()->with("status", "votre mot de passe a été mis à jour avec succès !!!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function productsprices(){
        try {
            //code...
            $productprices = Productprice::get();
            $increment = 1;

            return view("hospital.price")->with("productprices", $productprices)->with("increment", $increment);

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function addprice(){
        try {
            //code...
            $bloodbags = Bloodbag::where("price_status",0)->get();
            return view("hospital.addprice")->with("bloodbags", $bloodbags);
            
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function saveprice(Request $request){
        try {
            //code...
            $this->validate($request, [
                'designation' => 'required|string|unique:productprices,designation',
                'price' => 'required|integer'
            ]);

            $productprice = new Productprice();
            $bloodbag = Bloodbag::where("designation",$request->input('designation'))->first();

            $productprice->designation = $request->input('designation');
            $productprice->price = $request->input('price');

            $productprice->save();

            $bloodbag->price_status = 1;
            $bloodbag->update();

            return redirect("hospital/prices")->with("status", "Le prix de votre produit a été fixé avec succès !!!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function editprice($id){
        try {
            //code...

            $productprice = Productprice::find($id);
            return view("hospital.editprice")->with("productprice", $productprice);

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function updateprice(Request $request, $id){
        
        try {
            //code...
            $this->validate($request, [
                'designation' => 'required|string',
                'price' => 'required|integer'
            ]);

            $productprice = Productprice::find($id);
            $productprice->price = $request->input('price');

            $stock = Stock::where("designation",$request->input('designation'))->first();
            
            if ($stock) {
                # code...
                $stock->bloodsprice = $request->input('price');
                $stock->update();
            }

            $productprice->update();

            return back()->with("status", "Le prix de votre produit a été modifier avec succès");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error",$th->getMessage());
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
    
            $productprice = Productprice::where("designation",$request->input('designation'))
            ->first();
    
            $stocktrace = new Stocktrace();
            $stocktrace->designation = $request->input('designation');
            $stocktrace->bloodsquantity = $request->input('bloodsquantity');
            $stocktrace->bloodsprice = $productprice->price;
            $stocktrace->hospital = Session::get("hospital")->hospital_name;
    
            $stock = Stock::where("designation",$request->input('designation'))
                          ->where("hospital", Session::get("hospital")->hospital_name)
                          ->first();
    
            if (!$stock) {
        
                $stock = new Stock();
                $stock->designation = $request->input('designation');
                $stock->bloodsquantity = $request->input('bloodsquantity');
                $stock->bloodsprice = $productprice->price;
                $stock->hospital = Session::get("hospital")->hospital_name;
                $stock->address = Session::get("hospital")->hospital_address;
                
                $stock->save();
                $stocktrace->save();

        
                return redirect("hospital/stocks")->with("status", "Le stock de sang a été ajouté avec succès !!! ");
    
            }
    
            $stocktrace->save();
            $stock->bloodsquantity = $stock->bloodsquantity + $request->input('bloodsquantity');
            $stock->update();
    
            return redirect("hospital/stocks")->with("status", "Le stock de sang a été mis à jour ajouté avec succès !!! ");
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
                // 'designation' => 'required|string',
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

    public function bloodbagsearch(Request $request){
        
        try {
            //code...
            $stocks = Stock::where("hospital","!=",Session::get("hospital")->hospital_name)->get();
            $increment = 1;
    
            return view("hospital.bloodbagsearch")->with("stocks",$stocks)->with("increment",$increment);       
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function addbloodbagtocart($id){
        try {
            //code...
            $bloodbag = Stock::find($id);
            
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($bloodbag);
    
            // point g et honte
    
            Session::put('cart', $cart);
            Session::put('topCart', $cart->items);
    
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function udateqty(Request $request, $id){
        try {
            //code...
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->updateQty($id, $request->qty);
    
            Session::put('cart', $cart);
            Session::put('topCart', $cart->items);
    
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function deletebloodbag($id){
        try {
            //code...

            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);
    
            Session::put('cart', $cart);
            Session::put('topCart', $cart->items);
    
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function bloodbagcart(){
        try {
            //code...
            return view("hospital.cart");
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());   
        }
    }

    public function pay(Request $request){
        try {
            //code...
            $response = Http::post('http://marchand.maishapay.online/payment/vers1.0/merchant/checkout', [
    
                'gatewayMode' => 1,
                'role' => 'Privacy Consultant',
    
                'publicApiKey' => 'MP-LIVEPK-$1oOa5uuIor0y.1WdiPi1b5eW7em3$S1qqecrO1eit$0XKjFEPVNCslV/gn0$buQa$FRC2$yPy7csObk.az.2WEKBC2w5oneUMJI1pygJIHH20TqmBiVIr3a',
    
                'secretApiKey' => 'MP-LIVEPK-zaXken$$RxLKOJ0VKgoqU1cKFmB2q$lDk3x19sQBLrM0gxJnr10VFlD.M/yT.FyJvNAgqAB1ewwIypDjQVg90hiCQ6I2GecaEdig1Iq1$ylevK$ff5h$Qssz',
    
                'transactionReference' => 'ABCD',
                'montant' => 100,
                'devise' => "USD",
                'customerFullName' => 'John doe',
                'customerPhoneNumber' => '',
                'customerEmailAddress' => '',
                'chanel' => 'MOBILEMONEY',
                'provider' => 'MPESA',
                'walletID' => '+243824754958',
                'callbackUrl' => 'http://127.0.0.1:8000/hospital/bloodbagsearch'
            ]);
    
            return $response;
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }
}


// https://onlinecode.org/laravel-how-to-prevent-browser-back-button-after-user-logout-2/
// https://larainfo.com/blogs/laravel-9-rest-api-image-upload-with-validation-example

// <?php
  
// namespace App\Http\Controllers;
  
// use Illuminate\Http\Request;
// use App\Models\User;
  
// class ProductController extends Controller
// {
//     /**
//      * Write code on Method
//      *
//      * @return response()
//      */
//     public function index(Request $request)
//     {
//         $lat = 51.0258751;
//         $lon = 4.4775352;
//         User::select("users.id"
//                 ,DB::raw("6371 * acos(cos(radians(" . $lat . ")) 
//                 * cos(radians(users.lat)) 
//                 * cos(radians(users.lon) - radians(" . $lon . ")) 
//                 + sin(radians(" .$lat. ")) 
//                 * sin(radians(users.lat))) AS distance"))
//                 ->groupBy("users.id")
//                 ->get();
  
//         dd("Users get successfully.");
//     }
// }

// Location::selectRaw("ST_Distance_Sphere(
//     Point(9.7689164, 45.5695319), 
//     Point(lng, lat)
// ) * ? as distance", [1000])
// ->whereRaw("ST_Distance_Sphere( 
//     Point(9.7689164, 45.5695319), 
//     Point(lng, lat)
//  ) <  ? ", 50000)
// ->get();