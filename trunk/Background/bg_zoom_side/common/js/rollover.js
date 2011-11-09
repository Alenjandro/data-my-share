(function($) {
    $.fn.opOver = function(op,oa,durationp,durationa){
    var c = {
    op:op? op:1.0,
    oa:oa? oa:0.5,
    durationp:durationp? durationp:'fast',
    durationa:durationa? durationa:'fast'
};
    $(this).each(function(){
    $(this).css({
        opacity: c.op,
        filter: "alpha(opacity="+c.op*100+")"
    }).hover(function(){
        $(this).fadeTo(c.durationp,c.oa);
    },function(){
        $(this).fadeTo(c.durationa,c.op);
    })
});
},
    $.fn.wink = function(durationp,op,oa){
    var c = {
      durationp:durationp? durationp:'slow',
      op:op? op:1.0,
      oa:oa? oa:0.2
    };
    $(this).each(function(){
    $(this) .css({
        opacity: c.op,
        filter: "alpha(opacity="+c.op*100+")"
    }).hover(function(){
    $(this).css({
        opacity: c.oa,
        filter: "alpha(opacity="+c.oa*100+")"
    });
        $(this).fadeTo(c.durationp,c.op);
     },function(){
      $(this).css({
          opacity: c.op,
        filter: "alpha(opacity="+c.op*100+")"
});
})
});
}
})(jQuery); 