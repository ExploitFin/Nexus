<?php
$secretToken = "YourSecretToken";
$data = json_decode(file_get_contents("php://input"), true);

if(isset($data['token'], $data['action']) && $data['token'] === $secretToken && $data['action'] === "increment") {
    $counterFile = "counter.txt";
    if (!file_exists($counterFile)) {
        file_put_contents($counterFile, "0");
    }
    $count = (int)file_get_contents($counterFile);
    $count++;
    file_put_contents($counterFile, $count);
    echo json_encode(["count" => $count]);
} else {
    http_response_code(403);
    echo json_encode(["error" => "Unauthorized request"]);
}
?>
