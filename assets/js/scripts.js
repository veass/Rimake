$(document).ready(function(){
  // Local navigation
    $('a[href^="#"]').click(function(e){
      e.preventDefault();
      var id  = $(this).attr('href'),
          menu = $(id).offset().top;
      $('html, body').animate({scrollTop: menu},1000);
    });
  
  // Calculator
  
    var emhover = $('.emhover');
      for(i = 0; i < emhover.length; i++) {
       let ds = parseFloat($('.data-cost1').text()); //getting a cost
       let ds1 = parseFloat($('.data-cost2').text());
       let ds2 = parseFloat($('.data-cost3').text());
           emhover[i].onclick = function(){
              $(this).addClass('gradient').siblings().removeClass('gradient');             
              if(this.hasAttribute('data-cost1')){ //Chenging cost 
                $('.value-data-cost').text(ds)                     
              }
              if(this.hasAttribute('data-cost2')){
                $('.value-data-cost').text(ds1)
              }
              if(this.hasAttribute('data-cost3')){
                $('.value-data-cost').text(ds2)
              }
          }
        }
// Adding & removing value of calculator
          $("[name='plus']").click(function (){
            $('.summer').val(parseInt($('.summer').val()) + 1);
           });        
           $("[name='minus']").click(function(){
             let val =  $('.summer').val();
             if( val > 0){ 
            $('.summer').val(parseInt($('.summer').val()) - 1);
            }
           });
      
           $("[name='plus1']").click(function(){
            $('.summer1').val(parseInt($('.summer1').val()) + 1);
           });
           $("[name='minus1']").click(function(){
            let val =  $('.summer1').val();
            if( val > 0){ 
            $('.summer1').val(parseInt($('.summer1').val()) - 1);   
            }
           });
      
           $("[name='plus2']").click(function(){
            $('.summer2').val(parseInt($('.summer2').val()) + 1);
           });
           $("[name='minus2']").click(function(){
            let val =  $('.summer2').val();
            if( val > 0){ 
            $('.summer2').val(parseInt($('.summer2').val()) - 1);
            }
           });
  
           $("[name='plus3']").click(function(){
             $('.summer3').val(parseInt($('.summer3').val()) + 1);  
           });
           $("[name='minus3']").click(function(){
            let val =  $('.summer3').val();
            if( val > 0){ 
            $('.summer3').val(parseInt($('.summer3').val()) - 1);
            }       
           });
       
var costing =  function (){
  let ds3 = parseFloat($('.value-data-cost').text());
  let ds4 = parseFloat($('.value-data-cost1').text());
  let ds5 = parseFloat($('.value-data-cost2').text());
  let ds6 = parseFloat($('.value-data-cost3').text());
    summer = $('.summer').val();
    if(summer === ''){
      $('.summer').val(0); 
    }
    else {
      summer = $('.summer').val();
    }                
    costsummer1 = parseFloat((summer * ds3).toFixed(2));

    summer1 = $('.summer1').val();
      if(summer1 === ''){
        $('.summer1').val(0); 
      }
      else {
        summer1 = $('.summer1').val();
      }    
    costsummer2 = parseFloat((summer1 * ds4).toFixed(2));

    summer2 = $('.summer2').val() ;
      if(summer2 === ''){
        $('.summer2').val(0); 
      }
      else {
        summer2 = $('.summer2').val();
      }    
    costsummer3 = parseFloat((summer2 * ds5).toFixed(2));

    summer3 = $('.summer3').val() ;
      if(summer3 === ''){
        $('.summer3').val(0); 
      }
      else {
        summer3 = $('.summer3').val();
      }    
    costsummer4 = parseFloat((summer3 * ds6).toFixed(2));
    costsummer = costsummer1 + costsummer2 + costsummer3 + costsummer4;
     $('.result-pay').text(parseFloat(costsummer.toFixed(2)));
  }

  $(".event-calc, .emhover").click(costing);
  $(".summer, .summer1, .summer2, .summer3").change(costing);
        
  // popup
      $('.button-popup, .call, .footer-but').click(function(){
          $('.popup').css({
            display: 'block'
          });
      })
  
      $('.shadow-popup').click(function(){
        $('.popup, .popup-slider, #promo').css({
          display: 'none'
        });
      })
  $('.left-front .button-order').click(function(){
          $('#promo').css({
            display: 'block'
          });
      })
  // showing faq
  $('.fq').click(function(){
    $(this).find('p').slideToggle(600);
    $(this).find('.triple').toggleClass('active');

  if ($(this).find('.triple').hasClass('active')){
    $(this).find('.triple').css( 'background-color','white ');
    $(this).find('.rotate > img').css({ // animation
            'transition': 'transform 0.5s',
            '-o-transform': 'rotate(180deg)',
            '-ms-transform': 'rotate(180deg)',
            '-moz-transform': 'rotate(180deg)',
            '-webkit-transform': 'rotate(180deg)',
            'transform': 'rotate(180deg)'
    });
  }
  else {
    $(this).find('.triple').css( 'background-color','rgba(0, 0, 0, 0)');
    $(this).find('.rotate > img').css({
      'transition': 'transform 0.5s',
      '-o-transform': 'rotate(0deg)',
      '-ms-transform': 'rotate(0deg)',
      '-moz-transform': 'rotate(0deg)',
      '-webkit-transform': 'rotate(0deg)',
      'transform': 'rotate(0deg)'
    })
  }
  })
  
  // mobile menu  
    $('.mobile-icon-menu').click(function(){  //opening mobile menu
      $('.ulbar-mobile').toggleClass('menu-open');
      $('html').toggleClass('hidden');
        if($('.ulbar-mobile').hasClass('menu-open')){ // closing mobile menu after opening
          $('.front, .calculator-cost, .ulbar-mobile > li').click(function(){
          $('.ulbar-mobile').removeClass('menu-open');
          $('html').removeClass('hidden');
          });
        }
  });
  
  
  //Filter input
   $('[name=quantity], [name=phone]').bind("change keyup input click", function() {
    if (this.value.match(/[^0-9]/g)) {
      this.value = this.value.replace(/[^0-9]/g, '');
    }
    });
  
  //Portfolio
  $('.boxs').click(function(){   
    $('#carousel-example-generic').css({'display': 'block'});
  })
  
  // Table
    var th1 = parseInt($('.data-cost1').text());
        th2 = parseInt($('.data-cost2').text());
        th3 = parseInt($('.data-cost3').text());
        mediath = $('.media-th');
  
    $(mediath[0]).text(th1 + ' руб.');
    $(mediath[1]).text(th2 + ' руб.');
    $(mediath[2]).text(th3 + ' руб.');
  // Slider
  $('.boxs > div').click(function(){
    $('.popup-slider').css({
      display: 'block'
    })
  })
  // removing and attachng element
  function windowSize(){
  var fg = $(".promo-forms2 form .form-group");
  if($(window).width() <= 800){
    fg.detach();
  }
  if($(window).width() >= 800){
    fg.append(fg.parent());
  }
  }
// Removing checkbox;
	$('.access').click(function(){
		$('.checkbox label span').removeClass('blink');
	})
//чистка
  $("input[name='emailpromo']").click(function(){
  if($("input[name='emailpromo']").val() == 'Введите корректную электронную почту'){
    $("input[name='emailpromo']").val('');
  }
})
  //End code
  })