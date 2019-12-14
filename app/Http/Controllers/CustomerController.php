<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'DESC')->paginate(5);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $customer = $this->validate($request, [
            'name'  => 'required|string',
            'phone' => 'required|max:13',
            'address' => 'required|string',
            'email' => 'required|email|string|unique:customers,email'
        ]);

        try {
            $customer = Customer::create($customer);
            return redirect('/customer')->with(['success' => '<strong>' . $customer->name . '</strong> Berhasil disimpan']);
        } catch (Exception $e) {
            return redirect('/customer/create')->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update(
            $request->validate([
                'name'  => 'required|string',
                'phone' => 'required|max:13',
                'address' => 'required|string',
            ])
        );

        return redirect('/customer')->with(['success' => '<strong>' . $customer->name . '</strong> Berhasil Diperbaharui']);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();

        return redirect('/customer')->with(['success' => '<strong>' . $customer->name . '</strong> Berhasil Dihapus']);
    }
}
