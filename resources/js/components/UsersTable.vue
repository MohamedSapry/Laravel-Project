<script>
import axios from "axios";
export default {
    mounted() {
        console.log('Example component mounted.')
    },
    data(){
        return {
            addresses :[],
            page : 1,
            firstPage : 0,
            lastPage : -1
        }
    },
    created() {
        this.getUsersData();
    },
    methods:{
        async getUsersData(page){
            if(page === 1 && this.page < this.lastPage){
                this.page++
            }else if(page === -1 && this.page != this.firstPage){
                this.page--
            }
            const res = axios.get('http://localhost:8001/api/usersdata?page=' + this.page).then(data => {
                console.log(data)
                this.addresses = data.data.data
                this.firstPage = data.data.from
                this.lastPage = data.data.last_page
                console.log(this.firstPage)
            })
        }
    }
}
</script>

<template>
    <div>
            <div class="sidenav">
                <a href="http://localhost:8001/addresses">Users Table</a><br>
                <a href="http://localhost:8001/newAddress">New Address</a><br>
            </div>

            <table class="center">
                    <thead>
                        <tr>
                            <th>User Name</th>
                            <th>Street Name</th>
                            <th>Building Number</th>
                            <th>Floor</th>
                            <th>Apartment Number</th>
                            <th>Area Name</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="address in addresses" :key="address.id">
                            <td>{{address.name}}</td>
                            <td>{{address.street_name}}</td>
                            <td>{{address.building_number}}</td>
                            <td>{{address.floor}}</td>
                            <td>{{address.number_of_apartment}}</td>
                            <td>{{address.country}}</td>
                            <td>{{address.city}}</td>
                        </tr>
                    </tbody>
                </table>

            <div class="center">
                <button @click="getUsersData(-1)">PREVIOS</button>
                <span>{{page}}</span>
                <button @click="getUsersData(1)">NEXT</button>
            </div>
    </div>  
</template>

<style>
    td{
        border: 1px groove #e2e2e2;
        border-spacing: 0;
        
    }
    tr, td{
        padding: 16px;
    }
    table{
        border-collapse: collapse;
    }
    .center {
        margin-left: auto;
        margin-right: auto;
    }
</style>