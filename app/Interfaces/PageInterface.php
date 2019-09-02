<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface PageInterface
{
    public function create();
    public function store(Request $request);
    public function listing(Request $request);
    
    public function editPage($id);    
    public function deleteMultiplePages(Request $request);
    public function deleteSinglePage(Request $request);

}
