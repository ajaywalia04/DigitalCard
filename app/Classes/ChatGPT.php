<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;
use Exception;

class ChatGPT
{

    private $model;
    private $apiKey;
    public function __construct()
    {
        $this->model = config('services.chatgpt.model');
        $this->apiKey = config('services.chatgpt.apiKey');
    }
    public function makeRequest($url, $method, $optParam = [])
    {

        $apiEndPoint = "https://api.openai.com/v1/chat/completions";
        $apiKey = "";
        try {
            $headers = [
                'Authorization'     =>  "Bearer " . $this->apiKey,
                "Content-Type"      =>  "application/json",
            ];

            if (!empty($optParam["headers"])) {
                $headers = array_merge($headers, $optParam["headers"]);
            }

            $request = Http::withHeaders($headers);

            if (strtoupper($method) == "GET") {
                // Something 
            }

            $model = $this->model;

            if (strtoupper($method) == "POST") {
                $requestPayload = !empty($optParam["payload"]) ? $optParam["payload"] : [];
                
                $request = $request->post($url, [
                    'model'    => $model,
                    'messages'  => $requestPayload
                ]);
            }

            return $request;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }


        // $response = Http::withHeaders([
        //     "Authorization"     => "Bearer ".$apiKey,
        //     "Content-Type"      => "application/json",
        //     "model"             => "GPT-3.5-turbo"
        // ])->post($apiEndPoint, [
        //     "prompt"    => "Hello Explain PHP in 20 words"
        // ]);

        // $data = $response->json();
        // return $data;
    }

    public function singleTurnConversation($message)
    {
        try {
            $url = "https://api.openai.com/v1/chat/completions";
            $response = $this->makeRequest($url, "POST", [
                'payload'   => [
                    [
                        "role"      => "user",
                        "content"   => $message
                    ]
                ]
            ]);

            $response = $response->object();
           
            if(!empty($response->error)){
                throw new Exception($response->error->message);
            }

            if(!empty($response->usage)){
                $usage = $response->usage;
            }

            if(!empty($response->choices)){
                $choices = $response->choices;
                foreach($choices as $choice){
                    if($choice->finish_reason == 'stop'){
                        return $choice->message->content;
                    }else{
                        throw new Exception("Unexcepted reason". json_encode($response));
                    }
                }
            }

        } catch (Exception $ex) {
            // dd($ex->getLine());
            throw new Exception($ex->getMessage());
        }
    }
}
