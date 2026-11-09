<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Report</title>
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
            <h1>Student Grade Report</h1>
        </div>
        <p>The goal is to display and compute Student grades, average, points and status.</p>
        <p class="rule">Rules: Don't use any array_ built in functionalities. </p>
    </section>

    <?php
    echo "<pre>";

    $students = [
        "Tony Stark" => [90, 99, 98, 82],
        "Captain America" => [94, 85, 99, 99],
        "Bruce Banner" => [99, 95, 85, 85],
        "Peter Parker" => [85, 90, 80, 85],
        "Wanda" => [80, 99, 75, 90],
        "Black Panther" => [99, 88, 66, 99]
    ];


    //
    function getAverage(array $grades): float
    {
        $count = 0;
        $total = 0;

        foreach ($grades as $g) {
            $total += $g;
            $count++;
        }

        $average = $total / $count;

        return $average;
    }

    function gradeStatus(float $average): string
    {
        if ($average >= 75) {
            return "Passed";
        } else {
            return "Failed";
        }
    }

    function statusCount(string $status, int &$passed, int &$failed)
    {

        if ($status === "Passed") {
            $passed++;
        } else {
            $failed++;
        }
    }

    function getClassTotalAverage(float $average, float &$totalAverage): float
    {
        return $totalAverage += $average;
    }


    function getTopScorer(float $average,  string $name, float &$topScorer, string &$topName): void
    {

        if ($average > $topScorer) {
            $topScorer = $average;
            $topName = $name;
        }
    }

    function getLowScorer(float $average,  string $name, float &$lowScorer, string &$lowName)
    {
        if ($average < $lowScorer) {
            $lowScorer = $average;
            $lowName = $name;
        }
    }

    function formatNumber(float $number): string
    {
        return number_format(round($number, 2), 2);
    }



    function toGradePoint(float $average): string
    {
        switch (true) {
            case ($average >= 95):
                return "1";
                break;

            case ($average >= 90):
                return "1.5";
                break;

            case ($average >= 85):
                return "2";
                break;

            case ($average >= 80):
                return "2.5";
                break;

            case ($average >= 75):
                return "3";
                break;

            default:
                return "5";
        }
    }

    function gradeRemarks(array $students)
    {
        //preserve whitespace


        $studentCount = 0;

        $passed = 0;
        $failed = 0;

        $totalAverage = 0;

        $topScorer = 0;
        $topName = "";

        $lowScorer = 100;
        $lowName = "";


        //loop the student array
        foreach ($students as $name => $grades) {

            //get the students average
            $average = formatNumber(getAverage($grades));

            //get the grade point
            $gradePoint = formatNumber(toGradePoint($average));

            //get the status
            $status = gradeStatus($average);


            //students grades
            echo str_pad($name, 20) . "| ";
            echo str_pad("Average: " . $average, 20) . "| ";
            echo str_pad("Grade Point : " . $gradePoint, 20) . "| ";
            echo str_pad($status, 10);
            echo PHP_EOL;

            $studentCount = count($students);

            statusCount($status, $passed, $failed);

            $classTotal = getClassTotalAverage($average, $totalAverage);
            $classAverage = $classTotal / $studentCount;

            $top = getTopScorer($average, $name, $topScorer, $topName);
            $low = getLowScorer($average, $name, $lowScorer, $lowName);
        }

        //honorable mentions

        echo str_repeat(PHP_EOL, 2);
        echo "Total Students : " . $studentCount;
        echo PHP_EOL;
        echo "Passed : " . $passed;
        echo PHP_EOL;
        echo "Failed : " . $failed;
        echo PHP_EOL;
        echo "Class Average : " . formatNumber($classAverage);
        echo PHP_EOL;
        echo "Highest Average : " . $topName . " - " .  formatNumber($topScorer);
        echo PHP_EOL;
        echo "Lowest Average : " . $lowName . " - " .  formatNumber($lowScorer);
        echo PHP_EOL;
    }



    gradeRemarks($students);
    ?>


</body>

</html>