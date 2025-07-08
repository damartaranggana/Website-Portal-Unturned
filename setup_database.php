<?php
// Database setup script
$host = 'localhost';
$username = 'root';
$password = '';

// Create connection without database
$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if not exists
$sql = "CREATE DATABASE IF NOT EXISTS unturned";
if (mysqli_query($conn, $sql)) {
    echo "Database 'unturned' created successfully or already exists<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

// Select the database
mysqli_select_db($conn, 'unturned');

// Create playerstats table if not exists
$sql = "CREATE TABLE IF NOT EXISTS playerstats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Kills INT DEFAULT 0,
    Zombies INT DEFAULT 0,
    Harvests INT DEFAULT 0,
    Fish INT DEFAULT 0,
    Playtime INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql)) {
    echo "Table 'playerstats' created successfully or already exists<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
}

// Check if table has data
$result = mysqli_query($conn, "SELECT COUNT(*) as count FROM playerstats");
$row = mysqli_fetch_assoc($result);

if ($row['count'] == 0) {
    // Insert sample data
    $sql = "INSERT INTO playerstats (Name, Kills, Zombies, Harvests, Fish, Playtime) VALUES
    ('Player1', 1250, 3400, 890, 156, 86400),
    ('Player2', 980, 2800, 1200, 89, 72000),
    ('Player3', 2100, 5600, 450, 234, 108000),
    ('Player4', 750, 1900, 1500, 67, 54000),
    ('Player5', 1800, 4200, 680, 189, 90000),
    ('Player6', 650, 1600, 1100, 45, 48000),
    ('Player7', 1500, 3800, 920, 123, 78000),
    ('Player8', 890, 2200, 1350, 78, 66000),
    ('Player9', 1100, 3000, 750, 167, 84000),
    ('Player10', 450, 1200, 1800, 34, 36000),
    ('Player11', 2200, 6000, 320, 289, 120000),
    ('Player12', 320, 800, 2000, 23, 24000),
    ('Player13', 1700, 4500, 580, 145, 96000),
    ('Player14', 580, 1400, 1600, 56, 42000),
    ('Player15', 1300, 3500, 820, 134, 72000)";
    
    if (mysqli_query($conn, $sql)) {
        echo "Sample data inserted successfully<br>";
    } else {
        echo "Error inserting sample data: " . mysqli_error($conn) . "<br>";
    }
} else {
    echo "Table already has data (" . $row['count'] . " records)<br>";
}

// Create indexes for better performance
$indexes = [
    "CREATE INDEX IF NOT EXISTS idx_player_name ON playerstats(Name)",
    "CREATE INDEX IF NOT EXISTS idx_player_kills ON playerstats(Kills)",
    "CREATE INDEX IF NOT EXISTS idx_player_zombies ON playerstats(Zombies)",
    "CREATE INDEX IF NOT EXISTS idx_player_harvests ON playerstats(Harvests)",
    "CREATE INDEX IF NOT EXISTS idx_player_fish ON playerstats(Fish)",
    "CREATE INDEX IF NOT EXISTS idx_player_playtime ON playerstats(Playtime)"
];

foreach ($indexes as $index) {
    if (mysqli_query($conn, $index)) {
        echo "Index created successfully<br>";
    } else {
        echo "Error creating index: " . mysqli_error($conn) . "<br>";
    }
}

// Test queries
echo "<h3>Testing Database Connection:</h3>";

// Test kills leaderboard
$result = mysqli_query($conn, "SELECT Name, Kills FROM playerstats ORDER BY Kills DESC LIMIT 5");
if ($result) {
    echo "<h4>Top 5 Kills:</h4>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Name'] . " - " . number_format($row['Kills']) . " kills<br>";
    }
} else {
    echo "Error querying kills: " . mysqli_error($conn) . "<br>";
}

// Test zombies leaderboard
$result = mysqli_query($conn, "SELECT Name, Zombies FROM playerstats ORDER BY Zombies DESC LIMIT 5");
if ($result) {
    echo "<h4>Top 5 Zombies Killed:</h4>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['Name'] . " - " . number_format($row['Zombies']) . " zombies<br>";
    }
} else {
    echo "Error querying zombies: " . mysqli_error($conn) . "<br>";
}

mysqli_close($conn);

echo "<br><strong>Database setup completed!</strong><br>";
echo "<a href='leaderboard.php'>Go to Leaderboard</a><br>";
echo "<a href='leaderboard_kills.php'>Go to Kills Leaderboard</a><br>";
echo "<a href='leaderboard_zombies.php'>Go to Zombies Leaderboard</a><br>";
echo "<a href='leaderboard_harvest.php'>Go to Harvest Leaderboard</a><br>";
echo "<a href='leaderboard_fish.php'>Go to Fish Leaderboard</a><br>";
echo "<a href='leaderboard_playtime.php'>Go to Playtime Leaderboard</a>";
?> 