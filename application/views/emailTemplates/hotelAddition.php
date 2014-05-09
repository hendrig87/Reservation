

<div> <?php if (!empty($user)) {
        foreach ($user as $data) {
            $username = $data->user_name;
}}
            ?>

            <h4>Dear <?php echo $username ?>  !</h4>
    
    <h5>Congratulation your hotel addition is successful</h5>
    <?php if (!empty($hotel)) {
        foreach ($hotel as $data) {
            $hotelname = $data->name;
        }
    }
    ?>
    
    <p>You have successfully added your hotel <?php echo $hotelname ; ?>to reservation.</p>
    
</div>