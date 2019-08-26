<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Ticket;
use App\Client;

class TicketService {
    private $ticketModel;
    private $clientModel;

    public function __construct(Ticket $ticketModel, Client $clientModel) {
        $this->ticketModel = $ticketModel;
        $this->clientModel = $clientModel;
    }

    public function getTicket($id) {
        return $this->ticketModel->findOrFail($id);
    }

    public function getTickets($attributes) {
        $ticketsQuery = $this->ticketModel->query();
        // Filter client by email if receives from request
        if (!empty($attributes['client_email'])) {
            $ticketsQuery = $ticketsQuery->whereHas('client', function ($query) use ($attributes) {
                // Check if the client_email of the ticket is the same of the request
                $query->where('email', $attributes['client_email']);
            });
        }
        // Filter tickets by order_number if receives from request
        if (!empty($attributes['order_number'])) {
            $ticketsQuery = $ticketsQuery->where('order_number',  $attributes['order_number']);
        }

        return $ticketsQuery->simplePaginate(5);
    }

    public function createNewTicket($attributes) {
        // Start transaction to prevent create clients or tickets if one of them fail
        DB::beginTransaction();

        try {
            $client = $this->clientModel->where('email', $attributes['client_email'])->first();
            // Check if has a client with this email
            if (empty($client)) {
                // If hasn't, creates one
                $clientId = $this->clientModel->create([
                    'name' => $attributes['client_name'],
                    'email' => $attributes['client_email']
                ])->id;
            } else {
                $clientId = $client->id;
            }

            // Check if ticket already exists
            $ticketFound = $this->ticketModel->where('order_number', $attributes['order_number'])->first();

            // If ticket exists and belongs to another user, return a message
            if (!empty($ticketFound) && $ticketFound->client_id != $clientId) {
                return ['warning' => 'O número do pedido informado ja pertence a outro usuário'];
            }

            // If ticket not exists, creates one
            if (empty($ticketFound)) {
                $this->ticketModel->create([
                    'title' => $attributes['title'],
                    'content' => $attributes['content'],
                    'order_number' => $attributes['order_number'],
                    'client_id' => $clientId,
                ]);
            } else {
                $ticketFound->title = $attributes['title'];
                $ticketFound->content = $attributes['content'];
                $ticketFound->save();
            }

            DB::commit();
            return ['success' => 'O ticket foi salvo com sucesso!'];
        } catch (\Exception $e) {
            // If something goes wrong, just print on logs (TODO: work on a better solution of logs), and return an error message
            DB::rollback();
            Log::error('An unexpected error occurred'. $e->getMessage());
            return ['error' => 'Não foi possível salvar o ticket'];
        }
    }
}
