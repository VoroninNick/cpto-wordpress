</div>







<div class="page_footer  wrapper">



        <div class="page_footer_left footer_text">



            <p>© 2012 Львівський центр ПТО ДСЗ</p>



        </div>



        <div class="page_footer_center footer_text">



            <p>Всі права на інформацію належать



                Львівському центру професійно-технічної освіти



                державної служби зайнятості</p>



        </div>



        <div class="page_footer_right footer_text">



            <div class="footer_contact_info">



                <div class="footer_contact_info">



                    <p>тел.:</p><p>+38 (032) 232 22 62</p>



                    <div class="clear"></div>



                    <p>@:</p><p><a style="color:#676767" class="mailto" href="mailto:profc@locz.lviv.ua">profc@locz.lviv.ua</a></p>



                </div>



                <div class="footer_contact_info">







                </div>



            </div>



        </div>



    </div>

<script type="text/javascript">



jQuery.validator.addMethod(

    'regexp',

    function(value, element, regexp) {

        var re = new RegExp(regexp);

        return this.optional(element) || re.test(value);

    },

    "Please check your input."

);



jQuery.extend(jQuery.validator.messages, {

       required: "Це поле необхідно заповнити",

       remote: "Виправте це поле щоб продовжити",

       email: "Введіть правильний e-mail адресу.",

       url: "Введіть правильний URL.",

       date: "Введіть правильну дату.",

       dateISO: "Введіть правильну дату (ISO).",

       number: "Введіть число.",

       tell: "Введіть число.",

       digits: "Введіть лише цифри.",

       creditcard: "Введіть правильний номер вашої кредитної картки.",

       equalTo: "Повторіть введення значення ще раз.",

       accept: "Будь ласка, введіть значення з правильним розширенням.",

       maxlength: jQuery.format("Не можна вводити більш {0} символів."),

       minlength: jQuery.format("Повинно бути не менше{0} символів."),

       rangelength: jQuery.format("Введіть від {0} до {1} символів."),

       range: jQuery.format("Введіть число від {0} до {1}."),

       max: jQuery.format("Введіть число менше або рівне {0}."),

       min: jQuery.format("Введіть число більше або рівне {0}.")

});



var val1=jQuery;

val1.noConflict(); 

val1.validator.setDefaults({

  debug: true,

  success: "valid"

});

    val1("#wpcf7-f184-p96-o1 form").validate({

  rules: {

    	youtel: {

      		required: true,

		digits: true,

      		minlength: 7,

		maxlength: 11

    	},

	yourname: {

		required: true,

      		minlength: 2,

		regexp: '[A-Za-zА-Яа-я]'

	},

	yourmessage: {

		required: true,

      		minlength: 12

	},

	youremail: {

		required: true

	}



  	},

	messages: {

	yourmessage: {

		required: "Введіть повідомлення.",

      		minlength: "Введіть не менше 12 символів."

	},

	yourname: {

		required: "Введіть ваше ім'я",

      		minlength: "Ім'я повинно мати не менше 3 і не більше 15 символів.",

		regexp: 'Логін може складатися лише з літер.'

	},

	youremail: {

		required: "Введіть вашу електронну пошту."

	},

	youtel: {

		required: "Введіть ваш номер телефону.",

		digits: "Невірний формат номера телефону."

    	}



	}

});



var val2=jQuery;

val2.noConflict(); 

val2.validator.setDefaults({

  debug: true,

  success: "valid"

});

    val2("#wpcf7-f287-p207-o1 form").validate({

  rules: {

    	tell: {

      		required: true,

		digits: true,

      		minlength: 7,

		maxlength: 11

    	},
	
	tell_specialista_scho_skeryvav: {

      		required: true,

		digits: true,

      		minlength: 7,

		maxlength: 11

    	},

	pip: {

		required: true,

      		minlength: 12,

		regexp: '[A-Za-zА-Яа-я]'

	},
        pib_hto_skeryvav: {

		required: true,

      		minlength: 12,

		regexp: '[A-Za-zА-Яа-я]'

	},

	yourmessage: {

		required: true,

      		minlength: 12

	},

	youremail: {

		required: true

	}



  	},

	messages: {

	yourmessage: {

		required: "Введіть повідомлення.",

      		minlength: "Введіть не менше 12 символів."

	},

	pip: {

		required: "Введіть ваш ПІП",

      		minlength: "Невірний формат",

		regexp: 'ПІП може складатися лише з літер.'

	},
	pib_hto_skeryvav: {

		required: "Введіть ваш ПІП",

      		minlength: "Невірний формат",

		regexp: 'ПІП може складатися лише з літер.'

	},
	youremail: {

		required: "Введіть вашу електронну пошту."

	},

	tell: {

		required: "Введіть ваш номер телефону.",

		digits: "Невірний формат номера телефону."

    	},
	tell_specialista_scho_skeryvav: {

		required: "Введіть ваш номер телефону.",

		digits: "Невірний формат номера телефону."

    	}

	}

});





</script>





<?php wp_footer(); ?>



<script type="text/javascript">



jQuery.noConflict();



(function($){ 



$(document).ready(function(){



/*Start DocumentReady*/



    	 $(".dropclick").click(function()



    	 {



          	$("#searchform").removeClass("go_to_left").addClass("go_to_right");



     	 });



/*End DocumentReady*/



});



})(jQuery); 



</script>



<script type='text/javascript'>

  function showHide(divId)

  {

      if ( document.getElementById(divId).style.height == '530px' )

          document.getElementById(divId).style.height = '0px';

      else

          document.getElementById(divId).style.height = '530px';

  }



</script>





<script type="text/javascript">



jQuery.noConflict();



(function($){ 



$(document).ready(function(){



/*Start DocumentReady*/



	var url=document.location.href;



 	$.each($(".page_header_main_menu a"),function(){



  		if(url.indexOf(this.href) != -1){$(this).addClass(' active_main_menu');};



 	});



/*End DocumentReady*/



});



})(jQuery);



</script>











</body>







</html>