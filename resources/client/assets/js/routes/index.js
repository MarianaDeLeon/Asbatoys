import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import CategoriesIndex from '../components/cruds/Categories/Index.vue'
import CategoriesCreate from '../components/cruds/Categories/Create.vue'
import CategoriesShow from '../components/cruds/Categories/Show.vue'
import CategoriesEdit from '../components/cruds/Categories/Edit.vue'
import ProductsIndex from '../components/cruds/Products/Index.vue'
import ProductsCreate from '../components/cruds/Products/Create.vue'
import ProductsShow from '../components/cruds/Products/Show.vue'
import ProductsEdit from '../components/cruds/Products/Edit.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/categories', component: CategoriesIndex, name: 'categories.index' },
    { path: '/categories/create', component: CategoriesCreate, name: 'categories.create' },
    { path: '/categories/:id', component: CategoriesShow, name: 'categories.show' },
    { path: '/categories/:id/edit', component: CategoriesEdit, name: 'categories.edit' },
    { path: '/products', component: ProductsIndex, name: 'products.index' },
    { path: '/products/create', component: ProductsCreate, name: 'products.create' },
    { path: '/products/:id', component: ProductsShow, name: 'products.show' },
    { path: '/products/:id/edit', component: ProductsEdit, name: 'products.edit' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
