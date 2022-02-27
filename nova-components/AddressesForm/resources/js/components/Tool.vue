<template>
    <user-form></user-form>
</template>

<script>
import UserForm from './UserForm.vue'
export default {
  components: { UserForm },
    metaInfo() {
        return {
          title: 'AddressesForm',
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
