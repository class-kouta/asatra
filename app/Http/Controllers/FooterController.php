<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function faqTop()
    {
        return view('footer.faq');
    }

    public function faqAboutWithdraw()
    {
        return view('/footer/faq/about_withdraw');
    }
}
