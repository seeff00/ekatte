<?php

namespace App\Controller;

use App\Utils\DBSeeder;
use Exception;

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
        try {
            $dbSeeder = new DBSeeder();
            $dbSeeder->run();
            echo "Seeding ends successfully";
        } catch (Exception $e){
            echo $e->getMessage();
        }

        $response = [];

        $this->view('admin/seeders', $response);
    }
}