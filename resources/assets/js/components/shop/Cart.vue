<template>
    <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
        <a v-if="$store.state.cart.length > 0" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cart ({{ $store.state.cartCount }})
        </a>
        <div class="dropdown-menu">
            <div class="agile_inner_drop_nav_info p-4">
                
                <div class="row">
                  <div class="col-sm-6 multi-gd-img">
                      <div v-for="image in $store.state.cart" :key="image.id">
                          {{ image.product_title }} x {{ image.quantity }} - ${{ image.totalPrice }}
                          <br />
                          Total: ${{ totalPrice }}
                      </div>
                  </div>
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

                for (let image of this.$store.state.cart) {
                    total += image.totalPrice;
                }
                console.log(total)
                return total.toFixed(2);
            }
    },
    methods: {
        removeFromCart(item) {
            this.$store.commit('removeFromCart', item);
        }
    }
}
</script>