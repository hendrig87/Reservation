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
      }
    table.SimpleCalendar tbody td time {
        font-size: 1.3em;
        display: block;
        background: white;
        padding: 2px;
        text-align: right;
        font-weight: bold; }
    table.SimpleCalendar tbody td.SCsuffix, table.SimpleCalendar tbody td.SCprefix {
        }
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

<div class="event-popup" style="display: none; width: 300px; height: 200px; position: fixed; top:200px; left: 600px; z-index: 100; background-color: #aaa;">
   <a href="#" id="popUpClose">Close</a>
   <div id='replacable' style="padding: 15px;"></div>
</div>





<script type="text/javascript">
    
    $(document).ready(function() {
        $('.SimpleCalendar .event').click(function() {
            //$(".event-popup").show();
             var bookId =   $(this).attr('name');
             //alert(bookId);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url().'index.php/dashboard/getBookingDetails' ;?>",
                data: {
                        'book' : bookId},
                    success: function(msgs) 
                      {
                            $(".event-popup").show();
                            $("#replacable").html(msgs);
          
                    }
                });
        });
            
    
    
   
        $('#popUpClose').click(function() {
            $(".event-popup").hide();
            
        });
    });

</script>