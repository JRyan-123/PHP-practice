<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .rule {
            color: red;
            font-size: 12px;

        }

        .title {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .icon {
            padding: 5px;
            fill: grey;
        }

        .link:hover .icon {
            fill: black;
        }
    </style>
</head>

<body>

    <section class="intro">
        <div class="title">
            <a href="index.php" class="link"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" height="20" width="20">
                    <path class="icon" fill="rgb(0, 0, 0)" d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z" />
                </svg> </a>
            <h1>Inventory</h1>
        </div>
        <p>The goal is to display all products grouped by category.</p>
        <p class="rule">Rules: Don't use any array or sort built in functionalities. </p>
    </section>

    <?php
    $inventory = [
        "Electronics" => [
            ["name" => "Mouse", "price" => 500, "stock" => 10],
            ["name" => "Keyboard", "price" => 1200, "stock" => 5],
            ["name" => "Monitor", "price" => 6500, "stock" => 0]
        ],
        "Accessories" => [
            ["name" => "USB Cable", "price" => 150, "stock" => 20],
            ["name" => "Headset", "price" => 850, "stock" => 3]
        ]
    ];

    // Initialize variables
    $totalProducts = 0;
    $totalInventory = 0;

    $outOfStock = [];
    $lowStock = [];

    $topPrice = 0;
    $topName = '';

    $topCategory = '';
    $topCategoryVal = 0;


    //display data by category
    foreach ($inventory as $category => $product) {
        echo "<pre>";
        echo "Category: " . $category;
        echo PHP_EOL;
        echo str_repeat("-", 45);
        echo PHP_EOL;


        $categoryVal = 0;

        foreach ($product as $p) {


            $inventoryValue = $p["price"] * $p["stock"];

            $totalProducts++;
            $totalInventory += $inventoryValue;

            if ($p["stock"] == 0) {
                $outOfStock[] = $p["name"];
            }

            if ($p["stock"] < 5) {
                $lowStock[] = $p["name"];
            }

            if ($p["price"] > $topPrice) {
                $topPrice = $p["price"];
                $topName = $p["name"];
            }

            $categoryVal = $totalInventory;



            echo "Product:" . $p["name"];
            echo PHP_EOL;
            echo "Price:" . formatNum($p["price"]);
            echo PHP_EOL;
            echo "Stock:" . $p["stock"];
            echo PHP_EOL;
            echo "Inventory Value:" . formatNum($inventoryValue);
            echo str_repeat(PHP_EOL, 2);
        }

        if ($topCategory < $categoryVal) {
            $topCategoryVal = $categoryVal;
            $topCategory = $category;
        }
    }
    //Inventory summary
    echo str_repeat(PHP_EOL, 3);
    echo "Inventory Summary";
    echo PHP_EOL;
    echo str_repeat("-", 45);
    echo PHP_EOL;
    echo "Total Products: " . $totalProducts;
    echo PHP_EOL;
    echo "Total Inventory Value: " . formatNum($totalInventory);
    echo str_repeat(PHP_EOL, 2);

    echo "OUT OF STOCK: ";
    echo PHP_EOL;
    echo stockCount($outOfStock);
    echo str_repeat(PHP_EOL, 2);

    echo "LOW OF STOCK: ";
    echo PHP_EOL;
    echo stockCount($lowStock);
    echo str_repeat(PHP_EOL, 2);

    echo "MOST EXPENSIVE PRODUCT";
    echo PHP_EOL;
    echo formatNum($topPrice) . " - " . $topName;
    echo str_repeat(PHP_EOL, 2);

    echo "CATEGORY WITH HIGHEST INVENTORY VALUE:";
    echo PHP_EOL;
    echo formatNum($topCategoryVal) . " - " . $topCategory;
    echo PHP_EOL;


    //utils
    function stockCount(array $stock): string
    {
        if (count($stock) < 0) {
            return "None";
        }

        $result = "";
        foreach ($stock as $product) {
            $result .= "-" . $product . PHP_EOL;
        }

        return $result;
    }


    function formatNum(float $num): string
    {
        return "₱" . number_format(round($num, 2), 2);
    }


    ?>

</body>

</html>