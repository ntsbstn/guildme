    <!-- START FOOTER -->
        <div class="container-fluid container-fixed-lg footer">
          <div class="copyright sm-text-center">
            <p class="small no-margin pull-left sm-pull-reset">
              <span class="hint-text">Copyright © 2014</span>
              <span class="font-montserrat">REVOX</span>.
              <span class="hint-text">All rights reserved.</span>
              <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a>
                        </span>
            </p>
            <p class="small no-margin pull-right sm-pull-reset">
              <a href="#">Hand-crafted</a>
              <span class="hint-text">&amp; Made with Love ®</span>
            </p>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- END FOOTER -->
    
    <!-- BEGIN VENDOR JS -->
    <script src="/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="/plugins/modernizr.custom.js" type="text/javascript"></script>
    <script src="/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
    <script src="/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="/plugins/jquery-bez/jquery.bez.min.js"></script>
    <script src="/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
    <script src="/plugins/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/plugins/jquery-actual/jquery.actual.min.js"></script>
    <script src="/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/plugins/jquery-nouislider/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js" integrity="sha256-HT7c4lBipI1Hkl/uvUrU1HQx4WF3oQnSafPjgR9Cn8A=" crossorigin="anonymous"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="/pages/js/pages.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="/js/scripts.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

     @if(session('success'))
        <script>
            $('body').pgNotification({
                style : 'circle',
                message : '{{ session("success") }}',
                type : 'success',
                thumbnail : '<img width="40" height="40" style="display: inline-block;" src="/img/kadgar.jpg" data-src="/img/kadgar.jpg" data-src-retina="/img/kadgar.jpg" alt="">'
            }).show();
        </script>
    @endif
     @if(session('error'))
        <script>
            $('body').pgNotification({
                style : 'circle',
                message : '{{ session("error") }}',
                type : 'danger',
                thumbnail : '<img width="40" height="40" style="display: inline-block;" src="/img/kadgar.jpg" data-src="/img/kadgar.jpg" data-src-retina="/img/kadgar.jpg" alt="">'
            }).show();
        </script>
    @endif
