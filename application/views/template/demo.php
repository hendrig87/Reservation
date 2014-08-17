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
        width: 90px;
        height: 90px;
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
        background: palegoldenrod; }
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


</style>

<!-- here the tab starts-->
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">Booking Calendar</a></li>
        <li><a href="#tab2">Event Calendar</a></li>
        <li><a href="#tab3">Add Events</a></li>
        <li><a href="#tab4">Next Tab</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab1" class="tab active">
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



            $calendar->show(true);
            ?>
        </div>

        <div id="tab2" class="tab">

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

if (!empty($mthEvents)) {

    foreach ($mthEvents as $data) {
        $eventId = $data->id;
        $event= $data->event;
        $start_date = $data->start_date;
        $end_date = $data->end_date;
        $calendar->addDailyHtml($event, $start_date, $end_date);
    }
}



$calendar->show(true);
?>
        </div>

        <div id="tab3" class="tab">
            <form>
            <p>Event Title:
            <input type="text" placeholder="event title" required /></p>
            <p>Start Date:
            <input type="text" placeholder="event title" required /></p>
            <p>End Date:
            <input type="text" placeholder="event title" required /></p>
            <p>Location:
            <input type="text" placeholder="event title" required /></p>
            <input type="submit" value="Add Event"/>
            </form>
        </div>

        <div id="tab4" class="tab">
            
        </div>
    </div>
</div>
<style>
    /*----- Tabs -----*/
    .tabs {
        width:100%;
        display:inline-block;
    }

    /*----- Tab Links -----*/
    /* Clearfix */
    .tab-links:after {
        display:block;
        clear:both;
        content:'';
    }

    .tab-links li {
        margin:0px 5px;
        float:left;
        list-style:none;
    }

    .tab-links a {
        padding:9px 15px;
        display:inline-block;
        border-radius:3px 3px 0px 0px;
        background:#7FB5DA;
        font-size:16px;
        font-weight:600;
        color:#4c4c4c;
        transition:all linear 0.15s;
    }

    .tab-links a:hover {
        background:#a7cce5;
        text-decoration:none;
    }

    li.active a, li.active a:hover {
        background:#fff;
        color:#4c4c4c;
    }

    /*----- Content of Tabs -----*/
    .tab-content {
        padding:15px;
        border-radius:3px;
        box-shadow:-1px 1px 1px rgba(0,0,0,0.15);
        background:#fff;
    }

    .tab {
        display:none;
    }

    .tab.active {
        display:block;
    }   



</style> 
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