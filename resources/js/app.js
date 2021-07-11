window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue').default;

import store from './store'
// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('article-component', require('./components/ArticleComponent/ArticleComponent').default);
Vue.component('views-component', require('./components/ViewsComponent/ViewsComponent').default);
Vue.component('likes-component', require('./components/LikesComponent/LikesComponent').default);

const app = new Vue({
    store,
    el: '#app',
    created(){
        let url = window.location.pathname
        let slug = url.substring(url.lastIndexOf('/')+1)

        console.log(url)
        console.log(slug)
        this.$store.commit('SET_SLUG', slug)
        this.$store.dispatch('getArticleDate', slug)
        this.$store.dispatch('viewsIncrement', slug)
    }
});
