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

    @keyframes dance {
        0% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-2.5px);
        }

        50% {
            transform: translateX(0);
        }

        75% {
            transform: translateX(3px);
        }

        100% {
            transform: translateX(0);
        }
    }

    .txt {
        font-size: 1.5em;
        animation: dance 2s infinite;

        background: linear-gradient(90deg, #ff0000, #ff0000, #0000ff);
        -webkit-background-clip: text;
        color: transparent;
        display: inline-block;
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
                            <li class="breadcrumb-item active" aria-curent="page">Movie Report</li>
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
                                        <h2 class="ml-lg-2">Movies Report</h2>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row mb-3">
                                <div class="col-md-3">
                                    <label for="yearFilter" class="form-label">Filter by Year:</label>
                                    <?php
                                            echo '<select id="yearFilter" class="form-select">';
                                            echo '<option value="">All</option>';

                                            $currentYear = date("Y");
                                            $startYear = 1900;

                                            for ($year = $currentYear; $year >= $startYear; $year--) {
                                                echo '<option value="' . $year . '">' . $year . '</option>';
                                            }

                                            echo '</select>';
                                            ?>
                                </div>

                                <div class="col-md-3">
                                    <label for="languageFilter" class="form-label">Filter by Language:</label>
                                    <select id="languageFilter" class="form-select">
                                        <option value="">All</option>
                                        <option value="Tamil">Tamil</option>
                                        <option value="Hindi">Hindi</option>
                                        <option value="Malayalam">Malayalam</option>
                                        <option value="Kannada">Kannada</option>
                                        <option value="Telugu">Telugu</option>
                                        <option value="English">English</option>

                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="ratingFilter" class="form-label">Filter by Rating:</label>
                                    <select id="ratingFilter" class="form-select">
                                        <option value="">All</option>
                                        <option value="5-5">5</option>
                                        <option value="4-5">4</option>
                                        <option value="3-3.9">3</option>
                                        <option value="2-2.9">2</option>
                                        <option value="1-1.9">1</option>
                                    </select>
                                </div>

                            </div>

                            <table id="movie" class="table table-striped table-hover">

                                <tbody id="movie-body"></tbody>
                            </table>
                            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                            <script>
                            $(document).ready(function() {

                                function updateTable() {
                                    var year = $('#yearFilter').val();
                                    var language = $('#languageFilter').val();
                                    var selectedRatingRange = $('#ratingFilter').val();
                                    var ratingRangeArray = selectedRatingRange.split("-");
                                    var minRating = parseFloat(ratingRangeArray[0]);
                                    var maxRating = parseFloat(ratingRangeArray[1]);

                                    if (year === null) {
                                        year = '';
                                    }

                                    if (isNaN(minRating)) {
                                        minRating = null;
                                    }

                                    if (isNaN(maxRating)) {
                                        maxRating = null;
                                    }

                                    $.ajax({
                                        url: 'filter.php',
                                        method: 'POST',
                                        data: {
                                            year: year,
                                            language: language,
                                            minRating: minRating,
                                            maxRating: maxRating
                                        },
                                        success: function(data) {
                                            $('#movie-body').html(data);
                                        }
                                    });
                                }

                                $('#yearFilter, #languageFilter, #ratingFilter').change(function() {
                                    updateTable();
                                });

                                updateTable();
                            });
                            </script>

                        </div>
                    </div>



                </div>
            </div>

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
    </script>


</body>

</html>