Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      selectedProducts: [],
      products: [],
    };
  },
  methods: {
    deleteProducts() {
      if (this.selectedProducts.length > 0) {
        axios.post('delete_products.php', {
          skus: this.selectedProducts
        })
        .then(response => {
          window.location.reload(); // Refresh page to show updated product list
        })
        .catch(error => {
          console.log(error);
        });
      }
    }
  },
  created() {
    axios
      .get("get_products.php")
      .then((response) => {
        this.products = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
}).mount("#app");
