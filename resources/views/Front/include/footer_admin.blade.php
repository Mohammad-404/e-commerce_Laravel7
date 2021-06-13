                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © {{date('Y')}}  All rights reserved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('Controll_Lib/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('Controll_Lib/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('Controll_Lib/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('Controll_Lib/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('Controll_Lib/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('Controll_Lib/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('Controll_Lib/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('Controll_Lib/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('Controll_Lib/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('Controll_Lib/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('Controll_Lib/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('Controll_Lib/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('Controll_Lib/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('Controll_Lib/js/main.js')}}"></script>

    <script>
        $('#custom7').on('change', function(){
            $('#hdncustom7').val(this.checked ? 1 : 0);
        });
    </script>

    <script>

        $('#custom8').on('change', function(){
        this.value = this.checked ? 1 : 0;
            $('#hdncustom8').val(this.value);
        }).change();



    </script>
</body>

</html>
<!-- end document-->
