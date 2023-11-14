<?php

$API_KEY ='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';

$url = 'https://api.openai.com/v1/engines/gpt-3.5-turbo/completions';

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $API_KEY,
];

// question
$question = 'What is the capital city of Bangladesh?';

$data = [
    'prompt' => $question,
    'max_tokens' => 50,
    'n' => 1,
    'stop' => '\n', 
];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    $decoded_response = json_decode($response, true);

    if ($decoded_response && isset($decoded_response['error'])) {
        $error_message = $decoded_response['error']['message'];
        $error_type = $decoded_response['error']['type'];

        if ($error_type === 'insufficient_quota') {
            echo 'Error: Insufficient Quota. Please check your plan and billing details.';
        } else {
            echo 'An error occurred: ' . $error_message;
        }
    } elseif (isset($decoded_response['choices'])) {
        $answer = $decoded_response['choices'][0]['text'];
        echo 'Answer: ' . $answer;
    } else {
        echo "An error occurred while processing the API response.\n";
        echo "Response: " . $response . "\n";
    }
}

curl_close($ch);

?>
