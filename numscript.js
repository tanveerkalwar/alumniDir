 $({ Counter: 0 }).animate({
  Counter: $('.CNum').text()
}, {
  duration: 1000,
  easing: 'swing',
  step: function() {
    $('.CNum').text(Math.ceil(this.Counter));
  }
});

 $({ Counter: 0 }).animate({
  Counter: $('.ENum').text()
}, {
  duration: 1000,
  easing: 'swing',
  step: function() {
    $('.ENum').text(Math.ceil(this.Counter));
  }
});

 $({ Counter: 0 }).animate({
  Counter: $('.SNum').text()
}, {
  duration: 1000,
  easing: 'swing',
  step: function() {
    $('.SNum').text(Math.ceil(this.Counter));
  }
});

