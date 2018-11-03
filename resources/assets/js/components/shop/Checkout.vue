<template>
    <div id="amir">
    <div class="privacy py-sm-5 py-4">
        <div class="container py-xl-4 py-lg-2">
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
            <div class="checkout-right">
                <h4 class="mb-sm-4 mb-3">Your shopping cart contains:
					<span>3 Products</span>
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
                                <td class="invert-image">
                                    <a href="single2.html">
                                        <img :src="item.img_product1" alt=" " class="img-responsive">
                                    </a>
                                </td>
                                <td class="invert">
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <div class="entry value-minus">&nbsp;</div>
                                                <div class="entry value">
                                                    <span>{{ item.quantity }}</span>
                                                </div>
                                            <div class="entry value-plus active">&nbsp;</div>
                                        </div> 
                                    </div>
                                </td>
                                <td class="invert">{{ item.product_title }}</td>
                                <td class="invert">$1,999</td>
								<td class="invert">
									<div class="rem">
										<div class="close2"> </div>
									</div>
								</td>
                            </tr>
						</tbody>
					</table>
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
        }
    }
}
</script>