/* Gravity Forms minute counter add 0 before single digit numbers*/
jQuery( document ).ready(function() {
  jQuery('input[placeholder="MM"]').on('input', function (evt) {
    var value = evt.target.value
    if (Number(value).toString() !== value){
      evt.target.value = Number(value).toString();
    }
    if (Number(value).toString() === value && value < 10) {
      evt.target.value = '0' + value;
    }
  });
});