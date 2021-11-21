$(document).on("click","#slmap path",function(){
    $("#slmap path").css("fill","#9E9E9E");
    $(this).css("fill","#000");
    $("#select").text("Selected "+$(this).attr("title"));
    $("#distric").text($(this).attr("distric"));
    $("#province").text($(this).attr("province"));
    $("#map_hover").text("");
});

$(document).on("mousemove","#slmap path",function(){
    $("#map_hover").text($(this).attr("title"));
});
$('body').mousemove(function(){
    $("#map_hover").text("");
    $("#slmap path").css("fill","#000");
})

$("#slmap path").hover(function(){
    $("#slmap path").css("fill","#fefefe");
   alert("f");
});

