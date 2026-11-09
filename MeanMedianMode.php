<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mean-Median-Mode</title>
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
        .icon{
            padding: 5px;
            fill: grey;
        }
        .link:hover .icon{
            fill: black;
        }
    </style>
</head>

<body>

    <section class="intro">
        <div class="title">
            <a href="index.php" class="link">  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" height="20" width="20" >
                    <path class="icon" fill="rgb(0, 0, 0)" d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z" />
                </svg> </a>
            <h1>Mean-Median-Mode</h1>
        </div>
        <p>The goal is to get the mean median and mode of 5 numbers inside an array.</p>
        <p class="rule">Rules: Don't use any array_ built in functionalities. </p>
    </section>

    <?php
    echo "<pre>";
    $numbers = [1, 4, 2, 2, 5, 6, 7, 8, 3, 3, 3];

    echo "numbers: " . implode(", ", $numbers) . PHP_EOL;


    function getMean(array $numbers): float
    {
        $total = 0;
        $countNumber = count($numbers);
        foreach ($numbers as $n) {
            $total += $n;
        }
        $mean = $total / $countNumber;
        return $mean;
    }

    function getMedian(array &$numbers): float
    {
        $length = count($numbers);

        //bubble sort
        for ($i = 0; $i < $length - 1; $i++) {

            for ($j = 0; $j < $length - $i - 1; $j++) {

                //swap numbers if first number is bigger than the next one
                if ($numbers[$j] > $numbers[$j + 1]) {
                    $temp = $numbers[$j];
                    $numbers[$j] = $numbers[$j + 1];
                    $numbers[$j + 1] = $temp;
                }
            }
        }

        $middle = floor($length / 2);

        if (isItOdd($length)) {
            $median = $numbers[$middle];
        } else {
            $combine = $numbers[$middle] + $numbers[$middle - 1];
            $median = $combine / 2;
        }

        return $median;
    }

    function getMode(array $numbers): int
    {
        $highestCount = 0;
        $mode = null;

        $countNumber = count($numbers);
        for ($i = 0; $i < $countNumber; $i++) {
            $count = 0;
            for ($j = 0; $j < $countNumber; $j++) {
                if ($numbers[$i] == $numbers[$j]) {
                    $count++;
                }
            }
            if ($count > $highestCount) {
                $highestCount = $count;
                $mode = $numbers[$i];
            }
        }
        return $mode;
    }

    function BigSmallNumber(array $numbers): array
    {
        $biggest = $numbers[0];
        $smallest = $numbers[0];

        foreach ($numbers as $n) {
            if ($biggest < $n) {
                $biggest = $n;
            }
            if ($smallest > $n) {
                $smallest = $n;
            }
        }
        return [
            "biggest" => $biggest,
            "smallest" => $smallest
        ];
    }

    echo "Mean:" . formatNum(getMean($numbers));
    echo PHP_EOL;
    echo "Median:" . getMedian($numbers);
    echo PHP_EOL;
    echo "Mode : " . getMode($numbers);
    echo PHP_EOL;
    echo "Order :" .  implode(", ", $numbers);
    echo PHP_EOL;
    $statNum = BigSmallNumber($numbers);
    echo "Biggest number: " . $statNum["biggest"];
    echo PHP_EOL;
    echo "Biggest number: " . $statNum["smallest"];
    echo PHP_EOL;


    function isItOdd(int $length): bool
    {
        if ($length % 2 == 0) {
            return false;
        } else {
            return true;
        }
    }
    function formatNum(float $number): string
    {
        return number_format(round($number, 2), 2);
    }
    ?>

</body>

</html>