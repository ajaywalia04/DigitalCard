<?php

namespace App\Services;
use App\ChatGpt;

class ChatGptService{
    

    public function singleTonConversion(){
        $chatGpt = new ChatGpt;
        $chatGpt->makeRequest("data");
    }
}

?>
