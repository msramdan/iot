<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Merchant;
use App\Models\Kabkot;
use Yajra\DataTables\Facades\DataTables;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Exception;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        //======================== Card Transaction ==================================
        $start_date = explode(' ', Carbon::now()->toDateTimeString())[0]. ' 00:00:00';
        $end_date = explode(' ', Carbon::now()->toDateTimeString())[0]. ' 23:59:59';
        $start_month = Carbon::now()->firstOfMonth()->hour(00)->minute(00)->second(00);
        $end_month =  Carbon::now()->lastOfMonth()->hour(23)->minute(59)->second(59);

        $start = $request->query('start') ? $request->query('start') : null;
        $end = $request->query('end') ? $request->query('end') : null;

        if ($start) {
            $start = str_replace(',', '', $request->query('start')).' 00:00:00';

            $start_date = date('Y-m-d H:i:s', strtotime($start));
        }

        if ($end) {
            $end = str_replace(',', '', $request->query('end')).' 23:59:59';
            $end_date = date('Y-m-d H:i:s', strtotime($end));
        }

        $transaction =  Transaction::whereBetween('created_at', [$start_date, $end_date])
                                ->where('status', 'success');

        $transaction_amount = $transaction->sum('amount');

        $transaction_count = $transaction->count();

        $total_fee_transaction = $transaction->sum('mdr_amount');

        $total_merchant_active = Merchant::where('is_active', 1)->count();
        //====================== End Card Transaction ==========================


        //========================= Chart =============================
        $year = $request->query('year') ? $request->query('year') : Carbon::now()->format('Y');

        //Transaksi perbulan
        $transaction_month = Transaction::select(
            DB::raw("DATE_FORMAT(created_at, '%M') as bulan"),
            DB::raw("(COUNT(*)) as total_transaction"),
            DB::raw("sum(amount) as total_amount")
        )->where('status', 'success')
         ->orderBy('created_at')
         ->groupBy("bulan")
         ->limit(12)
         ->get();

         //transaksi sepuluh merchant
        $ten_merchant_start_dates = Carbon::now()->firstOfMonth()->year(2022)->hour(00)->minute(00)->second(00);
        $ten_merchant_end_dates = Carbon::now()->lastOfMonth()->year(2022)->hour(23)->minute(59)->second(29);

        $transaction_top_merchant = DB::table('transactions')
                ->select(
                    DB::raw('transactions.created_at'),
                    DB::raw('SUM(transactions.amount) as total_transaction'),
                    DB::raw('merchants.merchant_name as merchant_name')
                )
                ->join('merchants', 'transactions.merchant_id', '=', 'merchants.id')
                ->where('transactions.status', 'success')
                ->whereBetween('transactions.created_at', [$ten_merchant_start_dates, $ten_merchant_end_dates])
                ->groupBy('merchant_name')
                ->orderBy('total_transaction', 'ASC')
                ->limit(10)
                ->get();

        //merchant active && inactive
        $merchant_active = Merchant::where('is_active', 1)->count();
        $merchant_inactive = Merchant::where('is_active', 0)->count();

        //top transaction by city
        $transaction_top_city = DB::table('transactions')
                ->select(
                    DB::raw('SUM(transactions.amount) as total_transaction'),
                    'merchants.kabkot_id',
                    'tbl_kabkot.kabupaten_kota'
                )->join('merchants', 'transactions.merchant_id', '=', 'merchants.id')
                ->join('tbl_kabkot', 'merchants.kabkot_id', '=', 'tbl_kabkot.id')
                ->where('transactions.status', 'success')
                ->groupBy('tbl_kabkot.kabupaten_kota')
                ->orderBy('total_transaction', 'ASC')
                ->limit(10)
                ->get();
        //total transaction per day current month
        $transaction_current_month = DB::table('transactions')
                    ->select(
                        DB::raw('SUM(transactions.amount) as total_transaction'),
                        DB::raw("DATE_FORMAT(created_at, '%d') as hari"),
                    )->where('transactions.status', 'success')
                    ->whereBetween('created_at', [$start_month, $end_month])
                    ->groupBy('hari')
                    ->orderBy('hari', 'asc')
                    ->get();


        //======================= End Chart ===========================

        return view('admin.dashbaord.index', compact(
            'transaction_amount',
            'transaction_count',
            'total_fee_transaction',
            'total_merchant_active',
            'transaction_month',
            'transaction_top_merchant',
            'merchant_active',
            'merchant_inactive',
            'transaction_top_city',
            'transaction_current_month',
            'start_month',
            'end_month'
        ));
    }

    public function change_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'password' => [
                    'required', Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                        ->rules('confirmed')
                ],
            ]
        );

        if ($validator->fails()) {
             Alert::toast($validator->errors()->first(), 'error');
            return redirect()->back();
        }

        $user = User::findOrfail(auth()->user()->id);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        }
    }

    public function filter_transaction_year(Request $request)
    {
        $year = $request->year;

        $start_dates = Carbon::now()->firstOfYear()->year($year);
        $end_dates = Carbon::now()->lastOfYear()
                                  ->year($year)
                                  ->hour(23)
                                  ->minute(59)
                                  ->second(59);

        $transaction_month = Transaction::select(
            DB::raw("DATE_FORMAT(created_at, '%M') as x"),
            DB::raw("sum(amount) as y")
        )->where('status', 'success')
         ->whereBetween('created_at', [$start_dates, $end_dates])
         ->orderBy('created_at')
         ->groupBy("x")
         ->limit(12)
         ->get();

         return response()->json($transaction_month);
    }

    public function filter_date_merchant(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        if ($start) {
            $start = str_replace(',', '', $request->start_date).' 00:00:00';
            $start_date = date('Y-m-d H:i:s', strtotime($start));
        }

        if ($end) {
            $end = str_replace(',', '', $request->end_date).' 23:59:59';
            $end_date = date('Y-m-d H:i:s', strtotime($end));
        }

          //transaksi sepuluh merchant
        $transaction_top_merchant = DB::table('transactions')
                ->select(
                    DB::raw('SUM(transactions.amount) as y'),
                    DB::raw('merchants.merchant_name as x')
                )
                ->join('merchants', 'transactions.merchant_id', '=', 'merchants.id')
                ->where('transactions.status', 'success')
                ->whereBetween('transactions.created_at', [$start_date, $end_date])
                ->groupBy('x')
                ->orderBy('y', 'ASC')
                ->limit(10)
                ->get();

        return response()->json($transaction_top_merchant);
    }

    public function filter_month_transaction(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        if ($start) {
            $start = str_replace(',', '', $request->start_date).' 00:00:00';
            $start_date = date('Y-m-d H:i:s', strtotime($start));
        }

        if ($end) {
            $end = str_replace(',', '', $request->end_date).' 23:59:59';
            $end_date = date('Y-m-d H:i:s', strtotime($end));
        }

        $transaction_current_month = DB::table('transactions')
                ->select(
                    DB::raw('SUM(transactions.amount) as y'),
                    DB::raw("DATE_FORMAT(created_at, '%d') as x"),
                )->where('transactions.status', 'success')
                ->whereBetween('created_at', [$start_date, $end_date])
                ->groupBy('x')
                ->orderBy('x', 'asc')
                ->get();

        return response()->json($transaction_current_month);
    }
}
