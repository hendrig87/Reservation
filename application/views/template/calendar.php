<script src="<?php echo base_url() . "contents/scripts/jquery.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery-ui.js"; ?>"></script>
<script src="<?php echo base_url() . "contents/scripts/jquery1.10.2.js"; ?>"></script>
<style>

    table.SimpleCalendar {
        font-family: Arial;
        border-collapse: collapse; }
    table.SimpleCalendar th {
        background: #C9E9F0;
        text-align: center;
        color: #0092B4;
        font-size: 11px;
        padding: 3px;
        border: 1px solid #bbb;
        border-top: none; }
    table.SimpleCalendar tbody td {
        vertical-align: top;
        width: 150px;
        height: 110px;
        border: 1px solid #bbb;
        background: #e6e6e6; }
    table.SimpleCalendar tbody td time {
        font-size: .7em;
        display: block;
        background: white;
        padding: 2px;
        text-align: right;
        font-weight: bold; }
    table.SimpleCalendar tbody td.SCsuffix, table.SimpleCalendar tbody td.SCprefix {
        background: white; }
    table.SimpleCalendar tbody td div.event {
        color: #355;
        font-size: .65em;
        padding: 5px;
        line-height: 1em;
        border-bottom: 1px solid #bbb;
        background: #858585;
        color: white; }
    table.SimpleCalendar tbody td#today {
       // background: palegoldenrod;
    }
    .days
    {
        border: 1px solid #bbb;
        background-color: #ccc;
        text-align: center;
    }
    .days:last-of-type {
        color: red;
    }
    table.SimpleCalendar td:last-of-type {
        color: red;
    }
    #mthName
    {
        font-size: 18px;
    }

    #hour, #mins, #ampm
    {
        width: 70px;
    }

</style>

<!-- here the tab starts-->

<div class="right">
    
    <h2>calendar</h2><hr class="topLine" />
    
    
    <div id="sucessmsg"> 
            <?php echo validation_errors();
              if($this->session->flashdata('message')) { ?>
            <img src="<?php echo base_url() . "contents/images/success.jpg"; ?>" height="15px" width="15px"/>
            <?php echo $this->session->flashdata('message');
            }
              ?>
            
    </div>




       
            <?php
            if (!empty($months)) {
$year = $months['0'];
$month = $months['1'];

$timestamp = mktime(0, 0, 0, $month, 1);
$monthName = date('F', $timestamp );
$mthYr = $monthName.' '.$year;
            }
            $calendar = new SimpleCalendar(''.$mthYr.'');

            $calendar->setStartOfWeek('Sunday');

            if (!empty($mthBooking)) {

                foreach ($mthBooking as $data) {
                    $bookingId = $data->booking_id;
                    $start_date = $data->check_in_date;
                    $end_date = $data->check_out_date;
                    $calendar->addDailyHtml($bookingId, $start_date, $end_date);
                }
            }



            $calendar->show(true); ?>
 </div>

</div>
<div id="clear"></div>      
<script>

    jQuery(document).ready(function() {
        jQuery('.tabs .tab-links a').on('click', function(e) {
            var currentAttrValue = jQuery(this).attr('href');

            // Show/Hide Tabs
            jQuery('.tabs ' + currentAttrValue).show().siblings().hide();

            // Change/remove current tab to active
            jQuery(this).parent('li').addClass('active').siblings().removeClass('active');

            e.preventDefault();
        });
    });
</script>



<!-- tab ends here-->

<script type="text/javascript">
    $(document).ready(function() {
        $('.SimpleCalendar .asdf').click(function() {
            day_num = $(this).find('.day_num').html();
            day_data = prompt('Enter Stuff', $(this).find('.content').html());
            no_day = prompt('For how many days', $(this).find('.no_day').html());
            if (day_data != null) {

                $.ajax({
                    url: window.location,
                    type: 'POST',
                    data: {
                        day: day_num,
                        data: day_data,
                        howlong: no_day
                    },
                    success: function(msg) {
                        location.reload();
                    }
                });

            }

        });

    });

</script>