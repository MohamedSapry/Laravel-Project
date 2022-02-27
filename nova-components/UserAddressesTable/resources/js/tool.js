import UsersTable from './components/UsersTable'
import store from './store/addressesTableStore'
Nova.booting((Vue, router, novastore) => {
  router.addRoutes([
    {
      name: 'user-addresses-table',
      path: '/user-addresses-table',
      component: require('./components/Tool'),
    },
  ]);
  Vue.component('users-table', UsersTable)
  novastore.registerModule('addressesTableStore', store)
})