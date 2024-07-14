<?php
if(isset($_POST["search"])) {
    $search_value = $_POST["search"];

    $mysqli = require __DIR__ . "/config/db-connection.php";

    $sql = "SELECT * FROM users WHERE name LIKE '%{$search_value}%'"; 
    $result = $mysqli->query($sql);

    if ($result) { 
        $users = $result->fetch_all(MYSQLI_ASSOC);

        if (count($users) > 0) {
?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>@Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            foreach($users as $user) {
                echo '<tr> <td>' . $i++ . '</td>';
                echo '<td>' . $user["name"] . '</td>';
                echo '<td>' . $user["email"] . '</td>  </tr>';
            }
        ?>
    </tbody>
</table>
<?php
        } else {
            echo "No result's found.";
        }
    } else {
        // Handle query error
        echo "Error executing query: " . $mysqli->error;
    }
} else {
    echo "Please provide a search term.";
}
?>
