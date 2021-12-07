(function() {
  var Application, Utils;

  window.DEMO = window.DEMO || {};

  Utils = {
    'transform': Modernizr.prefixed('transform').replace(/([A-Z])/g, (str, m1) => {
      return '-' + m1.toLowerCase();
    }).replace(/^ms-/, '-ms-'),
    'translate': (x, y) => {
      var tran, vals;
      tran = Modernizr.csstransforms3d ? 'translate3d' : 'translate';
      vals = Modernizr.csstransforms3d ? '(' + x + ', ' + y + ', 0)' : '(' + x + ', ' + y + ')';
      return tran + vals;
    }
  };

  Application = class Application {
    constructor() {
      this.onKeyup = this.onKeyup.bind(this);
      this.previous = this.previous.bind(this);
      this.next = this.next.bind(this);
      this.update = this.update.bind(this);
      DEMO.utils = Utils;
      this.$doc = $(document);
      this.$roller = $('.roller');
      this.$step = $('#steps li');
      this.$title = $('#titles li');
      this.min = 0;
      this.max = this.$step.length - 1;
      this.active_index = 0;
      this.$step.eq(this.active_index).addClass('active');
      this.$title.eq(this.active_index).addClass('active');
      this.observe();
    }

    observe() {
      return this.$doc.on('keyup', this.onKeyup);
    }

    onKeyup(e) {
      var kc;
      kc = e.keyCode;
      if (kc === 38) {
        e.preventDefault();
        this.previous();
      }
      if (kc === 40) {
        e.preventDefault();
        return this.next();
      }
    }

    previous() {
      if (this.active_index > this.min) {
        this.active_index--;
        return this.update();
      }
    }

    next() {
      if (this.active_index < this.max) {
        this.active_index++;
        return this.update();
      }
    }

    update() {
      var y;
      y = -(this.active_index * 100);
      this.$roller.css(DEMO.utils.transform, DEMO.utils.translate(0, `${y}%`));
      this.$step.removeClass('active');
      this.$title.removeClass('active');
      this.$step.eq(this.active_index).addClass('active');
      return this.$title.eq(this.active_index).addClass('active');
    }

  };

  $(function() {
    return DEMO.instance = new Application();
  });

}).call(this);

