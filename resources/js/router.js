import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);
function setComponent(path_file) {
    const route_path = "./components/ems/pages/" + path_file + "Component.vue";
    return import ("" + route_path);
}

const routes = [
    { path: "*", component: () => setComponent("error/404") },
    {
        path: "/",
        redirect: { path: '/home' }
    },
    { path: "/home", component: () => setComponent("Home"), name: "Home" },
]

const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    linkExactActiveClass: "exact-active" // short for `
});


router.beforeResolve((to, from, next) => {
    //
    next();
});

router.afterEach((to, from) => {
    // setTimeout(function() { $('.page-loader-wrapper').fadeOut(); }, 50);
});
export default router;
