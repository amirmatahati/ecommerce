<template>
    <div id="amir">
      
      <!-- banner -->
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators-->
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item item1 active">
            <div class="container">
              <div class="w3l-space-banner">
                <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                  <p>Get flat
                    <span>10%</span> Cashback</p>
                  <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">The
                    <span>Big</span>
                    Sale
                  </h3>
                  <a class="button2" href="product.html">Shop Now </a>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item item2">
            <div class="container">
              <div class="w3l-space-banner">
                <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                  <p>advanced
                    <span>Wireless</span> earbuds</p>
                  <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Best
                    <span>Headphone</span>
                  </h3>
                  <a class="button2" href="product.html">Shop Now </a>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item item3">
            <div class="container">
              <div class="w3l-space-banner">
                <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                  <p>Get flat
                    <span>10%</span> Cashback</p>
                  <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">New
                    <span>Standard</span>
                  </h3>
                  <a class="button2" href="product.html">Shop Now </a>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item item4">
            <div class="container">
              <div class="w3l-space-banner">
                <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                  <p>Get Now
                    <span>40%</span> Discount</p>
                  <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">Today
                    <span>Discount</span>
                  </h3>
                  <a class="button2" href="product.html">Shop Now </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- //banner -->

      <div class="ads-grid py-sm-5 py-4">
          <div class="container py-xl-4 py-lg-2">
              <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>O</span>ur
                <span>N</span>ew
                <span>P</span>roducts
              </h3>
              <div class="row">
                  <div class="agileinfo-ads-display col-lg-9">
                      <div class="wrapper">
                          <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                              <h3 class="heading-tittle text-center font-italic">New Brand Mobiles</h3>
                              <div class="row">
                                  <div class="col-md-4 product-men mt-5" v-for="p in queries" :key="p.id">
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
                                                  <span class="item_price">Rp. {{ formatPrice(p.price) }}</span>
                                                  <del>$280.00</del>
                                              </div>
                                              <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                   
                              </div>

                          </div>
                                                        <!--- tv & audio -->
                                  <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
                                    <h3 class="heading-tittle text-center font-italic">Tv & Audio</h3>
                                    <div class="row">
                                        <div class="col-md-4 product-men mt-5" v-for="tv in tv" :key="tv.id">
                                            <div class="men-pro-item simpleCart_shelfItem">
                                                <div class="men-thumb-item text-center">
                                                    <img v-bind:src="tv.img_product1" alt="" class="img-response center-block" width="100%">
                                                    <div class="men-cart-pro">
                                                        <div class="inner-men-cart-pro">
                                                          <router-link v-bind:to="{name: 'SingelProduct', params: {product_name: tv.product_alias}}" class="link-product-add-cart">Quick View</router-link>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="item-info-product text-center border-top mt-4">
                                                    <h4 class="pt-1">
                                                        <a href="single.html">{{ tv.product_title }}</a>
                                                    </h4>
                                                    <div class="info-product-price my-2">
                                                        <span class="item_price">Rp. {{ formatPrice(tv.price) }}</span>
                                                        <del>$280.00</del>
                                                    </div>
                                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    metaInfo: {
      title: 'Default Title',
      titleTemplate: '%s | My Awesome Webapp',
      meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {name: 'description', content: 'I have things here on my site.'}
    ]
    },
		data(){
			return{

				queries : {},
        tv      : {}
			}
		  },
		mounted(){
		},
		created: function()
        {
            this.product();
        },
		methods:{
			product() {
				axios.get('./get-product-home')
					.then(response => {
						this.queries	= response.data.hp
            this.tv       = response.data.tv
					})
					.catch(error => {
						console.log(error.response.data);
					});
      },
      formatPrice(value) {
				let val = (value/1).toFixed(2).replace('.', ',')
				return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
			}

		}

    }
</script>