<template>
    <div id="amir">
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <div class="container">
                    <ul class="w3_short">
                        <li>
                            <router-link v-bind:to="{name: 'ShopIndex'}">Home</router-link>
                            <i>|</i>
                        </li>
                        <li>{{ names }} <i>|</i></li>
                        <cart-dropdown></cart-dropdown>
                    </ul>
                </div>
            </div>
        </div>

        <div class="banner-bootom-w3-agileits py-5">
            <div class="container py-xl-4 py-lg-2">
              <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                {{ image.product_title }}</h3>
                <div class="row">
                    <div class="col-lg-5 col-md-8 single-right-left ">
                        <div class="grid images_3_of_2">
                            <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                                <div class="carousel-inner">
                                    <div class="active item carousel-item" data-slide-number="0">
                                        <img :src="image.img_product1" data-imagezoom="true" class="img-fluid">
                                    </div>
                                    <div class="item carousel-item" data-slide-number="1">
                                        <img :src="image.img_product2" data-imagezoom="true" class="img-fluid">
                                    </div>
                                    <div class="item carousel-item" data-slide-number="2">
                                        <img :src="image.img_product3"  data-imagezoom="true" class="img-fluid">
                                    </div>
                                    
                                </div>
                    <!-- main slider carousel nav controls -->


                                <ul class="carousel-indicators list-inline">
                                    <li class="list-inline-item active" data-slide-to="0" data-target="#myCarousel">
                                        <a id="carousel-selector-0" class="selected" >
                                            <img :src="image.img_product1" class="img-fluid">
                                        </a>
                                    </li>
                                    <li class="list-inline-item" data-slide-to="1" data-target="#myCarousel">
                                        <a id="carousel-selector-1" >
                                            <img :src="image.img_product2" class="img-fluid">
                                        </a>
                                    </li>
                                    <li class="list-inline-item" data-slide-to="2" data-target="#myCarousel">
                                        <a id="carousel-selector-2" >
                                            <img :src="image.img_product3" class="img-fluid">
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                      </div>
                    </div>


                    <div class="col-lg-7 single-right-left simpleCart_shelfItem">
                        <h3 class="mb-3">{{ image.product_title }}</h3>
                        <p class="mb-3">
                            <span class="item_price">Rp. {{ formatPrice(image.price) }} </span>
                            <del class="mx-2 font-weight-light">$280.00</del>
                            <label>Free delivery</label>
                        </p>
                        <div class="single-infoagile">
                            <div v-html="image.description1"></div>
                        </div>
                        <div class="product-single-w3l">
                            <p class="my-3">
                                <i class="far fa-hand-point-right mr-2"></i>
                                {{ image.garansi }}</p>
                            
                                <div v-html="image.description2"></div>
                            <p class="my-sm-4 my-3">
                                <i class="fas fa-retweet mr-3"></i>{{ image.payment}}
                            </p>
                        </div>
                        <div class="occasion-cart">
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <button type="submit" @click="addToCart(image)" name="submit" value="Add to cart" class="btn btn-sm btn-info" >Add To Cart</button>
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
		data(){
			return{
              
                image:{
                    product_title: '',
                    img_product1: '',
                    img_product2: '',
                    img_product3: '',
                    price: ''
                },
                names : '',
                
			}
          },
        metaInfo () {
                return {
                    title: this.image.product_title,
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
			product() {
				axios.get('./product/'+ this.$route.params.product_name)
					.then(response => {
                        this.image	= response.data.product
                        this.names  = response.data.name
                        this.title  = response.data.nmproduct
					})
					.catch(error => {
						console.log(error.response.data);
					});
            },
            formatPrice(value) {
				let val = (value/1).toFixed(2).replace('.', '.')
				return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            },
            addToCart(image) {
                this.$store.commit('addToCart', image);
                this.alertDisplay();
            },
            show () {
                this.$modal.show('hello-world');
                this.image = this.image[image];
            },
            hide () {
                this.$modal.hide('hello-world');
            },
            alertDisplay() {
				this.$swal({
				title: 'Cart update',
				showCloseButton: true,
				});
			}

		}

    }
</script>