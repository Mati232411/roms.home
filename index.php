<?php
include("/var/www/html/system/main.php");
?>
<html>
    <head>
        <title>Roms - PowerSRV</title>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://unpkg.com/@sakun/system.css" />
    </head>
    <body>
        <div class="maintitle">
            <div class="window" style="width:22rem;">
                <div class="title-bar"> 
                <a href="/"><button aria-label="Close" class="close"></button></a>
                    <h1 class="title">Main Menu</h1>
                    <button aria-label="Resize" class="resize"></button>
                </div>
            <div class="separator"></div>
        
                <div class="window-pane">
                <?php echo $titlebar; ?>
            </div>
            </div>
        </div>
    </body>
</html>
