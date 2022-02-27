import UserForm from './components/UserForm'
import store from './store/addressesFormStore'
Nova.booting((Vue, router, novastore) => {
  router.addRoutes([
    {
      name: 'addresses-form',
      path: '/addresses-form',
      component: require('./components/Tool'),
    },
  ])
  Vue.component('user-form', UserForm)
  novastore.registerModule('addressesFormStore', store)
})
