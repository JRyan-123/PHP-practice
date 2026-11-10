<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triangle</title>
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
            <h1>Triangle</h1>
        </div>

        <p>The goal is to display a triangle thru asterisk.</p>
        <p class="rule">Rules: Don't use any array or sort built in functionalities. </p>

    </section>

    <?php
    echo "<pre>";
    $length = 5;
    for ($i=0; $i < $length ; $i++) { 
        echo PHP_EOL;
        for ($j=0; $j < $length ; $j++) { 
            if ($j <= $i) {
                echo $j+1; 
            }   
        }
    }
    
    echo str_pad(PHP_EOL,5);
    //triangle
    for ($i=0; $i <= $length ; $i++) { 
        // for space
        for ($j=0; $j < $length - $i ; $j++) { 
            echo " ";
        }
        for ($k=0; $k < (2 * $i) -1 ; $k++) { 
            echo "*";
        }

        echo PHP_EOL;
    }

    ?>
    
</body>
</html>