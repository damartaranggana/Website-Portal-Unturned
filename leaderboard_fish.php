<?php
// Include database configuration
include 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fish Caught Leaderboard - Unturned Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaderboard.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">Unturned Portal</div>
            <nav>
                <ul>
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="leaderboard.php">Leaderboard</a></li>
                    <li><a href="leaderboard_kills.php">Kills</a></li>
                    <li><a href="leaderboard_zombies.php">Zombies</a></li>
                    <li><a href="leaderboard_harvest.php">Harvest</a></li>
                    <li><a href="leaderboard_fish.php">Fish</a></li>
                    <li><a href="leaderboard_playtime.php">Playtime</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <!-- Fish Leaderboard -->
        <div id="Fish" class="section pvp">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point" style="padding-top: 20px; padding-bottom: 20px;">
                            <h2>Fish Caught Leaderboard | PVP Server</h2>
                            <table class="table table-stripped table-hover datatab">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Fish</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = mysqli_query($conn, "SELECT * FROM playerstats ORDER BY Fish DESC LIMIT 10");
                                    $rank = 1;
                                    while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $rank; ?></td>
                                            <td><?php echo htmlspecialchars($data['Name']); ?></td>
                                            <td><?php echo number_format($data['Fish']); ?></td>
                                        </tr>
                                    <?php 
                                        $rank++;
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container footer-content">
            <div class="footer-logo">Unturned Portal</div>
            <div class="footer-social">
                <a href="#"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/facebook.svg" alt="Facebook" class="icon"></a>
                <a href="#"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/twitter.svg" alt="Twitter" class="icon"></a>
                <a href="#"><img src="https://cdn.jsdelivr.net/gh/simple-icons/simple-icons/icons/discord.svg" alt="Discord" class="icon"></a>
            </div>
            <div class="footer-links">
                <a href="#">Privacy Policy</a> |
                <a href="#">Terms of Service</a> |
                <a href="#">Contact</a>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?> 