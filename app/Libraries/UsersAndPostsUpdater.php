<?php

namespace App\Libraries;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class UsersAndPostsUpdater 
{

    protected $apiHost;

    public function __construct()
    {
        $this->apiHost = 'https://jsonplaceholder.typicode.com';
    }

    private function convertToJson($array)
    {
        $array['address'] = json_encode($array['address']);
        $array['company'] = json_encode($array['company']);

        return $array;
    }

    public function update()
    {
        $this->updatePosts();
        $this->updateUsers();
    }

    private function updateUsers()
    {
        $response = $this->getResponseFromApi('users');
        $response = array_map('self::convertToJson', $response);
        User::upsert($response, ['id'], ['name', 'username', 'email','address','phone','website','company']);   
    }

    private function updatePosts()
    {
        $response = $this->getResponseFromApi('posts');
        Post::upsert($response, ['id'], ['title','body', 'userId']);   
    }

    private function getResponseFromApi($gate)
    {
        return Http::get("$this->apiHost/$gate")->json();
    }
}
