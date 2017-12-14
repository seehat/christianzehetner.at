
// Vue.use(Vuex);

// const store = new Vuex.Store({
//   state: {
//     count: 0
//   },
//   mutations: {
//     increment: function (state) {
//       state.count++;
//     }
//   }
// });

// Vue.component('vue-counter', {
//   template: '<div>{{ count }}</div>',
//   computed: {
//     count: function () {
//       return this.$store.state.count;
//     }
//   },
//   methods: {
//     increment: function () {
//       this.$store.commit('increment')
//     },
//     decrement: function () {
//       this.$store.commit('decrement')
//     }
//   }
// })

// var app = new Vue({
//   el: '.js-snacks',
//   data: {
//     greeting: 'Welcome to your Vue.js app!',
//     docsURL: 'http://vuejs.org/guide/',
//     discordURL: 'https://chat.vuejs.org',
//     forumURL: 'http://forum.vuejs.org/'
//   },
//   store: {}
// });




$(function () {

  var $inputs = $('.js-tagsfilter input');

  var entries = new List('entries', {
    valueNames: ['tags', 'title', 'duration']
  });

  var updateList = function filter() {
    var values_tags = $.map($(".js-filter-tags input[name=tags]:checked"), function (obj, i) {
      return $(obj).val();
    });

    var duration = $('.js-filter-duration').val();

    var tagsFilter = function (item) {
      var result = true;
      $(values_tags).each(function (idx, value) {

        // not found
        if (item.values().tags.search(value) == -1) {
          result = false;

          return false; // exit each
        }
      });

      return result;
    };

    var durationFilter = function (item) {
      return parseInt(item.values().duration) <= parseInt(duration);
    }

    entries.filter(function (item) {
      return tagsFilter(item) && durationFilter(item);
    });
  }

  $('.js-filter-tags input[name=tags]').change(updateList);
  $('.js-filter-duration').on('input', updateList);



  // routie(':category', function (category) {

  //   if (category == 'sortbycustomer') {
  //     projects.filter();
  //     projects.sort('customer', { order: "asc" });
  //   }
  //   else if (category == 'sortbyarchitect') {
  //     projects.filter();
  //     projects.sort('architect', { order: "asc" });
  //   }
  //   else {
  //     projects.filter(function (item) {
  //       return item.values().category == category ? true : false;
  //     });
  //     projects.sort('number', { order: "desc" });
  //   }

  //   $inputs.filter('[value=' + category + ']').attr('checked', true);

  // });

  // routie('', function () {
  //   projects.filter();
  //   projects.sort('number', { order: "desc" });
  //   $inputs.filter('[value=]').attr('checked', true);
  // });

  // $inputs.on('click', function () {
  //   routie($(this).val());
  // });

});
