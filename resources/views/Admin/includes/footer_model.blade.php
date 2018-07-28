        
        <!-- start footer -->
        <div class="page-footer">
                <div class="page-footer-inner"> <?php echo date('Y'); ?> &copy;
                    <a href="irfitech.com" target="_top" class="makerCss">State argo company</a>
                </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- end footer -->
    </div>
    <!-- start js include path -->
    <script src="{{ URL::asset('assets/plugins/jquery/jquery.min.js') }}" ></script>
    <script src="{{ URL::asset('assets/plugins/popper/popper.js') }}" ></script>
    <script src="{{ URL::asset('assets/plugins/jquery-blockui/jquery.blockui.min.js') }}" ></script>
    <script src="{{ URL::asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    	<!-- notifications -->
        <script src="{{ URL::asset('assets/plugins/jquery-toast/dist/jquery.toast.min.js') }}" ></script>
        <script src="{{ URL::asset('assets/plugins/jquery-toast/dist/toast.js') }}" ></script>
    
    <!-- bootstrap -->
    <script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script src="{{ URL::asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" ></script>
        <!-- data tables -->
        <script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}" ></script>
        <script src="{{ URL::asset('assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js') }}" ></script>
       <script src="{{ URL::asset('assets/js/pages/table/table_data.js') }}" ></script>
   
    <!-- Common js-->
	<script src="{{ URL::asset('assets/js/app.js') }}" ></script>
    <script src="{{ URL::asset('assets/js/layout.js') }}" ></script>
	<script src="{{ URL::asset('assets/js/theme-color.js') }}" ></script>
	<!-- Material -->
	<script src="{{ URL::asset('assets/plugins/material/material.min.js') }}"></script>
    <!-- end js include path -->
</body>
</html>

@if(Session('error'))
<script>
$.toast({
            heading: 'Error',
            text: "{{Session('error')}}",
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'error',
            hideAfter: 3500
            
          });
    </script>
@endif

@if(Session('success'))
<script>
           $.toast({
            heading: 'Success',
            text: "{{Session('success')}}",
            position: 'top-right',
            loaderBg:'#ff6849',
            icon: 'success',
            hideAfter: 3500, 
            stack: 6
          });

    </script>
@endif


<script>
        function checkNotification()
        {
            var url = "{{route('home')}}";
            $.get(url,function(data){
                if(data > 0){
                $('#notification').html(data);
                $('#noti2').html(data);
                }
            });
        }
        setInterval(checkNotification,3000);

        </script>
</body>
</html>
