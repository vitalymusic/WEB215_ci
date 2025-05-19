<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   

        return view('welcome_message');
    }



    public function news($id=0): string
    {   
        $db = db_connect();
       
        $builder = $db->table('news');
         
        $query = $builder->get();

        foreach ($query->getResult() as $row) {
             $data["news"][] = $row;

        }



        // $data["news"] = [
        //     ["title"=>"News 1","content"=>"This is news 1"],
        //     ["title"=>"News 2","content"=>"This is news 2"],
        //     ["title"=>"News 3","content"=>"This is news 3"],
        // ];
        $data["title"] = "Новости";

        
        // return dd($data);
        return view('news',$data);
    }


    public function contacts(){
         $data["title"] = "Контакты";
        return view('contacts',$data);
    }



     public function get_news_comments($id){
        $db = db_connect();
        $builder = $db->table('news_comments');
        $query = $builder->where('news_id',$id)->get();
        foreach ($query->getResult() as $row) {
                $data["comments"][] = $row;
        }
        if(isset( $data["comments"])){
            $data["answer"]=true;
            return $this->response->setJSON($data);
        }else{
            $data["answer"]=false;
            return $this->response->setJSON($data);
        }
         
     }



     public function addComment(){
        $data = $request->getPost();
        return $this->response->setJSON($data);

     }

}
