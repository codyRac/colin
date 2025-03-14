<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Inertia\Inertia;
class WelcomeController extends Controller
{
    public function index()
{
    $content = Content::get(); // Fetch all content from database
    return Inertia::render('Welcome', ['content' => $content]);
}
}
