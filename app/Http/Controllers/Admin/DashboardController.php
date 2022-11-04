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

        $transaction_month = Transaction::select(
            DB::raw("DATE_FORMAT(created_at, '%m') as bulan"),
            DB::raw("(COUNT(*)) as total_transaction"),
            DB::raw("sum(amount) as total_amount")
        )->where('status', 'success')
         ->orderBy('created_at')
         ->groupBy("bulan")
         ->limit(10)
         ->get();

        $transaction_top_merchant = DB::table('transactions')
                ->select(
                    DB::raw('SUM(transactions.amount) as total_transaction'),
                    DB::raw('merchants.merchant_name as merchant_name')
                )
                ->join('merchants', 'transactions.merchant_id', '=', 'merchants.id')
                ->where('transactions.status', 'success')
                ->groupBy('merchant_name')
                ->orderBy('total_transaction', 'DESC')
                ->limit(10)
                ->get();

        $merchant_active = Merchant::where('is_active', 1)->count();
        $merchant_inactive = Merchant::where('is_active', 0)->count();



        // $transaction_top_merchant = Transaction::select(
        //     DB::raw("sum(amount) as total_amount")
        // )->where('status', 'success')
        //  ->where(DB::raw("year(created_at) = {$year}"))
        //  ->orderBy('total_amount')
        //  ->groupBy('merchant_id')
        //  ->limit(10)
        //  ->get();

        //  dd($transaction_top_merchant);
        //======================= End Chart ===========================

        return view('admin.dashbaord.index', compact(
            'transaction_amount',
            'transaction_count',
            'total_fee_transaction',
            'total_merchant_active'
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

}
