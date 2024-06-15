<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Project;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $projects = Project::all();
        $testimonis = Testimoni::all();
        $pemesanans = Pemesanan::all();
        $type_menu = 'Home';
        return view('pages.home.home-index', compact('type_menu', 'users', 'projects', 'testimonis', 'pemesanans'));
    }
}
