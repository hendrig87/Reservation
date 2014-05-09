<div style="padding: 10px 20px 10px 20px; background-color: #eee;">
    <?php if(!empty($user))
     foreach ($user as $data){
        $username=$data->user_name;
   
        ?>
    
    <h4>Dear <?php echo $username ?>  !</h4>
<?php     } ?>
    <h3>Welcome to reservation.</h3>
    <h4>You are almost done with the sign up process </h4>
    <p>Click <a href="#"> here</a> to confirm your account.</p>
</div>