import Vuex from 'vuex'
import Vue  from 'vue'

Vue.use(Vuex)

const store = {
    namespaced: true,
    state: {
        userName: null,
        userNames: [],
        userId: null,
        areaId: null,
        userName: null,
        streetName: null,
        buildingNumber: null,
        floor: null,
        apartmentNumber: null,
        city: null,
        cities: [],
    },
    mutations: {
        listUsers(state, usersNames){
            state.userNames = usersNames
            console.log(state.userNames)
        },
        listCities(state, citiesNames){
            state.cities = citiesNames
            console.log(state.cities)
        },
        getUserNameFromInput(state, userName){
            console.log("get user name from input ")
            state.useName = userName
        },
        getCityNameFromInput(state, city){
            state.city = city
        },
        setUserId(state, userId){
            console.log("set UserID  : " + userId)
            state.userId = userId
        },
        setAreaId(state, areaId){
            console.log("set AreaID : " + areaId)
            state.areaId = areaId
        },
        setBuildingNumber(state, buildingNumber){
            console.log("set Building number : " + buildingNumber)
            state.buildingNumber = buildingNumber
        },
        setStreetName(state, streetName){
            console.log("set Street Name" + streetName)
            state.streetName = streetName
        },
        setFloor(state, floor){
            console.log("set Floor : " + floor)
            state.floor = floor
        },
        setapartmentNumber(state, apartmentNumber){
            console.log("set Apartment Number : " + apartmentNumber)
            state.apartmentNumber = apartmentNumber
        }
    },
    actions: {
        findUsers({state, commit}){
            console.log(state.useName)
            const username = state.useName
            const users = axios.get("http://localhost:8001/nova-api/users?search="+ username).then(
                data => {
                    commit('listUsers', data.data.resources)
                }
            )
        },
        findCities({state, commit}){
                console.log(state.city)
                const city = state.city
                const area = axios.get("http://localhost:8001/nova-api/areas?search="+city).then(
                    data => {
                        console.log(city)
                        commit('listCities', data.data.resources)
                    }
                )
        },
        createAddress({state}){
            const today = new Date();
            const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
            const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
            const address = new FormData();
            address.append("user_id", state.userId)
            address.append("area_id", state.areaId)
            address.append("building_number", state.buildingNumber)
            address.append("street_name", state.streetName)
            address.append("floor", state.floor)
            address.append("number_of_apartment", state.apartmentNumber)
            address.append("defult_address", 1)
            address.append("last_use_at", date+' '+time)

            console.log(address)
            const response = Nova.request().post("http://localhost:8001/nova-api/addresses?editing=true&editMode=create", address)
        }
    }

}
export default store