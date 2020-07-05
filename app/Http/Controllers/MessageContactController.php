<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageStoreRequest;
use App\Mail\MessageRecivied;
use Illuminate\Support\Facades\Mail;

use Stevebauman\Purify\Facades\Purify;

class MessageContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {         
        return $this->create();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('mailContact.formContact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageStoreRequest $storeRequest)
    {
        $contact = env('MAIL_CONTACT');

        $pepe = Purify::clean($storeRequest->post());
        
        Mail::to($contact)->queue(new MessageRecivied($pepe));       
        return back()->with('success',"El Email se ha enviado correctamente!");
    }
}

    
