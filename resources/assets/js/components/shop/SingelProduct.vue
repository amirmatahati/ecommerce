<template>
    <div id="amir">
        <div class="services-breadcrumb">
            <div class="agile_inner_breadcrumb">
                <div class="container">
                    <ul class="w3_short">
                        <li>
                            <a href="index.html">Home</a>
                            <i>|</i>
                        </li>
                        <li>Single Product 1</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="banner-bootom-w3-agileits py-5">
            <div class="container py-xl-4 py-lg-2">
              <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
                <span>S</span>ingle
                <span>P</span>age</h3>

                <div class="row">
                    <div class="col-lg-5 col-md-8 single-right-left ">
                        <div class="grid images_3_of_2">
                          <ProductZoomer
                            :base-images="img_product1"
                            :base-zoomer-options="zoomerOptions"
                            />
                            <div class="flexslider">
                                <ul class="slides">

                                    <li data-thumb="[[img_product1]]">
                                      <div class="thumb-image">
                                        <img src="web/images/si1.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
                                    </li>
                                    <li data-thumb="queries.img_product2">
                                      <div class="thumb-image">
                                        <img src="web/images/si2.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
                                    </li>
                                    <li data-thumb="queries.img_product3">
                                      <div class="thumb-image">
                                        <img src="web/images/si3.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
                                    </li>

                                </ul>
                                <div class="clearfix"></div>
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


            img_product1 : [],
            img_product2 : '',
            img_product3 : '',

          images: {
            /*
            'thumbs': [
              {
                'id': 1,
                'url': []
              },
              {
                'id': 2,
                'url': []
              }
            ],
            'normal_size': [
              {
                'id': 1,
                'url': 'http://yoohooworld.com/images/vue-product-zoomer/images/normal_size/1.jpeg'
              },
              {
                'id': 2,
                'url': 'http://yoohooworld.com/images/vue-product-zoomer/images/normal_size/2.jpeg'
              }
            ],
            'large_size': [
              {
                'id': 1,
                'url': 'http://yoohooworld.com/images/vue-product-zoomer/images/large_size/1.jpeg'
              },
              {
                'id': 2,
                'url': 'http://yoohooworld.com/images/vue-product-zoomer/images/large_size/2.jpeg'
              }
            ]
            */
        },
        'zoomerOptions': {
          'zoomFactor': 4,
          'pane': 'container',
          'hoverDelay': 300,
          'namespace': 'container-zoomer',
          'move_by_click':true,
          'scroll_items': 4,
          'choosed_thumb_border_color': "#ff3d00"
        }


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
						this.img_product1	= response.data.img_product1
            console.log(this.img_product1)
					})
					.catch(error => {
						console.log(error.response.data);
					});
			},

		}

    }
</script>
