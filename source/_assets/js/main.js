window.axios = require('axios');
import Vue from 'vue';
import Search from './components/Search.vue';

Vue.config.productionTip = false;

new Vue({
    components: {
        Search,
    },
}).$mount('#vue-search');

