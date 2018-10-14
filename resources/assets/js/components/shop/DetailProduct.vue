<template>

      <div class="ads-grid py-sm-5 py-4">
          <div class="container py-xl-4 py-lg-2">
            <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
              {{ name_cats }}
            </h3>
            <div class="row">
                <div class="agileinfo-ads-display col-lg-9">
                    <div class="wrapper">
                      <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                          <div class="row">
                              <div class="col-md-4 product-men" v-for="p in queries.data" :key="p.id">
                                  <div class="men-pro-item simpleCart_shelfItem">
                                        <div class="men-thumb-item text-center">
                                            <img v-bind:src="p.img_product1" alt="" class="img-response center-block" width="100%">
                                            <div class="men-cart-pro">
                                                <div class="inner-men-cart-pro">
                                                    <router-link v-bind:to="{name: 'SingelProduct', params: {product_name: p.product_alias}}" class="link-product-add-cart">Quick View</router-link>
                                                </div>
                                            </div>
                                          </div>
                                          <div class="item-info-product text-center border-top mt-4">
                                              <h4 class="pt-1">
                                                  <a href="single.html">{{ p.product_title }}</a>
                                              </h4>
                                              <div class="info-product-price my-2">
                          												<span class="item_price">$ {{ p.price }}</span>
                          												<del>$280.00</del>
                        											</div>
                                              <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                        											</div>
                                          </div>
                                    </div>
                              </div>

                          </div>
                    </div>
                    <pagination :data="queries" @pagination-change-page="product"></pagination>
                </div>

            </div>

          </div>
      </div>
    </div>
    </div>
</template>

<script>
	export default {
		http: {
            headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
        },
        /*
        metaInfo: {
            title: this.name_cats,
            titleTemplate: '%s | My Awesome Webapp',
            meta: [
                { charset: 'utf-8' },
                { name: 'viewport', content: 'width=device-width, initial-scale=1' },
                {name: 'description', content: 'I have things here on my site.'}
            ]
        },
        */
		data(){
			return{
				queries: {},
        current_page: 1,
				data: [],
				from: 1,
				last_page: 1,
				next_page_url: null,
				per_page: 10,
				prev_page_url: null,
				to: 1,
				total: 0,
        name_cats: ''
			}
		  },
        metaInfo () {
        return {
            title: this.name_cats,
            meta: [
                { charset: 'utf-8' },
                { name: 'viewport', content: 'width=device-width, initial-scale=1' },
                {name: 'description', content: 'I have things here on my site.'}
            ]
        }
        },
		mounted(){
		},
		created: function()
        {
            this.product();
        },
		methods:{
			product(page = 1) {
				axios.get('./category-product/'+this.$route.params.alias + '?page=' + page)
					.then(response => {
						this.queries	= response.data.cats
                        this.name_cats  = response.data.name_cat
					})
					.catch(error => {
						console.log(error.response.data);
					});
			},

		}

    }
</script>
