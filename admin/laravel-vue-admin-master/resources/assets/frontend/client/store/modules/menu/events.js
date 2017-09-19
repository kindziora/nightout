import lazyLoading from './lazyLoading'

export default {
  name: 'Events',
  path: '/events',
  meta: {
    icon: 'fa-calendar-check-o',
    expanded: true,
    link: 'events/index.vue'
  },
  component: lazyLoading('events', true),

  children: [
    {
      name: 'anlegen',
      path: 'create',
      component: lazyLoading('events/create'),
      meta: {
        link: 'events/create.vue',
        icon: 'fa-plus'
      }
    }
  ]
}
