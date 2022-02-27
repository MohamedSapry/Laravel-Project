import Vuex from 'vuex'
import Vue  from 'vue'

Vue.use(Vuex)

const store = {
    namespaced: true,
    state: {
        addresses :[],
        page : 1,
        lastPage : -1
    },

    mutations: {
        nextPage(state){
            if(state.page < state.lastPage){
                state.page++
            }
        },
        previousPage(state){
            if(state.page != 1){
                state.page--
            }
        },
        
        storeUsersData(state, usersdata){
            state.addresses = usersdata
        },
        numberOfPages(state, n){
            state.lastPage = n
        },
    },
    actions: {
        getUsersData({ state , commit}){
            const res = axios.get('http://localhost:8001/api/usersdata?page=' + state.page).then(data => {
                commit('storeUsersData', data.data.data)
                commit('numberOfPages', data.data.last_page)
            })
        }
    }
}
export default store