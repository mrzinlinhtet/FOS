<?php
session_start();
include_once "controller/user_controller.php";





if(isset($_POST['logoutBtn']))
{
    session_destroy();
    header('location:login.php');
}

$id=$_SESSION['user_array']['id'];
$userController = new UserController();
$users  = $userController->getUsers();
$user = $userController->getUser($id);
// var_dump($user);







?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="./css/style.css" />
        <link rel="stylesheet" href="./css/customize.css" />
        <script src="./js/jquery.min.js"></script>
        <link rel="icon" href="./img/logo.jpg" />
        <title>Darli SNACKS & DRINKS</title>
    </head>
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark"> <a class="navbar-brand" href="./user.php"><img class="rounded" src="./img/logo.jpg"></a>
        <button
        class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"> <a class="nav-link text-white" href="./user.php"><h5>Darli</h5></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./user.php#menu">Today's Menu</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link text-white" href="./user.php#about">About</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>
                            <span> <?php echo $user['name'];        ?></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">My Orders</a></li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <form action="user.php" method="post">
                                        <button type="submit" class="btn btn-danger btn-sm float-end" name="logoutBtn" onclick="return confirm('Are you sure to logout?')">Logout</button>
                                    </form>  
                                </a>
                            </li>
                        </ul>
                    </div>   
                    <div class="mt-2 mx-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bucket" viewBox="0 0 16 16">
                        <path d="M2.522 5H2a.5.5 0 0 0-.494.574l1.372 9.149A1.5 1.5 0 0 0 4.36 16h7.278a1.5 1.5 0 0 0 1.483-1.277l1.373-9.149A.5.5 0 0 0 14 5h-.522A5.5 5.5 0 0 0 2.522 5zm1.005 0a4.5 4.5 0 0 1 8.945 0H3.527zm9.892 1-1.286 8.574a.5.5 0 0 1-.494.426H4.36a.5.5 0 0 1-.494-.426L2.58 6h10.838z"/>
                        </svg>
                    </div>           
                </div>

            </div>
    </nav>
    
    <body>
        <div class="block hero1 my-auto" style="background-image:url(https://images.unsplash.com/photo-1514933651103-005eec06c04b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1934&q=80);">
            <div class="container-fluid text-center">
                 <h1 class="display-2 text-white" data-aos="fade-up" data-aos-duration="1000"
                data-aos-offset="0">Darli SNACKS & DRINKS</h1>
                <p class="lead text-white" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="600">We are closed for the moment, but we will still deliver food at your place!</p>
                <a
                href="#menu" class="btn-text lead d-inline-block text-white border-top border-bottom mt-4 pt-1 pb-1"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">View Today's Menu</a>
                <a
                href="#about" class="btn-text lead d-inline-block text-white border-top border-bottom mt-4 pt-1 pb-1"
                data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1200">About</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="maincontent">
            <div class="container">
                <section id="menu">
                    <div class="block menu1">
                        <div class="buttons-container"> <a href="#" class="button button--is-active" data-target="pizzaMenu">Pizzas</a>
                            <a
                            href="#" class="button" data-target="coffeeMenu">Drinks</a> <a href="#" class="button" data-target="noodlesMenu">Desserts</a>
                        </div>
                        <!-- Start Pizza Menu -->
                        <div class="menu menu--is-visible" id="pizzaMenu" data-aos="fade-up">
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-1.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Cheese Pizza</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$15</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="1" data-name="Cheese Pizza" data-price="15" data-quantity="1"
                                    data-image="./img/pizza-1.png">Add to cart</button>
                                </div>
                            </div>
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-2.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Hot Pastrami</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$25</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="2" data-name="Hot Pastrami" data-price="25" data-quantity="1"
                                    data-image="./img/pizza-2.png">Add to cart</button>
                                </div>
                            </div>
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-3.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Classic Pizza</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$20</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="3" data-name="Classic Pizza" data-price="20" data-quantity="1"
                                    data-image="./img/pizza-3.png">Add to cart</button>
                                </div>
                            </div>
                            <div class="item row align-items-center">
                                <div class="col-sm-3 pr-5">
                                    <img class="product-img" src="./img/pizza-4.png">
                                </div>
                                <div class="details col-sm-9">
                                    <div class="item__header">
                                         <h3 class="item__title">Country Pizza</h3>
                                        <span class="item__dots"></span>
                                        <span class="item__price">$17</span>
                                    </div>
                                    <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                        officia eaque nobis ut.</p>
                                    <button class="btn btn-sm btn-outline-primary my-cart-btn"
                                    data-id="4" data-name="Country Pizza" data-price="17" data-quantity="1"
                                    data-image="./img/pizza-4.png">Add to cart</button>
                                </div>
                            </div>
                        </div>
                        <!-- End Pizza Menu -->
                        <!-- Start Coffee Menu -->
                        <div class="menu" id="coffeeMenu">
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Cappuccino</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$4</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Iced Coffee</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$5</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Café Latte</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$3</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Espresso</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$4</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                        </div>
                        <!-- End Coffee Menu -->
                        <!-- Start Noodles Menu -->
                        <div class="menu" id="noodlesMenu">
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Chicken Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$16</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Egg Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$12</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Veg Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$10</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                            <div class="item">
                                <div class="item__header">
                                     <h3 class="item__title">Chuck Norris Noodles</h3>
                                    <span class="item__dots"></span>
                                    <span class="item__price">$20</span>
                                </div>
                                <p class="item__description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt quos harum
                                    officia eaque nobis ut.</p>
                            </div>
                        </div>
                        <!-- End Noodles Menu -->
                    </div>
                    <!-- End block -->
                    <script src="./js/mycart.js"></script>
                    <script src="./js/mycart-custom.js"></script>
                </section>
            </div>
        </div>
        <div class="maincontent">
            <div class="container" id="about">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                         <h1 class="display-4 text-center">Ways to deliver at your home and the measures we take</h1>

                        <div class="featured-img mt-5 mb-5">
                            <img data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0" src="https://images.unsplash.com/photo-1532509334149-d2130d74253c?ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80">
                        </div>
                        <article class="article" data-aos="fade-up" data-aos-duration="1000" data-aos-offset="0"
                        data-aos-delay="200">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                has roots in a piece of classical Latin literature from 45 BC, making it
                                over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney
                                College in Virginia, looked up one of the more obscure Latin words, consectetur,
                                from a Lorem Ipsum passage, and going through the cites of the word in
                                classical literature, discovered the undoubtable source.</p>
                            <p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum
                                et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.
                                This book is a treatise on the theory of ethics, very popular during the
                                Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..",
                                comes from a line in section 1.10.32.</p>
                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum
                                et Malorum" by Cicero are also reproduced in their exact original form,
                                accompanied by English versions from the 1914 translation by H. Rackham.</p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item my-cart-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </svg></i> <span class="badge badge-notify my-cart-badge"> </span>
        </div>
        <footer class="block footer1 footer text-center">
            <p>No 14, Nandar St, Conor of KhanTawLay'circle, Infront of Gannamar Park, YatKatGyi 6, Pyin Oo Lwin</p>
            <p>Ph no : 09 794278148</p>
        </footer>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <!-- <script src="js/bootstrap.min.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="js/custom-general.js"></script>
    </body>

</html>