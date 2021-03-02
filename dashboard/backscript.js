//========================================================
//-----------------------
$(function() {
    function Add_Block(){
        $.ajax({
            url: "add_block.php",
            success: function (result) {
                $(".AjaxContentDisplay").html(result);
                //$("").removeClass("active");
                $(".Home").addClass("active");
            }
        });
    }
})
