
<!-- Core JavaScript Files -->
<script src="<?php echo base_url().'assets/'?>js/admin/bootstrap.min.js"></script>
<script src="<?php echo base_url().'assets/'?>js/admin/jquery-1.11.1.min.js"></script>

<script>
//    !function ($) {
//        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
//            $(this).find('em:first').toggleClass("glyphicon-minus");
//        });
//        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
//    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>


<!-- Datetimepicker JavaScript -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/'?>js/transition.min.js"></script>
<script type="text/javascript" src="https://getbootstrap.com/2.0.4/assets/js/bootstrap-collapse.js"></script>
<script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>


<script>
    $('#eventStartTime,#eventEndTime').datetimepicker({
        useCurrent: false,
        minDate: moment(),
        format: "YYYY-MM-DD HH:mm:ss"
    });
    $('#eventStartTime').datetimepicker().on('dp.change', function (e) {
        var incrementDay = moment(new Date(e.date));
        incrementDay.add(0, 'days');
        $('#eventEndTime').data('DateTimePicker').minDate(incrementDay);
        $(this).data("DateTimePicker").hide();
    });

    $('#eventEndTime').datetimepicker().on('dp.change', function (e) {
        var decrementDay = moment(new Date(e.date));
        decrementDay.subtract(0, 'days');
        $('#eventStartTime').data('DateTimePicker').maxDate(decrementDay);
        $(this).data("DateTimePicker").hide();
    });


</script>
</body>

</html>

