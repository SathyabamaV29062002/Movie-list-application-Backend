<?php
include 'config.php';
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Presidio - Movie List Application</title>
	<link rel="icon" href="img/movie.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />


    <style>
    .alertify-notifier .ajs-error {
        background: linear-gradient(to bottom right, #003300 16%, #ff0000 100%);
        color: #ffffff;
    }

    .alertify-notifier .ajs-success {
        background: blue;
        color: #ffffff;
    }


    .card {
        background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(11, 77, 78, 1) 53%, rgba(9, 60, 121, 1) 95%);
        color: white;

    }

    .card-text {
        font-size: 18px;
        text-align: center;
        text-shadow: 1px 1px 1px #000, -1px -1px 1px #000;
    }

    .card-text strong {
        font-size: 24px;
        color: yellow;
    }
    </style>
</head>

<body>





    <div class="wrapper">


        <div class="body-overlay"></div>

        <?php
			include "sidebar.php";
			?>

        <div id="content">
            <div class="top-navbar">
                <div class="xd-topbar">

                    <div class="row">
                        <div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons text-white">signal_cellular_alt
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="xp-breadcrumbbar text-center">
                        <h4 class="page-title">Presidio - Movie List Application</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Sathyabama</a></li>
                            <li class="breadcrumb-item active" aria-curent="page">Movie</li>
                        </ol>
                    </div>


                </div>
            </div>

            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">

                            <div class="table-title mb-3">
                                <div class="row">
                                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                        <h2 class="ml-lg-2">Manage Movies</h2>
                                    </div>
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                        <a href="#addMovieModal" class="btn btn-success" data-toggle="modal">
                                            <i class="material-icons">&#xE147;</i>
                                            <span>Add New Movies</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <table id="movie" class="table table-striped table-hover">
                                <thead>
                                    <tr style="background-color: #0d0a0b; background-image: linear-gradient(315deg, #0d0a0b 0%, #009fc2 74%); color:white;">
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Director</th>
                                        <th>Year</th>
                                        <th>Language</th>
                                        <th>Rating</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="movie-body">
                                    <?php
							$query = "SELECT * FROM movie";
							$stmt = mysqli_prepare($db, $query);

							if ($stmt) {
								mysqli_stmt_execute($stmt);
								$result = mysqli_stmt_get_result($stmt);

								$ss = 1;
								while ($student = mysqli_fetch_assoc($result)) {
						?>
                                    <tr>
                                        <th><?php echo $ss; ?></th>
                                        <th><?= htmlspecialchars($student['M_name']) ?></th>
                                        <th><?= htmlspecialchars($student['Director']) ?></th>
                                        <th><?= htmlspecialchars($student['Rel_yr']) ?></th>
                                        <th><?= htmlspecialchars($student['Lang']) ?></th>
                                        <th><?= htmlspecialchars($student['Rating']) ?></th>
                                        <th>


                                            <a href="#" data-id="<?= htmlspecialchars($student['ID']) ?>"
                                                class="viewacBtn view">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="View">&#xE8F4;</i>
                                            </a>

                                            <a href="#" data-id="<?= htmlspecialchars($student['ID']) ?>"
                                                class="editacBtn edit">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Edit">&#xE254;</i>
                                            </a>


                                            <a href="#deleteEmployeeModal"
                                                data-employee-id="<?= htmlspecialchars($student['ID']) ?>"
                                                class="delete" data-toggle="modal">
                                                <i class="material-icons" data-toggle="tooltip"
                                                    title="Delete">&#xE872;</i>
                                            </a>

                                        </th>
                                    </tr>
                                    <?php
								$ss++;
								}

								mysqli_stmt_close($stmt);
							} else {
								echo "Error in prepared statement: " . mysqli_error($db);
							}
						?>
                                </tbody>


                            </table>
                        </div>
                    </div>


                    <!-- add-Movie modal-->
                    <div class="modal fade" tabindex="-1" id="addMovieModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Movie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="savemovie">
                                    <div class="modal-body">
                                        <div id="addmsg" class="alert alert-warning d-none"></div>

                                        <div class="form-group">
                                            <label>Movie Name</label>
                                            <input type="text" class="form-control" name="mname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="emil" class="form-control" name="director" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Actors</label>
                                            <textarea class="form-control" name="actor" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Music</label>
                                            <input type="text" class="form-control" name="music" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" class="form-control" name="year" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Language</label>
                                            <select class="form-control" name="lang">
                                                <option value="">Select Language</option>
                                                <option value="Tamil">Tamil</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Malayalam">Malayalam</option>
                                                <option value="Kannada">Kannada</option>
                                                <option value="Telugu">Telugu</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <select class="form-control" name="genre">
                                                <option value="">Select Genre</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Action">Action</option>
                                                <option value="Horror">Horror</option>
                                                <option value="Thriller">Thriller</option>
                                                <option value="Comedy">Comedy</option>
                                                <option value="Science fiction">Science fiction</option>
                                                <option value="Romance">Romance</option>
                                                <option value="Fantasy">Fantasy</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rating</label>
                                            <input type="text" class="form-control" name="rating" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- add-Movie modal end-->

                    <!-- edit Movie modal-->
                    <div class="modal fade" tabindex="-1" id="editmovieModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update Movie Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form id="editmovie">
                                    <div class="modal-body">
                                        <div id="addmsg" class="alert alert-warning d-none"></div>
                                        <input type="hidden" name="mid" id="mid">
                                        <div class="form-group">
                                            <label>Movie Name</label>
                                            <input type="text" class="form-control" name="mname" id="mname" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Director</label>
                                            <input type="emil" class="form-control" name="director" id="director"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Actors</label>
                                            <textarea class="form-control" name="actor" id="actor" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Music</label>
                                            <input type="text" class="form-control" name="music" id="music" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Year</label>
                                            <input type="text" class="form-control" name="year" id="year" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Language</label>
                                            <select class="form-control" name="lang" id="lang">
                                                <option value="">Select Language</option>
                                                <option value="Tamil">Tamil</option>
                                                <option value="Hindi">Hindi</option>
                                                <option value="Malayalam">Malayalam</option>
                                                <option value="Kannada">Kannada</option>
                                                <option value="Telugu">Telugu</option>
                                                <option value="English">English</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Genre</label>
                                            <select class="form-control" name="genre" id="genre">
                                                <option value="">Select Genre</option>
                                                <option value="Drama">Drama</option>
                                                <option value="Action">Action</option>
                                                <option value="Horror">Horror</option>
                                                <option value="Thriller">Thriller</option>
                                                <option value="Comedy">Comedy</option>
                                                <option value="Science fiction">Science fiction</option>
                                                <option value="Romance">Romance</option>
                                                <option value="Fantasy">Fantasy</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rating</label>
                                            <input type="text" class="form-control" name="rating" id="rating" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- edit-Movie modal end-->


                    <!-- view-Movie modal-->
                    <div class="modal fade" tabindex="-1" id="viewmovieModal" role="dialog">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">View Movie Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-deck">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p class="card-text"><strong>Movie Name</strong> <br><br><b><span
                                                            id="mname2"></span></b></p>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p class="card-text"><strong>Director</strong> <br><br><b><span
                                                            id="director2"></span></b></p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <p class="card-text"><strong>Actors</strong> <br><br><b><span
                                                        id="actor2"></span></b></p>
                                        </div>
                                    </div>


                                    <div class="card-deck">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p class="card-text"><strong>Music</strong> <br><br><b><span
                                                            id="music2"></span></b></p>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p class="card-text"><strong>Year</strong> <br><br><b><span
                                                            id="year2"></span></b></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-deck">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p class="card-text"><strong>Gener</strong> <br><br> <b><span
                                                            id="genre2"></span></b></p>
                                            </div>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <p class="card-text"><strong>Rating</strong> <br><br> <span id="rating2"
                                                        class="star-rating"></span></p>


                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- view-Movie modal end-->

                    <!-- Delete-Movie modal-->

                    <div id="deleteEmployeeModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Movie</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <div class="modal-body">
                                    <p>Are you sure you want to delete this Movie?</p>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="deleteButton">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Delete-Movie modal end-->




                </div>
            </div>



            <!-- Footer-->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 Sathyabama . All Rights Reserved.</p>
                    </div>
                </div>
            </footer>

        </div>

    </div>



    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $(".xp-menubar").on('click', function() {
            $("#sidebar").toggleClass('active');
            $("#content").toggleClass('active');
        });

        $('.xp-menubar,.body-overlay').on('click', function() {
            $("#sidebar,.body-overlay").toggleClass('show-nav');
        });

    });

    $(document).ready(function() {
        window.moviedatatable = new DataTable("#movie");
    });


    var ratingValue = 5;
    var ratingElement = document.getElementById('rating2');
    ratingElement.innerHTML = '';
    if (ratingValue >= 1 && ratingValue <= 5) {
        for (var i = 1; i <= 5; i++) {
            if (i <= ratingValue) {
                ratingElement.innerHTML += '<span class="star-rating"></span>';
            } else {
                ratingElement.innerHTML += '<span class="star-rating empty"></span>';
            }
        }
    } else {
        ratingElement.innerHTML = 'Invalid Rating';
    }
    </script>


    <script>
    var employeeId;
    $('#deleteEmployeeModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        employeeId = button.data('employee-id');
    });

    $('#deleteButton').on('click', function() {
        var mid = employeeId;
        $.ajax({
            type: "POST",
            url: "bcode.php",
            data: {
                'delete_movie': true,
                'mid': mid
            },
            success: function(response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 500) {

                    alert(res.message);
                } else {
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);
                    $('#deleteEmployeeModal').modal('hide');
                    window.moviedatatable.destroy()
                    $('#movie-body').load(location.href + " #movie-body > *", () => {
                        window.moviedatatable = new DataTable("#movie");
                    });

                }
            }
        });
    });
    </script>

    <script>
    $(document).on('submit', '#savemovie', function(e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_mov", true);
        $.ajax({
            type: "POST",
            url: "bcode.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);

                if (res.status == 422) {
                    $('#addmsg').removeClass('d-none');
                    $('#addmsg').text(res.message);

                } else if (res.status == 200) {

                    $('#addmsg').addClass('d-none');

                    $('#addMovieModal').modal('hide');

                    $('#savemovie')[0].reset();

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    window.moviedatatable.destroy()
                    $('#movie-body').load(location.href + " #movie-body > *", () => {
                        window.moviedatatable = new DataTable("#movie");
                    });


                } else if (res.status == 500) {
                    $('#addmsg').addClass('d-none');
                    $('#addMovieModal').modal('hide');
                    $('#savemovie')[0].reset();
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);
                }
            }
        });

    });


    //edit activity
    $(document).on('click', '.editacBtn', function() {

        var mid = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "bcode.php?movieid=" + mid,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {
                    $('#mid').val(res.data.ID);
                    $('#mname').val(res.data.M_name);
                    $('#director').val(res.data.Director);
                    $('#actor').val(res.data.Actor);
                    $('#music').val(res.data.Music);
                    $('#year').val(res.data.Rel_yr);
                    $('#lang').val(res.data.Lang);
                    $('#genre').val(res.data.gener);
                    $('#rating').val(res.data.Rating);
                    $('#editmovieModal').modal('show');

                }

            }
        });

    });

    //update activity

    $(document).ready(function() {
        $('#editmovie').submit(function(event) {
            event.preventDefault();
            var formData = new FormData(this);
            formData.append("update_movie", true);

            $.ajax({
                type: "POST",
                url: "bcode.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#addmsg').removeClass('d-none');
                        $('#addmsg').text(res.message);

                    } else if (res.status == 200) {

                        $('#addmsg').addClass('d-none');

                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                        $('#editmovie')[0].reset();

                        window.moviedatatable.destroy()
                        $('#movie-body').load(location.href + " #movie-body > *", () => {
                            window.moviedatatable = new DataTable("#movie");
                        });
                        $('#editmovieModal').modal('hide');


                    } else if (res.status == 500) {
                        alert(res.message);

                    }
                }
            });
        });
    });

    //Update activity end



    //view activity
    $(document).on('click', '.viewacBtn', function() {

        var mid = $(this).data('id');
        $.ajax({
            type: "GET",
            url: "bcode.php?movieid=" + mid,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {
                    $('#mid2').text(res.data.ID);
                    $('#mname2').text(res.data.M_name);
                    $('#director2').text(res.data.Director);
                    $('#actor2').text(res.data.Actor);
                    $('#music2').text(res.data.Music);
                    $('#year2').text(res.data.Rel_yr);
                    $('#lang2').text(res.data.Lang);
                    $('#genre2').text(res.data.gener);
                    $('#rating2').text(res.data.Rating);
                    $('#viewmovieModal').modal('show');

                }

            }
        });

    });

    //view activity end
    </script>



</body>

</html>