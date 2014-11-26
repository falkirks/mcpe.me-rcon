$('#input').keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if(keycode == '13' && $('#input').val() != ""){
      	$.get( "index.php?cmd=" + $('#input').val(), function( data ) {
          $('#output').html($('#output').html() + "<br>" + data);
          $('#input').val("");
        });
  }
});