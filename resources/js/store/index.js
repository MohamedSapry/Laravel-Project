import Vuex from 'vuex'
import Vue  from 'vue'

Vue.use(Vuex)

const store = new Vuex.Store({
    state (){
        return{
            addresses :[],
            page : 1,
            lastPage : -1
        }
    },

    mutations: {
        NEXT_PAGE(state){
            if(state.page < state.lastPage){
                state.page++
            }
        },
        PREVIOUS_PAGE(state){
            if(state.page != 1){
                state.page--
            }
        },
        
        STORE_USERS_DATA(state, usersdata){
            state.addresses = usersdata
        },
        NUMBER_OF_PAGES(state, n){
            state.lastPage = n
        },
    },
    actions:{
        getUsersData({ state }){
            const res = axios.get('http://localhost:8001/api/usersdata?page=' + state.page).then(data => {
                console.log("-------------START GETTING DATA-------------")
                store.commit('STORE_USERS_DATA', data.data.data)
                console.log(state.addresses)
                store.commit('NUMBER_OF_PAGES', data.data.last_page)
                console.log("-------------END GETTING DATA-------------")
            })
        }
    }
})
export default store