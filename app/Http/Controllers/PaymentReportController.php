<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentReportRequest;
use App\Models\Category;
use App\Models\PaymentReport;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home', [
            'paymentReports' => PaymentReport::orderBy('date_in', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('paymentReport.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentReportRequest $request)
    {
        $payment = new PaymentReport();
        $payment->user_id = $request->User()->id;
        $payment->date_in = $request->get("date");
        $payment->cash_in = $request->get("typePayment");
        $payment->name_payment = $request->get("namePayment");
        $payment->valuePayment = $request->get("valuePayment");
        $payment->save();



        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentReport  $paymentReport
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentReport $paymentReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentReport  $paymentReport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = PaymentReport::findOrFail($id);
        return view('paymentReport.edit', [
            'paymentEdit' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentReport  $paymentReport
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentReportRequest $request,  $id)
    {
        $paymentEdit = PaymentReport::findOrFail($id);
        $paymentEdit->date_in = $request->get("date");
        $paymentEdit->cash_in = $request->get("typePayment");
        $paymentEdit->valuePayment = $request->get("valuePayment");
        $paymentEdit->save();

        return redirect('/home');
    }

    public function confirmDelete($id)
    {
        $report = PaymentReport::findOrFail($id);
        return view('paymentReport.confirmDelete', [
            'paymentConfirmDelete' => $report
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentReport  $paymentReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentDelete = PaymentReport::findOrFail($id);
        $paymentDelete->delete();

        return redirect('/home');
    }
}
