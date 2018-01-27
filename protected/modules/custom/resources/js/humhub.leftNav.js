var initTemplateFunction, viewSpace, submitHTMLData;
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

  //  Begin - HTML Submit
  var specialUserBtn;
  function post_in_space(html,msg)
  {
    var bodyData = {
      "containerClass":"humhub\\modules\\space\\models\\Space",
  		"message":msg,
      "html_message":html,
  		"containerGuid":spaceGUID,
  		"visibility":1
    }

    $.ajax({
      type: 'POST',
      dataType:'json',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      },
      url: BASE_URL+"api/html/posting?access_token=1lrzKzQIsjVqXyirBM3YeVMJ",
      data: JSON.stringify(bodyData),
      success: function(data)
      {
        $("#filter").show();
        $(".contentForm_options").hide();
        $(".emptyStreamMessage").hide();
        $("#wallStream .s2_streamContent").prepend(data.output);
        reset_fetch_btn();
      },
      fail: function()
      {
        console.log('Error: in posting');
        reset_fetch_btn();
      }
    });
  }

  function reset_fetch_btn()
  {
    $("#special-user-btn")
      .removeAttr("disabled")
      .html(specialUserBtn)
      .removeClass("disabled");
  }

  submitHTMLData = function(e)
  {
    e = e || false;
    if(e != false)
    {
      e.preventDefault();
    }
    specialUserBtn = $("#special-user-btn").html();
    $("#special-user-btn").attr("disabled","disabled").addClass("disabled").html('<span class="loader"><span class="sk-spinner sk-spinner-three-bounce"><span class="sk-bounce1 disabled" style="background-color: rgb(255, 255, 255); width: 10px; height: 10px;"></span><span class="sk-bounce2 disabled" style="background-color: rgb(255, 255, 255); width: 10px; height: 10px;"></span><span class="sk-bounce3 disabled" style="background-color: rgb(255, 255, 255); width: 10px; height: 10px;"></span></span></span>');

    var postDesc = $("#contentForm_message").html();
    var postHTML = prompt("Please Enter HTML", "");
    if(postHTML == null || postHTML == "")
    {
      reset_fetch_btn();
    }
    else
    {
      post_in_space(postHTML,postDesc);
    }
  }
  //  End - HTML Submit
});
