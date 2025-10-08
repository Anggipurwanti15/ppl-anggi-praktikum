<?php
// File: test_name.php
require_once "validator.php";

// Test Case 1: Nama valid (nama lengkap Anda)
try {
    $result = validateName("Anggi"); // ganti dengan nama lengkapmu
    echo "PASS: Nama 'Anggi' diterima\n";
} catch (Exception $e) {
    echo "FAIL: Nama 'Anggi' tidak diterima. Error: " . $e->getMessage() . "\n";
}

// Test Case 2: Nama berisi angka
try {
    $result = validateName("Irma1212");
    echo "FAIL: Nama 'Anggi5' seharusnya ditolak\n";
} catch (Exception $e) {
    echo "PASS: Nama 'Anggi5' ditolak. Error: " . $e->getMessage() . "\n";
}

// Test Case 3: Nama kosong
try {
    $result = validateName("");
    echo "PASS: Nama kosong seharusnya ditolak\n";
} catch (Exception $e) {
    echo "FAIL: Nama kosong ditolak. Error: " . $e->getMessage()."\n";
}