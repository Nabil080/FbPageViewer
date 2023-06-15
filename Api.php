<?php
require_once 'config.php';

class Api{
    private string $token = API_TOKEN;
    private string $id = "109157512212506";
    private string $params = "posts?fields=message,created_time,attachments";
    private string $url;

    // -------------------- GETTERS --------------------

    public function getId()
    {
        return $this->id;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getParams()
    {
        return $this->params;
    }

    // -------------------- SETTERS --------------------

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function setParams($token)
    {
        $this->token = $token;
    }

    // --------------------- METHODS ------------------
    public function getUrl(string $id = null ,string $token = null, string $params = null):string
    {
        if($id === null){ $id = $this->id;}
        if($token === null){ $token = $this->token;}
        if($params === null){ $params = $this->params;}

        return $this->url = "https://graph.facebook.com/v12.0/$id/$params&access_token=$token";
    }

    public function getDatas():array
    {
        $response = file_get_contents($this->getUrl());

        if ($response !== false) {
            $data = json_decode($response, true);

            return $data['data'];
        } else {

            return [];
        }
    }

    public function getAllPosts():array
    {
        $datas = $this->getDatas();
        $posts = [];

        foreach ($datas as $post) {
            $message = isset($post['message']) ? $post['message'] : "Inconnu" ;
            $createdTime = $post['created_time'];

            $images = [];
            if(isset($post['attachments'])){
                if(isset($post['attachments']['data'][0]['subattachments'])){
                $imagesData = $post['attachments']['data'][0]['subattachments']['data'];
                    foreach ($imagesData as $imageData){
                        if($imageData['type'] === "photo"){
                            $images[] = $imageData['media']['image']['src'];
                        }
                    }
                }else{
                    $images[] = $post['attachments']['data'][0]['media']['image']['src'];
                }
            }

            $Post = new Post($message,$images,$createdTime);
            $posts[] = $Post;
        }

        return $posts;
    }
}