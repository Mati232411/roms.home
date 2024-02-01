<?php
include("/var/www/auth.php");
$titlebar='<form action="/search.php" method="get">
<input id="gname" name="gname" aria-label="Search Box" type="text" placeholder="Search for a game"/>
<input type="submit" value="Search">
</form>
</br>
<li>Sony</li>
<ul>  
<li><a href="/sony/ps3.php">Playstation 3</a></li>
<li><a href="/sony/ps2.php">Playstation 2</a></li>
<li><a href="/sony/psx.php">Playstation 1</a></li>
<li><a href="/sony/psv.php">Playstation Vita</a></li>
<li><a href="/sony/psp.php">Playstation Portable</a></li>
</ul>
<li>Microsoft</li>
<ul>
<li><a href="/microsoft/xbox360.php">Xbox 360</a></li>
<li><a href="/microsoft/xbox.php">Xbox</a></li>
</ul>
</div>';
?>