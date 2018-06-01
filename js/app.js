function addClass(id) {
  document.getElementById("about").classList.add(id + '-bg');
}

function removeClass(id) {
  document.getElementById("about").classList.remove(id + '-bg');
}

$(document).ready(function(){
  $('a.dd').click(function(){
    event.preventDefault();
    var element_id = $(this).parent().parent().attr('id');
    $('#' + element_id).children(".content").toggle(500);
    $('#' + element_id).children(".title").children("a").toggle();
  });

  $('span.hover-bg').hover(function(){
    addClass($(this).attr('id'));
  }, function () {
    removeClass($(this).attr('id'));
  });

  $("a.scroll").click(function() {
    event.preventDefault();
    var scrollTo = $(this).attr('href');
    $('html, body').animate({
        scrollTop: $(scrollTo).offset().top
    }, 1500);
  });

    $('form#contactform').submit(function() {
      event.preventDefault();
      var contact_form = $(this);
      var promise = $.ajax('send.php', {
        data: contact_form.serialize(),
        method: 'POST'
      });
      promise.done(function(data) {
        contact_form.find('input[name=name]').val('');
        contact_form.find('input[name=email]').val('');
        contact_form.find('input[name=phone]').val('');
        contact_form.find('textarea').val('');
        contact_form.hide();
        contact_form.parent().append('<br><br><p><strong>Your message has been sent.</strong></p>');
      });
    });
});
