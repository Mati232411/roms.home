<?php
?>
<html>
    <head>
        <title>Add Game</title>
    </head>
    <body>
    <center><form action="/system/add.php" method="post" enctype="multipart/form-data">
        <label for="platform">Choose a platform:</label>
            <select id="platform" name="platform">
                <option value="ps3">Playstation 3</option>
                <option value="ps2">Playstation 2</option>
                <option value="psx">Playstation 1</option>
                <option value="psv">Playstation Vita</option>
                <option value="psp">Playstation Portable</option>
                <option value="x360">Xbox 360</option>
                <option value="xbox">Xbox</option>
            </select></br></br>
        <b>Enter name of the game:</b></br>
        <input id="name" type="text" name="name"><br><br>
        <b>Enter year of the game:</b></br>
        <input id="year" type="text" name="year"><br><br>
        <b>Enter region of the game:</b></br>
        <input id="region" type="text" name="region"><br><br>
        <b>Enter where the game is located on the filesystem:</b></br>
        <input id="filelink" type="text" name="filelink"><br><br>
        <b>Give the short description of the game:</b></br>
        <input id="shortdesc" type="text" name="shortdesc"><br><br>
        <b>Select coverart for the game:</b></br>
        <input class="upload" type="file" name="file" id="inputFile"><br />
        <input type="submit" value="Upload" name="submit">
    </form>
    </body>
</html>