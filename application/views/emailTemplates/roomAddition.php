<div> <?php if (!empty($user)) {
        foreach ($user as $data) {
            $username = $data->user_name;
}}
            ?>

            <h4>Dear <?php echo $username ?>  !</h4>
            
             <?php if (!empty($hotel)) {
        foreach ($hotel as $data) {
            $hotelname = $data->name;
        }
    }
    ?>
    <h5>Congratulation! you have successfully added room to your hotel<?php echo $hotelname; ?></h5>
    
</div>