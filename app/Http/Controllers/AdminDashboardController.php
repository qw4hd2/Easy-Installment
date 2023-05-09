<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\showCount;
use App\Models\fetchData;
use App\Models\category;
use App\Models\supplier;
use App\Models\costumerModal;
use App\Models\instalmentModel;
use App\Models\requestModel;
use App\Models\stockModel;
use App\Models\paymentModel;
use App\Models\userModel;
use App\Models\productRequestModel;
use Illuminate\Support\Facades\DB;
class AdminDashboardController extends Controller
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
        $getRequestCount = requestModel::getRequestCount();
        return ['productCount' => $productCount, 
        'categoryCount' => $categoryCount,
        'supplierCount'=>$supplierCount,
        'costumerCount'=>$costumerCount,
        'requestCount'=>$requestCount,
        'installmentCount'=>$installmentCount,
        'expensescount'=>$expensescount,
        'sscount'=>$sscount,
        'getRequestCount'=>$getRequestCount,
    ];
    }
    public function header(){
        $count = DB::table('request')->count();
        return view('admin.include.header',['count' => $count]);
    }

    public function index()
    {
        $counts = $this->totalCount();
        $productCount = $counts['productCount'];
        $categoryCount = $counts['categoryCount'];
        $supplierCount = $counts['supplierCount'];
        $costumerCount = $counts['costumerCount'];
        $requestCount = $counts['requestCount'];
        $installmentCount = $counts['installmentCount'];
        $expensescount = $counts['expensescount'];
        $sscount = $counts['sscount'];
        return view('admin.index', compact('productCount', 'categoryCount','supplierCount','costumerCount','requestCount','installmentCount','expensescount','sscount'));
    }
    public function stock(Request $request){
        $productPage = DB::table('product')->paginate(5);
        $page = $request->input('page') ?: 1;
        $products = DB::table('product')->get();
        return view('admin.pages.product.stock.stock', compact('products','page'));
    }
    public function stockEdit($id){
        $productDetail = DB::table('product')->where('p_id', $id)->first();
        return view('admin.pages.product.stock.stockEdit',compact('productDetail'));
    }
    public function stockAdd(){
        $category = category::all();
        return view('admin.pages.product.stock.stockAdd',compact('category'));
    }
    public function stockManage(Request $request){
        $products = DB::table('product')->get();
        $productPage = DB::table('product')->paginate(5);
        $page = $request->input('page') ?: 1;
        return view('admin.pages.product.stock.stockManage',compact('products','page'));
    }
    public function stockIn($id){
        $productDetail = DB::table('product')->where('p_id', $id)->first();
        return view('admin.pages.product.stock.stockIn',compact('productDetail'));
    }
    public function stockOut($id){
        $productDetail = DB::table('product')->where('p_id', $id)->first();
        return view('admin.pages.product.stock.stockOut',compact('productDetail'));
    }
    public function supplier(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = supplier::offset($offset)->limit($perPage)->get();
        $total_records = supplier::count();
        $total_pages = ceil($total_records / $perPage);
        $supplier = DB::table('supplier')->get();
        return view('admin.pages.product.supplier.supplier',compact('supplier','page'));
    }
    public function supplierAdd(){
        return view('admin.pages.product.supplier.supplierAdd');
    }
    public function supplierEdit($id){
        $supplierEdit = DB::table('supplier')->where('s_id', $id)->first();
        return view('admin.pages.product.supplier.supplierEdit',compact('supplierEdit'));
    }
    public function category(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = category::offset($offset)->limit($perPage)->get();
        $total_records = category::count();
        $total_pages = ceil($total_records / $perPage);
        $categoryAll = category::all();
        return view('admin.pages.product.category.category',compact('categoryAll','page'));
    }
    public function categoryAdd(){
        return view('admin.pages.product.category.categoryAdd');
    }
    public function categoryEdit($id){
        $checkId = DB::table('category')->where('c_id', $id)->first();
        return view('admin.pages.product.category.categoryEdit',compact('checkId'));
    }
    public function costumer(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = costumerModal::offset($offset)->limit($perPage)->get();
        $total_records = costumerModal::count();
        $total_pages = ceil($total_records / $perPage);
        return view('admin.pages.Instalment.costumer.costumer',compact('getCostumer','page', 'total_pages'));
    }

    public function costumerAdd(){
        return view('admin.pages.Instalment.costumer.costumerAdd');
    }
    public function costumerEdit($id){
        $checkId = DB::table('costumer')->where('z_id', $id)->first();
        return view('admin.pages.Instalment.costumer.costumerEdit',compact('checkId'));
    }
    public function Instalment(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = instalmentModel::offset($offset)->limit($perPage)->get();
        $total_records = instalmentModel::count();
        $total_pages = ceil($total_records / $perPage);
        $totalInstalments = instalmentModel::all();
        return view('admin.pages.Instalment.Instalment.Instalment',compact('totalInstalments','page'));
    }
    public function payment($id){
        $fetchById = DB::table('installment')->where('i_id',$id)->first();
        return view('admin.pages.Instalment.Instalment.payment',compact('fetchById'));
    }
    public function request(Request $request){
        $getRequest = requestModel::all();
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $offset = ($page - 1) * $perPage;
        $getCostumer = requestModel::offset($offset)->limit($perPage)->get();
        $total_records = requestModel::count();
        $total_pages = ceil($total_records / $perPage);
        return view('admin.pages.Instalment.Instalment.request',compact('getRequest','page'));
    }
    public function requestAdd(Request $request){
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
        return view('admin.pages.Instalment.Instalment.requestAdd',compact('result','page'));
    }
    public function requestApproval($id){
        $getDetailViaId = DB::table('request')->where('r_id',$id)->first();
        return view('admin.pages.Instalment.Instalment.requestApproval',compact('getDetailViaId'));
    }
    public function requestForm($id){
        $getDataOfProduct = DB::table('product')->where('p_id',$id)->first();
        $dt = Carbon::now()->format('y');
        $randd = rand(1000, 9999);
        $transac = "{$dt}00{$randd}";
        return view('admin.pages.Instalment.Instalment.requestForm',compact('getDataOfProduct','transac'));
    }
    public function expenses(){
        return view('admin.pages.expenses.expenses');
    }
    public function stockReport(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $start_from = ($page - 1) * $perPage;
        $getCostumer = stockModel::offset($start_from)->limit($perPage)->get();
        $total_records = stockModel::count();
        $result = DB::table('logs')
              ->orderBy('l_id', 'ASC')
              ->offset($start_from)
              ->limit(5)
              ->get();
        return view('admin.pages.report.stockReport',compact('result','page'));
    }
    public function paymentListPending(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $start_from = ($page - 1) * $perPage;
        $getCostumer = paymentModel::offset($start_from)->limit($perPage)->get();
        $total_records = paymentModel::count();
        $total_pages = ceil($total_records / $perPage);
        $result = DB::table('payment')
              ->orderBy('py_id', 'ASC')
              ->offset($start_from)
              ->limit(5)
              ->get();
        return view('admin.pages.report.paymentListPending',compact('result','page','total_pages'));
    }
    public function user(Request $request){
        $perPage = 5;
        $page = $request->input('page') ?: 1;
        $start_from = ($page - 1) * $perPage;
        $getCostumer = userModel::offset($start_from)->limit($perPage)->get();
        $total_records = userModel::count();
        $total_pages = ceil($total_records / $perPage);
        $getAllUser = userModel::all();
        return view('admin.pages.setting.user',compact('getAllUser','page'));
    }
    public function userAdd(){
        return view('admin.pages.setting.userAdd');
    }
    public function product_que(Request $request){
        $id = $request->input('id');
        $product = fetchData::find($id);
        $product->p_code = $request->input('code');
        $product->p_name = $request->input('name');
        $product->p_category = $request->input('category');
        $product->p_description = $request->input('description');
        $product->p_value = $request->input('value');
        $product->p_quantity = $request->input('quantity');
        $product->p_supname = $request->input('supname');
        $product->save();
        return redirect()->route('admin.pages.product.stock')->with('success', 'Product updated successfully!');
    }
    public function stockDelete($id){
        $product = fetchData::find($id);
        $product->delete();
        return redirect()->route('admin.pages.product.stock')->with('success', 'Product Deleted successfully!');
    }
    public function stockAddDB(Request $request){
        $code = $request->input('code');
        $name = $request->input('name');
        $category = $request->input('category');
        $description = $request->input('description');
        
        // Check if an image file is uploaded
        if ($request->hasFile('image')) {
            // Get the file from the request
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            
            // Store the file in the public folder
            $image->move(public_path('uploads'), $imageName);
            
            $count = DB::table('product')->where('p_code', '=', $code)->count();
            if($count > 0) {
                return redirect()->back()->with('error', 'The Product ID already exists!'); 
            }
            else {
                DB::table('product')->insert(
                    [
                        'p_code' => $code, 
                        'p_name' => $name, 
                        'p_category' => $category, 
                        'p_description' => $description,
                        'p_image' => asset('uploads/'.$imageName), // Store the image URL in the database
                        'p_value' => 0,
                        'p_mprice' => 0,
                        'p_newvalue' => 0,
                        'p_quantity' => 0,
                        'p_supname' => 0,
                        'p_date' => date('Y-m-d')
                    ]
                );
                return redirect()->route('admin.pages.product.stock')->with('success', 'Product Added successfully!');
            }
        }
        else {
            // If no image is uploaded, you can handle the error or validation here
            return redirect()->back()->with('error', 'Please upload an image file');
        }
    }
    
    
     public function productCalculation(Request $request){
        $id = $request->input('id');
        $code = $request->input('code');
        $name = $request->input('name');
        $category = $request->input('category');
        $description = $request->input('description');
        $status = $request->input('status');
        $value = $request->input('value');
        $pvalue = $request->input('pvalue');
        $mprice = $request->input('mprice');
        $newvalue = $request->input('newvalue');
        $quantity = $request->input('quantity');
        $color = $request->input('color');
        $supname = $request->input('supname');
        $stockin = $request->input('stockin');
        $ptotal = $request->input('ptotal');
        $transaction = "Stock In";
        $ttprice = $quantity * $value;
        $c1 = $quantity + $stockin;
        $c2 = $newvalue + $ptotal;

        $ulol = 0;

        try {
            DB::beginTransaction();

            DB::table('product')
                ->where('p_id', $id)
                ->update([
                    'p_quantity' => $c1,
                    'p_value' => $value,
                    'p_mprice' => $mprice,
                    'p_newvalue' => $c2
                ]);

            DB::table('logs')->insert([
                'l_productid' => $code,
                'l_stock' => $quantity,
                'l_price' => $ulol,
                'l_order' => $stockin,
                'l_totalprice' => $ttprice,
                'l_transaction' => $transaction,
                'l_user' => $supname
            ]);

            DB::commit();

            return redirect()->route('admin.pages.product.stock')->with('success', 'Stock updated successfully!');

        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'Failed to update stock!');
        }

     }
     public function productCalculationOut(Request $request){
        $id = $request->input('id');
        $code = $request->input('code');
        $name = $request->input('name');
        $category = $request->input('category');
        $description = $request->input('description');
        $status = $request->input('status');
        $value = $request->input('value');
        $pvalue = $request->input('pvalue');
        $mprice = $request->input('mprice');
        $newvalue = $request->input('newvalue');
        $quantity = $request->input('quantity');
        $color = $request->input('color');
        $supname = $request->input('supname');
        $stockin = $request->input('stockout');
        $ptotal = $request->input('ptotal');
        $transaction = "Stock Out";
        $ttprice = $quantity * $value;
        $c1 = $quantity - $stockin;
        $c2 = $newvalue + $ptotal;
        $ulol = 0;

        if ($quantity < $stockin) {
            return redirect()->back()->with('error', 'Enter another Quantity!');
        } else {
            DB::beginTransaction();
            try {
                DB::table('product')->where('p_id', $id)->update(['p_quantity' => $c1]);
                DB::table('logs')->insert([
                    'l_productid' => $code,
                    'l_stock' => $quantity,
                    'l_price' => $ulol,
                    'l_order' => $stockin,
                    'l_totalprice' => $ttprice,
                    'l_transaction' => $transaction,
                    'l_user' => $supname,
                ]);
                DB::commit();
                return redirect()->route('admin.pages.product.stock')->with('success', 'Stock updated successfully!');
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->with('error', 'Something went wrong!');
            }
        }
     }
    public function suppilerEditAction(){
        try {
            $id = request('id');
            $idnum = request('idnum');
            $lastname = request('lastname');
            $firstname = request('firstname');
            $mi = request('mi');
            $age = request('age');
            $contact = request('contact');
            $address = request('address');
            $email = request('email');
            $company = request('company');
        
            DB::beginTransaction();
            DB::table('supplier')
                ->where('s_id', $id)
                ->update([
                    's_idnum' => $idnum,
                    's_lastname' => $lastname,
                    's_firstname' => $firstname,
                    's_age' => $age,
                    's_contact' => $contact,
                    's_address' => $address,
                    's_email' => $email,
                    's_company' => $company
                ]);
        
            DB::commit();
            return redirect()->route('admin.pages.product.supplier.supplier')->with('success', 'Stock updated successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong!');
        }
        
    }
    public function supplierDelete($id){
        $supplierDelete = supplier::find($id);
        $supplierDelete->delete();
        return redirect()->route('admin.pages.product.supplier.supplier')->with('success', 'Stock updated successfully!');
    }
    public function supplierAddedAction(){
        if(request()->isMethod('POST')){
            $idnum = request('idnum');
            $lastname = request('lastname');
            $firstname = request('firstname');
            $age = request('age');
            $contact = request('contact');
            $address = request('address');
            $email = request('email');
            $company = request('company');
            $existing = DB::table('supplier')->where('s_idnum',$idnum)->count();
            if($existing > 0){
                return redirect()->back()->with('error', 'Supplier ID already exist!');
            }
            else{
                DB::table('supplier')->insert([
                    's_idnum' => $idnum,
                    's_lastname' => $lastname,
                    's_firstname' => $firstname,
                    's_age' => $age,
                    's_contact' => $contact,
                    's_address' => $address,
                    's_email' => $email,
                    's_company' => $company
                ]);
                return redirect()->back()->with('success', 'Supplier added successfully!');
            }
        }
    }
    public function categoryEditHandler(Request $request){
        $id = $request->input('id');
        $catId = $request->input('catid');
        $catname = $request->input('catname');
        $description = $request->input('description');
        try{
            DB::beginTransaction();
            DB::table('category')->where('c_id',$id)
            ->update([
                'c_id' => $id,
                'c_code' => $catId,
                'c_name' => $catname,
                'c_description' => $description
            ]);
            DB::commit();
            return redirect()->route('admin.pages.product.category.category')->with('success','category Added Successfully');
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to update category!');
        }
    }
    public function categoryAddedHandler(){
        if(request()->isMethod('POST')){
            $catId = request('catid');
            $catname = request('catname');
            $description = request('description');
            $existing = DB::table('category')->where('c_code',$catId)->count();
            if($existing > 0){
                return redirect()->back()->with('error', 'Category ID already exist!');
            }else{
                DB::table('category')
                ->insert([
                    'c_code' => $catId,
                    'c_name' => $catname,
                    'c_description' => $description
                ]);
                return redirect()->route('admin.pages.product.category.category')->with('success','category Added Successfully');
            }
        }

    }
    public function categoryDeleteHandler($id){
        $categoryDelete = category::find($id);
        $categoryDelete->delete();
        return redirect()->back()->with('success', 'Category deleted successfully!');
    }
    public function costumerAddedHandler(){
    if(request()->isMethod('POST')){
        $id = request('id');
        $idnum = request('idnum');
        $lastname = request('lastname');
        $firstname = request('firstname');
        $age = request('age');
        $contact = request('contact');
        $address = request('address');
        $email = request('email');
        $postal = request('postal');
        $job = request('job');
        $salary = request('salary');
        $status = request('status');
        
        DB::table('costumer')
            ->where('z_id', $id)
            ->update([
                'z_idnum' => $idnum,
                'z_lastname' => $lastname,
                'z_firstname' => $firstname,
                'z_age' => $age,
                'z_contact' => $contact,
                'z_address' => $address,
                'z_email' => $email,
                'z_postal' => $postal,
                'z_job' => $job,
                'z_salary' => $salary,
                'z_status' => $status
            ]);
            
        return redirect()->route('admin.pages.Instalment.costumer.costumer')->with('success','costumer edited successfully!');
     }
    }
    public function customerDeleteHandler($id){
        $deleteCostumer = costumerModal::find($id);
        $deleteCostumer->delete();
        return redirect()->back()->with('success', 'costumer deleted successfully!');
    }
    public function instalmentEditHandler(Request $request){
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
        
                return redirect()->route('admin.pages.Instalment.Instalment.Instalment')->with('success', 'Payment successfully recorded!');
            } catch (\Exception $ex) {
                DB::rollback();
                return redirect()->back()->with('error', $ex->getMessage());
            }
        }
    }
    public function instalmentDeleteHandler($id){
        $deleteInstalment = instalmentModel::find($id);
        $deleteInstalment->delete();
        return redirect()->route('admin.pages.Instalment.Instalment.Instalment')->with('success', 'Payment successfully recorded!');
    }
    public function requestApprovalHandler(Request $request)
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

                return redirect()->route('admin.pages.Instalment.Instalment.request')->with('success', 'Installment created successfully');
            }
        }
    }
    public function requestDelete($id){
        $requestDelete= requestModel::find($id);
        $requestDelete->delete();
        return redirect()->route('admin.pages.Instalment.Instalment.request')->with('success', 'request Deleted Successfully!');
    }
    public function requestSaveHandler(Request $request){
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
    public function userAddHanlder(Request $request)
    {
        if ($request->isMethod('post')) {
            $username = $request->input('username');
            $password = $request->input('password');
            $usertype = $request->input('usertype');
            
            $existingUser = userModel::where('u_idnumber', $username)->first();
            if ($existingUser) {
                return redirect()->back()->with('error', 'The Category ID already exists!');
            }
            
            $user = new userModel();
            $user->u_idnumber = $username;
            $user->u_password = $password;
            $user->u_position = $usertype;
            $user->save();
            
            return redirect()->route('admin.pages.setting.user')->with('success', 'User added successfully!');
        }
    }
    public function printIt($id){
        $selectPayment = paymentModel::find($id);
        return view('admin.pages.report.print',compact('id','selectPayment'));
    }
    public function blogIndex(){
        $requestProduct = productRequestModel::all();
        return view('admin.pages.blog.index',compact('requestProduct'));
    }
    public function deleteProductBlogAdmin($id){
        $delete = productRequestModel::find($id);
        $delete->delete();
        return redirect()->back()->with('success', 'Product deleted successfully!');
    }
    
}