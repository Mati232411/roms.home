<?php
include("/var/www/html/system/main.php");
if (empty($_GET['name'])) {
$namefirst="ABC";$namesecond="DESC"; $parameter="ORDER BY name ASC";
} elseif ($_GET['name'] == "ASC") {
$namefirst=$_GET['name'];$namesecond="DESC"; $parameter="ORDER BY name {$namefirst}";
} elseif ($_GET['name'] == "DESC") {
$namefirst=$_GET['name'];$namesecond="ASC"; $parameter="ORDER BY name {$namefirst}"; }
if (empty($_GET['year'])) {
$yearfirst="Increasing";$yearsecond="Decreasing";
} elseif ($_GET['year'] == "Increasing") {
$yearfirst=$_GET['year'];$yearsecond="Decreasing"; $parameter="ORDER BY year ASC";
} elseif ($_GET['year'] == "Decreasing") {
$yearfirst=$_GET['year'];$yearsecond="Increasing"; $parameter="ORDER BY year DESC"; }
if (empty($_GET['region'])) {
$regfirst="Europe";$regsecond="USA"; $regthird="Asia";
} elseif ($_GET['region'] == "Europe") {
$regfirst=$_GET['region'];$regsecond="USA"; $regthird="Asia"; $parameter="AND region='{$regfirst}'";
} elseif ($_GET['region'] == "USA") {
$regfirst=$_GET['region'];$regsecond="Europe";$regthird="Asia"; $parameter="AND region='{$regfirst}'";
} elseif ($_GET['region'] == "Asia") {
$regfirst=$_GET['region'];$regsecond="Europe";$regthird="USA"; $parameter="AND region='{$regfirst}'"; } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Roms - Playstation Vita - PowerSRV</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://unpkg.com/@sakun/system.css" />    
</head>
<body ontouchstart>
  <div class="container">
    <div class="layout">
      <p class="col col-main">
        <aside class="window sidebar">
          <div class="title-bar">
          <a href="/"><button aria-label="Close" class="close"></button></a>
            <h1 class="title">Main Menu</h1>
            <button aria-label="Resize" class="resize"></button>
          </div>
          <div class="separator"></div>
          <div class="window-pane">
          <?php echo $titlebar; ?>
        </aside>
      </p>
    <p class="col col-complementary" role="complementary">
        <div class="standard-dialog">
          <p class="heading center">Playstation Vita</p>
            <p class="desc center">A handheld game console developed and marketed by Sony Interactive Entertainment. It was first released in Japan on December 17, 2011, and in North America, Europe, and other international territories beginning on February 22, 2012. The console is the successor to the PlayStation Portable, and a part of the PlayStation brand of gaming devices; as part of the eighth generation of video game consoles, it primarily competed with the Nintendo 3DS.</p>
            <center><table>
                <tr>
                    <td>Name</td>
                    <td>Year</td>
                    <td>Region</td>
                </tr>
                <tr>
                    <td><form method="get"><select onchange="this.form.submit()" name="name"><option><?php echo $namefirst; ?></option><option><?php echo $namesecond; ?></option></select></form></td>
                    <td><form method="get"><select onchange="this.form.submit()" name="year"><option><?php echo $yearfirst; ?></option><option><?php echo $yearsecond; ?></option></select></form></td>
                    <td><form method="get"><select onchange="this.form.submit()" name="region"><option><?php echo $regfirst; ?></option><option><?php echo $regsecond; ?></option><option><?php echo $regthird; ?></option></select></form></td>
                </tr>
            </table></center>
            </table>
            <table style="fit-content" border="1" width=100%>
                    <?php                        
                        $i=0;
                        $result = mysqli_query($con,"SELECT * FROM main WHERE platform='psv' {$parameter2 }{$parameter};");
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td width=100px><a href="test"><img width=128 src=/img/<?php echo $row['img']; ?>></a></td>
                        <td><p><?php echo $row["name"]; ?></p></td>
			            <td><p><?php echo $row["year"]; ?></p></td>
                        <td><p><?php echo $row["region"]; ?></p></td>
                        <td><center><a href="<?php echo $row['filelink'];?>"><button class="btn">Download</button></a></center></td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
                </table>
        </div>
    </p>
      </div>
    </p>
  </div>

</body>
</html>
