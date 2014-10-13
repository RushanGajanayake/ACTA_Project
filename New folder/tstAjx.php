<?php
/**
 * Created by PhpStorm.
 * User: Rushan Gajanayake
 * Date: 10/19/14
 * Time: 9:05 PM
 */

?>

<html>
<body>
<div class="content">
    <input type="text" class="search" id="searchid" placeholder="Search for people" />&nbsp; &nbsp; Ex:arunkumar, shanmu, vicky<br />
    <div id="result"></div>
</div>

<script src="/ACTA_project/jQuery/jquery-1.11.1.min.js"></script>
<!--<script type="text/javascript">-->
<script type="text/javascript">


    $(function(){
        $(".search").keyup(function()
        {
            var searchid = $(this).val();
            var dataString = 'search='+ searchid;
            if(searchid!='')
            {
                $.ajax({
                    type: "POST",
                    url: "test/tstphp.php",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#result").html(html).show();
                    }
                });
            }return false;
        });

        jQuery("#result").live("click",function(e){
            var $clicked = $(e.target);
            var $name = $clicked.find('.name1').html();
            var decoded = $("<div/>").html($name).text();
            $('#searchid').val(decoded);
        });
        jQuery(document).live("click", function(e) {
            var $clicked = $(e.target);
            if (! $clicked.hasClass("search")){
                jQuery("#result").fadeOut();
            }
        });
        $('#searchid').click(function(){
            jQuery("#result").fadeIn();
        });
    });
</script>

</body>
</html>