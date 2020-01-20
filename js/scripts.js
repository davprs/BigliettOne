let cartPage = "Carrello";
let homePage = "Home";
let boughtEvents = "My Account";
let createdEvents = "My Events";


$(document).ready(function(){
    let messages = new MessageQueue();
    let title = $("title").text();

    if($(window).width() > 450){
        $(".header .menu").attr("onclick", "openNavBig()");
        $(".overlay").attr("onclick", "closeNavBig()");
    }
    let notificationReading = setInterval(function(){
        console.log("checkNotifications");
        let cookies = getCookies();
        if(cookies.notifications){
            let notifications = cookies.notifications.split(';');
            for(x = 0; x < notifications.length; x++){
                console.log(notifications[x]);
                messages.addMessage(notifications[x]);
            }

            setCookie("notifications", "", 0);
        }
        //console.log($.cookie("unreadNotification"));
    }, 1000 * 10);

    $("#navbar a").click(function(){
        if( !$(this).hasClass("active")){
            $("#navbar a").removeClass("active");
            $(this).addClass("active");
            let xhttp;

            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200 && this.responseText) {
                    $("main *").remove();
                    $("main").html(this.responseText);
                }
            };
            console.log($(this).attr('href'));
            xhttp.open("GET", "getEventsByCategory.php?category=" + $(this).attr('href'), true);
            xhttp.send();
        } else {
            console.log("nulla");
        }
    });

    let notificationCheckingAjax = setInterval(function(){
        let xhttp;

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200 && this.responseText) {
                let cookies = getCookies();
                if(cookies.notifications){
                    let notifications = cookies.notifications.split(';');
                    let notificationsValues = '';
                    for(x = 0; x < notifications.length; x++){
                        notificationsValues += notifications[x] + ";";
                    }
                    console.log(notificationsValues);
                    setCookie("notifications", notificationsValues + this.responseText, 30);
                } else {
                    setCookie("notifications", this.responseText, 30);
                }
            }
        };
        xhttp.open("GET", "notifications.php", true);
        xhttp.send();
    }, 1000 * 5);

    if( title != homePage){

        $.each($(".btnminus"), function(element, value){
            initialManageMinusButton(value);
            console.log(value);
        });

        if(title == boughtEvents){
            console.log("miei");
            $("#navbar a:nth-child(1)").addClass("active");
        } else if(title == createdEvents) {
            $("#navbar a:nth-child(2)").addClass("active");
        }

        if( $(".alert").text() != ''){
            messages.addMessage($(".alert").text());
        }

        if($("title").text() == cartPage){
            evaluateTotal();
        }
        /*for submenu*/
        //let $el = $("#titleNav, .minimalNavbar");
        let $el = $("#article.minimalNavbar");
        let bottom = $el.position().top + $el.outerHeight(true);
        $("main").css("padding-top", bottom + "px");


    }

    $("form ul li input").keyup(function(event) {
        if (event.keyCode === 13) {
            $(".submitButton").click();
        }
    });

    $('.submitButton').click(function(){
         $("form").submit();
         console.log("ciao");
    });

    $('.createEvent').submit(function(eventObj) {
        $(this).append('<input type="hidden" name="thing" value="someValue">');
        $(this).append('<input type="hidden" name="category" value="' + $(".categoryChoise span.categoryChoisePressed").text() + '">');
        return true;
    });

    console.log($("title").text() == boughtEvents);
    $("#titleNav .header .menu").click(function(){
        $('html, body').css({
            overflow: 'hidden',
            height: '100%'
        });
    });

    $(".overlay .closebtn").click(function(){
        $('html, body').css({
            overflow: 'auto',
            height: 'auto'
        });
    });

  $(".info").click(function(){
      let fontScaling = 1.7;
      $(this).addClass("btnPressed");
    $(".infopanel", $(".btnPressed").parent()).slideToggle("fast");
    if($(".info", $(".btnPressed").parent()).text() == "Info"){
        $(".info", $(".btnPressed").parent()).html("<a href=\"article.php\">Acquista</a>");
        let biggerFont = $(".bottomleft, .info", $(".btnPressed").parent()).css("font-size").split('p')[0] * fontScaling;
        $(".bottomleft, .info", $(".btnPressed").parent()).css("font-size", biggerFont + "px").css("transition", "font-size 0.3s");
    }else {
        let smallerFont = $(".bottomleft, .info", $(".btnPressed").parent()).css("font-size").split('p')[0] / fontScaling;
        $(".info", $(".btnPressed").parent()).html("<a href=\"javascript:void(0)\">Info</a>");
        $(".bottomleft, .info", $(".btnPressed").parent()).css("font-size", smallerFont + "px").css("transition", "font-size 0.3s");
    }
    $(this).removeClass("btnPressed");
  });

      $(window).scroll(function(){
         if ($(this).scrollTop() > 100) {
             $('.scrollToTop').fadeIn();
         } else {
             $('.scrollToTop').fadeOut();
         }
     });

     $(".categoryChoise span").click(function(){
         if($(this).hasClass("categoryChoisePressed")){
             $(this).removeClass("categoryChoisePressed");
         } else {
             $(this).addClass("categoryChoisePressed");
         }
     });

     //Click event to scroll to top
     $('.scrollToTop').click(function(){
         $('html, body').animate({scrollTop : 0},800);
         return false;
     });

  $(".cartArticle .closebtn").click(function(){
      $(this).addClass("btnPressed");
      removeFromCart($(".btnPressed"));
      $(this).removeClass("btnPressed");
      evaluateTotal();
  });

  $(".btnminus").on('click',function(){
      $(this).addClass("btnPressed");
      if( ! isDisabled($(".btnPressed")) ){
          $(".quantity", $(".btnPressed").parent()).text(parseInt($(".quantity", $(".btnPressed").parent()).text()) - 1);
          manageMinusButton($(".btnPressed"));
          $(".price", $(".btnPressed").parent()).text((parseInt($(".price", $(".btnPressed").parent()).text())/(parseInt($(".quantity", $(".btnPressed").parent()).text()) + 1)) * parseInt($(".quantity", $(".btnPressed").parent()).text()) + "$");
      }
      $(this).removeClass("btnPressed");
      evaluateTotal();
  });

  $(".btnplus").on('click',function(){
      $(this).addClass("btnPressed");
      $(".quantity", $(".btnPressed").parent()).text(parseInt($(".quantity", $(".btnPressed").parent()).text()) + 1);
      $(".price", $(".btnPressed").parent()).text((parseInt($(".price", $(".btnPressed").parent()).text())/(parseInt($(".quantity", $(".btnPressed").parent()).text()) - 1)) * parseInt($(".quantity", $(".btnPressed").parent()).text()) + "$");
      manageMinusButton($(".btnPressed"));
      $(this).removeClass("btnPressed");
      evaluateTotal();
  });

    $(".map").on('click', function() {
        let address = $(this).html();
        address = $(".address")
          .text() // strip tags
          .replace(/\s\s+/g, " "); // remove spaces
        address = encodeURIComponent(address);
        if ((navigator.platform.indexOf('iPhone') != -1) || (navigator.platform.indexOf('iPad') != -1) || (navigator.platform.indexOf('iPod') != -1)){/* if we're on iOS, open in Apple Maps */
            window.open('http://maps.apple.com/?q=' + address);
        } else { /* else use Google */
            window.open('https://maps.google.com/maps?q=' + address);
        }
    });


  /*$(window).scroll(function(){
      console.log("Scroll");
      let navbar = $("#navbar");
      let sticky = navbar.offset().top;

      if ($(window).offset().top >= sticky) {
          navbar.addClass("sticky");
      } else {
          navbar.removeClass("sticky");
      }
  });*/

});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

let getCookies = function(){
    let pairs = document.cookie.split(";");
    let cookies = {};
    for (var i=0; i<pairs.length; i++){
        let pair = pairs[i].split("=");
        cookies[(pair[0]+'').trim()] = unescape(pair.slice(1).join('='));
      }
    return cookies;
}

evaluateTotal = function(){
    if($("title").text() != cartPage){
        console.log("no title");
        return ;
    }
    console.log("si");
    let sum = 0;
    $(".cartArticle .priceDialog .price").each(function(){
        sum += parseInt($(this).text());
    });

    console.log(sum);

    if(sum == 0){
        if($(".cartArticle .priceDialog .price").length == 0){
            $(".totalPrice, .acquista").remove();
            $("body main").append("<img src=\"img/not found icon.png\" class=\"notFound\"/>")
            $(".notFound").css({"width": "50%", "display": "block", "margin-left": "auto", "margin-right": "auto"});
        }
    }

    $(".totalPrice .total").text(sum + "$");
}

removeFromCart = function(element){
    $(element).parent().remove();
}

isDisabled = function(element){
    if($(".btnminus", element.parent()).hasClass("isDisabled")){
        return true;
    }
    return false;
};

manageMinusButton = function(element){
    if(!isDisabled(element)){
        if(parseInt($(".quantity", element.parent()).text()) < 2){
            $(".btnminus", element.parent()).addClass("isDisabled");
        }
    } else {
        if(parseInt($(".quantity", element.parent()).text()) > 1){
            $(".btnminus", element.parent()).removeClass("isDisabled");
        }
    }
}


initialIsDisabled = function(element){
    if($(element).hasClass("isDisabled")){
        return true;
    }
    return false;
};

initialManageMinusButton = function(element){
    if(!initialIsDisabled(element)){
        if(parseInt($(".quantity", element.parentElement).text()) < 2){
            $(".btnminus", element.parentElement).addClass("isDisabled");
        }
    } else {
        if(parseInt($(".quantity", element.parentElement).text()) > 1){
            $(".btnminus", element.parentElement).removeClass("isDisabled");
        }
    }
}


let MessageQueue = function(){
    let textQueue = [];
    let freeChairs = 0;

    let putMessageInQueue = function(text){
        textQueue.push(text);
        freeChairs++;
    }

    this.addMessage = function(text){
        putMessageInQueue(text);

        console.log(textQueue + "AAAAAAA");
        if($(".alert").is(":visible")){
            poll();
            function poll(){
                let pid = setInterval(function(){
                    console.log("I'm in");
                        if($(".alert").not(":visible") && freeChairs > 0){
                            freeChairs--;
                            console.log("non visibile");
                            showMessage(textQueue[0]);
                            console.log(textQueue.length);
                            if(textQueue.length == 0){
                                console.log("chiudo");
                                clearInterval(pid);
                            }
                            return ;
                        } else if(freeChairs <= 0){
                            console.log("no freeChairs");
                            clearInterval(pid);
                        }
                    }, 4000);
            }
        }else if($(".alert").not(":visible")){
            freeChairs--;
            showMessage(textQueue[0]);
        } else {console.log("else");}
    }

    let showMessage = function(text){
        console.log(textQueue);
        if($(".alert").not(":visible")){
            $(".alert").html("<span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span>" + text);


            $(".alert").fadeIn();
            setTimeout(function(){$(".alert").html('');$(".alert").hide("slow"); textQueue.shift();},5000);
        }
    }
}
