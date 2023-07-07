<?php

namespace App\Http\Controllers;

use App\Models\CompraWebPay;
use App\Http\Requests\StoreCompraWebPayRequest;
use App\Http\Requests\UpdateCompraWebPayRequest;
use App\Models\Cuenta_morosa;

class CompraWebPayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompraWebPayRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompraWebPayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompraWebPay  $compraWebPay
     * @return \Illuminate\Http\Response
     */
    public function show(CompraWebPay $compraWebPay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompraWebPay  $compraWebPay
     * @return \Illuminate\Http\Response
     */
    public function edit(CompraWebPay $compraWebPay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompraWebPayRequest  $request
     * @param  \App\Models\CompraWebPay  $compraWebPay
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompraWebPayRequest $request, CompraWebPay $compraWebPay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompraWebPay  $compraWebPay
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompraWebPay $compraWebPay)
    {
        //
    }
}
