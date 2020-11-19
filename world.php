<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$find_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$find_city = $conn->query("SELECT * FROM countries JOIN cities ON countries.code = cities.country_code where countries.name LIKE '%$country%'");

 $urlreq = $_SERVER['REQUEST_URI'];
 $query = parse_url($urlreq,PHP_URL_QUERY);

 parse_str($query,$param);
 $context= $param['context'];

$results = $find_country->fetchAll(PDO::FETCH_ASSOC);
$results2 =$find_city->fetchALL(PDO::FETCH_ASSOC);
?>

<?php if($context == "cities"):?>
    <table border="1px" >
      <thead>
        <tr>
          <th>Name</th>
          <th>District</th>
          <th>Population</th>
        </tr>
      </thead>
    <tbody>
    <?php foreach ($results2 as $row): ?>
      <tr>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['district'];?></td>
        <td><?php echo $row['population'];?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php else:?>

<table border="1px">
  <thead>
    <tr>
      <th>Name</th>
      <th>Continent</th>
      <th>Independence</th>
      <th>Head of State</th>
    </tr>
  </thead>
<tbody>

<?php foreach ($results as $row): ?>
    <tr>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['continent'];?></td>
      <td><?php echo $row['independence_year'];?></td>
      <td><?php echo $row['head_of_state'];?></td>
    </tr>
  <?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>

  
