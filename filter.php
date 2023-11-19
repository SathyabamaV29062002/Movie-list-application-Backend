<?php
include 'config.php';
$year = $_POST['year'] ?? null;
$language = $_POST['language'] ?? null;
$minRating = $_POST['minRating'] ?? null;
$maxRating = $_POST['maxRating'] ?? null;

$query = "SELECT * FROM movie WHERE 1";

if (!is_null($year) && $year !== '') {
    $query .= " AND Rel_yr = '$year'";
}

if (!is_null($language) && $language !== '') {
    $query .= " AND Lang = '$language'";
}

if (!is_null($minRating) && !is_null($maxRating) && $minRating !== '' && $maxRating !== '') {
    $query .= " AND Rating BETWEEN ? AND ?";
}

$stmt = mysqli_prepare($db, $query);

if ($stmt) {
    if (!is_null($minRating) && !is_null($maxRating) && $minRating !== '' && $maxRating !== '') {
        mysqli_stmt_bind_param($stmt, 'dd', $minRating, $maxRating);
    }

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $totalRows = mysqli_num_rows($result);
 echo '<h5 class="text-nowrap txt mb-3">Total Movies: ' . $totalRows . '</h5>';
?>

<thead>
    <tr style="background-color: #0d0a0b; background-image: linear-gradient(315deg, #0d0a0b 0%, #009fc2 74%); color:white;">
        <th>S.No</th>
        <th>Name</th>
        <th>Director</th>
        <th>Year</th>
        <th>Language</th>
        <th>Rating</th>
    </tr>
</thead>
<?php
    mysqli_data_seek($result, 0);

    $ss = 1;
    while ($movie = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<th>' . $ss . '</th>';
        echo '<th>' . htmlspecialchars($movie['M_name']) . '</th>';
        echo '<th>' . htmlspecialchars($movie['Director']) . '</th>';
        echo '<th>' . htmlspecialchars($movie['Rel_yr']) . '</th>';
        echo '<th>' . htmlspecialchars($movie['Lang']) . '</th>';
        echo '<th>' . htmlspecialchars($movie['Rating']) . '</th>';
     
        echo '</tr>';
        $ss++;
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Error in prepared statement: " . mysqli_error($db);
}

mysqli_close($db);
?>