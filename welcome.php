<?php
/* Template Name: Welcome */

get_header();
?>

<div class="welcome-block" style="text-align:center; padding:50px; max-width:600px; margin:0 auto;">
    <h1>Wellcome to Slovo.live</h1>
    <p>To access your lessons, please log-in:</p>

    <form method="post" action="<?php echo wp_login_url(); ?>" style="margin-top:20px;">
        <input type="text" name="log" placeholder="Username" required style="padding:10px; width:250px;"><br><br>
        <input type="password" name="pwd" placeholder="Password" required style="padding:10px; width:250px;"><br><br>
        <input type="submit" value="Login" style="padding:10px 20px; cursor:pointer;">
    </form>
</div>

<?php get_footer(); ?>
