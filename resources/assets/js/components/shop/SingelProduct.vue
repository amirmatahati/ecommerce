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
                            <div class="flexslider">
                                <ul class="slides">
                                    <li data-thumb="web/images/si1.jpg">
                                      <div class="thumb-image">
                                        <img src="web/images/si1.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
                                    </li>
                                    <li data-thumb="web/images/si2.jpg">
                                      <div class="thumb-image">
                                        <img src="web/images/si2.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
                                    </li>
                                    <li data-thumb="web/images/si3.jpg">
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

				queries: {},
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
						this.queries	= response.data
            console.log(this.queries)
					})
					.catch(error => {
						console.log(error.response.data);
					});
			},

		}

    }
</script>
