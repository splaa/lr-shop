import Vue from "vue";
import Vuex from 'vuex';
import axios from "axios";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        article: {
            comments: [],
            tags: [],
            statistic: {
                likes: 0,
                views: 0,
            },
            slug: '',
            likeIt: true
        },
    },

    actions: {
        getArticleDate(context, payload) {
            console.log('context: ', context)
            console.log('payloud:', payload)
            axios.get('/api/article-json', {params: {slug: payload}})
                .then((response) => {
                    context.commit('SET_ARTICLE', response.data.data);
                })
                .catch(() => {
                    console.log('Error')
                });
        },
        viewsIncrement(context, payload){
            setTimeout(()=>{
                axios
                    .put('/api/article-views-increment', {slug:payload})
                    .then((response)=>{
                        context.commit('SET_ARTICLE', response.data.data);
                    })
                    .catch(()=>{
                        console.log('Error');
                    });
            }, 5000)
        },
        addLike(context, payload){
            axios
                .put('/api/articles-likes-increment',{slug:payload.increment})
                .then((response)=>{
                    context.commit('SET_ARTICLE', response.data.data);
                    context.commit('SET_LIKE', !context.state.likeIt);
                })
                .catch(()=>{
                    console.log('Error addLike')
                });
            console.log('После клинка по кнопке', context.state.likeIt)
        }
    },

    getters: {
        articleViews(state) {
            return state.article.statistic.views;
        },
        articleLikes(state) {
            return state.article.statistic.likes;
        }
    },
    mutations: {
        SET_ARTICLE(state, payload) {
            return state.article = payload;
        },
        SET_SLUG(state, payload) {
            return state.slug = payload;
        },
    }
})
