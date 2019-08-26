<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Services\TicketService;

class TicketsController extends Controller
{
    private $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(TicketRequest $request)
    {
        $attributes = $request->all();
        $response = $this->ticketService->createNewTicket($attributes);

        if (!empty($response['success'])) {
            return redirect('/tickets/create')->with($response);
        }

        return back()->with($response)->withInput($attributes);
    }

    public function show($id)
    {
        $ticket = $this->ticketService->getTicket($id);
        return view('tickets.show', compact('ticket'));
    }
}
