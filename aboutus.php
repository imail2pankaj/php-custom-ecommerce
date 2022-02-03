<?php
include './db/db-connect.php';
include './include/top.php';
?>

<h1 class="visually-hidden">Features examples</h1>

<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">About us</h2>
    <div class="row g-4 py-5 row-cols-1">
        <div class="feature col">

            <h2>Web development</h2>
            <p>We are a team of focused, dedicated & experienced professionals from India,
                in pursuit to do whatever it takes to help you to achieve your objectives.

                When attempting to maximise productivity, improve performance and deliver
                business value an online companion is a need of time so, we are here to
                offer you solutions with our competency and knowledge in HTML, CSS & JavaScript.

                We are having considerable expertise in various design tools like Adobe
                Photoshop, Adobe Illustrator, Adobe XD, Figma & Design framework like Bootstrap framework.

                We are here for you to optimize you efforts to accomplish goals digitally.</p>
        </div>
        <p class="mb-0">Need help? <a href="index.php">Visit the homepage</a> or read our <a href="index.php">getting started guide</a>.</p>
        <p>Email: exmaple@gmail.com</p>
    </div>
</div>


<div class="b-example-divider"></div>

<div class="container px-4 py-5" id="custom-cards">
    <h2 class="pb-2 border-bottom">Recent Projects</h2>

    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('images/network.jpg'); ">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Website hosting + free domein</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="./images/network.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#geo-fill" />
                            </svg>
                            <small>Indonesia</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#calendar3" />
                            </svg>
                            <small>3d</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('images/login.jpg');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="images/login.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#geo-fill" />
                            </svg>
                            <small>india</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#calendar3" />
                            </svg>
                            <small>4d</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" style="background-image: url('images/star.jpg');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                    <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Another longer title belongs here</h2>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="images/star.jpg" alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#geo-fill" />
                            </svg>
                            <small>California</small>
                        </li>
                        <li class="d-flex align-items-center">
                            <svg class="bi me-2" width="1em" height="1em">
                                <use xlink:href="#calendar3" />
                            </svg>
                            <small>5d</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="b-example-divider"></div>

<div class="container px-4 py-5" id="icon-grid">
    <h2 class="pb-2 border-bottom">Icon grid</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 py-5">
        <div class="col d-flex align-items-start">
            <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                <use xlink:href="#bootstrap" />
            </svg>
            <div>
                <h4 class="fw-bold mb-0">Featured plan</h4>
                <p>Paragraph of text beneath the heading to explain the heading.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                <use xlink:href="#cpu-fill" />
            </svg>
            <div>
                <h4 class="fw-bold mb-0">Featured title</h4>
                <p>Paragraph of text beneath the heading to explain the heading.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                <use xlink:href="#calendar3" />
            </svg>
            <div>
                <h4 class="fw-bold mb-0">Featured title</h4>
                <p>Paragraph of text beneath the heading to explain the heading.</p>
            </div>
        </div>
        <div class="col d-flex align-items-start">
            <svg class="bi text-muted flex-shrink-0 me-3" width="1.75em" height="1.75em">
                <use xlink:href="#home" />
            </svg>
            <div>
                <h4 class="fw-bold mb-0">Featured title</h4>
                <p>Paragraph of text beneath the heading to explain the heading.</p>
            </div>
        </div>
    </div>
</div>
<?php include './include/bottom.php' ?>