require('bootstrap');
require('./script');

// dropzone

document.Dropzone = require('dropzone');
window.$=window.jQuery=require('jquery');
Dropzone.autoDiscover = false;

require('./announcementImages');
