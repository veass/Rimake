$(document).ready(function(){
  //Отправка формы
  $('.button-submit').click(function(event) {
    event.preventDefault();
    let x = event.target;
  if($('input:checkbox').is(":checked")){  
	  let inputphone = $(this).parent().parent().parent().find("[name='phone']")
    let inputname = $(this).parent().parent().parent().find("[name='name']");
    let name = $(this).parent().parent().parent().find("[name='name']").val();
    let phone = $(this).parent().parent().parent().find("[name='phone']").val();
    let textarea = $('textarea').val();
    let s1 = $('.summer').val();
    let s2 = $('.summer1').val();
    let s3 = $('.summer2').val();
    let s4 = $('.summer3').val();
    let s = $('.result-pay').text();
    let elem_choise = $('.elem-calc.gradient').find('h3').text();
    $.ajax({
      method: "POST",
      url: myajax.url,
      context: x,
      data: {
        action: 'my_ajax',
        name: name,
        phone: phone,
        s1: s1,
        s2: s2,
        s3: s3,
        s4: s4,
        s: s,
        textarea: textarea,
        elem_choise: elem_choise
      },                              
      success: function(response) {  
        if($(event.target).parent().is('#ajax1')){
          let addwrong = $('.addwrong1');
          if( response == 'пусто' && $('div').is('.am1') == false ){ // Если поля пустые и не содержит отладки ошибки
                if($(window).width() <= 1272){
                  addwrong.after('<div class="am1 secondam1"><p class="addmistake2 n"></p><div class="test1"></div></div>');
                  addwrong.before('<div class="am1 secondam1"><p class="addmistake2 p"></p><div class="test1"></div></div>');
                  $('.addmistake2').html('Введите имя');
                  $('.n').html('Введите номер телефона');
                  inputphone.css("border-color","#b94a48");
                  inputname.css("border-color","#b94a48");
                }else {
                  addwrong.after('<div class="am1 firstam1"><p class="addmistake2 p"></p><div class="test1"></div></div>');
                  $('.am1').after('<div class="am1 secondam1"><p class="addmistake2 n"></p><div class="test1"></div></div>');
                  $('.addmistake2').html('Введите имя');
                  $('.n').html('Введите номер телефона');
                  inputphone.css("border-color","#b94a48");
                  inputname.css("border-color","#b94a48");
                }
          }
          if( response == "Введите имя" && $('div').is('.am1') == false ){ // Если поля имя пустое и не содержит отладки ошибки,но если содержит но если содержит, то скрывать её  
            if($(window).width() <= 768){
              addwrong.before('<div class="am1 firtstam2"><p class="addmistake2"></p><div class="test1"></div></div>');
              $('.addmistake2').html(response);
              inputname.css("border-color","#b94a48");
            }else {
              addwrong.after('<div class="am1 firtstam2"><p class="addmistake2"></p><div class="test1"></div></div>');
              $('.firstam2').addClass('showfirstam2');
              $('.addmistake2').html(response);
              inputname.css("border-color","#b94a48");
            }
          } 
          if( response == "Введите номер телефона" && $('div').is('.am1') == false ){ // Если поля телефона пустое и не содержит отладки ошибки,но если содержит не дублировать её  
            if($(window).width() <= 768){
              addwrong.after('<div class="am1 firstam2"><p class="addmistake2 n"></p><div class="test1"></div></div>');
              $('.n').html(response);
              inputphone.css("border-color","#b94a48");
            }else{
              addwrong.after('<div class="am1 firstam2"><p class="addmistake2"></p><div class="test1"></div></div>');
              $('.am1').after('<div class="am1 secondam1"><p class="addmistake2 n"></p><div class="test1"></div></div>');
              $('.addmistake2').html(response);
              $('.n').html(response); 
              $('.firstam2').css({'display':'inline-block', 'z-index': '-9999'});
              inputphone.css("border-color","#b94a48");
            }
      }
          if( response == "успех"){
                $('.am1').remove();
                inputphone.css("border-color","#cccccc");
                inputname.css("border-color","#cccccc");
			  	$('.request-success').animate({
					marginTop: '0px'
				},800)
				setTimeout(function(){
					$('.request-success').animate({
					marginTop: '-60px'
				},500)
				},1500)
			   }     
        }
        else if($(event.target).parent().parent().parent().is('#ajax2')){
          let addwrong = $('.addwrong2');
            if( response == 'пусто' && $('div').is('.am2') == false ){ // Если поля пустые и не содержит отладки ошибки
                  if($(window).width() <= 768){
                    addwrong.after('<div class="am2 secondam2"><p class="addmistake2 n"></p><div class="test1"></div></div>');
                    addwrong.before('<div class="am2 secondam2"><p class="addmistake2 p"></p><div class="test1"></div></div>');
                    $('.addmistake2').html('Введите имя');
                    $('.n').html('Введите номер телефона');
                    inputphone.css("border-color","#b94a48");
                    inputname.css("border-color","#b94a48");
                  }else {
                    addwrong.after('<div class="am2 firstam2"><p class="addmistake2 p"></p><div class="test1"></div></div>');
                    $('.am2').after('<div class="am2 secondam2"><p class="addmistake2 n"></p><div class="test1"></div></div>');
                    $('.addmistake2').html('Введите имя');
                    $('.n').html('Введите номер телефона');
                    inputphone.css("border-color","#b94a48");
                    inputname.css("border-color","#b94a48");
                  }
              }
            if( response == "Введите имя" && $('div').is('.am2') == false ){ // Если поля имя пустое и не содержит отладки ошибки,но если содержит но если содержит, то скрывать её  
              if($(window).width() <= 768){
                addwrong.before('<div class="am2 firtstam2"><p class="addmistake2"></p><div class="test1"></div></div>');
                $('.addmistake2').html(response);
                inputname.css("border-color","#b94a48");
              }else {
                addwrong.after('<div class="am2 firtstam2"><p class="addmistake2"></p><div class="test1"></div></div>');
                $('.firstam2').addClass('showfirstam2');
                $('.addmistake2').html(response);
                inputname.css("border-color","#b94a48");
              }
            }
            if( response == "Введите номер телефона" && $('div').is('.am2') == false ){ // Если поля телефона пустое и не содержит отладки ошибки,но если содержит не дублировать её  
              if($(window).width() <= 768){
                addwrong.after('<div class="am2 firstam2"><p class="addmistake2 n"></p><div class="test1"></div></div>');
                $('.n').html(response);
                inputphone.css("border-color","#b94a48");
              }else{
                addwrong.after('<div class="am2 firstam2"><p class="addmistake2"></p><div class="test1"></div></div>');
                $('.am2').after('<div class="am2 secondam2"><p class="addmistake2 n"></p><div class="test1"></div></div>');
                $('.addmistake2').html(response);
                $('.n').html(response); 
                $('.firstam2').css({'display':'inline-block', 'z-index': '-9999'});
                inputphone.css("border-color","#b94a48");
              }
        }
            if( response == "успех"){
                  $('.am2').remove();
                  inputphone.css("border-color","#cccccc");
                  inputname.css("border-color","#cccccc");
			  	$('.request-success').animate({
					marginTop: '0px'
				},800)
				setTimeout(function(){
					$('.request-success').animate({
					marginTop: '-60px'
				},500)
				},1500)
                  }       
        }
        else if($(event.target).parent().is('#ajax3')){
          let addwrong = $('.addwrong3');
          if( response == 'пусто' && $('div').is('.am3') == false ){
              addwrong.after('<div class="am3 secondam1 am2s"><p class="addmistake2 n"></p><div class="test1"></div></div>');
              addwrong.before('<div class="am3 secondam1 am2s"><p class="addmistake2 p"></p><div class="test1"></div></div>');
              $('.addmistake2').html('Введите имя');
              $('.n').html('Введите номер телефона');
              inputphone.css("border-color","#b94a48");
              inputname.css("border-color","#b94a48");
            }
          if( response == "Введите имя" && $('div').is('.am3') == false ){ // Если поля имя пустое и не содержит отладки ошибки,но если содержит но если содержит, то скрывать её  
			  
              addwrong.before('<div class="am3 firtstam2 am2s"><p class="addmistake2"></p><div class="test1"></div></div>');
              $('.addmistake2').html(response);
              inputname.css("border-color","#b94a48");
          }
          if( response == "Введите номер телефона" && $('div').is('.am3') == false ){ // Если поля телефона пустое и не содержит отладки ошибки,но если содержит не дублировать её  
              addwrong.after('<div class="am3 firstam2 am2s"><p class="addmistake2 n"></p><div class="test1"></div></div>');
              $('.n').html(response);
              inputphone.css("border-color","#b94a48");
      }
          if( response == "успех"){
                $('.am3').remove();
                inputphone.css("border-color","#cccccc");
                inputname.css("border-color","#cccccc");
			  	$('.request-success').animate({
					marginTop: '0px'
				},800)
				setTimeout(function(){
					$('.request-success').animate({
					marginTop: '-60px'
				},500)
				},1500)
			   }   
        }
        else if($(event.target).parent().is('.promo-forms')){//promo
          if( response == 'пусто' ){
            inputemail.css("border-color","#b94a48");
            }
          if( response == "успех"){
            inputemail.css("border-color","#cccccc");
			  	$('.request-success-promo').animate({
					marginTop: '0px'
				},800)
				setTimeout(function(){
					$('.request-success-promo').animate({
					marginTop: '-60px'
				},500)
				},1500)

      }
    }}
    });
  } 
  else {
	 let y = $(event.target).parent().find('.checkbox label span');
     y.addClass('blink');
    }

})

     //Email
     $('.form-promo button').click(function(){
      event.preventDefault();
    if($(this).parent().find("input:checkbox").is(":checked")){
      let email = $("input[name='emailpromo']").val();
        PostEmail(email);
        let but = $(this);
        but.prop('disabled', true)
        let disoff = setTimeout(function(){
          but.prop('disabled', false)
        },2000);
        disoff();
    }
    })
    	
let constructions = [];
    along = $('.along');
    ee = $('.ee');
    ea = $('.ea');
    ef1 = $('.ef1');
    ef2 = $('.ef2');
    ef3 = $('.ef3');
    ef4 = $('.ef4');
    
  constructions.push(along, ef1 , ef2 , ef3 , ef4 , ee , ea);
    for(let i=0; i < constructions.length; i++){
        constructions[i].click(function(){
            $(this).click(function(){
                $('.popup-slider').css({
                  display: 'block'
                })
              })
              if(constructions[i] === constructions[0]){
                slider1();
              } else if(constructions[i] === constructions[1]){
                slider2();
              } else if(constructions[i] === constructions[2]){
                slider3();
              } else if(constructions[i] === constructions[3]){
                slider4();
              } else if(constructions[i] === constructions[4]){
                slider5();
              } else if(constructions[i] === constructions[5]){
                slider6();
              } else if(constructions[i] === constructions[6]){
                slider7();
              } 
          })
        }
										  
        $("input[name='promocode']").parent().parent().on('submit', function(event) {
         	 event.preventDefault();
       });
 

        $("input[name='promocode']").on('input', function(event) {
			let count = $(this).val().length;
			let promocode = $(this).val();
          	let email = $("input[name='emailpromo']").val();
			//if (count == 9){
			  postPromocode(promocode,email);
			//};
        });
  })

function slider1(){
  $.ajax({
    method: "POST",
    url: myajax.url,
    data: {
      action: 'ajax_slider1',
    },
    success: function(response){
      $('.popup-slider').html(response);
      $('#metaslider_166').flexslider({
        namespace: 'flex-',
        animation: 'slide',
        animationLoop: true,
        directionNav: true,
        controlNav: false,
        slideshow: false,
      });
		$('#metaslider_166').append($('<img src="https://img.icons8.com/ultraviolet/80/000000/cancel.png" class="boxclose">'));
      $('.shadow-popup, .boxclose').click(function(){
        $('.popup, .popup-slider').css({
          display: 'none'
        });
        $('#metaslider-id-166').remove();
      })
    }                              
  }); 
} 
function slider2(){
  $.ajax({
    method: "POST",
    url: myajax.url,
    data: {
      action: 'ajax_slider2',
    },
    success: function(response){
      $('.popup-slider').html(response);
      $('#metaslider_175').flexslider({
        namespace: 'flex-',
        animation: 'slide',
        animationLoop: true,
        directionNav: true,
        controlNav: false,
        slideshow: false,
      });
		$('#metaslider_175').append($('<img src="https://img.icons8.com/ultraviolet/80/000000/cancel.png" class="boxclose">'));
      $('.shadow-popup, .boxclose').click(function(){
        $('.popup, .popup-slider').css({
          display: 'none'
        });
        $('#metaslider-id-175').remove();
      })
    }                              
  }); 
} 
function slider3(){
  $.ajax({
    method: "POST",
    url: myajax.url,
    data: {
      action: 'ajax_slider3',
    },
    success: function(response){
      $('.popup-slider').html(response);
      $('#metaslider_186').flexslider({
        namespace: 'flex-',
        animation: 'slide',
        animationLoop: true,
        directionNav: true,
        controlNav: false,
        slideshow: false,
      });
		$('#metaslider_186').append($('<img src="https://img.icons8.com/ultraviolet/80/000000/cancel.png" class="boxclose">'));
      $('.shadow-popup, .boxclose').click(function(){
        $('.popup, .popup-slider').css({
          display: 'none'
        });
        $('#metaslider-id-186').remove();
      })
    }                              
  }); 
} 
function slider4(){
  $.ajax({
    method: "POST",
    url: myajax.url,
    data: {
      action: 'ajax_slider4',
    },
    success: function(response){
      $('.popup-slider').html(response);
      $('#metaslider_192').flexslider({
        namespace: 'flex-',
        animation: 'slide',
        animationLoop: true,
        directionNav: true,
        controlNav: false,
        slideshow: false,
      });
		$('#metaslider_192').append($('<img src="https://img.icons8.com/ultraviolet/80/000000/cancel.png" class="boxclose">'));
      $('.shadow-popup, .boxclose').click(function(){
        $('.popup, .popup-slider').css({
          display: 'none'
        });
        $('#metaslider-id-192').remove();
      })
    }                              
  }); 
} 
function slider5(){
  $.ajax({
    method: "POST",
    url: myajax.url,
    data: {
      action: 'ajax_slider5',
    },
    success: function(response){
      $('.popup-slider').html(response);
      $('#metaslider_198').flexslider({
        namespace: 'flex-',
        animation: 'slide',
        animationLoop: true,
        directionNav: true,
        controlNav: false,
        slideshow: false,
      });
		$('#metaslider_198').append($('<img src="https://img.icons8.com/ultraviolet/80/000000/cancel.png" class="boxclose">'));
      $('.shadow-popup, .boxclose').click(function(){
        $('.popup, .popup-slider').css({
          display: 'none'
        });
        $('#metaslider-id-198').remove();
      })
    }                              
  }); 
} 
function slider6(){
  $.ajax({
    method: "POST",
    url: myajax.url,
    data: {
      action: 'ajax_slider6',
    },
    success: function(response){
      $('.popup-slider').html(response);
      $('#metaslider_204').flexslider({
        namespace: 'flex-',
        animation: 'slide',
        animationLoop: true,
        directionNav: true,
        controlNav: false,
        slideshow: false,
      });
		$('#metaslider_204').append($('<img src="https://img.icons8.com/ultraviolet/80/000000/cancel.png" class="boxclose">'));
      $('.shadow-popup, .boxclose').click(function(){
        $('.popup, .popup-slider').css({
          display: 'none'
        });
        $('#metaslider-id-204').remove();
      })
    }                              
  }); 
} 
function slider7(){
  $.ajax({
    method: "POST",
    url: myajax.url,
    data: {
      action: 'ajax_slider7',
    },
    success: function(response){
      $('.popup-slider').html(response);
      $('#metaslider_210').flexslider({
        namespace: 'flex-',
        animation: 'slide',
        animationLoop: true,
        directionNav: true,
        controlNav: false,
        slideshow: false,
      });
		$('#metaslider_210').append($('<img src="https://img.icons8.com/ultraviolet/80/000000/cancel.png" class="boxclose">'));
      $('.shadow-popup, .boxclose').click(function(){
        $('.popup, .popup-slider').css({
          display: 'none'
        });
        $('#metaslider-id-210').remove();
      })
    }                              
  }); 
} 

function PostEmail(email){
  let emailinput = $("input[name='emailpromo']");
	 $.ajax({
	    method: "POST",
    	url: myajax.url,
    	data: {
      	action: 'ajax_email',
		    email: email
    	},
		success: function(response){
      
		 if(response == 'пусто'){
			emailinput.css("border-color","#b94a48");
		}
		 if(response == 'badmail'){
       emailinput.css("border-color","#b94a48");
	   emailinput.val('Введите корректную электронную почту');
			//let email = $(this).parent().find("[name='emailpromo']").val();
		}
		 if(response == 'success'){
			emailinput.css("border-color","#cccccc");
			$('.request-success-promo').animate({
					marginTop: '0px'
				},800)
				setTimeout(function(){
					$('.request-success-promo').animate({
					marginTop: '-60px'
				},500)
				},1500)
			}
		}
	})
}
										  
let ds1 = parseFloat($('.data-cost1').text()); 
let ds2 = parseFloat($('.data-cost2').text());
let ds3 = parseFloat($('.data-cost3').text());
let ds4 = parseFloat($('.value-data-cost').text());
let ds5 = parseFloat($('.value-data-cost1').text());
let ds6 = parseFloat($('.value-data-cost2').text());
let ds7 = parseFloat($('.value-data-cost3').text());
										  
function postPromocode(promocode,email){
  $.ajax({
     method: "POST",
     url: myajax.url,
     data: {
       action: 'ajax_promo',
       promocode: promocode,
	   email: email
     },
   success: function(response){			
    if(response == '1'){
      $("input[name='promocode']").css("border-color","#b94a48");
    }
    if(response !== '1'){
      let vd1 = parseFloat($('.data-cost1').text(parseFloat((ds1*response).toFixed(2))).text());
      let vd2 = parseFloat($('.data-cost2').text(parseFloat((ds2*response).toFixed(2))).text());
      let vd3 = parseFloat($('.data-cost3').text(parseFloat((ds3*response).toFixed(2))).text());
      let vd4 = parseFloat($('.value-data-cost').text(parseFloat((ds4*response).toFixed(2))).text());
      let vd5 = parseFloat($('.value-data-cost1').text(parseFloat((ds5*response).toFixed(2))).text());
      let vd6 = parseFloat($('.value-data-cost2').text(parseFloat((ds6*response).toFixed(2))).text());
        let vd7 = parseFloat($('.value-data-cost3').text(parseFloat((ds7*response).toFixed(2))).text());
                          
      let vs4 = parseInt($('.summer').val());
      let vs5 = parseInt($('.summer1').val());
      let vs6 = parseInt($('.summer2').val());
      let vs7 = parseInt($('.summer3').val());                  
      $('.result-pay').text(vd4*vs4 + vd5*vs5 + vd6*vs6 + vd7*vs7);
      let closePromo = function(){
        $("input[name='promocode']").css("border-color","#4cb050");
        setTimeout(function(){
          $('#promo').css({
            display: 'none'
         })
        },1000)
      }
      closePromo();
    }
   } 
})
}
