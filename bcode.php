<?php

require 'config.php';


if(isset($_POST['save_mov']))
{
	$mname = mysqli_real_escape_string($db, $_POST['mname']);
    $director = mysqli_real_escape_string($db, $_POST['director']);
	$actor = mysqli_real_escape_string($db, $_POST['actor']);
    $music = mysqli_real_escape_string($db, $_POST['music']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
	$lang = mysqli_real_escape_string($db, $_POST['lang']);
    $genre = mysqli_real_escape_string($db, $_POST['genre']);
    $rating = mysqli_real_escape_string($db, $_POST['rating']);
	
    if($mname == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }

    $query = "INSERT INTO movie (M_name,Director,Actor,Music,Rel_yr,Lang,gener,Rating) VALUES('$mname','$director','$actor','$music','$year','$lang','$genre','$rating')";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Details added Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Details Not Created'
        ];
        echo json_encode($res);
        return;
    }
	
}


if(isset($_POST['update_movie']))
{
	$mid = mysqli_real_escape_string($db, $_POST['mid']);
	$mname = mysqli_real_escape_string($db, $_POST['mname']);
    $director = mysqli_real_escape_string($db, $_POST['director']);
	$actor = mysqli_real_escape_string($db, $_POST['actor']);
    $music = mysqli_real_escape_string($db, $_POST['music']);
    $year = mysqli_real_escape_string($db, $_POST['year']);
	$lang = mysqli_real_escape_string($db, $_POST['lang']);
    $genre = mysqli_real_escape_string($db, $_POST['genre']);
    $rating = mysqli_real_escape_string($db, $_POST['rating']);
    
	if($mname == NULL)
    {
        $res = [
            'status' => 422,
            'message' => 'All fields are mandatory'
        ];
        echo json_encode($res);
        return;
    }


    $query = "UPDATE movie  SET M_name='$mname', Director='$director',Actor='$actor', Music='$music', Rel_yr='$year',Lang='$lang',gener='$genre',Rating='$rating'WHERE ID='$mid'";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Movie Updated Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Movie Not Updated'
        ];
        echo json_encode($res);
        return;
    }
}





if(isset($_GET['movieid']))
{
    $movieid = mysqli_real_escape_string($db, $_GET['movieid']);

    $query = "SELECT * FROM movie WHERE ID='$movieid'";
    $query_run = mysqli_query($db, $query);

    if(mysqli_num_rows($query_run) == 1)
    {
        $movie = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'details Fetch Successfully by id',
            'data' => $movie
        ];
		
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'details Id Not Found'
        ];
        echo json_encode($res);
        return;
    }
}


if(isset($_POST['delete_movie']))
{
    $mid = mysqli_real_escape_string($db, $_POST['mid']);
	
    $query = "DELETE FROM movie WHERE ID='$mid'";
    $query_run = mysqli_query($db, $query);

    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Movie Deleted Successfully'
        ];
        echo json_encode($res);
        return;
    }
    else
    {
        $res = [
            'status' => 500,
            'message' => 'Movie Not Deleted'
        ];
        echo json_encode($res);
        return;
    }
}

?>