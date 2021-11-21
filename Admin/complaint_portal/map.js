$(document).on("click","#slmap path",function(){
    $("#slmap path").css("fill","rgb(154, 187, 230)");
    $(this).css("fill","rgb(13,22,100)");
    $("#select").text("Selected "+$(this).attr("title"));
    $("#distric").text($(this).attr("distric"));
    $("#province").text($(this).attr("province"));
    $("#map_hover").text("");

});


