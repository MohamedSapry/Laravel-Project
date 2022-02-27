<template>
    <users-table></users-table>
</template>

<script>
import UsersTable from './UsersTable.vue'
export default {
  components: { UsersTable },
    metaInfo() {
        return {
          title: 'UserAddressesTable',
        }
    },
    mounted() {
        //
    },
}
</script>

<style>
/* Scoped Styles */
</style>
