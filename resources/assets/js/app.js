
/** ---- BOOTSTRAP SECTION ----
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/** ---- VUE SECTION ----
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});*/


/** ---- CUSTOM SECTION ----
 * Custom javascript and jQuery section
 * Write everything custom js and jq function
 */

// Collapse sidebar and active state
if($('.sidebar .nav-link').hasClass('active')){
    $('.active').siblings('.collapse').addClass('show');
};

$('#add-schedule').on('show.bs.modal', function (event) {
	let button = $(event.relatedTarget)
	let day = button.data('day')
	let session = button.data('session')
	let modal = $(this)

	if(day != null && session != null){
		modal.find('.modal-body #day').val(day)
		modal.find('.modal-body #session_block_id').val(session)
	} else {
		modal.find('.modal-body #day').val(day)
		modal.find('.modal-body #session_block_id').val(session)
	}
});