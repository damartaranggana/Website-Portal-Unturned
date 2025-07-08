<?php
// Database configuration
$host = 'localhost';
$dbname = 'unturned';
$username = 'root';
$password = '';

// Create PDO connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Create mysqli connection for leaderboard files
$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Helper functions for database operations
function getItems($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM uconomyitemshop ORDER BY id ASC");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getVehicles($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM uconomyvehicleshop ORDER BY id ASC");
    $stmt->execute();
    return $stmt->fetchAll();
}





function searchItems($pdo, $searchTerm) {
    $stmt = $pdo->prepare("SELECT * FROM uconomyitemshop WHERE itemname LIKE ? ORDER BY id ASC");
    $stmt->execute(['%' . $searchTerm . '%']);
    return $stmt->fetchAll();
}

function searchVehicles($pdo, $searchTerm) {
    $stmt = $pdo->prepare("SELECT * FROM uconomyvehicleshop WHERE vehiclename LIKE ? ORDER BY id ASC");
    $stmt->execute(['%' . $searchTerm . '%']);
    return $stmt->fetchAll();
}

function getItemById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM uconomyitemshop WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function getVehicleById($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM uconomyvehicleshop WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function addItem($pdo, $itemname, $cost, $buyback) {
    $stmt = $pdo->prepare("INSERT INTO uconomyitemshop (itemname, cost, buyback) VALUES (?, ?, ?)");
    return $stmt->execute([$itemname, $cost, $buyback]);
}

function addVehicle($pdo, $vehiclename, $cost) {
    $stmt = $pdo->prepare("INSERT INTO uconomyvehicleshop (vehiclename, cost) VALUES (?, ?)");
    return $stmt->execute([$vehiclename, $cost]);
}

function updateItem($pdo, $id, $itemname, $cost, $buyback) {
    $stmt = $pdo->prepare("UPDATE uconomyitemshop SET itemname = ?, cost = ?, buyback = ? WHERE id = ?");
    return $stmt->execute([$itemname, $cost, $buyback, $id]);
}

function updateVehicle($pdo, $id, $vehiclename, $cost) {
    $stmt = $pdo->prepare("UPDATE uconomyvehicleshop SET vehiclename = ?, cost = ? WHERE id = ?");
    return $stmt->execute([$vehiclename, $cost, $id]);
}

function deleteItem($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM uconomyitemshop WHERE id = ?");
    return $stmt->execute([$id]);
}

function deleteVehicle($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM uconomyvehicleshop WHERE id = ?");
    return $stmt->execute([$id]);
}





function getStats($pdo) {
    $stats = [];
    
    // Items stats
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_items FROM uconomyitemshop");
    $stmt->execute();
    $stats['total_items'] = $stmt->fetch()['total_items'];
    
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_vehicles FROM uconomyvehicleshop");
    $stmt->execute();
    $stats['total_vehicles'] = $stmt->fetch()['total_vehicles'];
    
    return $stats;
}
?> 