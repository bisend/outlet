/* DROPDOWN - BLOCK */
$( document ).ready(function() {
  $( ".dropdown-div-btn" ).click(function() {

    let i = $(this).find('svg');
    let display =  $(this).next().css('display');

    switch (display){
      case 'none': {
        i.addClass('svg-show');
        $(this).css('borderBottom', '1px solid #eee');
        $(this).html($(this).html().replace('Показати','Сховати'));
        break;
      }
      case 'block': {
        i.removeClass('svg-show');
        $(this).css('borderBottom', 'none');
        $(this).html($(this).html().replace('Сховати','Показати'));
        break
      }
      default: {
        break
      }
    }
    $(this).next().stop().slideToggle(300);
  });
});
/* DROPDOWN - BLOCK END*/

