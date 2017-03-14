</div>
      <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
<!--                        <div class="wow shake animated" data-wow-delay="0.4s" style="visibility: visible;-webkit-animation-delay: 0.4s; -moz-animation-delay: 0.4s; animation-delay: 0.4s;">-->
<!--                            <div class="page-scroll marginbot-30">-->
<!--                                <a href="#top" id="totop" class="btn btn-circle">-->
<!--                                    <i class="fa fa-angle-double-up animated"></i>-->
<!--                                </a>-->
<!--                            </div>-->
<!--                        </div>-->
                        <p>&copy;Dine Together! 2017&ensp;FYP&ensp;All rights reserved.</p>
<!--                        <div class="credits">-->
<!--                            <a href="https://bootstrapmade.com/free-one-page-bootstrap-themes-website-templates/">One Page Bootstrap Themes</a> by <a href="https://bootstrapmade.com/">BootstrapMade</a>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
       </footer>



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <!-- Core JavaScript Files -->
        <script src="<?php echo base_url().'assets/'?>js/jquery.min.js"></script>
        <script src="<?php echo base_url().'assets/'?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url().'assets/'?>js/jquery.easing.min.js"></script>
        <script src="<?php echo base_url().'assets/'?>js/jquery.scrollTo.js"></script>
        <script src="<?php echo base_url().'assets/'?>js/wow.min.js"></script>
        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url().'assets/'?>js/custom.js"></script>

        <!-- Datetimepicker JavaScript -->
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
        <script type="text/javascript" src="<?php echo base_url().'assets/'?>js/transition.min.js"></script>
        <script type="text/javascript" src="https://getbootstrap.com/2.0.4/assets/js/bootstrap-collapse.js"></script>
        <script type="text/javascript" src="https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/development/src/js/bootstrap-datetimepicker.js"></script>

        <script type="text/javascript">

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




        <!-- Include all compiled plugins (below), or include individual files as needed -->
       <script src="<?php echo base_url().'assets/'?>js/bootstrap.min.js"></script>

    </body>

</html>