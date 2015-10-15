$(document).ready(function() {
	
	$(".map__container select").change(function(){
		if ($(this).val()!=='0')
		{
			document.location.assign('/mr/' + $(this).val());
		}
	});
	
	$(".main-map__select select").change(function(){
		if ($(this).val()!=='0')
		{
			document.location.assign($(this).val());
		}
	});
	
	$(".js-poll-submit").click(function(){
		
		$.ajax(
		{
		    type: "POST",
		    url: "/ajax/",
		    data: "inter=" + $("input[name=inter]").val() + "&vote_id=" + $("input[name=vote_id]").val(),
		    success: function ( xhr ) {
		    	$(".question__answer").remove();
		    	$(".question__btn").remove();
		    	$(".question").append(xhr);
			}
		});

    	return false;
    
    });

    $(".show-form-to-comment").click(function(){
		if ($(".leave-comment").css('display')=='block') {
			$(".leave-comment").css('display', 'none');
		}
		else 
		{
			$(".leave-comment").css('display', 'block');			
		}
	});
    
    $('#exit-link, #exit-link-block').click(function() {
        $.ajax({
            type: "POST",
            url: "/ajax/",
            data: {
                exit : 1
            },
            success: function(data, textStatus) {
                switch (data) {
                    case 'true':
                        window.location.reload();
                        break;
                    case 'false':                                                   
                        break;
                }
            },
            error:  function() {
                alert("Відбулася помилка при спробі виходу");
            }
        });
        
        return false;
    });

	/* EBPZ tinymce */
	$('a.quote-show-form-to-comment').click(function() {
        $('.leave-comment').css({"display":"block"});
        //$("#text-of-comment").html("your text");
        tinyMCE.get('text-of-comment').setContent('<blockquote>'+$('.faq-answer').html()+'</blockquote><p>&nbsp;</p>');
    }) ;
        
	/* Карта областей */
	$('#mapukraine area').click(function(){
		window.open('http://' + $(this).attr('city') + '.minrd.gov.ua/');
	});
	
	/* Регистрация */
	$("input[name=hperson_id]").click(function(){
		if ($(this).val()=='1')
			$("#reginfo").css('display', 'block');
		else
			$("#reginfo").css('display', 'none');
	});
	
	$("#reg input[name=firm], #reg input[name=okpo], #reg input[name=post], #reg input[name=firstname], #reg input[name=lastname], #reg input[name=middlename], #reg input[name=email], #reg input[name=password], #reg input[name=cpassword], #reg input[name=occupations]").keyup(function(){
		
		if ($(this).val()!=='')
		{
			$(this).parent().parent().removeClass('error');
			$('.label__message', $(this).parent()).css('display', 'none');
		}
		else 
		{
			$(this).parent().parent().addClass('error');
			$('.label__message', $(this).parent()).css('display', 'block');
		}
	});
	
	/* Логін */
	$('#dologin').click(function() {
       	dologin(); 
    });
    
    $('.js-investor-submit').click(function() {
        $.ajax({
            type: "POST",
            url: "/ajax/",
            data: {
                email : $(".investor__all input[name=login]").val(),
                password: $(".investor__all input[name=password]").val()
            },
            success: function(data, textStatus) {
                switch (data) {
                    case 'true':
                        window.location.reload();
                        break;
                    case 'false':     
                        $(".investor__error").html('Невірна адреса, або пароль.');
                        $(".investor__error").fadeIn();
                        break;
                }
            },
            error:  function() {
                alert("Відбулася помилка при спробі авторизації");
            }
        });
    });
    
    // Оформление выпадения окна авторизации
	(function() {
		var auth = $('#auth');
		var button = $('a.link-top');
		var authHeight = -auth.height();
		var aClose = auth.find('a.close');
		var interval = null;
		$(button).click(function(event) {
			clearInterval(interval);
			if(!document.getElementById('auth')) return;
			button.animate({'opacity': 0}, 350, function(event) {
				auth.animate({'top': 0 + 'px'}, 500, function(event) {
					aClose.animate({'opacity': 1}, 300);                                       
                                })
			});
			return false;
		});
		auth.mouseenter(function(event) {
			clearInterval(interval);
		});
		auth.mouseleave(function(event) {
			interval = setInterval(function() {
				aClose.css({'opacity': 0});
				auth.animate({'top': authHeight + 'px'}, 500, function() {
					button.animate({'opacity': 1}, 350);
				});
			}, 1500);
		});
		aClose.click(function() {
			aClose.css({'opacity': 0});
			auth.animate({'top': authHeight + 'px'}, 500, function() {
				button.animate({'opacity': 1}, 350);
			});
		});
	})();
	
	/* Карта /mr/ */
	$("#mapukraine_mr area").click(function(){
		document.location.assign('/mr/' + $(this).attr('city'));
		return false;
	});
	
	/* Анонс, автоматичне перелистування */
	
	if ($('.js-sl.js-announcements-move').length > 0) {
	  var navi = $('.announcements_slider').find('.js-sl-navi');
	  navi.html('');
	  $('.js-sl.js-announcements-move').each(function() {
	    $(this).cycle({ 
	      timeout: 5000, 
	      activePagerClass: 'active',
      	  pager:  navi,
      	  slideResize: false,
      	  containerResize: false,
	      pagerAnchorBuilder: function(index, el) {
	        index++;
	        return '<button>' + index + '</button>';
	      }
	    });
	  });
	};
	
});

function dologin()
{
	$.ajax({
        type: "POST",
        url: "/ajax/",
        data: {
            email : $("#login").val(),
            password: $("#password").val()
        },
        success: function(data, textStatus) {
            switch (data) {
                case 'true':
                    $("#loginerror").css('display', 'none');
                    window.location.reload();
                    break;
                case 'false':     
//                        $("#loginerror").css('margin-left','110px');
                    $("#loginerror").html('Невірна адреса, або пароль.');
                    $("#loginerror").css('display', 'block');
                    break;
            }
        },
        error:  function() {
            alert("Відбулася помилка при спробі авторизації");
        }
    });
}

// EBPZ PART

function loadSubCategories()
{
	var value = $("#search-question select[name=category]").val();
    var subcombo = $('#search-question select[name=subcategory]');
    subcombo.load('/ajax/?loadsubcategories&category='+value);    
}

function doSearch(page)
{   
    var form = $('#search-question');
    
    var text = encodeURIComponent(form.find('input[name=text]').val());
    var where = form.find('select[name=where]').val();
    where = !isNaN(where)?where:0;
    var status = form.find('select[name=status]').val();
    var category = form.find('select[name=category]').val();
    var subcategory = form.find('select[name=subcategory]').val();
    
    var results = $('#search-result');
    
    if(page==0){
        results.html('<center>Завантаження...</center><br/>');
        page = 1;
    }
    
//    
//    var categories_list_title = $('#categories_list_title');
//    var categories_list = $('#categories_list');
//    categories_list_title.hide();
//    categories_list.hide();
//    
//    var breadcrums_last = $('.breadcrumbs li.last a');
//    breadcrums_last.html('Пошук');
//    

    results.load('/ajax/?searchebpz&category='+category+'&subcategory='+subcategory+'&text='+text+'&where='+where+'&status='+status+'&page='+page,function(){
        
    results.css('display','block');
        
        // Строки в таблице div.table-scroll
    
	$('#search-result table a').each(function(index, elem) 
	{            		
        $(elem).click(function(event) 
        {
            loadQuestion($(elem).parent().parent().attr("item"));
		});
	});
	
        
    });
}

function loadQuestion(value){
    
    var item = $('.chosen-quest');
    
    item.load('/ajax/?ebpzitem&item='+value,function()
    {
        $('.button-last').click(function() {
	   $(this).next().css({"display":"block"})
           $(this).css({"display":"none"});
        });
    });
}

function reload_tabs()
{
	//tabs
	if ($('.js-tab').length > 0) {
	  $('.js-tab li').click(function() {
	    if (!$(this).hasClass('active')) {
	      var tab = $(this).attr('data-item');
	      $(this).parent().children().removeClass('active');
	      $(this).parent().parent().parent().find('.js-tab-item').hide();
	      $(this).addClass('active');
	      $('#' + tab).show();
	    };
	  })
	};
}


function setCookie(c_name,value,exdays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name)
{
    var i,x,y,ARRcookies=document.cookie.split(";");
    for (i=0;i<ARRcookies.length;i++)
    {
    x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
    y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
    x=x.replace(/^\s+|\s+$/g,"");
    if (x==c_name)
        {
        return unescape(y);
        }
    }
}

function setSession(){

    var user_name = getCookie('user_name');
    var session = getCookie('___si');

//    if (session!=null && session!="")
//    {
        if (user_name!=null && user_name!="")
        {
            $('.header__links').css('display','none');
            $('.header__authorized').css('display','block');

            user_name = decodeURIComponent(user_name);
            user_name = user_name.replace(new RegExp("[+]",'g')," ");
            document.getElementById('user_name').innerHTML = decodeURIComponent(user_name);
            
            
            var timout = 900000;
            var t = timout;
            var lc = getCookie('lc');
            var d = new Date();
            var cur_time = d.getTime();
            if (lc!=null && lc!=""){                    
                t = timout - (cur_time - (lc*1000));
                if(t<0)
                    t = timout;
            }else{
                setCookie('lc',Math.round(cur_time/1000),1);
            }
           
            setTimeout('checkSession();inter = setInterval(checkSession,'+timout+');',t);
        }
//    }

}

function checkSession(){
    $.ajax({
	    type: "POST",
	    url: "/ajax/",
	    data: {
	        checksession : 1
	    },
	    success: function(data, textStatus) {
	        switch (data) {
	            case 'true':                                
	                break;
	            case 'false':
	             
	                $('#user-profiles').css('display','none');
	                clearInterval(inter);
	                
	                var button = $('a.link-top');
	                var auth = $('#auth');                                
	                var aClose = auth.find('a.close');
	                
	                auth.unbind('mouseleave');
	                
	                aClose.click(function() {
	                    window.location.reload();
	                });
	                
	                aClose.css({'opacity': 0});                       
	                
	                $('#overlay').show() ;   
	                var overHeight =  $('#main').height() ; 
	                $('#overlay').css({'height': overHeight + 'px'}); 
	                            
	                button.animate({'opacity': 0}, 350, function(event) {        
	                    auth.animate({'top': 0 + 'px'}, 500, function(event) {
	                            aClose.animate({'opacity': 1}, 300);         
	                    })
	                });                               
	                
	                $("#loginerror").css('margin-left','25px');
	                $("#loginerror").html('Час вашої сесії вийшов! Будь ласка, авторизуйтесь.');
	                $("#loginerror").show();                                
	                break;
	                
	        }
	    }
	});
}
