<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrencyMgmt;
use App\Http\Requests\Backend\CurrencyMgmt\CreateCurrencyMgmtRequest;
use App\Http\Requests\Backend\CurrencyMgmt\EditCurrencyMgmtRequest;
use App\Http\Requests\Backend\CurrencyMgmt\DeleteCurrencyMgmtRequest;

class CurrencyController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index(){
    	$data = CurrencyMgmt::get();
    	return view('currency_mgmt.index',compact('data'));
    }

    public function create(CreateCurrencyMgmtRequest $request){
    	return view('currency_mgmt.create');
    }

    public function store(CreateCurrencyMgmtRequest $request){
    	$this->validate($request,[
            'title' => 'required',
            'symbol' => 'required',
            
        ]);
        $data['title'] = $request->title;
    	$data['symbol'] = $request->symbol;
    	CurrencyMgmt::create($data);
    	
    	return redirect()->route('currency.index')->withFlashSuccess('Currency has been added successfully.');
    }

    public function delete(DeleteCurrencyMgmtRequest $request, $id){
    	CurrencyMgmt::destroy($id);
        return redirect()->route('currency.index')->withFlashSuccess('Currency is deleted successfully.');

    }

    public function edit(EditCurrencyMgmtRequest $request, $id){
    	$data = CurrencyMgmt::findOrFail($id);
    	return view('currency_mgmt.edit',compact('data'));
    }

    public function update(EditCurrencyMgmtRequest $request, $id){
    	$this->validate($request,[
            'title' => 'required',
            'symbol' => 'required',
           
        ]);
        $currency = CurrencyMgmt::findOrFail($id);
        $currency->update($request->all());
        return redirect()->route('currency.index')->withFlashSuccess('Currency is updated successfully.');
    }
}
