<?php
if (Auth('admin')->User()->dashboard_style == "light" || Auth::user()->dashboard_style == "light") {
	$text = "dark";
	$bg = "light";
} else {
	$text = "light";
	$bg = "dark";
}
?>

<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($settings->site_name); ?> | <?php echo e($title); ?></title>
    <link rel="icon" href="<?php echo e(asset('dash/img/icon.ico')); ?>" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?php echo e(asset('dash/js/plugin/webfont/webfont.min.js')); ?>"></script>
	

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/fonts.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/atlantis.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/customs.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('dash/css/style.css')); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
</head>
<body data-background-color="dark">
    <div id="app">
         <!--PayPal-->
        <script>
        
            // Add your client ID and secret
            var PAYPAL_CLIENT = '<?php echo e($settings->pp_ci); ?>';
            var PAYPAL_SECRET = '<?php echo e($settings->pp_cs); ?>';
            
            // Point your server to the PayPal API
            var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
        
            </script>
            
            <script
            src="https://www.paypal.com/sdk/js?client-id=<?php echo e($settings->pp_ci); ?>">
        </script>
        
        <!--/PayPal-->
            
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        {<?php echo $settings->tawk_to; ?>}
        
        </script>
        <!--End of Tawk.to Script-->
        <div class="wrapper">
            <?php echo $__env->yieldContent('content'); ?>
		<footer class="footer bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>">
                    <div class="container-fluid">
                        <div class="row copyright text-center text-align-center">
                            <p>All Rights Reserved &copy; <?php echo e($settings->site_name); ?> <?php echo date("Y")?></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
	<script src="<?php echo e(asset('dash/js/core/jquery.3.2.1.min.js')); ?> "></script>
	<script src="<?php echo e(asset('dash/js/core/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dash/js/core/bootstrap.min.js')); ?> "></script>
	<script src="<?php echo e(asset('dash/js/customs.js')); ?>"></script>
	
	<!-- jQuery UI -->
	<script src="<?php echo e(asset('dash/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dash/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo e(asset('dash/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?> "></script>

	<!-- jQuery Sparkline -->
	<script src="<?php echo e(asset('dash/js/plugin/jquery.sparkline/jquery.sparkline.min.js')); ?> "></script>


	<!-- Bootstrap Notify -->
	<script src="<?php echo e(asset('dash/js/plugin/bootstrap-notify/bootstrap-notify.min.js')); ?> "></script>


	<!-- Sweet Alert -->
	<script src="<?php echo e(asset('dash/js/plugin/sweetalert/sweetalert.min.js')); ?> "></script>

	<!-- Atlantis JS -->
	<script src="<?php echo e(asset('dash/js/atlantis.min.js')); ?>"></script>
	<script src="<?php echo e(asset('dash/js/atlantis.js')); ?>"></script>
	<script type="text/javascript">
		var badWords = [ 
			'<!--Start of Tawk.to Script-->',
			'<script type="text/javascript">', 
			'<!--End of Tawk.to Script-->'
					];
		$(':input').on('blur', function(){
			var value = $(this).val();
			$.each(badWords, function(idx, word){
			value = value.replace(word, '');
			});
			$(this).val( value);
		});
	</script>
</body>
</html>
