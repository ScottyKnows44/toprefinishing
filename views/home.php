<!DOCTYPE html>
<html lang="en">
<head>
    <include href="includes/header.html"></include>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="navBar">
    <div class="container">
        <a class="navbar-brand" href="{{ @BASE }}">
            Top Refinishing
            <i class="fas fa-city"></i>
        </a>
        <a href="admin" class="navbar-brand pull-right"><i class="fas fa-user-cog" style="font-size: 30px">Admin</i></a>
    </div>
</nav>
<div class="container mt-5">
    <h1 id="aboutUs" class="pt-4">About Us</h1>
    <p class="m-2 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sagittis accumsan nisl quis imperdiet. Duis blandit, dolor at molestie posuere,
        quam orci venenatis turpis, ac hendrerit nulla magna quis odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos
        himenaeos. Suspendisse cursus at nulla molestie imperdiet. Etiam lacinia id sapien id mattis. Etiam eleifend risus ut nisi lacinia, ac interdum elit
        luctus. Aenean eget viverra metus. Quisque dignissim scelerisque mi, non volutpat nunc imperdiet pellentesque. Sed lacinia, ligula tristique finibus
        maximus, nulla eros gravida mauris, at condimentum ante erat sed nisl. Mauris sodales congue scelerisque. Ut eu consequat mi, eget rhoncus nibh. Aenean
        in mi massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec quis erat eu nisi malesuada feugiat ut
        in quam.</p>
    <div class="container text-center">
        <h1 id="services">Services</h1>
        <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-wrench" style="font-size: 4em"></i>
            </a>
        </p>
        <div class="collapse" id="collapseExample">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Bathtub</li>
                <li class="list-group-item">Countertop refinishing</li>
                <li class="list-group-item">Tile Surround</li>
            </ul>
        </div>
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/placeholder.jpg" class="d-block w-50 mx-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/placeholder2.jpg" class="d-block w-50 mx-auto" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/placeholder3.jpg" class="d-block w-50 mx-auto" alt="...">
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
<div class="container text-center form-group p-5">
    <div class="jumbotron">
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
        <input type="radio" id="contactMethod" name="contact" class="m-2" value="email">Email
        <input type="radio" name="contact" class="m-2" value="phone">Phone<br>

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
