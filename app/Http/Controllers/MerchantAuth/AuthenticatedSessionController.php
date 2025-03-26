<?php

namespace App\Http\Controllers\MerchantAuth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('merchant.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate('merchant');

        $request->session()->regenerate();

        return to_route('merchant.index');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
      
        Auth::guard('merchant')->logout();

        $request->session()->forget('guard.merchant');

        $request->session()->regenerateToken();

        return redirect('/merchant/login');
    }
}
