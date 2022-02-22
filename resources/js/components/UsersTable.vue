<script>
import { mapState } from 'vuex';
import { mapActions } from 'vuex';
import { mapMutations } from 'vuex';


export default {
    computed: mapState([
        'addresses',
        'page',
        'lastPage'
    ]),
    methods :{
        ...mapActions([
            'getUsersData'
        ]),
        ...mapMutations([
            'nextPage',
            'previousPage',
        ])
    },
    
    created() {
        this.getUsersData()
    },
}
</script>

<template>
    <div>
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
            <button @click="previousPage(), getUsersData()">PREVIOS</button>
            <span>{{page}}</span>
            <button @click="nextPage(), getUsersData()">NEXT</button>
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