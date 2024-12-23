<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentMethodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('payment methods.index', [
            'title' => 'Admin',
            'menu' => 'Payment_Methods',
            'datas' => PaymentMethods::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('payment methods.create', [
            'title' => 'Admin',
            'menu' => 'Payment_Methods'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payment_methods = DB::table('jenis_pembayarans')
        ->where('metode_pembayaran', '=', $request->metode_pembayaran)
        ->value('metode_pembayaran');
        if($payment_methods){
            return view('payment methods.create', [
                'title' => 'Admin',
                'menu' => 'Payment_Methods',
                'status' => 'duplikat',
                'pesan' => 'Payment Method'
                . $request->metode_pembayaran .
                'Data sudah ada',
                'metode_pembayaran' => $request->metode_pembayaran
            ]);
        }else{
            $data = $request->only([
                'metode_pembayaran'
            ]);
            $simpan = PaymentMethods::create($data);
            if($simpan){
                return view('payment methods.index', [
                'title' => 'Admin',
                'menu' => 'Payment_Methods',
                'datas' => PaymentMethods::all(),
                'status' => 'simpan',
                'pesan' => 'Payment_Methods'
                . $request->metode_pembayaran .
                'Data sudah disimpan'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payment_methods = PaymentMethods::find($id);
        //dd($payment_methods);
        return view('payment methods.edit', [
            'title' => 'Admin',
            'menu' => 'Payment_Methods',
            'data' => $payment_methods
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $payment_methods = DB::table('jenis_pembayarans')
        ->where('metode_pembayaran', '=', $request->metode_pembayaran)
        ->value('metode_pembayaran');

        if($payment_methods){
            return view('payment methods.edit', [
                'title' => 'Admin',
                'menu' => 'Payment_Methods',
                'status' => 'Duplikat',
                'pesan' => 'Payment_Methods'
                . $request->metode_pembayaran .
                'Data sudah ada',
                'metode_pembayaran' => $request->metode_pembayaran,
                'data_lama' => $request->metode_pembayaran
            ]);

        }else{
        $data = PaymentMethods::find($id);
        $data->metode_pembayaran = $request->metode_pembayaran;
        $data->save();
        return view('payment methods.index', [
            'title' => 'Admin',
            'menu' => 'Payment_Methods',
            'datas' => PaymentMethods::all(),
            'status' => 'edit',
            'pesan' => 'The methods has been updated'
        ]);
        }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //dd($id);
        PaymentMethods::find($id)->delete();
        return view('payment methods.index', [
            'title' => 'Admin',
            'menu' => 'Payment Methods',
            'datas' => PaymentMethods::all(),
            'pesan' => 'Data sudah dihapus'
        ]);
    }
}
