var number = 0;
$("#minus").click(function(){
  number -= 1;
  if (number <= 0) number = 0;
  setNumber(number);
  $("#number").addClass('bounce');
  removeAnimation();
});

$("#plus").click(function(){
  console.log(number)
  number += 1;
  setNumber(number);
  $("#number").addClass('bounce')
  removeAnimation();
});

function removeAnimation() {
  setTimeout(function(){
    $("#number").removeClass('bounce'); 
  }, 100);
}

function setNumber(number) {
  // $("#number").attr('data-content', number);
  $("#number").text(number);
}