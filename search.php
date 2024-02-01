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
    <title>Roms - <?php echo $_GET['gname']; ?> - PowerSRV</title>
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
    <p width=100% class="col col-complementary" role="complementary">
        <div class="standard-dialog">
          <p class="heading center">Search - <?php echo $_GET['gname']; ?></p>
            <p class="desc center">Search for a <?php echo $_GET['gname']; ?> on the roms.home.lan instance. This instance contains <?php echo $count; ?> roms and still growing!! Search for the games and roms by the name!!</p>
            <center><table>
                <tr>
                    <td>Name</td>
                    <td>Year</td>
                    <td>Region</td>
                </tr>
                <tr>
                    <td><form method="get"><input type="hidden" name="gname" id="gname" value="<?php echo $_GET['gname'];?>"><select onchange="this.form.submit()" name="name"><option><?php echo $namefirst; ?></option><option><?php echo $namesecond; ?></option></select></form></td>
                    <td><form method="get"><input type="hidden" name="gname" id="gname" value="<?php echo $_GET['gname'];?>"><select onchange="this.form.submit()" name="year"><option><?php echo $yearfirst; ?></option><option><?php echo $yearsecond; ?></option></select></form></td>
                    <td><form method="get"><input type="hidden" name="gname" id="gname" value="<?php echo $_GET['gname'];?>"><select onchange="this.form.submit()" name="region"><option><?php echo $regfirst; ?></option><option><?php echo $regsecond; ?></option><option><?php echo $regthird; ?></option></select></form></td>
                </tr>
            </table></center>
            </table>
            <table style="fit-content" border="1" width=100%>
                    <?php                        
                        $i=0;
                        $name = $_GET['gname'];
                        $result = mysqli_query($con,"SELECT * FROM main WHERE name LIKE '%{$name}%' {$parameter2 }{$parameter};");
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
