<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shortener;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Validated;
use Symfony\Component\Console\Input\Input;



class ShortenerController extends Controller
{
    public function index()
    {
        $shorten = shortener::latest()->get();
        return view('shorten',compact('shorten'));
    }
    public function store(Request $request)
    {
            $request->validate([
                'link' => 'required|url',
            ],
            [
                'link.required'=>'URL is required !!'
            ]
        );

            $input['link'] = $request->link;
            $input['code'] = Str::random(6);
            shortener::create($input);
            return redirect('generate-short-link')->withSuccess('Short Url Generate Successfully.');
    }

    public function shortUrl($code)
    {
        $find = shortener::where('code',$code)->first();
        return redirect($find->link);
    }
}
