// Generated by CoffeeScript 2.5.1
(function() {
  // create.coffee --
  // Copyright (C) 2020 cnngimenez

  // This program is free software: you can redistribute it and/or modify
  // it under the terms of the GNU Affero General Public License as published by
  // the Free Software Foundation, either version 3 of the License, or
  // (at your option) any later version.

  // This program is distributed in the hope that it will be useful,
  // but WITHOUT ANY WARRANTY; without even the implied warranty of
  // MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  // GNU Affero General Public License for more details.

  // You should have received a copy of the GNU Affero General Public License
  // along with this program.  If not, see <http://www.gnu.org/licenses/>.
  var assign_events, copy_url, create_link, create_link_from_form, initialize_data, videos;

  videos = ['typing', 'mate', 'cafe', 'beer'];

  create_link_from_form = function() {
    var selmonth, selvideo, txtday, txthour, txtmin, txtmsg, txtyear;
    txtmsg = $('#message');
    txtday = $('#day');
    selmonth = $('#month');
    txtyear = $('#year');
    txthour = $('#hour');
    txtmin = $('#min');
    selvideo = $('#background');
    return create_link({
      message: txtmsg.val(),
      date: {
        day: txtday.val(),
        month: selmonth.val(),
        year: txtyear.val(),
        hour: txthour.val(),
        min: txtmin.val()
      },
      video: './videos/' + selvideo.val() + '.mp4'
    });
  };

  create_link = function(data) {
    var fin, local_url, url;
    fin = data.date.year + "," + data.date.month + "," + data.date.day;
    fin += "," + data.date.hour + "," + data.date.min;
    local_url = new URL(document.URL);
    url = new URL(local_url.origin);
    url.searchParams.set('title', data.message);
    url.searchParams.set('msj', data.message);
    url.searchParams.set('fin', fin);
    url.searchParams.set('video', data.video);
    return url;
  };

  window.update_url = function() {
    var link;
    link = create_link_from_form();
    $("input#result").val(link);
    return $("a#result").attr('href', link);
  };

  copy_url = function() {
    var p;
    p = navigator.clipboard.writeText($("input#result").val());
    return p.then(function() {
      $(".copy-tooltip").tooltip("show");
      return window.setTimeout(function() {
        return $(".copy-tooltip").tooltip("hide");
      }, 2000);
    });
  };

  assign_events = function() {
    $("input[type=text]").on('change', update_url);
    $("select").on('change', update_url);
    return $("#copy").on('click', copy_url);
  };

  initialize_data = function() {
    var selmonth, today, txtday, txthour, txtmin, txtmsg, txtyear;
    txtmsg = $('#message');
    txtday = $('#day');
    selmonth = $('#month');
    txtyear = $('#year');
    txthour = $('#hour');
    txtmin = $('#min');
    // selvideo = $('#background')
    txtmsg.val('Presentación: La vida de Alan Turing.');
    today = new Date();
    txtday.val(today.getDate());
    selmonth.val(today.getMonth() + 1);
    txtyear.val(today.getFullYear());
    txthour.val(today.getHours());
    return txtmin.val(today.getMinutes());
  };

  $(document).ready(function() {
    initialize_data();
    assign_events();
    update_url();
    return console.log('create initialized');
  });

}).call(this);
