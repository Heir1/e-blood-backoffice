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
use App\Models\Order;
use App\Models\Invoice;

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
                'email' => 'required|email',
                'password' => 'required|string',
            ]);
    
    
            $hospital = Hospital::where('hospital_email',$request->input('email'))->first();
    
            if(!$hospital || !Hash::check($request->input("password"), $hospital->hospital_password)){
                return back()->with("error", "Mauvais email ou mot de passe");
            }
    
            Session::put("hospital", $hospital);

            if($hospital->status == 0) return redirect('hospital/editprofile/'.$hospital->id);

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

            if(Session::get('hospital')->id != $id) return back();

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
                'latitude' => 'required|string',
                'longitude' => 'required|string',
            ]);

            $hospital = Hospital::find($id);
            
            $hospital->hospital_password = bcrypt($request->input("hospital_password"));
            $hospital->latitude = $request->input("latitude");
            $hospital->longitude = $request->input("longitude");

            $hospital->update();

            Session::put('hospital',$hospital);

            return back()->with("status", "votre mot de passe a été mis à jour avec succès !!!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function productsprices(){
        try {
            //code...
            $productprices = Productprice::where('hospital',Session::get('hospital')->hospital_name)->get();
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
            $bloodbags = Bloodbag::get();
            $productprices = Productprice::where("hospital",Session::get('hospital')->hospital_name)->get();

            $bloodbags1 = array();

            if(count($productprices) > 0){
                foreach ($bloodbags as $bloodbag) {
                    foreach ($productprices as $productprice) {
                        if($bloodbag->designation != $productprice->designation){
                            array_push($bloodbags1, $bloodbag->designation);
                        }
                    }
                }
                $count = 1;
                return view("hospital.addprice")->with("bloodbags1", $bloodbags1)->with("count", $count);
            }
            else{
                $count = 0;
                return view("hospital.addprice")->with("bloodbags", $bloodbags)->with("count", $count);
            }

            
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function saveprice(Request $request){
        try {
            //code...
            $this->validate($request, [
                'designation' => 'required|string',
                'price' => 'required|integer'
            ]);

            $productprice = new Productprice();
            $bloodbag = Bloodbag::where("designation",$request->input('designation'))->first();

            $productprice->designation = $request->input('designation');
            $productprice->price = $request->input('price');
            $productprice->hospital = Session::get('hospital')->hospital_name;

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

            $stock = Stock::where("designation",$request->input('designation'))->where("hospital",Session::get('hospital')->hospital_name)->first();
            
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
            $stocks = Stock::where("hospital",Session::get('hospital')->hospital_name)->where("bloodsquantity",">",0)
            ->orderBy("expirationdate", "asc")
            ->get();
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
                'bloodsquantity' => 'required|integer',
                'batchcode' => 'required|string',
                'collectiondate' => 'required|date',
                'expirationdate' => 'required|date|after_or_equal:collectiondate',
            ]);
    
            $productprice = Productprice::where("designation",$request->input('designation'))->where("hospital",Session::get('hospital')->hospital_name)
            ->first();
    
            $stocktrace = new Stocktrace();
            $stocktrace->designation = $request->input('designation');
            $stocktrace->bloodsquantity = $request->input('bloodsquantity');
            $stocktrace->bloodsprice = $productprice->price;
            $stocktrace->hospital = Session::get("hospital")->hospital_name;
            $stocktrace->batchcode = $request->input('batchcode');
            $stocktrace->collectiondate = $request->input('collectiondate');
            $stocktrace->expirationdate = $request->input('expirationdate');
    
            $stock = Stock::where("designation",$request->input('designation'))
                          ->where("batchcode",$request->input('batchcode'))
                          ->where("hospital", Session::get("hospital")->hospital_name)
                          ->first();
    
            if (!$stock) {
        
                $stock = new Stock();
                $stock->designation = $request->input('designation');
                $stock->bloodsquantity = $request->input('bloodsquantity');
                $stock->bloodsprice = $productprice->price;
                $stock->hospital = Session::get("hospital")->hospital_name;
                $stock->address = Session::get("hospital")->hospital_address;
                $stock->batchcode = $request->input('batchcode');
                $stock->collectiondate = $request->input('collectiondate');
                $stock->expirationdate = $request->input('expirationdate');
                $stock->latitude = Session::get("hospital")->latitude;
                $stock->longitude = Session::get("hospital")->longitude;
                
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

            $stocks = Stock::where("hospital","!=",Session::get("hospital")->hospital_name)
                            ->where("bloodsquantity",">",0)
                            ->selectRaw("SUM(bloodsquantity) as bloodsquantity")
                            ->selectRaw("designation")
                            ->selectRaw("hospital")
                            ->selectRaw("bloodsprice")
                            ->selectRaw("address")
                            ->selectRaw("latitude")
                            ->selectRaw("longitude")
                            ->groupBy('hospital', 'designation', 'bloodsprice', 'address', 'latitude', 'longitude')
                            ->get();
            $increment = 1;
            $increment1 = 0;

            $distances = array();
            $stockids= array();

            foreach ($stocks as $stock) {
                // $this->distance(-4.321289, 15.274256, -4.3231802, 15.2759957, "K");
                $stockid = Stock::where("designation",$stock->designation)->where("hospital",$stock->hospital)->first();
                $distance = $this->distance(Session::get("hospital")->latitude, Session::get("hospital")->longitude, $stock->latitude, $stock->longitude, "K");
                array_push($distances, round($distance*1000)." mètres");
                array_push($stockids, $stockid->id);
            }
    
            return view("hospital.bloodbagsearch")->with("stocks",$stocks)->with("distances",$distances)->with("stockids",$stockids)->with("increment",$increment)->with("increment1",$increment1);  

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function addbloodbagtocart($id, $bloodsquantity){
        try {
            //code...
            $bloodbag = Stock::find($id);
            
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($bloodbag, $bloodsquantity);
    
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
                $ids = Session::get("hospital")->hospital_email."_".time();

                $order = new Order();
                $order->hospital_name = Session::get("hospital")->hospital_name;
                $order->hospital_address = Session::get("hospital")->hospital_address;
                $order->hospital_email = Session::get("hospital")->hospital_email;
                $order->hospital_phone = Session::get("hospital")->hospital_phone;
                $order->timeid = $ids;
                $order->cart = serialize(Session::get('cart'));

                foreach (Session::get('topCart') as $item) {
                    # code... 
                    $invoice = new Invoice();
                    $invoice->orderid = $ids;

                    $invoice->designation = $item['designation'];
                    $invoice->qty = $item['qty'];
                    $invoice->hospital = $item['hospital'];
                    $invoice->price = $item['bloodsprice'];
                    $invoice->save();
                }

                $order->save();

                Session::forget('cart');
                Session::forget('topCart');
                
                return redirect("hospital/bloodbagsearch")->with("status", "Votre commande a été effectuée avec succès !!!");

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function bloodbagorder(){

        try {
                //code...

                $orders = Order::where("hospital_name", Session::get("hospital")->hospital_name)->get();
                $increment = 1;
        
                $orders->transform(function($order, $key){
                    $order->cart = unserialize($order->cart);
        
                    return $order;
                });
        
                return view('hospital.bloodbagorder')->with('orders', $orders)->with('increment', $increment);

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function bloodsell(){

        try {
                //code...
                $orders = Order::where("hospital_name","!=", Session::get("hospital")->hospital_name)->get();
                $increment = 1;
        
                $orders->transform(function($order, $key){
                    $order->cart = unserialize($order->cart);
        
                    return $order;
                });
        
                return view('hospital.bloodsell')->with('orders', $orders)->with('increment', $increment);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function vieworder($timeid){

        try {
                //code...
                $invoices = Invoice::where("orderid",$timeid)->where("hospital",Session::get("hospital")->hospital_name)->where("status",0)->get();

                return view('hospital.vieworder')->with("invoices",$invoices);

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }

    }

    public function validateorder(Request $request, $orderid, $hospital, $designation){
        try {
            //code...

            $invoice = Invoice::where("orderid",$orderid)->where("hospital",$hospital)->where("designation",$designation)->first();

            $stocks = Stock::where('designation',$invoice->designation)->get();
            
            $end = 0;

            $qty = $request->input('qty');

            foreach ($stocks as $stock) {
                # code...
                if($stock->designation == $invoice->designation && $stock->bloodsquantity > 0 && $end == 0){
                    if ($stock->bloodsquantity >= $qty) {
                        # code...
                        $stock->bloodsquantity = $stock->bloodsquantity - $qty;
                        $end = 1;
                    }
                    else{
                        $stock->bloodsquantity = 0;
                        $qty = $qty - $stock->bloodsquantity;
                    }
                    $stock->update();
                }
            }

            $invoice->status = 1;
            $invoice->update();

            return back();

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        try {
                //code...
                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                }
                else {
                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;
                $unit = strtoupper($unit);
            
                if ($unit == "K") {
                    return ($miles * 1.609344);
                } else if ($unit == "N") {
                    return ($miles * 0.8684);
                } else {
                    return $miles;
                }
                }
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with("error", $th->getMessage());
        }
    }
}

// première couleur : #E6442B
// deuxième couleur : #E6442B


// $num = "3.14";
// $int = (int)$num;
// $float = (float)$num;

// Ascension groupe Rdc
// Nous sommes une entreprise de service dont les activités sont axées sur  l’organisation des conférences, formations professionnelles, séminaires dans différents domaines et séjours touristiques à  travers le monde.

// Monsieur Olivier GOGA LINGO WA DONDO
// A effectué son parcours professionnel dans le secteur bancaire, il a travaille dans la gestion des grandes Entreprises.
// Ascension groupe rdc est le fruits d’une réflexion d’un rendement professionnel qualificatif, dans le souci de contribuer à l’éthique et déontologie dans le monde du travail, des découvertes culturelles et des voyages à traves le globe.

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

// try {
//     //code...
//     $response = Http::post('http://marchand.maishapay.online/payment/vers1.0/merchant/checkout', [

//         'gatewayMode' => 1,
//         'role' => 'Privacy Consultant',

//         'publicApiKey' => 'MP-LIVEPK-$1oOa5uuIor0y.1WdiPi1b5eW7em3$S1qqecrO1eit$0XKjFEPVNCslV/gn0$buQa$FRC2$yPy7csObk.az.2WEKBC2w5oneUMJI1pygJIHH20TqmBiVIr3a',

//         'secretApiKey' => 'MP-LIVEPK-zaXken$$RxLKOJ0VKgoqU1cKFmB2q$lDk3x19sQBLrM0gxJnr10VFlD.M/yT.FyJvNAgqAB1ewwIypDjQVg90hiCQ6I2GecaEdig1Iq1$ylevK$ff5h$Qssz',

//         'transactionReference' => 'ABCD',
//         'montant' => 100,
//         'devise' => "USD",
//         'customerFullName' => 'John doe',
//         'customerPhoneNumber' => '',
//         'customerEmailAddress' => '',
//         'chanel' => 'MOBILEMONEY',
//         'provider' => 'MPESA',
//         'walletID' => '+243824754958',
//         'callbackUrl' => 'http://127.0.0.1:8000/hospital/bloodbagsearch'
//     ]);

//     return $response;
// } catch (\Throwable $th) {
//     //throw $th;
//     return back()->with("error", $th->getMessage());
// }

            // if($request->status == 202){

            //     foreach (Session::get('topCart') as $item) {
            //         # code...
            //         $stock = Stock::where("hospital",$item['hospital'])->where("designation",$item['designation'])->first();

            //         if($stock->bloodsquantity > $item['qty']){
            //             $stock->bloodsquantity = ($stock->bloodsquantity - $item['qty']);
            //             $stock->update();
            //         }
            //     }

            //     $order = new Order();
            //     $order->hospital_name = Session::get("hospital")->hospital_name;
            //     $order->hospital_address = Session::get("hospital")->hospital_address;
            //     $order->hospital_email = Session::get("hospital")->hospital_email;
            //     $order->hospital_phone = Session::get("hospital")->hospital_phone;
            //     $order->cart = serialize(Session::get('cart'));

            //     $order->save();
                
            //     return redirect("hospital/bloodbagsearch")->with("status", "Votre achat a été effectué avec succès !!!");
            // } 
            // elseif ($request->status == 400) {
            //     # code...
            //     return redirect("hospital/bloodbagsearch")->with("error", "Votre achat a échoué !!!");
            // }