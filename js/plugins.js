$(document).ready(function() {

	/* CUFON */
    Cufon.replace('.cufon', {
        hover: true
    });
    
	// INPUT BOXES
    $("input[type=text], textarea").each(function() {
        if ($(this).val() == $(this).attr("title")) {
            $(this).addClass("default");
        }
    });
    $("input[type=text], textarea").click(function() {
        if ($(this).val() == $(this).attr("title")) {
            $(this).val("");
            $(this).removeClass("default");
        }
    });

    $("input[type=text], textarea").blur(function() {
        if ($(this).val() == "") {
            $(this).val($(this).attr("title"));
            $(this).addClass("default");
        }
    });
    
    // THE RANDOMISER
    $("#submitButton").click ( function(e) {
	    e.preventDefault();
	    if ($("#inputList").val() != $("#inputList").attr("title")) {
			$("#result, #preResult").hide();
		    var list = $("#inputList").val();
		    randomise(list);
	    }
    });
    
    // RANDOM BORDER COLOUR
		var randombgtoppos = (Math.floor(Math.random() * 7)) * 69;
		$("#inputContainer").css("background-position", "0px -" + randombgtoppos + "px");
    
    // SUGGESTIONS
    $(".suggestions").hide();
    $("#cantThink h2 a, #recently h2 a").click( function() {
	    $(this).parent().parent().find(".suggestions").slideToggle();
    });
    $(".suggestions a").click( function (e) {
	    e.preventDefault();
		$("#result, #preResult").hide();
		var list = $(this).attr("href").replace("index.php?l=", "");
		$("#inputList").val(list).removeClass("default");
		randomise(list);
    });

});

function randomise(list) {
	$.get('/randomiser/randomiser.php', { l: list }, function(data) {
	    $("#result p").text(data);
	    $("#output, #working").show("fast", function() {
		    $("#output").animate({
			    opacity: 1
		    }, 2000 , function() {
			    $("#working").fadeOut("slow", function() {
			    	$("#result, #preResult").fadeIn();
			    });
		    });
	    });
		var choplist = list;
		if (list.length > 30) {
			choplist = list.substring(0, 30) + "...";
		}
	    $("#recently ul").prepend('<li><a href="index.php?l=' + list + '">' + choplist + '</a></li>');
	    if($("#recently ul li").size() > 5) {
		    $("#recently ul li:eq(5)").remove();
	    }
	});
}