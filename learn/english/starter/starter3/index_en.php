<?php

$json = '../../../../json/starter/starter3.json';

function json_file_decode(string $path)
{
    if (file_exists($path) === false) {
        return false;
    }

    $content = file_get_contents($path);
    $content = trim($content);
    $content = str_replace(["\xEF\xBB\xBF", "\r\n", "\r", "\n", "\t"], '', $content); //BOM, 개행
    $content = str_replace(',}', '}', $content); // 마지막 , 짜르기 / {"aa",} 형태
    $content = str_replace(',]', ']', $content); // 마지막 , 짜르기 / ["aa",] 형태
    $content = json_decode($content, true);

    $result = array_values($content);
    return $result;
}

// Raw JSON Files
$list = json_file_decode($json);

// Only English
$list_eng = array_column($list, 'english');

$conversations = [
    [
        "question" => "What's your name?",
        "answers" => [
            "My name is David.",
            "I'm David."
        ]
    ],
    [
        "question" => "What's your name?",
        "answers" => [
            "My name is Olivia.",
            "I'm Olivia."
        ]
    ],
    [
        "question" => "What's your name?",
        "answers" => [
            "My name is James.",
            "I'm James."
        ]
    ],
    [
        "question" => "What's your name?",
        "answers" => [
            "My name is Sophia.",
            "I'm Sophia."
        ]
    ],
    [
        "question" => "What's your name?",
        "answers" => [
            "My name is Alexander.",
            "I'm Alexander."
        ]
    ]
];
?>

<!DOCTYPE html>
<html lang="en" color-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lublio</title>

    <link rel="stylesheet" type="text/css" href="../../../../css/common.css" />

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/3b42a5b89f.js" crossorigin="anonymous"></script>

    <!-- Flag Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
</head>

<body>

    <?php
    require("../../../../components/header.php");
    ?>

    <div class="wrapper animated fade_1">

        <?php
        require("../../../../components/breadcrumbs.php");
        ?>

        <div style="margin-bottom: 20px;">

            <div class="callout-container">
                <div class="callout-pink">
                    <h2>
                        Basic Expressions
                    </h2>
                </div>
            </div>

            <div class="carousel">
                <div class="control-panel">
                    <button id="button-prev"><i class="fa-solid fa-chevron-left"></i></button>

                    <div class="control-panel-title">
                        <p>Basic Expressions</p>
                    </div>
                    <button id="button-next"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
                <div class="screen">
                    <p id="screen-text2">Press the next button</p>
                </div>
                <div class="progress-bar">
                    <div class="progress-value"></div>
                </div>
            </div>

            <p>
                This section introduces essential expressions for various situations, helping you navigate social interactions with ease.
            </p>

            <div class="text-box">
                <ul class="styled-list-with-flags">
                    <?php
                    foreach ($list as $value) {
                        echo '<li>'
                            . '<p>'
                            . $value["english"]
                            . '</p>'
                            . '</li>';
                    }
                    ?>
                </ul>
            </div>

            <div class="callout-container">
                <div class="callout-pink">
                    <h2>
                        What's your name?
                    </h2>
                </div>
            </div>

            <div class="styled-quote-pink-left">
                <p class="text-original">
                    What's your name?
                </p>
            </div>

            <div class="styled-quote-pink-right">
                <p class="text-original">
                    My name is ...
                </p>
                <p class="text-original">
                    I'm ...
                </p>
            </div>

            <?php
            for ($i = 0; $i < count($conversations); $i++) {
                echo '<div class="text-box">'
                    . '<ul class="styled-list-with-flags">'
                    . '<li>'
                    . '<p style="font-size=18px; font-weight:700px">'
                    . $conversations[$i]["answers"][0]
                    . '</p>'
                    . '<br/>'
                    . '<p>'
                    . '&#8594; '
                    . $conversations[$i]["answers"][1]
                    . '</p>'
                    . '</li>'
                    . '</ul>'
                    . '</div>';
            }
            ?>

            <p>
                The question "What's your name?" is a direct inquiry asking for your personal identifier, typically your first name or full name. It’s a common way to initiate introductions or conversations. To answer, simply state your name clearly. For example, you might say, "My name is [Your Name]."
            </p>

        </div>

    </div>

    <script>
        /*
         * ──────────────────────────────
         * Carousel
         * ──────────────────────────────
         */

        // Elements
        const buttonPrev = document.getElementById("button-prev");
        const buttonNext = document.getElementById("button-next");
        const screenText = document.getElementById("screen-text2");
        const progress = document.querySelector(".progress-bar");

        // Data
        const data = <?php echo json_encode($list_eng); ?>;

        // Init
        const proportion = 100 / data.length;
        var count = 1;

        // Event Listener
        buttonNext.addEventListener(
            'click',
            () => {
                if (count <= data.length) {
                    console.log(count);
                    screenText.innerHTML = data[count - 1].toString();
                    progress.style.setProperty("--progress", `${proportion * count}%`);
                    count++;
                } else {
                    count = data.length;
                    console.log(count);
                }
            }
        );
        buttonPrev.addEventListener(
            'click',
            () => {
                count--;
                if (count > 0) {
                    console.log(count);
                    screenText.innerHTML = data[count - 1].toString();
                    progress.style.setProperty("--progress", `${proportion * count}%`);
                } else if (count <= 0) {
                    count = 1;
                }
            }
        );
    </script>

</body>