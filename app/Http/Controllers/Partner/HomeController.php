<?php

namespace App\Http\Controllers\Partner;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Password;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    public function index()
    {
        $start_month = Carbon::now()->firstOfMonth()->hour(00)->minute(00)->second(00);
        $end_month =  Carbon::now()->lastOfMonth()->hour(23)->minute(59)->second(59);

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

        return view('merchant.dashboard.index', compact(
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
                'old_password' => 'required',
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

        $merchant = Merchant::where('id', auth()->guard('merchant')->user()->id)->first();

        if (!Hash::check($request->password, $merchant->password)) {
            Alert::toast('Old password doesn`t match', 'error');
        }

        $merchant->update([
            'is_force_pass' => 1,
            'password' => Hash::make($request->password),
        ]);

        if ($merchant) {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Data Updated successfully', 'success');
            return redirect()->back();
        }
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
                ->where('merchant_id', auth()->guard('merchant')->user()->id)
                ->whereBetween('created_at', [$start_date, $end_date])
                ->groupBy('x')
                ->orderBy('x', 'asc')
                ->get();

        return response()->json($transaction_current_month);
    }
}