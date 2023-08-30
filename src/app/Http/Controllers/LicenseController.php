<?php

namespace Erjon\Cone\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Erjon\Cone\App\Http\Requests\ActivateLicenseRequest;
use Erjon\Cone\App\Services\KeyService;
use \Exception;

class LicenseController extends Controller
{
    private $keyService;

    public function __construct(KeyService $keyService)
    {
        $this->keyService = $keyService;
    }

    public function showLicenseForm()
    {
        return view('cone::license');
    }

    public function activateLicense(ActivateLicenseRequest $request)
    {
        try {
            if ($this->keyService->activate($request->validated())) {
                return redirect()->route(config('cone.route-after-license'));
            }

            return back()->withErrors(['key' => 'Wrong key']);
        } catch (Exception $exception) {
            return back()->withErrors(['key' => 'An error occurred']);
        }
    }
}
