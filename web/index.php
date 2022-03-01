<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Deutchland</title>
  </head>
  <body>
    <div align="center">
      <h1>Geutschland</h1>
      <img src="Deutchland.png" />
      <table>
        <tr>
          <td>Площ</td>
          <td></td>
          <td>357.588 km².</td>
        </tr>
        <tr>
          <td>Einwohnerzahl</td>
          <td></td>
          <td>83.129.285</td>
        </tr>
        <tr>
          <td>Hauptstadt</td>
          <td></td>
          <td>Berlin</td>
        </tr>
      </table>
      <br />
      <h1>Deutschen Städte mit über 500.000 Einwohnern:</h1>
      <table>
<?php
   require_once ('config.php');

   try {
      $connection = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $user, $password);
      $query = $connection->query("SELECT city_name, population FROM cities ORDER BY population DESC");
      $cities = $query->fetchAll();

      if (empty($cities)) {
         echo "<tr><td>Няма данни.</td></tr>\n";
      } else {
         foreach ($cities as $city) {
            print "<tr><td>{$city['city_name']}</td><td align=\"right\">{$city['population']}</td></tr>\n";
         }
      }
   }
   catch (PDOException $e) {
      print "<tr><td><div align='center'>\n";
      print "Keine Verbindung mit Datenbanl. <a href=\"#\" onclick=\"document.getElementById('error').style = 'display: block;';\">Details</a><br/>\n";
      print "<span id='error' style='display: none;'><small><i>".$e->getMessage()." <a href=\"#\" onclick=\"document.getElementById('error').style = 'display: none;';\">Hide</a></i></small></span>\n";
      print "</div></td></tr>\n";
   }
?>
      </table>
    </div>
  </body>
</html>
