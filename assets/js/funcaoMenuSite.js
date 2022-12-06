// Funções criadas 01/06 por Xavier para abrir menu drop down ao passar o mouse e habilitar abrir menu dropdown através do toque em dispositivos moveis
$('.dropdown-menu a.dropdown-toggle').on('mouseenter', function (e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass('show')
  }
  var $subMenu = $(this).next('.dropdown-menu')
  $subMenu.toggleClass('show')

  $(this)
    .parents('li.nav-item.dropdown.show')
    .on('hidden.bs.dropdown', function (e) {
      $('.dropdown-submenu .show').removeClass('show')
    })

  return false
})

if (screen.width < 595) {
  $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
    if (!$(this).next().hasClass('show')) {
      $(this)
        .parents('.dropdown-menu')
        .first()
        .find('.show')
        .removeClass('show')
    }
    var $subMenu = $(this).next('.dropdown-menu')
    $subMenu.toggleClass('show')

    $(this)
      .parents('li.nav-item.dropdown.show')
      .on('hidden.bs.dropdown', function (e) {
        $('.dropdown-submenu .show').removeClass('show')
      })
    return false
  })
}
