<?php

namespace Erjon\Cone\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Key;
use Erjon\Cone\App\Http\Requests\ActivateLicenseRequest;
use Erjon\Cone\Cone;
use \Exception;

class LicenseController extends Controller
{

    public function showLicenseForm()
    {
        return view('cone::license');
    }

    public function activateLicense(ActivateLicenseRequest $request)
    {
        try {
            if ((new Cone)->activateLicense(\Auth::user()->email, $request->validated()['key'])) {
                return redirect()->route(config('cone.route-after-license'));
            }

            return back()->withErrors(['key' => 'Wrong key']);
        } catch (Exception $exception) {
            return back()->withErrors(['key' => 'An error occurred']);
        }
    }
}
