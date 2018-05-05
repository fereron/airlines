import VueRouter from 'vue-router'

export var router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: require('./components/Home')
        },
        {
            path: '/news',
            component: require('./components/News')
        },
        {
            path: '/dashboard',
            // name: 'dashboard',
            component: require('./components/Dashboard'),
            children: [
                {
                    path: 'profile',
                    name: 'profile',
                    component: require('./components/profile/Profile')
                },
                {
                    path: 'user/:id',
                    name: 'user',
                    component: require('./components/profile/PublicProfile')
                },
                {
                    path: '/friends',
                    name: 'friends',
                    component: require('./components/Friends')
                },
                {
                    path: 'search',
                    name: 'search',
                    component: require('./components/SearchResult'), props: (route) => ({query: route.query.q})
                }
            ]
        },

    ]
});