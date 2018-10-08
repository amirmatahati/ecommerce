<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset">

      <b-form-group id="exampleInputGroup2"
                    label="Your Name:"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="text"
                      v-model="product.product_title"
                      required
                      placeholder="Enter name">
        </b-form-input>
      </b-form-group>
      <div class="form-group">
      <label>Category:</label>
        <select v-model="product.category" class="form-control" :options="options" name="post_category">
            <option v-for="item in cats" :value="item.id" :selected="item.id==product.produc_category?true : false">
            {{item.category_name}}
          </option>
          </option>
        </select>

      </div>
      <b-form-group id="exampleInputGroup2"
                    label="price"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="number"
                      v-model="product.price"
                      required
                      placeholder="Enter price">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Garansi"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="text"
                      v-model="product.garansi"
                      required
                      placeholder="Enter garansi">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Payment"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="text"
                      v-model="product.payment"
                      required
                      placeholder="Enter Payment">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Image 1"
                    label-for="exampleInput2">
      <b-form-file ref="img_product1" v-model="product.img_product1" v-on:change="onFileChange" class="mt-3" plain></b-form-file>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Image 2"
                    label-for="exampleInput2">
        <b-form-file v-model="product.img_product2" v-on:change="onFileChange2" class="mt-3" plain></b-form-file>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Image 3"
                    label-for="exampleInput2">
      <b-form-file v-model="product.img_product3" v-on:change="onFileChange3" class="mt-3" plain></b-form-file>
      </b-form-group>
      <b-form-group>
      <vue-ckeditor v-model="product.description1" :config="config" @blur="onBlur($event)" @focus="onFocus($event)" />
      </b-form-group>
      <b-form-group>
      <vue-ckeditor v-model="product.description2" :config="config2" @blur="onBlur($event)" @focus="onFocus($event)" />
      </b-form-group>
      <b-button type="submit" variant="primary">Submit</b-button>
      <b-button type="reset" variant="danger">Reset</b-button>
    </b-form>
  </div>
</template>

<script>
import VueCkeditor from 'vue-ckeditor2';
export default {
  components: { VueCkeditor },
  http: {
          headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  },
  data () {
    return {

      config: {
      toolbar: [
        'Format',
        ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'],
        ['BulletedList', 'NumberedList', 'Blockquote'],
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
        ['Link', 'Unlink'],
        ['FontSize', 'TextColor'],
        ['Image'],
        ['Undo', 'Redo'],
        ['Source', 'Maximize']
      ],
      height: 300
    },
    config2: {
        toolbar: [
          'Format',
          ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'],
          ['BulletedList', 'NumberedList', 'Blockquote'],
          ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
          ['Link', 'Unlink'],
          ['FontSize', 'TextColor'],
          ['Image'],
          ['Undo', 'Redo'],
          ['Source', 'Maximize']
        ],
        height: 300
    },
    product : {
      img_product1          : null,
      img_product2          : null,
      img_product3          : null,
      category              : '',
      product_title      : '',
      price             : 0,
      garansi           : '',
      payment           : '',
      description1      : '',
      description2      : '',
    },
    cats                  : {},
    options: [
        { value: null, text: 'Please select an option' }
      ]
    }
  },
  created: function(){
      this.loadCat()
      let uri = './admin/edit-product/'+this.$route.params.id;
              axios.get(uri).then((response) => {
          this.product = response.data;

              });
  },
  methods: {
    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
      return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
          vm.image1 = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    onFileChange2(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
      return;
      this.createImage2(files[0]);
    },
    createImage2(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
          vm.image2 = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    onFileChange3(e) {
      var files = e.target.files || e.dataTransfer.files;
      if (!files.length)
      return;
      this.createImage3(files[0]);
    },
    createImage3(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = (e) => {
          vm.image3 = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    onSubmit (evt) {
      evt.preventDefault();

      //alert(JSON.stringify(this.form));
      axios.post('./admin/update-product/'+ this.product.id, {
        headers: {'Content-Type': 'multipart/form-data', 'files' : true},
        product_name   		: this.product.product_title,
        price             : this.product.price,
        garansi           : this.product.garansi,
        payment           : this.product.payment,
        description1      : this.product.description1,
        description2      : this.product.description2,
        img_product1s      : this.image1,
        img_product2s      : this.image2,
        img_product3s      : this.image3,
        img_product1      : this.product.img_product1,
        img_product2      : this.product.img_product2,
        img_product3      : this.product.img_product3,
        produc_category   : this.product.category
      })
      .then((response) => {
          this.$router.push({name: 'ListProduct'});
        })
    },
    onReset (evt) {
      evt.preventDefault();
      /* Reset our form values */


    },
    onBlur(editor) {
      //console.log(editor);
    },
    onFocus(editor) {
      //console.log(editor);
    },
    loadCat: function() {
      axios.get('./admin/create-product')
        .then(response => {
          this.cats	    = response.data
          console.log(this.cats)
        })
        .catch(error => {
          console.log(error.response.data);
        });
    }
  }
}
</script>
