<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\costumerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('/',[MasterController::class,'index']);
route::get('/header',[MasterController::class,'header']);
route::get('/registration',[MasterController::class,'registration']);
route::post('/register',[MasterController::class,'register']);
route::get('/login',[MasterController::class,'login']);
route::get('/administrator',[MasterController::class,'administrator']);
route::post('/loginAdmin',[MasterController::class,'loginAdmin']);
route::post('/employeeLogin',[MasterController::class,'employeeLogin']);
route::get('/employee',[MasterController::class,'employee']);
route::get('/costumerLogin',[MasterController::class,'costumerLogin']);
route::get('/home',[AdminDashboardController::class,'index'])->middleware('admin.session');
route::get('/stock',[AdminDashboardController::class,'stock'])->middleware('admin.session')->name('admin.pages.product.stock');
Route::get('/stockEdit/{id}', [AdminDashboardController::class,'stockEdit'])->middleware('admin.session')->name('stockEdit');
route::get('/stockAdd',[AdminDashboardController::class,'stockAdd'])->middleware('admin.session');
route::get('/stockManage',[AdminDashboardController::class,'stockManage'])->middleware('admin.session');
route::get('/stockIn/{id}',[AdminDashboardController::class,'stockIn'])->middleware('admin.session');
route::get('/stockOut/{id}',[AdminDashboardController::class,'stockOut'])->middleware('admin.session');
route::get('/supplier',[AdminDashboardController::class,'supplier'])->middleware('admin.session')->name('admin.pages.product.supplier.supplier');
route::get('/supplierAdd',[AdminDashboardController::class,'supplierAdd'])->middleware('admin.session');
route::get('/supplierEdit/{id}',[AdminDashboardController::class,'supplierEdit'])->middleware('admin.session');
route::get('/category',[AdminDashboardController::class,'category'])->middleware('admin.session')->name('admin.pages.product.category.category');
route::get('/categoryAdd',[AdminDashboardController::class,'categoryAdd'])->middleware('admin.session');
route::get('/categoryEdit/{id}',[AdminDashboardController::class,'categoryEdit'])->middleware('admin.session');
route::get('/costumer',[AdminDashboardController::class,'costumer'])->middleware('admin.session')->name('admin.pages.Instalment.costumer.costumer');
route::get('/costumerAdd',[AdminDashboardController::class,'costumerAdd'])->middleware('admin.session');
route::get('/costumerEdit/{id}',[AdminDashboardController::class,'costumerEdit'])->middleware('admin.session');
route::get('/Instalment',[AdminDashboardController::class,'Instalment'])->middleware('admin.session')->name('admin.pages.Instalment.Instalment.Instalment');
route::get('/payment/{id}',[AdminDashboardController::class,'payment'])->middleware('admin.session');
route::get('/request',[AdminDashboardController::class,'request'])->middleware('admin.session')->name('admin.pages.Instalment.Instalment.request');
route::get('/requestApproval/{id}',[AdminDashboardController::class,'requestApproval'])->middleware('admin.session');
route::get('/requestAdd',[AdminDashboardController::class,'requestAdd'])->middleware('admin.session');
route::get('/requestForm/{id}',[AdminDashboardController::class,'requestForm'])->middleware('admin.session');
route::get('/expenses',[AdminDashboardController::class,'expenses'])->middleware('admin.session');
route::get('/stockReport',[AdminDashboardController::class,'stockReport'])->middleware('admin.session')->name('admin.pages.report.stockReport');
route::get('/paymentListPending',[AdminDashboardController::class,'paymentListPending'])->middleware('admin.session')->name('admin.pages.report.paymentListPending');
route::get('/user',[AdminDashboardController::class,'user'])->middleware('admin.session')->name('admin.pages.setting.user');
route::get('/userAdd',[AdminDashboardController::class,'userAdd'])->middleware('admin.session');
route::get('/homeEmployee',[EmployeeController::class,'index'])->middleware('employee.session');
route::get('/InstalmentEmployee',[EmployeeController::class,'InstalmentEmployee'])->middleware('employee.session')->name('employee.instalment.instalment');
route::get('/requestEmployee',[EmployeeController::class,'requestEmployee'])->middleware('employee.session')->name('employee.instalment.request.request');
route::get("/requestAddEmployee",[EmployeeController::class,'requestAddEmployee'])->middleware('employee.session');
route::get('/requestFormEmployee/{id}',[EmployeeController::class,'requestFormEmployee'])->middleware('employee.session');
route::get('/requestApprovalEmployee/{id}',[EmployeeController::class,'requestApprovalEmployee'])->middleware('employee.session');
route::get('/paymentEmployee/{id}',[EmployeeController::class,'paymentEmployee']);
route::get('/homeCostumer',[costumerController::class,'homeCostumer'])->middleware('costumer.session');
route::get('/InstalmentCostumer',[costumerController::class,'intalmentCostumer'])->middleware('costumer.session')->name('costumer.instalment.index');
route::get('/paymentCostumer/{id}',[costumerController::class,'paymentCostumer'])->middleware('costumer.session');
route::get('/selectItem',[costumerController::class,'selectItem'])->middleware('costumer.session');
route::get('/requestFormCostumer/{id}',[costumerController::class,'requestFormCostumer'])->middleware('costumer.session');
route::post('/logoutAdmin', [MasterController::class, 'logoutAdmin'])->middleware('admin.session')->name('logoutAdmin');
route::post('/product_que',[AdminDashboardController::class, 'product_que'])->middleware('admin.session')->name('product_que');
route::delete('/stockDelete/{id}', [AdminDashboardController::class, 'stockDelete'])->middleware('admin.session');
route::post('/stockAddDB',[AdminDashboardController::class, 'stockAddDB'])->middleware('admin.session');
route::post('/productCalculation',[AdminDashboardController::class, 'productCalculation'])->middleware('admin.session');
route::post('/productCalculationOut',[AdminDashboardController::class, 'productCalculationOut'])->middleware('admin.session');
route::post('/suppilerEditAction',[AdminDashboardController::class, 'suppilerEditAction'])->middleware('admin.session');
route::delete('/supplierDelete/{id}',[AdminDashboardController::class, 'supplierDelete'])->middleware('admin.session');
route::post('/supplierAddedAction',[AdminDashboardController::class, 'supplierAddedAction'])->middleware('admin.session');
route::post('/categoryEditHandler',[AdminDashboardController::class, 'categoryEditHandler'])->middleware('admin.session');
route::post('/categoryAddedHandler',[AdminDashboardController::class, 'categoryAddedHandler'])->middleware('admin.session');
route::delete('/categoryDeleteHandler/{id}',[AdminDashboardController::class, 'categoryDeleteHandler'])->middleware('admin.session');
route::post('/costumerAddedHandler',[AdminDashboardController::class, 'costumerAddedHandler'])->middleware('admin.session');
route::delete('/customerDeleteHandler/{id}',[AdminDashboardController::class, 'customerDeleteHandler'])->middleware('admin.session');
route::post('/instalmentEditHandler',[AdminDashboardController::class, 'instalmentEditHandler'])->middleware('admin.session');
route::delete('/instalmentDeleteHandler/{id}',[AdminDashboardController::class, 'instalmentDeleteHandler'])->middleware('admin.session');
route::post('/requestApprovalHandler',[AdminDashboardController::class, 'requestApprovalHandler'])->middleware('admin.session');
route::delete('/requestDelete/{id}',[AdminDashboardController::class, 'requestDelete'])->middleware('admin.session');
route::post('/requestSaveHandler',[AdminDashboardController::class, 'requestSaveHandler'])->middleware('admin.session');
route::post('/userAddHanlder',[AdminDashboardController::class, 'userAddHanlder'])->middleware('admin.session');
route::get('/printIt/{id}',[AdminDashboardController::class, 'printIt'])->middleware('admin.session');
route::post('/instalmentEditHandleEmployeer',[EmployeeController::class, 'instalmentEditHandleEmployeer'])->middleware('employee.session');
route::delete('/instalmentDeleteHandlerEmployee/{id}',[EmployeeController::class, 'instalmentDeleteHandlerEmployee'])->middleware('employee.session');
route::post('/requestApprovalHandlerEmployee',[EmployeeController::class, 'requestApprovalHandlerEmployee'])->middleware('employee.session');
route::delete('/requestDeleteEmployee/{id}',[EmployeeController::class, 'requestDeleteEmployee'])->middleware('employee.session');
route::post('/requestSaveHandlerEmployee',[EmployeeController::class, 'requestSaveHandlerEmployee'])->middleware('employee.session');
route::post('/logoutEmployee',[EmployeeController::class, 'logoutEmployee'])->middleware('employee.session')->name('logoutEmployee');
route::post('/CostumerLoginAuth',[MasterController::class,'CostumerLoginAuth']);
route::post('/instalmentEditHandleCostumer',[CostumerController::class,'instalmentEditHandleCostumer'])->middleware('costumer.session');
route::delete('/instalmentDeleteHandlerCostumer/{id}',[CostumerController::class,'instalmentDeleteHandlerCostumer'])->middleware('costumer.session');
route::post('/requestSaveHandlerCostumer',[CostumerController::class,'requestSaveHandlerCostumer'])->middleware('costumer.session');
route::post('/logoutCostumer',[CostumerController::class,'logoutCostumer'])->middleware('costumer.session')->name('logoutCostumer');
// Route::get('/', function () {
//     return view('welcome');
// });
