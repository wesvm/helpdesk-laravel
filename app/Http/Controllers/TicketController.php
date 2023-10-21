<?php

namespace App\Http\Controllers;

use App\Enums\TicketStatus;
use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function create()
    {
        $categories = Category::all();
        return view('ticket.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|max:8',
            'date' => 'required|date',
            'category' => 'required',
            'sector' => 'required|max:50',
            'fullnames' => 'required|max:255',
            'priority' => 'required',
            'description' => 'required|max:255',
            'subject' => 'required|max:100',
        ]);

        $ticket = new Ticket();
        $ticket->dni = $request->input('dni');
        $ticket->category_id = $request->input('category');
        $ticket->sector = $request->input('sector');
        $ticket->fullnames = $request->input('fullnames');
        $ticket->priority = $request->input('priority');
        $ticket->description = $request->input('description');
        $ticket->subject = $request->input('subject');
        $ticket->status = TicketStatus::PENDIENTE;
        $ticket->assigned_admin_id = null;

        $ticket->save();

        return redirect()->route('index')->with('success', 'Ticket successfully created!');
    }

    public function showList(Request $request)
    {

        $tickets = Ticket::query();

        if ($request->input('dni')) {
            $tickets->where('dni', 'like', "%" . $request->input('dni') . "%");
        }

        if ($request->input('names')) {
            $tickets->where('fullnames', 'like', "%" . $request->input('names') . "%");
        }

        $tickets = $tickets->latest()->paginate(5);

        return view('ticket.show', compact('tickets'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
