<template>
    <div id="myContainer">
      <div class="table-responsive grid-margin stretch-card table-striped">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Product Name</th>
              <th>Product Category</th>
              <th>Image1</th>
              <th>Image2</th>
              <th>Image3</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody >
            <tr v-for="(s, index) in queries.data" :key="s.id">
              <td class="py-1">{{ s.product_title }}</td>
              <td>{{ s.produc_category }}</td>
              <td><img v-bind:src="s.img_product1" width="30%"></td>
              <td><img v-bind:src="s.img_product2" width="30%"></td>
              <td><img v-bind:src="s.img_product3" width="30%"></td>
              <td><router-link v-bind:to="{name: 'EditProduct', params: {id: s.id}}">
                Edit
              </router-link></td>
            </tr>
          </tbody>
        </table>
      </div>

  <br>
  <pagination :data="queries" @pagination-change-page="perkiraan"></pagination>
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
				current_page: 1,
				data: [],
				from: 1,
				last_page: 1,
				next_page_url: null,
				per_page: 10,
				prev_page_url: null,
				to: 1,
				total: 0,
			}
		  },
		mounted(){
		},
		created: function()
        {
            this.perkiraan();
        },
		methods:{
			perkiraan(page = 1) {
				axios.get('./admin/list-product?page=' + page)
					.then(response => {
						this.queries	= response.data
					})
					.catch(error => {
						console.log(error.response.data);
					});
			},

		}

    }
</script>
