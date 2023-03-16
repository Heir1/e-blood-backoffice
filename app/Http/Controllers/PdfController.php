<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Invoice;

class PdfController extends Controller
{
    //

    public function bloodbaginvoice($timeid){

        // Session::put('id', $id);
        
        try{
            // ->setPaper('a4', 'landscape')
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($this->convert_orders_data_to_html($timeid));

            return $pdf->stream();
        }
        catch(Exception $e){
            return redirect('hospital/bloodbagorder')->with('error', $e->getMessage());
        }

    }

    public function convert_orders_data_to_html($timeid){

        $orders = Order::where('timeid',$timeid)->get();
        $invoices = Invoice::where('orderid',$timeid)->where('status',1)->get();

        foreach($orders as $order){
            $hospital_name = $order->hospital_name;
            $hospital_address = $order->hospital_address;
            $hospital_email = $order->hospital_email;
            $hospital_phone = $order->hospital_phone;
            $date = $order->created_at;
        }

        $totalPrice = 0;

        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);

            return $order;
        });

        $output = '

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

            <link rel="stylesheet" href="backend/admin/css/style.css"> 
            
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <img src="frontend/assets/uploads/user-1.png" class="img-responsive" style="width: 71px; border-radius: 43px;"/>
                        </th>
                        <th>
                            <h6>
                                E-blood Bank Makila.
                            </h6>
                            <h6>
                                +243896600919 / +33758489244
                            </h6>
                            <h6>
                                info@ebloodmakila.com
                            </h6>
                            <h6>
                                République Démocratique Du Congo
                            </h6>
                        </th>
                    </tr>
                </thead>
            </table>
            
            <p>
                Nom du client : '.$hospital_name.' </br>
                Tél : '.$hospital_phone.' </br>
                Email : '.$hospital_email.' </br>
                Adresse : '.$hospital_address.' </br>
                Date : '.$date.'
            </p>
            </br>
        ';

        $output .= '<table class="table">

        <thead class="thead-blood">
            <tr>
                <th scope="col">Description</th>
                <th scope="col">Somme</th>
                <th scope="col">Hôpital</th>
            </tr>
        </thead>

        <tbody>';
            foreach ($invoices as $invoice) {
                # code...
                $output .= '
                    <tr>
                        <td>'.$invoice->qty.' poche(s)  '.$invoice->designation.' </td>
                        <td>'.$invoice->qty*$invoice->price.' CDF</td>
                        <td>'.$invoice->hospital.'</td>
                    </tr>
                ';
                $totalPrice += $invoice->qty*$invoice->price;
            }

        $output .= '</tbody>
                </table>
        ';

        $output .= '
        </br>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <h5>
                            Total : '.$totalPrice.' CDF
                        </h5>
                    </th>
                </tr>
            </thead>
        </table>
    ';
                        
        return $output;

    }
}
