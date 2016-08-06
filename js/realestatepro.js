/*-----------------------------------------------------------------------------------
/* Custom Javascript Functions
-----------------------------------------------------------------------------------*/


jQuery(document).ready(function($) {

	$('form#sort select').change(function() {
		var input_name = $(this).prop('name');
		var input_val = $(this).val();
		$('form#searchform input[name="'+input_name+'"]').val(input_val);
		$('form#searchform').submit();
	} );

	$('form#search-form').submit(function(e) {
		var location = $(this).find('input[name="location"]');
		var buyrent = $(this).find('select[name="buyrent"]');
		var property_type = $(this).find('select[name="type"]');

		if(location.next().hasClass('alert')) location.next().remove();
		if(buyrent.next().hasClass('alert')) buyrent.next().remove();
		if(property_type.next().hasClass('alert')) property_type.next().remove();

		if(location.val() === '' && buyrent.val() === 'select' && property_type.val() === 'select') {
			//location.after('<div class="alert alert-danger">required field</div>');
			//buyrent.after('<div class="alert alert-danger" style="left: 75px; width: 130px">or this required</div>');
			//property_type.after('<div class="alert alert-danger" style="left: 75px; width: 130px">or this required</div>');
			alert('Por favor selecciona la ubicación, el tipo de propiedad o si es de Venta/Renta.');
			e.preventDefault();
		}
	} );



	var buySelectMin = $('select[name="min_val_buy"]');
	var buySelectMax = $('select[name="max_val_buy"]');
	var rentSelectMin = $('select[name="min_val_rent"]');
	var rentSelectMax = $('select[name="max_val_rent"]');

	var priceSelectContainerMin = buySelectMin.parent();
	var priceSelectContainerMax = buySelectMax.parent();

	var buyrentSelect = $('#buyrent');

	function buyRentSearchFormBehavior(buyRentSelectVal) {
		switch(buyRentSelectVal) {
			case 'buy':
				priceSelectContainerMin.empty().append(buySelectMin);
				priceSelectContainerMax.empty().append(buySelectMax);
				break;
			case 'rent':
				priceSelectContainerMin.empty().append(rentSelectMin);
				priceSelectContainerMax.empty().append(rentSelectMax);
				break;
			default:
				priceSelectContainerMin.empty().append(buySelectMin);
				priceSelectContainerMax.empty().append(buySelectMax);
				break;
		}
	}
	buyRentSearchFormBehavior(buyrentSelect.val());

	buyrentSelect.change(function() {
		buyRentSearchFormBehavior($(this).val());
	} );

} );


// The functions used in the mortgage calculator


// This function formats the amounts used
function formatMoney(number, places, symbol, thousand, decimal) 
{
    number = number || 0;
    places = !isNaN(places = Math.abs(places)) ? places : 2;
    symbol = symbol !== undefined ? symbol : "";
    thousand = thousand || ",";
    decimal = decimal || ".";
    var negative = number < 0 ? "-" : "",
        i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return '$' + symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
}


function IDv(id)
{
	var v = document.getElementById(id).value;
	if (!v) return 0;
	return parseFloat(v.replace(/,/g, ''));
}


// This is the core calculation function. It returns two results one for [Repayment] mortgages and one for [Interest] only/endowment mortgages. The formula was derived from https://en.wikipedia.org/wiki/Mortgage_calculator 
function calc()
{
    document.getElementById('Mortgage').value=formatMoney(IDv('Property_Price')-IDv('Deposit'));
    document.getElementById('Repayment').value=formatMoney(((IDv('Property_Price')-IDv('Deposit'))*(((IDv('InterestRate')/100))/12)*Math.pow((1+(IDv('InterestRate')/100)/12),(IDv('Duration')*12)))/(Math.pow((1+(IDv('InterestRate')/100)/12),IDv('Duration')*12)-1));
    document.getElementById('Interest').value=formatMoney(((IDv('Property_Price')-IDv('Deposit'))*(IDv('InterestRate')/100))/12);
}

// Validates inputs to ensure they are present and valid
function validate_mortgage_calculator_form( form )
{
    if( isNaN( parseInt( form.elements['Property_Price'].value ) ) ) { alert("Por favor ingresa el precio de compra de la propiedad."); form.elements['Property_Price'].focus(); return false; }
    if( isNaN( parseInt( form.elements['Deposit'].value ) ) ) { alert("Por favor ingresa la cantidad de depósito o un 0 si no hay ningún depósito."); form.elements['Deposit'].focus(); return false; }
    if( isNaN( parseInt( form.elements['Duration'].value ) ) ) { alert("Por favor ingresa la duración de la hipoteca."); form.elements['Duration'].focus(); return false; }
    if( isNaN( parseInt( form.elements['InterestRate'].value ) ) ) { alert("Por favor ingresa la tasa de interés de la hipoteca."); form.elements['InterestRate'].focus(); return false; }
    validate_and_calculate( form );
    return true;
}

// Validates inputs to ensure they are present and valid
function validate_and_calculate( form )
{

    {   var p = parseFloat(form.elements['Property_Price'].value.replace(/,/g, ''));
        var d = parseFloat(form.elements['Deposit'].value.replace(/,/g, ''));
        if( d>p ) { alert("El depósito necesita ser menor al precio de la propiedad, por favor revisarlo."); form.elements['Property_Price'].focus(); return false; }
    }    
    
    calc();
}

// End of mortgage calculator function


// The functions used for the scroll to top button credit to https://github.com/seanmacentee/scroll-to-top-button


jQuery(document).ready(function($) {
  $(window).scroll(function(){
      if ($(this).scrollTop() > 100) {
          $('.scrollUpButton').fadeIn();
      } else {
          $('.scrollUpButton').fadeOut();
      }
  });
  $('.scrollUpButton').click(function(){
      $("html, body").animate({ scrollTop: 0 }, 500);
      return false;
  });
 });