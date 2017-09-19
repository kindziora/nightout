import lazyLoading from './lazyLoading'

export default {
  name: 'Locations',
  path: '/locations',
  meta: {
    icon: 'fa-map-marker',
    expanded: true,
    link: 'locations/index.vue'
  },
  component: lazyLoading('locations', true),

  children: [
    {
      name: 'anlegen',
      path: 'create',
      component: lazyLoading('locations/create'),
      meta: {
        link: 'locations/create.vue',
        icon: 'fa-plus'
      }
    }
  ]
}
