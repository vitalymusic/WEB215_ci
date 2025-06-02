<?php

namespace App\Controllers;

class Admin extends BaseController
{

    function __construct(){
            $this->request = service('request');
            $this->db = db_connect();

    }

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
     public function add_news_db(){
              $input = $this->request->getPost();
              $builder = $this->db->table('news');  
               $data = [
            'news_title'       => esc($input["news_name"]),
            'news_content'        => esc($input["news_content"]),
            ];
        if($builder->insert($data)){
        return redirect()->to('admin');
    }

    }

}