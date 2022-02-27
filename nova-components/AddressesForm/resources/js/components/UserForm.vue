<template>
    <div>
        <label> User Name </label><br>
        <input type="text" v-model="userName" @input="getUserNameFromInput(userName), findUsers()"><br>
        
        <ul v-if="userName != ''" >
           <li v-for="user, index in userNames" :key="index" @click="setUserName(user.title), setUserId(user.id.value)">
               {{ user.title }}
           </li>
        </ul>

        <label for="streetName"> Street Name </label><br>
        <input type="text" v-model="streetName" name="" id="streetName" @input="setStreetName(streetName)"><br>
        <label for="buildingNumber"> Building Number </label><br>
        <input type="text" v-model="buildingNumber" name="" id="buildingNumber" @input="setBuildingNumber(buildingNumber)"><br>
        <label for="floor"></label> Floor <br>
        <input type="text" v-model="floor" name="" id="floor" @input="setFloor(floor)"><br>
        <label for="apartmentNumber"> Apartment Number </label><br>
        <input type="text" v-model="apartmentNumber" name="" id="apartmentNumber" @input="setapartmentNumber(apartmentNumber)"><br>
        <label for="city"></label> City <br>
        <input type="text" v-model="city" id="city" @input="getCityNameFromInput(city), findCities()"><br><br>
        
        <ul v-if="city != ''">
           <li v-for="city, index in cities" :key="index" @click="setCityName(city.fields[1].value), setAreaId(city.fields[0].value)">
               {{ city.fields[1].value }}
           </li>
        </ul>
        
        <button type="button" @click="createAddress()"> Save </button>
    </div> 
</template>

<script>
import { mapState } from 'vuex';
import { mapActions } from 'vuex';
import { mapMutations } from 'vuex';

export default {
    data(){
        return {
            userId: null,
            areaId: null,
            userName: null,
            streetName: null,
            buildingNumber: null,
            floor: null,
            apartmentNumber: null,
            city: null,
        }
    },
    computed: mapState('storeModule2',[
        'userNames',
        'cities',
    ]),
    methods :{
        ...mapMutations('storeModule2',[
            'listUsers',
            'listCities',
            'setUserId',
            'setAreaId',
            'setBuildingNumber',
            'setStreetName',
            'setFloor',
            'setapartmentNumber',
            'getUserNameFromInput',
            'getCityNameFromInput'
        ]),
        ...mapActions('storeModule2',[
            'findUsers',
            'findCities',
            'createAddress'
        ]),
        setUserName(userName){
            console.log("user Name : " + userName)
            this.userName = userName
        },
        setCityName(city){
            console.log("City Name : " + city)
            this.city = city
        }
    }
}
</script>

<style>
/* Scoped Styles */
</style>
