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
    actions:{
        getUsersData({ state }){
            const res = axios.get('http://localhost:8001/api/usersdata?page=' + state.page).then(data => {
                console.log("-------------START GETTING DATA-------------")
                store.commit('storeUsersData', data.data.data)
                console.log(state.addresses)
                store.commit('numberOfPages', data.data.last_page)
                console.log("-------------END GETTING DATA-------------")
            })
        }
    }
})
export default store