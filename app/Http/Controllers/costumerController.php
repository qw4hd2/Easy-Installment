<?php

namespace App\Http\Controllers;
use App\Models\showCount;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\instalmentModel;
class costumerController extends Controller
{
    //
    public function totalCount()
    {
        $productCount = showCount::getProductCount();
        $categoryCount = showCount::getCategoryCount();
        $supplierCount = showCount::getSupplierCount();
        $costumerCount = showCount::getCostumerCount();
        $requestCount = showCount::getRequestCount();
        $installmentCount = showCount::getInstallmentCount();
        $expensescount = DB::table('product')->sum('p_newvalue');
        $sscount = DB::table('payment')->sum('py_payment');
        return ['productCount' => $productCount, 
        'categoryCount' => $categoryCount,
        'supplierCount'=>$supplierCount,
        'costumerCount'=>$costumerCount,
        'requestCount'=>$requestCount,
        'installmentCount'=>$installmentCount,
        'expensescount'=>$expensescount,
        'sscount'=>$sscount,
        ];
    }
    public function homeCostumer(){
        $counts = $this->totalCount();
        $productCount = $counts['productCount'];
        $categoryCount = $counts['categoryCount'];
        $supplierCount = $counts['supplierCount'];
        $costumerCount = $counts['costumerCount'];
        $requestCount = $counts['requestCount'];
        $installmentCount = $counts['installmentCount'];
        $expensescount = $counts['expensescount'];
        $sscount = $counts['sscount'];
        return view('costumer.index',compact('productCount', 'categoryCount','supplierCount','costumerCount','requestCount','installmentCount','expensescount','sscount'));
    }
    public function intalmentCostumer(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = instalmentModel::offset($offset)->limit($perPage)->get();
        $total_records = instalmentModel::count();
        $total_pages = ceil($total_records / $perPage);
        $totalInstalments = instalmentModel::all();
        return view('costumer.instalment.index',compact('totalInstalments','page'));
    }
    public function paymentCostumer($id){
        $fetchById = DB::table('installment')->where('i_id',$id)->first();
        return view('costumer.instalment.payment.paymentCostumer',compact('fetchById'));
    }
    public function selectItem(Request $request){
        $productPage = DB::table('product')->paginate(5);
        $page = $request->input('page') ?: 1;
        $products = DB::table('product')->get();
        return view('costumer.instalment.select.selectItem', compact('products','page'));
    }
    public function requestFormCostumer($id){
        $getDataOfProduct = DB::table('product')->where('p_id',$id)->first();
        $dt = Carbon::now()->format('y');
        $randd = rand(1000, 9999);
        $transac = "{$dt}00{$randd}";
        return view('costumer.instalment.select.requestFormCostumer',compact('getDataOfProduct','transac'));
    }
    public function instalmentEditHandleCostumer(Request $request)
    {
        $transacid = $request->input('transacid');
        $productid = $request->input('productid');
        $costumerid = $request->input('costumerid');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $bal = $request->input('balance');
        $tax = $request->input('tax');
        $mp = $request->input('mp');
        $yr = $request->input('yr');
        $mpp = $request->input('mpp');
        $penalty = $request->input('penalty');
        
        $mppt = $mpp + $penalty;
        $hi = $bal - $mppt;
        
        $bobo = $bal - $mpp;
        
        if ($yr == 1) {
            $yr = 12;
        } elseif ($yr == 2) {
            $yr = 24;
        } elseif ($yr == 3) {
            $yr = 32;
        }
        
        $tae = $bobo / $yr;
        
        if ($mp > $mppt) {
            return redirect()->back()->with('error', 'The Downpayment is lower than expected!');
        } else if ($mppt > $bal) {
            return redirect()->back()->with('error', 'Oops!');
        } else {
            DB::beginTransaction();
            try {
                DB::table('payment')->insert([
                    'py_transactionid' => $transacid,
                    'py_productid' => $productid,
                    'py_costumerid' => $costumerid,
                    'py_penalty' => $penalty,
                    'py_payment' => $mpp
                ]);
        
                DB::table('installment')
                    ->where('i_transactionid', '=', $transacid)
                    ->update([
                        'i_balance' => $bobo,
                        'i_mp' => $tae
                    ]);
        
                DB::commit();
        
                return redirect()->route('costumer.instalment.index')->with('success', 'Payment successfully recorded!');
            } catch (\Exception $ex) {
                DB::rollback();
                return redirect()->back()->with('error', $ex->getMessage());
            }
        }
    }
    public function instalmentDeleteHandlerCostumer($id){
        $deleteInstalment = instalmentModel::find($id);
        $deleteInstalment->delete();
        return redirect()->route('costumer.instalment.index')->with('success', 'Payment successfully recorded!');
    }
    public function requestSaveHandlerCostumer()
    {
        $transacid = $request->transacid;
        $productid = $request->productid;
        $costumerid = $request->costumerid;
        $quantity = $request->quantity;		
        $order = $request->order;
        $price = $request->price;
        $totalprice = $request->total;
        $tax = $request->tax;
        $mp = $request->mp;
        $dp = $request->dp;
        $yr = $request->yr;
        $newqty = $quantity - $order;

        if($quantity <= 0){
            return redirect()->back()->with('error', 'Oops! Something is wrong with your order!');
        }

        $requestExist = DB::table('request')->where('r_transactionid', $transacid)->exists();
        if($requestExist)
        {
            return redirect()->back()->with('error', 'The request ID already exists!');
        }
        else
        {
            DB::transaction(function () use ($productid, $order, $transacid, $costumerid, $price, $totalprice, $tax, $mp, $dp, $yr) {
                DB::table('product')->where('p_code', $productid)->decrement('p_quantity', $order);
                DB::table('request')->insert([
                    'r_transactionid' => $transacid,
                    'r_productid' => $productid,
                    'r_costumerid' => $costumerid,
                    'r_quantity' => $order,
                    'r_price' => $price,
                    'r_total' => $totalprice,
                    'r_tax' => $tax,
                    'r_montly' => $mp,
                    'r_downpayment' => $dp,
                    'r_year' => $yr,
                    'r_status' => $status
                ]);
            });
            return redirect()->route('admin.pages.Instalment.Instalment.request')->with('success', 'request Deleted Successfully!');
        }
    }
    public function logoutCostumer(){
        session()->forget('id');
        return redirect('/costumerLogin')->with('success', 'You have been logged out.');
    }
}
