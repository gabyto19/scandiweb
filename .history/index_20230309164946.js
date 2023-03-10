Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
    };
  },
  methods: {
    deleteProducts() {
      axios.post('delete_products.php', {
        selectedProducts: this.selectedProducts
      })
      .then(response => {
        // handle success response
        console.log(response.data);
      })
      .catch(error => {
        // handle error response
        console.log(error);
      });
    }
  },
  created() {
    axios.get('get_products.php')
      .then(response => {
        this.products = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
 
}).mount("#app");
