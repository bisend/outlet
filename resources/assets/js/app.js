
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./fontawesome-all.min');
require('./header');
require('./dropdownBlock');
require('./mobileNav');
require('./mobileFilters');

$.ajaxSetup({
    beforeSend: function (request) {
        request.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    }
});

window.Vue = require('vue');
import vSelect from 'vue-select';
import _ from 'lodash';
import Loader from './components/Loader';

Vue.component('loader', Loader);
Vue.component('v-select', vSelect);

require('./category/SortSelect');

require('../plugins/owl/js/owl.carousel');
require('../plugins/owl/js/owl.navigation');
require('../plugins/owl/js/owl.autoplay');

require('./owlCarousel');
require('./order/order');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

