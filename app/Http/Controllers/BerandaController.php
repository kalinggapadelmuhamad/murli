<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class BerandaController extends Controller
{
    public function index()
    {
        $type_menu = 'Home';
        $projects = Project::with('Galery')->limit(3)->get();
        return view('pages.beranda.beranda-index', compact('type_menu', 'projects'));
    }

    public function ourProject()
    {
        $type_menu = 'ourProject';
        $projects = Project::with('Galery')->get();
        return view('pages.beranda.our-project-index', compact('type_menu', 'projects'));
    }

    public function ourProjectDetail(Project $project)
    {
        $type_menu = 'ourProject';
        return view('pages.beranda.our-project-detail', compact('type_menu', 'project'));
    }

    public function estimasiBiaya()
    {
        $type_menu = 'Pricing';
        return view('pages.beranda.estimasi-index', compact('type_menu'));
    }

    public function indexPemesanan(Request $request)
    {
        $type_menu = 'Pricing';
        return view('pages.beranda.pricing-index', compact('type_menu', 'request'));
    }

    public function storePemesanan(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "project" => 'required',
            "jumlah_tingkat" => 'required',
            "luas_bangunan" => 'required',
            "type" => 'required',
        ]);

        if ($request->type == 'Paket A') {
            $hargaPaket = 45000;
        } else if ($request->type == 'Paket B') {
            $hargaPaket = 60000;
        } else if ($request->type == 'Paket C') {
            $hargaPaket = 75000;
        } else if ($request->type == 'Paket D') {
            $hargaPaket = 100000;
        } else {
            $hargaPaket = 1;
        }

        $cost = ($request->luas_bangunan * 112000 * $request->jumlah_tingkat) + ($hargaPaket * $request->luas_bangunan * $request->jumlah_tingkat);


        $pemesanan = Pemesanan::create([
            "name" => $request->name,
            "projectName" => $request->project,
            "email" => $request->email,
            "phone" => $request->phone,
            "jumlah_tingkat" => $request->jumlah_tingkat,
            "luas_bangunan" => $request->luas_bangunan,
            "designType" => $request->type,
            'cost' => $cost,
            'status' => 'Unpaid',
        ]);

        return Redirect::route('finishPemesanan.index', $pemesanan);
    }

    public function finishPemesanan(Pemesanan $pemesanan, Request $request)
    {
        $type_menu = 'Pricing';
        return view('pages.beranda.pricing-finish', compact('type_menu', 'pemesanan'));
    }
}
