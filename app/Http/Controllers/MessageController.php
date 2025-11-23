<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('messages.index', [
            'employees' => Message::all()
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create', [
            'message' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        $message = Message::create($request->validated());

        $request->session()->flash('success', 'Üzenet sikeresen beküldve!');

        return view('messages.create', [
            'message' => [],
        ]);
    }
}
