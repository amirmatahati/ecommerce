import VueRouter from 'vue-router';
import ShopIndex from './components/shop/IndexHome.vue';
import DetailShop from './components/shop/DetailProduct.vue';
import SingelProduct from './components/shop/SingelProduct.vue';

import AddProduct from './components/admin/product/Add.vue';
import ListProduct from './components/admin/product/ListProduct.vue';
import EditProduct from './components/admin/product/EditProduct.vue';

let routes = [
  {
      path: '/',
      name: 'ShopIndex',
      component: ShopIndex
  },
  {
      path: '/add-product',
      name: 'AddProduct',
      component: AddProduct
  },
  {
      path: '/list-product',
      name: 'ListProduct',
      component: ListProduct
  },
  {
      path: '/edit-product/:id',
      name: 'EditProduct',
      component: EditProduct
  },
  {
      path: '/:alias',
      name: 'DetailShop',
      component: DetailShop
  },
  {
      path: '/detail/:product_name',
      name: 'SingelProduct',
      component: SingelProduct
  }
];

export default new VueRouter({
    routes
});
