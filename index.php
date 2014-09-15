<?php
    $colors = array("pink--dark", "green", "orange--dark", "grey", "orange", "pink", "yellow");
    shuffle($colors);
?>
<!doctype html>
<html dir="ltr" lang="en-GB">
    <head>
        <title>The Randomiser - by Kind</title>

        <!-- Icons -->
        <link rel="shortcut icon" type="image/png" href="/static/images/icons/favicon--144.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/static/images/icons/favicon--144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/static/images/icons/favicon--114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/static/images/icons/favicon--72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/static/images/icons/favicon--57.png" />

        <!-- Meta -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Supply a list, and get an item from the list at random">
        <meta name="author" content="Kind">
        <meta name="keywords" content="random, generator, randomise, randomize" />
        <link rel="author" type="text/plain" href="/humans.txt" />

        <!-- SEARCH -->
        <link rel="search" type="application/opensearchdescription+xml" title="The Randomiser" href="/opensearch.xml">

        <!-- Facebook Open Graph -->
        <meta property="og:site_name" content="The Randomiser">
        <meta property="og:description" content="Supply a list, and get an item from the list at random">
        <meta property="og:title" content="The Randomiser">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://therandomiser.com">
        <meta property="og:image" content="http://therandomiser.com/static/images/social/default.png">
        <meta property="og:updated_time" content="2014-09-14T18:08:00+00:00">

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@madebykind">
        <meta name="twitter:domain" content="madebykind.com">
        <meta name="twitter:creator" content="@madebykind">
        <meta name="twitter:image:src" content="http://therandomiser.com/static/images/social/default.png">
        <meta name="twitter:description" content="Supply a list, and get an item from the list at random">
        <meta name="twitter:title" content="The Randomiser">
        <meta name="twitter:url" content="http://therandomiser.com">
    </head>

    <body class="no-js">
        <div class="wrapper wrapper--spotlight">

            <div class="logo"><h1><span>the</span> Randomiser</h1></div>

            <div class="hint">
                <a href="/what-is-this" class="hint__toggle" data-toggle data-toggle-target="what"></a>
                <div class="hint__content" id="what">
                    <p>The Randomiser can help you make those tough decisions. What should I have for lunch today? What should I call my first child? etc.</p>
                    <p>Just enter the possibilities (separated by commas) and the Randomiser will choose for you!</p>
                </div>
            </div>

            <div class="form">
                <form method="get" action="/">
                    <label for="q" class="form__label">Enter your list <span>(comma separated)</span></label>
                    <div class="form__inline-input border--<?php echo $colors[0]; ?>">
                        <input type="text" name="q" id="q" placeholder="e.g. red, blue, green, yellow" data-randomiser-input class="form__input" value="<?php echo $_GET['q']; ?>">
                        <input type="submit" value="&raquo;" data-randomiser class="form__button">
                    </div>
                </form>
            </div>

            <div data-randomiser-result>
                <?php if ($_GET['q'] != ""): ?>
                    <?php
                        $list = explode(',', rtrim($_GET['q'], ','));
                        shuffle($list);
                    ?>
                    <h2>The randomiser has chosen:</h2>
                    <h1><?php echo $list[0]; ?></h1>
                <?php endif; ?>
            </div>
            
        </div>
        <footer class="credit">
            <div class="wrapper">
                <p>made by <a href="http://www.madebykind.com">Kind</a></p>
            </div>
        </footer>

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" media="all" href="/static/css/screen.css">

        <!-- Scripts -->
        <script type="text/javascript" src="/static/js/build/app.min.js" async></script>
    </body>
</html>