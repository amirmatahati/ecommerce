<template>
    <div id="amir">
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
            <div class="checkout-right">
                <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
					<span>{{ $store.state.cartCount }} Products</span>
				</h4>

                <div class="table-responsive">
					<table class="timetable_sub">
						<thead> 
							<tr>
								<th>Product</th>
								<th>Quality</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Remove</th>
							</tr>
						</thead>
						<tbody>
                            <tr v-for="item in $store.state.cart" :key="item.id">
                                <td width="30%">
                                    <a href="single2.html">
                                        <img :src="item.img_product1" alt=" " class="img-responsive" width="30%">
                                    </a>
                                </td>
                                <td class="invert">
                                    <span>{{ item.quantity }}</span>
                                    <b-button size="lg" variant="link" @click.prevent="addToCart(item)"><i class="fas fa-plus"></i></b-button>
                                </td>
                                <td class="invert">{{ item.product_title }}</td>
                                <td class="invert">{{ item.totalPrice }}</td>
								<td class="invert">
                                    <b-button size="lg" variant="link" @click.prevent="removeFromCart(item)"><i class="far fa-times-circle"></i></b-button>
								</td>
                            </tr>
						</tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th colspan="2">{{ totalPrice }}</th>
                            </tr>
                        </tfoot>
					</table>
                </div>
            </div>
        </div>
    </div>
    </div>
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
        },
         addToCart(item) {
                this.$store.commit('addToCart', item);
            },
    }
}
</script>