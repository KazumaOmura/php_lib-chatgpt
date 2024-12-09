ChatGPTAPIをPHPで叩きやすくするためのライブラリ

## レスポンス例
```
{
    "id": "chatcmpl-AcRPAQnygJci5JvfRrmRibRY8utJV",
    "object": "chat.completion",
    "created": 1733725172,
    "model": "gpt-4-0613",
    "choices": [
        {
            "index": 0,
            "message": {
                "role": "assistant",
                "content": "音楽スポーツ",
                "refusal": null
            },
            "logprobs": null,
            "finish_reason": "stop"
        }
    ],
    "usage": {
        "prompt_tokens": 108,
        "completion_tokens": 7,
        "total_tokens": 115,
        "prompt_tokens_details": {
            "cached_tokens": 0,
            "audio_tokens": 0
        },
        "completion_tokens_details": {
            "reasoning_tokens": 0,
            "audio_tokens": 0,
            "accepted_prediction_tokens": 0,
            "rejected_prediction_tokens": 0
        }
    },
    "system_fingerprint": null
}
```