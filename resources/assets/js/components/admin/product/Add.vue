<template>
  <div>
    <b-form @submit="onSubmit" @reset="onReset" v-if="show">

      <b-form-group id="exampleInputGroup2"
                    label="Your Name:"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="text"
                      v-model="product_name"
                      required
                      placeholder="Enter name">
        </b-form-input>
      </b-form-group>
      <div class="form-group">
      <label>Category:</label>
        <select v-model="category" class="form-control" :options="options" name="post_category">
          <option v-for="item in cats" :value="item.id" :key="item.id">
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
                      v-model="price"
                      required
                      placeholder="Enter price">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Garansi"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="text"
                      v-model="garansi"
                      required
                      placeholder="Enter garansi">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Payment"
                    label-for="exampleInput2">
        <b-form-input id="exampleInput2"
                      type="text"
                      v-model="payment"
                      required
                      placeholder="Enter Payment">
        </b-form-input>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Image 1"
                    label-for="exampleInput2">
      <b-form-file ref="img_product1" v-model="img_product1" v-on:change="onFileChange" class="mt-3" plain></b-form-file>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Image 2"
                    label-for="exampleInput2">
        <b-form-file v-model="img_product2" v-on:change="onFileChange" class="mt-3" plain></b-form-file>
      </b-form-group>
      <b-form-group id="exampleInputGroup2"
                    label="Image 3"
                    label-for="exampleInput2">
      <b-form-file v-model="img_product3" v-on:change="onFileChange" class="mt-3" plain></b-form-file>
      </b-form-group>
      <b-form-group>
      <vue-ckeditor v-model="description1" :config="config" @blur="onBlur($event)" @focus="onFocus($event)" />
      </b-form-group>
      <b-form-group>
      <vue-ckeditor v-model="description2" :config="config2" @blur="onBlur($event)" @focus="onFocus($event)" />
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
      product_name      : '',
      price             : 0,
      garansi           : '',
      payment           : '',
      description1      : '',
      description2      : '',
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
    img_product1          : null,
    img_product2          : null,
    img_product3          : null,
    show                  : true,
    category              : '',
    cats                  : {},
    options: [
        { value: null, text: 'Please select an option' }
      ]
    }
  },
  created: function(){
      this.loadCat()
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
          vm.image2 = e.target.result;
          vm.image3 = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    onSubmit (evt) {
      evt.preventDefault();

      //alert(JSON.stringify(this.form));
      axios.post('./admin/save-product', {
        headers: {'Content-Type': 'multipart/form-data', 'files' : true},
        product_name   		: this.product_name,
        price             : this.price,
        garansi           : this.garansi,
        payment           : this.payment,
        description1      : this.description1,
        description2      : this.description2,
        img_product1      : this.image1,
        img_product2      : this.image2,
        img_product3      : this.image3,
        produc_category   : this.category
      })
      .then((response) => {
          this.$router.push({name: 'ListProduct'});
        })
    },
    onReset (evt) {
      evt.preventDefault();
      /* Reset our form values */
      this.form.email = '';
      this.form.name = '';
      this.form.food = null;
      this.form.checked = [];
      /* Trick to reset/clear native browser form validation state */
      this.show = false;
      this.$nextTick(() => { this.show = true });
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
