<?php include 'includes/header.php'?>
<?php include 'classes/hotelBooking.class.php'?>

<link rel="stylesheet" href="styles.css">
<?php 

$hotel = new HotelBooking();
$dates = array('2024-04-21', '2024-04-22', '2024-04-23');


?>

<div id="carouselExampleCaptions" class="carousel slide" >
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/background_1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Rigit Zoo Adventure</h5>
        <p>It's not just an experience, but a memory for life</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/background_2.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/backgreound_3.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="row justify-content-evenly mt-5">
    <div class="col-4">
      <h2>Why choose us?</h2>
      <p class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum voluptatibus praesentium ut quasi nesciunt. Voluptas veritatis omnis ipsum accusamus dolorem similique quia facere, impedit molestiae, voluptatibus dolores hic nihil ex?</p>
      <a href="tickets.php" class="btn btn-outline-dark">Book a visit</a>
    </div>
    <div class="col-4">
      <img class="w-100" src="images/image_1.jpg" class="img-fluid" alt="">
    </div>
  </div>

  <div class="row justify-content-evenly mt-5">
    <div class="col-4">
        <img class="w-100" src="images/loyalty_program.jpg" class="img-fluid" alt="">
    </div>
    <div class="col-4">
      <h2 class="mt-5">Our loyalty program</h2>
      <p class="mt-3">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum voluptatibus praesentium ut quasi nesciunt. Voluptas veritatis omnis ipsum accusamus dolorem similique quia facere, impedit molestiae, voluptatibus dolores hic nihil ex?</p>
      <a href="register.php" class="btn btn-outline-dark">Sign up for the benefits</a>
    </div>
  </div>
<?php include 'includes/footer.php'?>