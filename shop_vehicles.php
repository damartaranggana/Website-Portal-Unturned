<?php
// Include database configuration
include 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Vehicles - Unturned Portal</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">Unturned Portal</div>
            <nav>
                <ul>
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="shop_items.php">Shop Items</a></li>
                    <li><a href="shop_vehicles.php">Shop Vehicles</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <!-- Shop Vehicles -->
        <div id="Vehicles" class="section pvp">
            <div class="container">
                <div class="row text-center">
                    <div class="col-lg-12">
                        <div class="main-point" style="padding-top: 20px; padding-bottom: 20px;">
                            <h2>Shop Vehicles List | PVP Server</h2>
                            
                            <!-- Search Form -->
                            <div style="margin-bottom: 30px; text-align: center;">
                                <form method="GET" action="" style="display: inline-block;">
                                    <input type="text" name="search" placeholder="Search vehicles..." 
                                           value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                                           style="padding: 10px 15px; border: 2px solid #ddd; border-radius: 5px; width: 300px; font-size: 16px;">
                                    <button type="submit" style="padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 5px; margin-left: 10px; cursor: pointer;">Search</button>
                                    <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
                                        <a href="shop_vehicles.php" style="padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px; margin-left: 10px;">Clear</a>
                                    <?php endif; ?>
                                </form>
                            </div>
                            
                            <table class="table table-stripped table-hover datatab">
                                <thead>
                                    <tr>
                                        <th>
                                            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'id', 'order' => (isset($_GET['sort']) && $_GET['sort'] == 'id' && isset($_GET['order']) && $_GET['order'] == 'asc') ? 'desc' : 'asc'])); ?>" 
                                               style="color: #333; text-decoration: none; display: flex; align-items: center; justify-content: space-between;">
                                                Id
                                                <span style="font-size: 12px;">
                                                    <?php if(isset($_GET['sort']) && $_GET['sort'] == 'id'): ?>
                                                        <?php echo (isset($_GET['order']) && $_GET['order'] == 'desc') ? '▼' : '▲'; ?>
                                                    <?php else: ?>
                                                        ↕
                                                    <?php endif; ?>
                                                </span>
                                            </a>
                                        </th>
                                        <th>
                                            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'vehiclename', 'order' => (isset($_GET['sort']) && $_GET['sort'] == 'vehiclename' && isset($_GET['order']) && $_GET['order'] == 'asc') ? 'desc' : 'asc'])); ?>" 
                                               style="color: #333; text-decoration: none; display: flex; align-items: center; justify-content: space-between;">
                                                Vehicle
                                                <span style="font-size: 12px;">
                                                    <?php if(isset($_GET['sort']) && $_GET['sort'] == 'vehiclename'): ?>
                                                        <?php echo (isset($_GET['order']) && $_GET['order'] == 'desc') ? '▼' : '▲'; ?>
                                                    <?php else: ?>
                                                        ↕
                                                    <?php endif; ?>
                                                </span>
                                            </a>
                                        </th>
                                        <th>
                                            <a href="?<?php echo http_build_query(array_merge($_GET, ['sort' => 'cost', 'order' => (isset($_GET['sort']) && $_GET['sort'] == 'cost' && isset($_GET['order']) && $_GET['order'] == 'asc') ? 'desc' : 'asc'])); ?>" 
                                               style="color: #333; text-decoration: none; display: flex; align-items: center; justify-content: space-between;">
                                                Buy
                                                <span style="font-size: 12px;">
                                                    <?php if(isset($_GET['sort']) && $_GET['sort'] == 'cost'): ?>
                                                        <?php echo (isset($_GET['order']) && $_GET['order'] == 'desc') ? '▼' : '▲'; ?>
                                                    <?php else: ?>
                                                        ↕
                                                    <?php endif; ?>
                                                </span>
                                            </a>
                                        </th>                       
                                    </tr>
                                </thead>  
                                <tbody>
                                    <?php 
                                    // Build search query
                                    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
                                    $whereClause = '';
                                    if (!empty($search)) {
                                        $search = mysqli_real_escape_string($conn, $search);
                                        $whereClause = "WHERE vehiclename LIKE '%$search%' OR id LIKE '%$search%'";
                                    }
                                    
                                    // Build sort query
                                    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'id';
                                    $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
                                    
                                    // Validate sort column
                                    $allowedSorts = ['id', 'vehiclename', 'cost'];
                                    if (!in_array($sort, $allowedSorts)) {
                                        $sort = 'id';
                                    }
                                    
                                    // Validate order
                                    if ($order !== 'asc' && $order !== 'desc') {
                                        $order = 'asc';
                                    }
                                    
                                    $query = mysqli_query($conn, "SELECT * FROM uconomyvehicleshop $whereClause ORDER BY $sort $order");
                                    
                                    $rowCount = 0;
                                    while ($data = mysqli_fetch_assoc($query)) 
                                    {
                                        $rowCount++;
                                    ?>
                                        <tr>
                                            <td><?php echo $data['id']; ?></td> 
                                            <td><?php echo $data['vehiclename']; ?></td>         
                                            <td><?php echo $data['cost']; ?></td>
                                        </tr>
                                    <?php               
                                    } 
                                    
                                    // Show no results message
                                    if ($rowCount == 0) {
                                        echo '<tr><td colspan="3" style="text-align: center; padding: 20px; color: #666;">No vehicles found matching your search.</td></tr>';
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

    <script src="shop_sorting.js"></script>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?> 