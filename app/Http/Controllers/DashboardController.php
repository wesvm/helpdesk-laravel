<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use App\Models\User;

class DashboardController extends Controller
{
    public function show()
    {
        $ticketsPendientes = Ticket::where('status', 'Pendiente')->count();
        $admins = User::where('role', 'Administrador')->count();
        $categorias = Category::count();

        return view('dashboard.index', compact('ticketsPendientes', 'admins', 'categorias'));
    }
}
