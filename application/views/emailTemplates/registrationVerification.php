<div>
    <?php if(!empty($user))
     foreach ($user as $data){
        $username=$data->user_name;
   
        ?>
    
    <h4>Dear <?php echo $username ?>  !</h4>
<?php     } ?>
    <h4>Welcome to reservation.</h4>
    <h5>You are almost done with the sign up process </h5>
    <p>Click <a href="#"> here</a> to confirm your account.</p>
</div>