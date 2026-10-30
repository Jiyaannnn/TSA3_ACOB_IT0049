<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Contracts\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        // Eloquent reads persisted rows; the same collection supplies rows and filter counts.
        $customers = Customer::orderBy('id')->get();
        $groups = $customers->countBy('status')->all();

        return view('pages.customers', ['title' => 'Customer Accounts', 'activePage' => 'customers', 'customers' => $customers, 'groups' => $groups]);
    }
}
