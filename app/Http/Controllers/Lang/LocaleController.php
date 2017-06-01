<?php

namespace App\Http\Controllers\Lang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocaleController extends Controller
{
    /**
     * Change locale in session.
     * @param  Request $request
     * @return Response
     */
    public function changeLocale(Request $request)
    {
        if($request->lang=='es' || $request->lang=='en'){
            \Session::put('locale', $request->lang);
        }

        return redirect()->back();
    }

}
