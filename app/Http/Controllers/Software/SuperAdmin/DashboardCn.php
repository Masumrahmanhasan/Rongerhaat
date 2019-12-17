<?php

namespace App\Http\Controllers\Software\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Publisher;
use App\Model\Book;
use App\Model\Testimonial;
use App\Model\Blog;

class DashboardCn extends Controller
{
    public function index()
    {
        return saView('pages.dashboard');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
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
