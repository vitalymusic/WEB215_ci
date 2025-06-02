<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {   


        $db = db_connect();
        $builder = $db->table('news');
        $query = $builder->get();
        foreach ($query->getResult() as $row) {
             $data["news"][] = $row;

        }

        return view('admin/index',$data);
    }


    public function add_news(){
            return view('admin/add_news');

    }

}