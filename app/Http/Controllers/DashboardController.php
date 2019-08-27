<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TicketService;

class DashboardController extends Controller
{
    private $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index()
    {
        request()->flashOnly(['client_email', 'order_number']);
        $attributes = request()->all();
        $orders = $this->ticketService->getTickets($attributes);
        return view('index', compact('orders'));
    }
}
