<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverse String</title>
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
            <h1>Reverse String</h1>
        </div>
        <p>The goal is to spell a word backwards.</p>
        <p class="rule">Rules: Don't use any array or sort built in functionalities. </p>
    </section>
    <form action="" method="post">
        <label for="word"> Enter word</label>
        <input type="text" name="word">
        <button type="submit">Submit</button>
    </form>


    <?php
    echo "<pre>";

    function wordLength(string $word): int
    {
        $length = 0;

        for ($i = 0; isset($word[$i]); $i++) {
            $length++;
        }

        return $length;
    }

    function reverseWord(string $word): string
    {
        $length = wordLength($word);
        $newWord = '';
        for ($i = 0; $i < $length; $i++) {

            if (isset($word[$length - $i - 1])) {
                $newWord .= $word[$length - $i - 1];
            }
        }
        return $newWord;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $word = $_POST["word"];
        $reversedWord = reverseWord($word);
        echo "The word " . $word . " in reverse is ". $reversedWord;
        
    }

    ?>

</body>

</html>