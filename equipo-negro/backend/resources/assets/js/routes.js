import VueRouter from 'vue-router';


let routes=[
{
	path:'/usuarios/',
	component:require('./components/User')
},
{
	path:'/resultado/',
	component:require('./components/Home')
},
{
	path:'/about',
	component:require('./components/About')
},
{
	path:'/vision',
	component:require('./components/Vision')
},
{
	path:'/create',
	component:require('./components/Form')
},
{
	path:'/login',
	component:require('./components/Login')
},
{
	path:'/register',
	component:require('./components/Register')
}
];

export default new VueRouter({
	mode: 'history',
	routes,
	linkActiveClass: 'active'
});
