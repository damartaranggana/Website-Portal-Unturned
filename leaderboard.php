<?php
// Include database configuration
include 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unturned Leaderboard - Player Rankings</title>
    <meta name="description"
        content="Check out the top players in Unturned. View rankings for kills, zombies killed, harvests, fish caught, and playtime.">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="leaderboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">Unturned Portal</div>
            <nav id="main-nav">
                <ul>
                    <li><a href="index.html" class="nav-link">Home</a></li>
                    <li><a href="news.html" class="nav-link">News</a></li>
                    <li><a href="shop.php" class="nav-link">Shop</a></li>
                    <li><a href="leaderboard.php" class="nav-link active">Leaderboard</a></li>
                </ul>
            </nav>
            <button class="mobile-nav-toggle" id="mobile-nav-toggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <main>
        <!-- Leaderboard Header -->
        <section id="leaderboard-header" class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h1 class="hero-title fade-in-up">Player Leaderboards</h1>
                    <p class="hero-subtitle slide-in-left">Compete with the best players and track your progress across
                        multiple categories. See who's dominating the server!</p>
                    <div class="hero-buttons">
                        <a href="#kills" class="btn btn-primary">View Rankings</a>
                        <a href="#stats" class="btn btn-secondary">Server Stats</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Leaderboard Navigation -->
        <section id="leaderboard-nav" class="leaderboard-navigation">
            <div class="container">
                <div class="leaderboard-nav-tabs">
                    <a href="#kills" class="leaderboard-tab active" data-target="kills">Kills</a>
                    <a href="#zombies" class="leaderboard-tab" data-target="zombies">Zombies</a>
                    <a href="#harvests" class="leaderboard-tab" data-target="harvests">Harvests</a>
                    <a href="#fish" class="leaderboard-tab" data-target="fish">Fish</a>
                    <a href="#playtime" class="leaderboard-tab" data-target="playtime">Playtime</a>
                </div>
            </div>
        </section>

        <!-- Stats Overview -->
        <section id="stats" class="stats-overview-section">
            <div class="container">
                <h2>📊 Server Statistics</h2>
                <div class="stats-overview">
                    <div class="stat-card">
                        <h3>1,250+</h3>
                        <p>Total Players</p>
                    </div>
                    <div class="stat-card">
                        <h3>45,890</h3>
                        <p>Total Kills</p>
                    </div>
                    <div class="stat-card">
                        <h3>234,567</h3>
                        <p>Zombies Killed</p>
                    </div>
                    <div class="stat-card">
                        <h3>89,123</h3>
                        <p>Items Harvested</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Kills Leaderboard -->
        <div id="kills" class="section bg-grey2">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point" style="padding-top: 20px; padding-bottom: 20px;">
                            <h2>Kills Leaderboard | PVP Server</h2>
                            <table class="table table-stripped table-hover datatab">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Kills</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = mysqli_query($conn, "SELECT * FROM playerstats ORDER BY Kills DESC LIMIT 10");
                                    $rank = 1;
                                    while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $rank; ?></td>
                                            <td><?php echo htmlspecialchars($data['Name']); ?></td>
                                            <td><?php echo number_format($data['Kills']); ?></td>
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

        <!-- Zombies Leaderboard -->
        <div id="zombies" class="section pvp">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point" style="padding-top: 20px; padding-bottom: 20px;">
                            <h2>Zombies Killed Leaderboard | PVP Server</h2>
                            <table class="table table-stripped table-hover datatab">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Zombies</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = mysqli_query($conn, "SELECT * FROM playerstats ORDER BY Zombies DESC LIMIT 10");
                                    $rank = 1;
                                    while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $rank; ?></td>
                                            <td><?php echo htmlspecialchars($data['Name']); ?></td>
                                            <td><?php echo number_format($data['Zombies']); ?></td>
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

        <!-- Harvests Leaderboard -->
        <div id="harvests" class="section bg-grey2">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point" style="padding-top: 20px; padding-bottom: 20px;">
                            <h2>Harvest Leaderboard | PVP Server</h2>
                            <table class="table table-stripped table-hover datatab">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Harvests</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = mysqli_query($conn, "SELECT * FROM playerstats ORDER BY Harvests DESC LIMIT 10");
                                    $rank = 1;
                                    while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $rank; ?></td>
                                            <td><?php echo htmlspecialchars($data['Name']); ?></td>
                                            <td><?php echo number_format($data['Harvests']); ?></td>
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

        <!-- Fish Leaderboard -->
        <div id="fish" class="section pvp">
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

        <!-- Playtime Leaderboard -->
        <div id="playtime" class="section bg-grey2">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point" style="padding-top: 20px; padding-bottom: 20px;">
                            <h2>Playtime Leaderboard | PVP Server</h2>
                            <table class="table table-stripped table-hover datatab">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Playtime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $query = mysqli_query($conn, "SELECT *, ROUND(Playtime/3600, 1) as Playtime FROM playerstats ORDER BY Playtime DESC LIMIT 10");
                                    $rank = 1;
                                    while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $rank; ?></td>
                                            <td><?php echo htmlspecialchars($data['Name']); ?></td>
                                            <td><?php echo number_format($data['Playtime'], 1); ?></td>
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

    <script src="leaderboard.js"></script>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?> 