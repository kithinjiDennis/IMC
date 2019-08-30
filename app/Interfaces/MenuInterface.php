<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MenuInterface
{
    public function getMenuTypes();
    public function getPages();
    public function getMenus();

    public function create();
    public function store(Request $request);
    public function listing(Request $request);

    public function deleteSingleMenu(Request $request);
    public function deleteMultipleMenu(Request $request);
    public function deleteSingleSubMenu(Request $request);

    public function deleteMultipleSubMenu(Request $request);
    public function editMenu($id);
    public function createSubMenu();

    public function storeSubMenu(Request $request);
    public function menuDetails($id);
    public function editSubMenu($id);

    public function updateMenuOrder(Request $request);  

}
