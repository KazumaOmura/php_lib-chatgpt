<?php

namespace YouCast\ChatGPT\Api;

use YouCast\ChatGPT\Enum\Model;

class ChatGPTClient
{
    const API_URL = 'https://api.openai.com/v1/chat/completions';
    private string $api_key;
    private string $model;
    private float $temperature;
    private string $prompt;
    private array $queries;

    /**
     * ChatGPTClient constructor.
     * 
     * @param string $api_key
     * @param string $model
     * @param float $temperature
     */
    public function __construct(string $api_key, string $model = Model::GPT3, float $temperature = 0.7)
    {
        $this->api_key = $api_key;
        $this->temperature = $temperature;

        if (!in_array($model, Model::ALLOWED_MODELS)) {
            throw new \InvalidArgumentException('Invalid model');
        }
        $this->model = $model;
    }

    /**
     * リクエストするプロンプトを設定する
     * 
     * @param string $prompt
     * @return \YouCast\ChatGPT\Api\ChatGPTClient
     */
    public function setPrompt(string $prompt): self
    {
        $this->prompt = $prompt;
        return $this;
    }

    /**
     * リクエストするクエリを設定する
     * 
     * @param string $queries
     * @return \YouCast\ChatGPT\Api\ChatGPTClient
     */
    public function setQueries(array $queries): self
    {
        $this->queries = $queries;
        return $this;
    }

    /**
    * リクエストを送信し、レスポンスを取得する
    * 
    * @return string
    * @throws \Exception
    */
    public function exec(): string
    {
        $messages = [
            [
                "role" => "system",
                "content" => $this->prompt
            ],
            [
                "role" => "user",
                "content" => implode(' ', $this->queries)
            ]
        ];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => self::API_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json",
                "Authorization: Bearer {$this->api_key}",
            ],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode([
                "model" => $this->model,
                "messages" => $messages,
                "temperature" => $this->temperature,
            ]),
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            throw new \Exception($error);
        } else {
            // レスポンスをデコード
            $response = json_decode($response, true);
            if (isset($response['choices'][0]['message']['content'])) {
                return $response['choices'][0]['message']['content'];
            } else {
                throw new \Exception('Failed to get response');
            }
        }
    }
}
