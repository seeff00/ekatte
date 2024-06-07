<?php

namespace App\Controller;

use App\Utils\DBSeeder;

class Admin extends Controller
{
    /**
     * Seeds handler.
     *
     * @param HTTPRequest $request
     * @return void
     */
    public function seeders(HTTPRequest $request) : void
    {
        $dbSeeder = new DBSeeder();
        $dbSeeder->run();

        $response = [];

        $this->view('admin/seeders', $response);
    }
}