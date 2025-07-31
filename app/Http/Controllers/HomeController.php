<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;

class HomeController extends Controller
{
    public function Home(){        
        $properties = Properties::paginate(10);
        $property_links = Properties::inRandomOrder()->limit(30)->get();
        return view('pages.home', compact('properties', 'property_links'));
    }
}
