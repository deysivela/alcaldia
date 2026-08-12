var $ = require("jquery");
$(function(){
    $("#button1").click(function(){
            title: "Yay!",
            text: "It works!"
        });
    });
    $("#button12").click(function(){
        require("pnotify.reference");
        new PNotify({
            text: "It works!",
            reference: {
            }
        });
    });
});