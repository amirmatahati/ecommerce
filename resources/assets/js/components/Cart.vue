<template>
    <div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link" href="">
            Cart ({{ $store.state.cartCount }})
        </a>

        <div v-if="$store.state.cart.length > 0" class="navbar-dropdown is-boxed is-right">
            <a v-for="image in $store.state.cart"
    :key="image.id"
    class="navbar-item"
    href=""
>
    <span class="removeBtn"
        title="Remove from cart"
        @click.prevent="removeFromCart(image)">X</span>

    {{ image.title }} x{{ image.quantity }}  ${{ image.totalPrice }}
</a>


            <a class="navbar-item" href="">
                Total: ${{ totalPrice }}
            </a>

            <hr class="navbar-divider">

            <a class="navbar-item" href="">
                Checkout
            </a>
        </div>

        <div v-else class="navbar-dropdown is-boxed is-right">
            <a class="navbar-item" href="">
                Cart is empty
            </a>
        </div>
    </div>
</template>


<script>
export default {
    computed: {
        totalPrice() {
            let total = 0;

            for (let image of this.$store.state.cart) {
                total += image.totalPrice;
            }

            return total;
        }
    },
    methods: {
        removeFromCart(image) {
            this.$store.commit('removeFromCart', image);
        }
    }
}
</script>