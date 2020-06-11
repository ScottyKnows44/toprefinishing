<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Top Refinishing</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/bb7ac2ffe5.js" crossorigin="anonymous"></script>
    <link href="style/style.css" rel="stylesheet">

</head>
<body>
<div class="container-fluid">
    <div class="container p-3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navBar">
            <div class="container">
                <a class="navbar-brand" href="{{@base}}">
                    Top Refinishing
                    <i class="fas fa-city"></i>
                </a>
                <a href="admin" class="navbar-brand btn pull-right"><i class="fas fa-user-cog" style="font-size: 30px">Admin</i></a>
            </div>
        </nav>
    </div>
    <div class="container mt-5 jumbotron">
        <h1 id="aboutUs">About Us</h1>
        <p class="m-2 text-justify">Top Refinishing is a family owned business that's been working for the people in
            King County for more than 20 years. We offer various services to improve our clients homes and make it a much better place to live in.</p>
        <div class="container text-center">
            <h1 id="services">Services</h1>
            <ul class="list-group list-group-flush w-auto">
                <li class="list-group-item">Bathtub</li>
                <li class="list-group-item">Countertop refinishing</li>
                <li class="list-group-item">Tile Surround</li>
            </ul>
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="images/beforeandafter1.jpg" class="d-block w-50 mx-auto" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="images/beforeandafter2.jpg" class="d-block w-50 mx-auto" alt="...">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container text-center form-group p-5 jumbotron">
        <h1 id="contact">Contact Us</h1>
        <form method="post" action="#">
            <label for="name">Name </label>
            <input type="text" id="name" name="name" class="form-control"><br>
            <span class="err">
                <check if="{{ isset(@errors['name']) }}">
                     {{ @errors['name'] }}<br>
                </check>
            </span>
            <label for="email">Email </label>
            <input type="text" id="email" name="email" class="form-control"><br>
            <span class="err">
                <check if="{{ isset(@errors['email']) }}">
                     {{ @errors['email'] }}<br>
                </check>
            </span>
            <label for="phone">Phone number </label>
            <input type="text" id="phone" name="phone" class="form-control"><br>
            <span class="err">
                <check if="{{ isset(@errors['phone']) }}">
                     {{ @errors['phone'] }}<br>
                </check>
            </span>
            <label for="contactMethod">Contact method</label><br>
            <input type="radio" id="contactMethod" name="contact"class="m-2">Email
            <input type="radio" name="contact" class="m-2">Phone<br>
            <label for="services">Services: </label>
            <select name="services" class="form-control">
                <option name="services[]" value="" >Select--</option>
                <option name="services[]" value="bathtub">Bathtub</option>
                <option name="services[]" value="countertop">Countertop Refinishing</option>
                <option name="services[]" value="tilesurround">Tile Surround</option>
            </select>
            <button type="submit" class="btn-primary mt-5">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
