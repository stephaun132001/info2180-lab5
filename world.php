<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");
$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$find_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");

$results = $find_country->fetchAll(PDO::FETCH_ASSOC);

?>
<table>
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
</tbody>
</table>
  
 
