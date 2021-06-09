<script src="vendor/components/jquery/jquery.min.js"></script>
<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
$("#whiteTheme").click(function(){
    if ($("body").hasClass("white")){
      $("body").removeClass("white");
    }
    else{
      $("body").addClass("white");
    }
  });
  
  $(document).ready(function () {
  });
  </script>