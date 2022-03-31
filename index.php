    <?php
    $conn = mysqli_connect("localhost", "root", "", "dynamic_slider");
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dynamic Slider</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        .carousel-indicators>li {
            width: 10px;
            height: 10px;
        }

        .carousel-control-prev-icon {
            background: url('./image/prev.png') no-repeat;
            background-size: cover;
            border-radius: 50%;
            border: 8px solid #202020;
            width: 30px;
            height: 30px;
        }
        .carousel-control-next-icon{
            background: url('./image/prev.png') no-repeat;
            background-size: cover;
            transform: rotate(180deg);
            border-radius: 50%;
            border: 8px solid #202020;
            width: 30px;
            height: 30px;   
        }
    </style>

    <body style="background: black;">

        <?php
        $sel = "select * from image";
        $res = mysqli_query($conn, $sel);

        $li = '';
        $i = 0;
        $div = '';

        while ($row = mysqli_fetch_assoc($res)) {
            $image = $row['image'];
            if ($i == 0) {
                $li .= ' <li data-target="#demo" data-slide-to="' . $i . '" class="active"></li>';
                $div .= ' <div class="carousel-item active ">
        <img src="image/' . $image . '" alt="Los Angeles" class="w-100">
    ';
            } else {
                $li .= ' <li data-target="#demo" data-slide-to="' . $i . '"></li>';
                $div .= ' <div class="carousel-item">
        <img src="image/' . $image . '" alt="Los Angeles" class="w-100">
    ';
            }
            $i++;
            $div .= '</div>';
        }

        ?>
        <!-- <div id="demo" class="carousel slide" data-ride="carousel"> -->
        <div id="demo" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
            <!-- Indicators -->
            <ul class="carousel-indicators carousel-fade">
                <?= $li ?>
            </ul>

            <!-- The slideshow -->

            <div class="carousel-inner">
                <?= $div ?>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </body>

    </html>