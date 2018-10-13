<template>
    <div class="flexslider">
                                   
                                <ul class="slides">
								<li v-bind:data-thumb="image.img_product1">
									<div class="thumb-image">
										<img src="web/images/si1.jpg" data-imagezoom="false" class="img-fluid ini_gambar" alt=""> 
                                    </div>
								</li>
                                <li :data-thumb="image.img_product2">
									<div class="thumb-image">
										<img :src="'./'+ image.img_product2 +''" data-imagezoom="true" class="img-fluid ini_gambar" alt=""> 
                                    </div>
								</li>
							</ul>
                                <div class="clearfix"></div>
                            </div>
</template>
<script>
	export default {
		http: {
            headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
        },
        //props:['image'],
		data(){
			return{
                image: '',
            /*
          image: {
            img_product1 : '',
            img_product2 : '',
            img_product3 : ''
          },
            d_image: '', */
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
                        this.image	= response.data.
                        console.log(this.image)
            console.log(this.image)
					})
					.catch(error => {
						console.log(error.response.data);
					});
			},

		}

    }
</script>