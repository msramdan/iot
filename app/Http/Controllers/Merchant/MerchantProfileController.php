<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Merchant;
use App\Models\MerchantsCategory;
use App\Models\MerchantApprove;
use App\Models\Bank;
use App\Models\Bussiness;
use App\Models\ApprovalLogMerchant;
use App\Models\MdrLog;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Exception;
use Log;
use Illuminate\Support\Facades\Storage;

class MerchantProfileController extends Controller
{
    public function index() {
        $merchant_categories = MerchantsCategory::all();
        $banks = Bank::all();
        $bussinesses = Bussiness::all();
        $merchant = Merchant::with([
            'bussiness',
            'merchant_approve',
            'bank',
            'merchant_category',
        ])->findOrFail(auth()->guard('merchant')->user()->id);

        $approval_logs = ApprovalLogMerchant::where('merchant_id', $merchant->id)->orderBy('id', 'desc')->limit(6)->get();
        $mdr_logs = MdrLog::where('merchant_id', $merchant->id)->orderBy('id', 'desc')->limit(5)->get();

        return view('merchant.profile.index', compact('merchant', 'merchant_categories', 'banks', 'bussinesses', 'approval_logs', 'mdr_logs'));
    }

    public function update_personal(Request $request) {
        $merchant = Merchant::findOrfail(auth()->guard('merchant')->user()->id);

        $validator = Validator::make(
            $request->all(),
            [
                'merchant_name' => 'required|string|max:200',
                'email' => 'required|string|max:100|unique:merchants,email,'.$merchant->id,
                'merchant_category_id' => 'required|numeric|exists:merchants_category,id',
                'bussiness_id' => 'required|numeric|exists:bussinesses,id',
                'phone' => 'required|string|max:100|min:11|regex:/[0-9]+/im',
                'address1' => 'required|string',
                'address2' => 'required|string',
                'city' => 'required|string|max:100',
                'zip_code' => 'required|string|max:10',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Data failed to save', 'error');
            return redirect()->back()->withErrors($validator);
        }

        DB::beginTransaction();

        try {
            $merchant->merchant_name = $request->merchant_name;
            $merchant->email = $request->email;
            $merchant->merchant_category_id = $request->merchant_category_id;
            $merchant->bussiness_id = $request->bussiness_id;
            $merchant->bank_id = $request->bank_id;
            $merchant->phone = $request->phone;
            $merchant->address1 = $request->address1;
            $merchant->address2 = $request->address2;
            $merchant->city = $request->city;
            $merchant->zip_code = $request->zip_code;
            $merchant->save();

        } catch (Exception $e) {
            DB::rollBack();
            Alert::toast('Failed to update profil', 'error');
            return redirect()->back()->withErrors('Failed to update profil');
        } finally {
            DB::commit();
            Alert::toast('Success update personal data', 'success');
            return redirect()->back();
        }
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'old_password' => [
                    'required'
                ],
                'passsword' => [
                    'required|confirmed',Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        ->uncompromised()
                ],
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Failed to update password', 'error');
            return redirect()->back()->withErrors($validator);
        }

        $merchant = Merchant::findOrfail(auth()->guard('merchant')->user()->id);

        DB::beginTransaction();
        try {
            if (!Hash::check($request->old_password, $merchant->password)) {
                Alert::toast('Failed to update password', 'error');
                return redirect()->back()->withErrors(['old_password' => "old password doesn`t match"]);
            }

            $merchant->password = Hash::make($request->password);
            $merchant->save();

            DB::commit();
            Alert::toast('Success update password', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            Alert::toast('Failed to update password', 'error');
            return redirect()->back()->withErrors('Failed to update password');
        }
    }

    public function update_document(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'identity_card_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'npwp_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'owner_outlet_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'selfie_ktp_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'outlet_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
                'in_outlet_photo' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]
        );

        if ($validator->fails()) {
             Alert::toast('Failed to update document', 'error');
            return redirect()->back()->withErrors($validator);
        }

        $merchant = Merchant::findOrFail(auth()->guard('merchant')->user()->id);

        if ($merchant->is_active == 1 && $merchant->approved1 == 'approved' && $merchant->approved2 == 'approved') {
            Alert::toast('Failed to update document, Merchant Already Approved by Admin', 'error');
            return redirect()->back()->withErrors('Failed to update document, Merchant Already Approved by Admin');
        }

        $data_merchant_approve = [];
        $merchant_approve = MerchantApprove::where('merchant_id', $merchant->id)->first();

        if (!$merchant_approve) {
            Alert::toast('Merchant Approve data not found', 'error');
            return redirect()->route('merchant.approval');
        }

        DB::beginTransaction();
        try {
            if ($request->hasFile('identity_card_photo')) {
                $identity_card_file     = $request->file('identity_card_photo');
                $identity_card_name     = Str::random(15).'.'.$identity_card_file->extension();

                $data_merchant_approve['identity_card_photo'] = $identity_card_name;

                $identity_card_file->storeAs('public/backend/images/identity_card', $identity_card_name);

                Storage::disk('local')->delete('public/backend/images/identity_card/' . $merchant_approve->identity_card);
            }

            if ($request->hasFile('npwp_photo')) {
                $npwp_file              = $request->file('npwp_photo');
                $npwp_photo_name        = Str::random(15).'.'.$npwp_file->extension();

                $data_merchant_approve['npwp_photo'] = $npwp_photo_name;
                $npwp_file->storeAs('public/backend/images/npwp', $npwp_photo_name);

                Storage::disk('local')->delete('public/backend/images/npwp/' . $merchant_approve->npwp_photo);
            }

            if ($request->hasFile('owner_outlet_photo')) {
                $owner_outlet_file      = $request->file('owner_outlet_photo');
                $owner_outlet_name      = Str::random(15).'.'.$owner_outlet_file->extension();

                $data_merchant_approve['owner_outlet_photo'] = $owner_outlet_name;
                $owner_outlet_file->storeAs('public/backend/images/owner_outlet', $owner_outlet_name);

                Storage::disk('local')->delete('public/backend/images/owner_outlet/' . $merchant_approve->owner_outlet_photo);
            }

            if ($request->hasFile('selfie_ktp_photo')) {
                $selfie_ktp_file        = $request->file('selfie_ktp_photo');
                $selfie_ktp_name        = Str::random(15).'.'.$selfie_ktp_file->extension();

                $data_merchant_approve['selfie_ktp_photo'] = $selfie_ktp_name;
                $selfie_ktp_file->storeAs('public/backend/images/selfie_ktp', $selfie_ktp_name);

                Storage::disk('local')->delete('public/backend/images/selfie_ktp/' . $merchant_approve->selfie_ktp_photo);
            }

            if ($request->hasFile('outlet_photo')) {
                $outlet_file            = $request->file('outlet_photo');
                $outlet_name            = Str::random(15).'.'.$outlet_file->extension();

                $data_merchant_approve['outlet_photo'] = $outlet_name;
                $outlet_file->storeAs('public/backend/images/outlet', $outlet_name);

                Storage::disk('local')->delete('public/backend/images/outlet/' . $merchant_approve->outlet_photo);
            }

            if ($request->hasFile('in_outlet_photo')) {
                $in_outlet_file         = $request->file('in_outlet_photo');
                $in_outlet_name         = Str::random(15).'.'.$in_outlet_file->extension();

                $data_merchant_approve['in_outlet_photo'] = $in_outlet_name;
                $in_outlet_file->storeAs('public/backend/images/in_outlet', $in_outlet_name);

                Storage::disk('local')->delete('public/backend/images/in_outlet/' . $merchant_approve->in_outlet_photo);
            }

            $merchant->update([
                'is_active' => 0,
                'approved1' => 'need_approved',
                'approved2' => 'need_approved',
            ]);

            if (count($data_merchant_approve) > 0) {
                $merchant_approve->update($data_merchant_approve);

                $ref_approval1 = ApprovalLogMerchant::where('merchant_id', $merchant->id)->where('step', 'approved1')->orderBy('id', 'desc')->first();

                $ref_approval2 = ApprovalLogMerchant::where('merchant_id', $merchant->id)->where('step', 'approved2')->orderBy('id', 'desc')->first();

                $approval_log1 = ApprovalLogMerchant::create([
                    'merchant_id' => $merchant->id,
                    'status' => 'need_approved',
                    'step' => 'approved1',
                    'ref' => intval($ref_approval1->ref) + 1
                ]);

                $approval_log2 = ApprovalLogMerchant::create([
                    'merchant_id' => $merchant->id,
                    'status' => 'need_approved',
                    'step' => 'approved2',
                    'ref' => intval($ref_approval2->ref) + 1,
                ]);
            }
        } catch (Exception $e) {
            DB::rollBack();
            Alert::toast('Failed to update document', 'error');
            return redirect()->back();
        } finally {
            DB::commit();
            Alert::toast('Success update document', 'success');
            return redirect()->back();
        }
    }

    public function update_bank(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                'bank_id' => 'required|numeric|exists:banks,id',
                'account_name' => 'required|string|max:100',
                'number_account' => 'required|string|max:100|regex:/[0-9]+/im',
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Failed to update data bank', 'error');
            return redirect()->back()->withErrors($validator);
        }

        $merchant = Merchant::findOrFail(auth()->guard('merchant')->user()->id);

        DB::beginTransaction();

        try {
            $merchant->bank_id = $request->bank_id;
            $merchant->account_name = $request->account_name;
            $merchant->number_account = $request->number_account;
            $merchant->save();

            DB::commit();
            Alert::toast('Success update data bank', 'success');
            return redirect()->back();

        } catch (Exception $e) {
            DB::rollBack();
            Alert::toast('Failed to update data bank', 'error');
            return redirect()->back();
        }
    }

    public function update_pic(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'photo' => 'required|mimes:png,jpg,jpeg|max:3072'
            ]
        );

        if ($validator->fails()) {
            Alert::toast('Failed to update Photo', 'error');
            return redirect()->back();
        }

        $merchant = Merchant::findOrFail(auth()->guard('merchant')->user()->id);

        if ($request->hasFile('photo')) {
            $photo_file = $request->file('photo');
            $photo_name = Str::random(10).'.'.$photo_file->extension();

            $photo_file->storeAs('public/frontend/assets/images/users', $photo_name);

            Storage::disk('local')->delete('public/frontend/assets/images/users/'.$merchant->pic);

            $merchant->update([
                'pic' => $photo_name
            ]);

            if ($merchant) {
                Alert::toast('Success to update photo', 'success');
                return redirect()->back();
            } else {
                Alert::toast('Failed to update photo', 'error');
                return redirect()->back();
            }
        }

        Alert::toast('Failed to update photo', 'error');
        return redirect()->back();
    }
}
