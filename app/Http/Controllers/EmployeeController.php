<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\showCount;
use App\Models\instalmentModel;
use App\Models\requestModel;
use App\Models\fetchData;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
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
    public function index(){
        $counts = $this->totalCount();
        $productCount = $counts['productCount'];
        $categoryCount = $counts['categoryCount'];
        $supplierCount = $counts['supplierCount'];
        $costumerCount = $counts['costumerCount'];
        $requestCount = $counts['requestCount'];
        $installmentCount = $counts['installmentCount'];
        $expensescount = $counts['expensescount'];
        $sscount = $counts['sscount'];
        return view('employee.index' ,compact('productCount', 'categoryCount','supplierCount','costumerCount','requestCount','installmentCount','expensescount','sscount'));
    }
    public function InstalmentEmployee(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = instalmentModel::offset($offset)->limit($perPage)->get();
        $total_records = instalmentModel::count();
        $total_pages = ceil($total_records / $perPage);
        $totalInstalments = instalmentModel::all();
        return view('employee.instalment.instalment',compact('totalInstalments','page'));
    }
    public function requestEmployee(Request $request){
        $getRequest = requestModel::all();
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = requestModel::offset($offset)->limit($perPage)->get();
        $total_records = requestModel::count();
        $total_pages = ceil($total_records / $perPage);
        return view('employee.instalment.request.request',compact('getRequest','page'));
    }
    public function requestAddEmployee(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $start_from = ($page - 1) * $perPage;
        $getCostumer = fetchData::offset($start_from)->limit($perPage)->get();
        $total_records = fetchData::count();
        $result = DB::table('product')
              ->orderBy('p_id', 'ASC')
              ->offset($start_from)
              ->limit(5)
              ->get();
        return view('employee.instalment.request.requestAddEmployee',compact('result','page'));
    }
    public function requestFormEmployee($id){
        $getDataOfProduct = DB::table('product')->where('p_id',$id)->first();
        $dt = Carbon::now()->format('y');
        $randd = rand(1000, 9999);
        $transac = "{$dt}00{$randd}";
        return view('employee.instalment.request.requestFormEmployee',compact('getDataOfProduct','transac'));
    }
    public function requestApprovalEmployee($id){
        $getDetailViaId = DB::table('request')->where('r_id',$id)->first();
        return view('employee.instalment.request.requestApprovalEmployee',compact('getDetailViaId'));
    }
    public function paymentEmployee($id){
        $fetchById = DB::table('installment')->where('i_id',$id)->first();
        return view('employee.instalment.payment.paymentEmployee',compact('fetchById'));
    }
    public function instalmentEditHandleEmployeer(Request $request){
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
        
                return redirect()->route('employee.instalment.instalment')->with('success', 'Payment successfully recorded!');
            } catch (\Exception $ex) {
                DB::rollback();
                return redirect()->back()->with('error', $ex->getMessage());
            }
        }
    }
    public function instalmentDeleteHandlerEmployee($id){
        $deleteInstalment = instalmentModel::find($id);
        $deleteInstalment->delete();
        return redirect()->route('employee.instalment.instalment')->with('success', 'Payment successfully recorded!');
    }
    public function requestApprovalHandlerEmployee(Request $request)
    {
        $transacid = $request->input('transacid');
        $productid = $request->input('productid');
        $costumerid = $request->input('costumerid');
        $order = $request->input('order');
        $price = $request->input('price');
        $totalprice = $request->input('total');
        $tax = $request->input('tax');
        $mp = $request->input('mp');
        $dp = $request->input('dp');
        $yr = $request->input('yr');
        $dpp = $request->input('dpp');
        $balance = $totalprice - $dpp;

        if ($yr == 1) {
            $yr = 12;
        } elseif ($yr == 2) {
            $yr = 24;
        } elseif ($yr = 3) {
            $yr = 32;
        } else {
            return redirect()->back()->with('error', 'Oppppss!');
        }

        $mp = $balance / $yr;

        if ($yr == 12) {
            $yr = 1;
        } elseif ($yr == 24) {
            $yr = 2;
        } elseif ($yr = 32) {
            $yr = 3;
        }

        if ($dp > $dpp) {
            return redirect()->back()->with('error', 'The Downpayemnrt is lower than we expect baby!');
        } elseif ($totalprice < $dpp) {
            return redirect()->back()->with('error', 'Oppppss!');
        } else {
            $count = DB::table('installment')->where('i_transactionid', $transacid)->count();
            if ($count > 0) {
                return redirect()->back()->with('error', 'The Product ID was Existing!');
            } else {
                DB::table('installment')->insert([
                    'i_transactionid' => $transacid,
                    'i_productid' => $productid,
                    'i_costumerid' => $costumerid,
                    'i_order' => $order,
                    'i_value' => $price,
                    'i_totalprice' => $totalprice,
                    'i_tax' => $tax,
                    'i_mp' => $mp,
                    'i_dp' => $dp,
                    'i_dpp' => $dpp,
                    'i_balance' => $balance,
                    'i_year' => $yr,
                ]);

                DB::table('request')->where('r_transactionid', $transacid)->delete();

                return redirect()->route('employee.instalment.request.request')->with('success', 'Installment created successfully');
            }
        }
    }
    public function requestDeleteEmployee($id){
        $requestDelete= requestModel::find($id);
        $requestDelete->delete();
        return redirect()->route('employee.instalment.request.request')->with('success', 'request Deleted Successfully!');
    }
    public function requestSaveHandlerEmployee(Request $request)
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
    public function logoutEmployee(){
        session()->forget('id');
        return redirect('/employee')->with('success', 'You have been logged out.');
    }
}
