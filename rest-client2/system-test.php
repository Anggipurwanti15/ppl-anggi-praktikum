<?php
// ===============================
// SIMPLE SYSTEM TESTING UNTUK REST CLIENT NEWSAPI
// ===============================
// File ini mensimulasikan pengujian sistem (system test)
// dengan cara memeriksa response dari API serta menampilkan
// hasil pass/fail dalam bentuk tabel HTML sederhana.

$api_key = "477a055429ec4aeab79b3f17c87bfe0c";
$base_url = "https://newsapi.org/v2/top-headlines";

// fungsi untuk request data
function http_request_get($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// function untuk menjalankan test dan mengembalikan status
function runTest($scenario, $url) {
    $response = http_request_get($url);
    $data = json_decode($response, true);

    if (!empty($data) && isset($data['articles'])) {
        return ["scenario" => $scenario, "status" => "PASS", "message" => "Data berita berhasil diterima."];
    } else {
        return ["scenario" => $scenario, "status" => "FAIL", "message" => "Data tidak ditemukan atau API error."];
    }
}

// test 1: API Key benar
$url_valid = $base_url . "?country=us&apiKey=" . $api_key;
$test1 = runTest("Valid API Key - berita tampil", $url_valid);

// test 2: API Key salah
$url_invalid_key = $base_url . "?country=us&apiKey=apikey_salah_123";
$test2 = runTest("API Key Salah", $url_invalid_key);

// test 3: parameter country salah
$url_invalid_country = $base_url . "?country=xx&apiKey=" . $api_key;
$test3 = runTest("Country tidak valid", $url_invalid_country);

$results = [$test1, $test2, $test3];
?>
<!DOCTYPE html>
<html>
<head>
    <title>System Test Result</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h3>Hasil System Testing - Rest Client NewsAPI</h3>
    <table class="table table-bordered mt-4">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Test Scenario</th>
                <th>Status</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($results as $row) { ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['scenario']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['message']; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>