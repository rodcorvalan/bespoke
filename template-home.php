<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post() ; ?>

<div class="container">

	<div class="col">1</div>
	<div class="col">2</div>
	<div class="col">3</div>
	<div class="col">4</div>
	<div class="col">5</div>
	<div class="col">6</div>
	<div class="col">7</div>
	<div class="col">8</div>
	<div class="col">9</div>
	<div class="col">10</div>
	<div class="col">11</div>
	<div class="col">12</div>

</div>

<div class="container no-gap">

	<div class="col">1</div>
	<div class="col">2</div>
	<div class="col">3</div>
	<div class="col">4</div>
	<div class="col">5</div>
	<div class="col">6</div>
	<div class="col">7</div>
	<div class="col">8</div>
	<div class="col">9</div>
	<div class="col">10</div>
	<div class="col">11</div>
	<div class="col">12</div>

</div>


<div class="container fluid">

	<div class="col">1</div>
	<div class="col">2</div>
	<div class="col">3</div>
	<div class="col">4</div>
	<div class="col">5</div>
	<div class="col">6</div>
	<div class="col">7</div>
	<div class="col">8</div>
	<div class="col">9</div>
	<div class="col">10</div>
	<div class="col">11</div>
	<div class="col">12</div>

</div>


<div class="container no-gap fluid">

	<div class="col">1</div>
	<div class="col">2</div>
	<div class="col">3</div>
	<div class="col">4</div>
	<div class="col">5</div>
	<div class="col">6</div>
	<div class="col">7</div>
	<div class="col">8</div>
	<div class="col">9</div>
	<div class="col">10</div>
	<div class="col">11</div>
	<div class="col">12</div>

</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>