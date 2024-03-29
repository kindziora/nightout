import * as types from '../../mutation-types'
import lazyLoading from './lazyLoading'
import events from './events'
import promotions from './promotions'
import locations from './locations'
import uifeatures from './uifeatures'
import components from './components'
import tables from './tables'

// show: meta.label -> name
// name: component name
// meta.label: display label

const state = {
  items: [
   /* {
      name: 'Dashboard',
      path: '/dashboard',
      meta: {
        icon: 'fa-tachometer',
        link: 'dashboard/index.vue'
      },
      component: lazyLoading('dashboard', true)
    },
    {
      name: 'Axios',
      path: '/axiosDemo',
      meta: {
        icon: 'fa-rocket',
        link: 'axios/index.vue'
      },
      component: lazyLoading('axios', true)
    },*/
    {
      name: 'Home',
      path: '/',
      meta: {
        icon: 'fa-home',
        link: 'landingpage/index.vue'
      },
      component: lazyLoading('landingpage', true)
    },
    events,
    locations,
    promotions,
    uifeatures,
    components,
    tables,
     {
      name: 'About',
      path: '/about',
      meta: {
        icon: 'fa-info',
        link: 'info/index.vue'
      },
      component: lazyLoading('info', true)
    },
  ]
}

const mutations = {
  [types.EXPAND_MENU] (state, menuItem) {
    if (menuItem.index > -1) {
      if (state.items[menuItem.index] && state.items[menuItem.index].meta) {
        state.items[menuItem.index].meta.expanded = menuItem.expanded
      }
    } else if (menuItem.item && 'expanded' in menuItem.item.meta) {
      menuItem.item.meta.expanded = menuItem.expanded
    }
  }
}

export default {
  state,
  mutations
}
