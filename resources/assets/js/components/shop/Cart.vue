<template>
    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
        <a  class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cart-plus"></i> ({{ $store.state.cartCount }})
        </a>
        <div class="dropdown-menu">
            <div class="agile_inner_drop_nav_info p-4">
                
                <div class="row">
                    <div class="multi-gd-img">
                        <div class="cart-card" v-for="item in $store.state.cart" :key="item.id">
                            <img :src="item.img_product1" alt="Card image cap" width="30%">
                            <p>{{ item.product_title }}</p>
                            <p>
                                <br />
                                Qty : {{ item.quantity }} <br />
                                Subtotal : {{ item.totalPrice }}
                            </p>
                            <b-button size="sm" variant="link" @click.prevent="removeFromCart(item)"><i class="far fa-trash-alt"></i> Remove</b-button>
                             
                        </div>
                    </div>
                    <div style="clear:both;"></div>
                    <p>
                        <b-row>
                            <b-col sm="6">
                                Total : {{ totalPrice }}
                            </b-col>
                            <b-col sm="6">
                                <router-link variant="link" v-bind:to="{name: 'Keranjang'}">Checkout</router-link>
                            </b-col>
                        </b-row>
                    </p>
                </div>
            </div>
        </div>
    </li>
</template>
<script>
export default {
    computed: {
           
        totalPrice() {
            let total = 0;

            for (let item of this.$store.state.cart) {
                total += item.totalPrice;
            }

            return total;
        }
           
    },
    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        }
    }
}
</script>