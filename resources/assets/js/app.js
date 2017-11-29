
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('art-piece-table', require('./components/ArtPieceTable.vue'));
Vue.component('exhibition-table', require('./components/ExhibitionTable.vue'));
Vue.component('art-style-table', require('./components/ArtStyleTable.vue'));
Vue.component('condecoration-table', require('./components/CondecorationTable.vue'));
Vue.component('legal-entity-table', require('./components/LegalEntityTable.vue'));
Vue.component('restorations-table', require('./components/RestorationTable.vue'));
Vue.component('images-table', require('./components/ImageTable.vue'));
Vue.component('user-create-form', require('./components/UserCreateForm.vue'));
const app = new Vue({ el: '#app' });
