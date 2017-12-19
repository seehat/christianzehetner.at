$(function () {

  if ($('#snacks').length <= 0) return;

  var $inputs = $('.js-tagsfilter input');

  var entries = new List('snacks', {
    valueNames: ['tags', 'title', 'duration']
  });

  var updateList = function filter() {
    var values_tags = $.map($(".js-filter-tags input[name=tags]:checked"), function (obj, i) {
      return $(obj).val();
    });

    var duration = $('.js-filter-duration').val();
    $('.js-duration-value').html("<= " + duration + " min");

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

  updateList();


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
