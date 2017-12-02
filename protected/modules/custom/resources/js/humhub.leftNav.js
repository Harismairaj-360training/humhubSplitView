var initTemplateFunction, viewSpace;
var splitToggle = 'both';
humhub.module('leftNav', function(module, require, $)
{
  initTemplateFunction = function()
  {
    $('#post-changer').on('change', function()
    {
       var c = $(this).val();
       $('#pakFrame').contents().scrollTop(c);
       $('#inFrame').contents().scrollTop(c);
    });

    setTimeout(function()
    {
      $("#twoCountries").addClass("active");
    },1000);
  };

  viewSpace = function(trg,side)
  {
    if(splitToggle == side)
    {
      side = "both";
    }
    splitToggle = side;

    var addCss = "";
    var removeCss = "";
    switch (side)
    {
      case "right":
        addCss = "right-view";
        removeCss = "left-view both-view";
      break;
      case "left":
        addCss = "left-view";
        removeCss = "right-view both-view";
      break;
      case "both":
        addCss = "both-view";
        removeCss = "left-view right-view";
      break;
    }

    $(trg).parent().parent().addClass(addCss);
    $(trg).parent().parent().removeClass(removeCss);
  }

});
