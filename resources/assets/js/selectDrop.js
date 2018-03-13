$('body').on('click', '.drop-menu-select:not(.disableDiv)', function () {

  if ($(this).find('#mu-list').length > 0 && $('#data-values #GoodId').val() > 0) {
    event.preventDefault();
    return false;
  }

  $(this).attr('tabindex', 1).focus();
  $(this).toggleClass('active');
  $(this).find('.dropeddown').slideToggle(300);
  $(this).css({
    color: '#555',
    fontWeight: '500'
  });
});
$('body').on('focusout', '.drop-menu-select', function () {
  $(this).removeClass('active');
  $(this).find('.dropeddown').slideUp(300);
});
$('body').on('click','.drop-menu-select .dropeddown li:not(.select-multi)', function () {
  $(this).parents('.drop-menu-select').find('.select span').text($(this).text());
  $(this).parents('.drop-menu-select').find('input').attr('value', $(this).attr('id'));
});
