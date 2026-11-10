<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Performance Report</title>
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
            <h1>Sales Performance Report</h1>
        </div>

        <p>The goal is to display and compute performance thru total sales.</p>
        <p class="rule">Rules: Don't use any array or sort built in functionalities. </p>

    </section>

    <?php
    echo "<pre>";
    $sales = [
        "January" => [
            "John" => 15000,
            "Sarah" => 20000,
            "Mark" => 12000
        ],
        "February" => [
            "John" => 18000,
            "Sarah" => 17000,
            "Mark" => 25000
        ],
        "March" => [
            "John" => 22000,
            "Sarah" => 28000,
            "Mark" => 19000
        ]
    ];


    function getEmployeeSales(array $sales): array
    {
        $employeeTotals = [];
        foreach ($sales as $month => $employee) {
            foreach ($employee as $name => $sale) {
                if (!isset($employeeTotals[$name])) {
                    $employeeTotals[$name] = 0;
                }
                $employeeTotals[$name] += $sale;
            }
        }
        return $employeeTotals;
    }

    function getMonthlySales(array $sales): array
    {

        $monthlySales = [];

        foreach ($sales as $month => $employee) {

            $total = 0;

            foreach ($employee as $name => $sale) {
                $total += $sale;
            }

            $monthlySales[$month] = $total;
        }

        return $monthlySales;
    }

    function getBestEmployee(array $totals): array
    {
        $bestEmp = '';
        $bestSales = null;
        foreach ($totals as $key => $value) {
            if ($bestSales < $value) {
                $bestSales = $value;
                $bestEmp = $key;
            }
        }
        return [
            "bestEmp" => $bestEmp,
            "bestSales" => $bestSales
        ];
    }

    function getLeastEmployee(array $totals): array
    {
        $leastEmp = '';
        $leastSales = null;
        foreach ($totals as $key => $value) {
            if ($leastSales > $value ||  $leastSales === null) {
                $leastSales = $value;
                $leastEmp = $key;
            }
        }
        return [
            "leastEmp" => $leastEmp,
            "leastSales" => $leastSales
        ];
    }

    function getMonthlyTarget(array $sales): array
    {
        $monthlyTarget = [];

        foreach ($sales as $month => $employee) {

            foreach ($employee as $name => $sale) {
                
                if (!isset($monthlyTarget[$name])) {
                    $monthlyTarget[$name] = 0;
                }

                if ($sale >= 20000) {
                    $monthlyTarget[$name]++;
                }
            }
        }
        
        return $monthlyTarget;
    }

    $employeeTotals = getEmployeeSales($sales);
    $monthlyTotals = getMonthlySales($sales);
    $bestEmployee = getBestEmployee($employeeTotals);
    $leastEmployee = getLeastEmployee($employeeTotals);
    $monthlyTarget = getMonthlyTarget($sales);

    echo "Employee Sales Report";
    echo PHP_EOL;
    echo str_repeat("-", 25);
    echo PHP_EOL;

    displayFunction($employeeTotals);
    echo str_repeat(PHP_EOL, 2);

    echo "Monthly Sales Report";
    echo PHP_EOL;
    echo str_repeat("-", 25);
    echo PHP_EOL;

    displayFunction($monthlyTotals);
    echo str_repeat(PHP_EOL, 2);

    echo "Highest sales employee";
    echo PHP_EOL;
    echo str_repeat("-", 25);
    echo PHP_EOL;

    echo $bestEmployee["bestEmp"] . " - " . formatNum($bestEmployee["bestSales"]);
    echo str_repeat(PHP_EOL, 2);

    echo "Lowest sales employee";
    echo PHP_EOL;
    echo str_repeat("-", 25);
    echo PHP_EOL;

    echo $leastEmployee["leastEmp"] . " - " . formatNum($leastEmployee["leastSales"]);
    echo str_repeat(PHP_EOL, 2);

    echo "Employee Target Sales - P20,000)";
    echo PHP_EOL;
    echo str_repeat("-", 25);
    echo PHP_EOL;

    displayFunction($monthlyTarget, false);






    // utils
    function displayFunction(array $totals, bool $format = true): void
    {
        foreach ($totals as $key => $value) {
            echo str_pad($key, 15) . " - ";
            echo $format ? formatNum($value) : $value . "x";
            echo PHP_EOL;
        }
    }



    function formatNum(float $number): string
    {
        return "P" . number_format(round($number, 2), 2);
    }
    ?>

</body>

</html>